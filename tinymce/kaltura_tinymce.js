(function () {
	tinymce.create('tinymce.plugins.Kaltura', {
		/**
		 * Initializes the plugin, this will be executed after the plugin has been created.
		 * This call is done before the editor instance has finished it's initialization so use the onInit event
		 * of the editor instance to intercept that event.
		 *
		 * @param {tinymce.Editor} ed Editor instance that the plugin is initialized in.
		 * @param {string} url Absolute URL to where the plugin is located.
		 */
		init: function (ed, url) {
			this._url = url;

			ed.onInit.add(function () {
				ed.dom.loadCSS(url + "/css/tinymce.css");
			});

			var onBeforeSetContentDelegate = Kaltura.Delegate.create(this, this._onBeforeSetContent);
			ed.onBeforeSetContent.add(onBeforeSetContentDelegate);

			var onGetContentDelegate = Kaltura.Delegate.create(this, this._onGetContent);
			ed.onGetContent.add(onGetContentDelegate);
		},

		/**
		 * Creates control instances based in the incomming name. This method is normally not
		 * needed since the addButton method of the tinymce.Editor class is a more easy way of adding buttons
		 * but you sometimes need to create more complex controls like listboxes, split buttons etc then this
		 * method can be used to create those.
		 *
		 * @param {String} n Name of the control to create.
		 * @param {tinymce.ControlManager} cm Control manager to use inorder to create new control.
		 * @return {tinymce.ui.Control} New control instance or null if no control was created.
		 */
		createControl: function (n, cm) {
			return null;
		},

		/**
		 * Returns information about the plugin as a name/value array.
		 * The current keys are longname, author, authorurl, infourl and version.
		 *
		 * @return {Object} Name/value array containing information about the plugin.
		 */
		getInfo: function () {
			return {
				longname : 'All in One Video Pack',
				author   : 'Kaltura',
				authorurl: 'http://www.kaltura.com',
				infourl  : 'http://corp.kaltura.com',
				version  : "1.0"
			};
		},

		_tagStart: '[kaltura-widget',

		_tagEnd: ['/]', ']'],

		_onBeforeSetContent: function (ed, obj) {
			if (!obj.content)
				return;

			var contentData = obj.content;
			var startPos = 0;

			while ((startPos = contentData.indexOf(this._tagStart, startPos)) != -1) {
				var endPos = null;
				var endTagLength = 0;
				for(var i = 0; i < this._tagEnd.length; i++) {
					endPos = contentData.indexOf(this._tagEnd[i], startPos);
					if (endPos != -1) {
						endTagLength = this._tagEnd[i].length;
						break;
					}
				}
				if (endPos == -1) {
					startPos++;
					continue;
				}
				var attribs = this._parseAttributes(contentData.substring(startPos + this._tagStart.length, endPos));

				// set defaults if not found
				if (!attribs['wid'])
					attribs['wid'] = '';


				if (!attribs['size'])
					attribs['size'] = 'custom';

				if (!attribs['align'])
					attribs['align'] = '';

				if (!attribs['width'] || !attribs['height']) {
					attribs['width'] = '410';
					attribs['height'] = '364';
				}

				// for backward compatibility, when we used specific size
				if (attribs['size'] == 'large') {
					attribs['width'] = '410';
					attribs['height'] = '364';
				}

				if (attribs['size'] == 'small') {
					attribs['width'] = '250';
					attribs['height'] = '244';
				}

				if (attribs['width'] == '410' && attribs['height'] == '364')
					attribs['size'] = 'large';

				if (attribs['width'] == '250' && attribs['height'] == '244')
					attribs['size'] = 'small';

				endPos += endTagLength;
				var contentDataEnd = contentData.substr(endPos);
				contentData = contentData.substr(0, startPos);

				// build the image tag
				var img = jQuery('<img />');
				img.attr('src', this._url + '/../thumbnails/placeholder.gif');
				img.attr('title', 'Kaltura');
				img.attr('alt', 'Kaltura');
				img.addClass('kaltura_item align' + attribs['align']);
				if (attribs['wid'])
					img.addClass('kaltura_id_' + attribs['wid']);
				if (attribs['uiconfid'])
					img.addClass('kaltura_uiconfid_' + attribs['uiconfid']);
				if (attribs['entryid'])
					img.addClass('kaltura_entryid_' + attribs['entryid']);
				if (attribs['responsive'])
					img.addClass('kaltura_responsive_' + attribs['responsive']);

				img.attr('name', 'mce_plugin_kaltura_desc');
				img.attr('width', attribs['width']);
				img.attr('height', attribs['height']);

				if (attribs['style'])
					img.attr('style', attribs['style']);

				contentData += img[0].outerHTML;

				contentData += contentDataEnd;
			}

			obj.content = contentData;
		},

		_onGetContent: function (ed, obj) {
			if (!obj.content)
				return;

			var contentData = obj.content;
			var $content = jQuery('<div />').append(contentData);
			var tagStart = this._tagStart;
			var tagEnd = this._tagEnd[0];
			$content.find('img.kaltura_item').each(function (i, item) {
				var $item = jQuery(item);
				var widgetAttribs = {};
				var classes = item.className.split(/\s+/);
				jQuery.each(classes, function (i, value) {
					switch (value)
					{
						case 'alignright':
							widgetAttribs.align = 'right';
							break;
						case 'alignleft':
							widgetAttribs.align = 'left';
							break;
						case 'aligncenter':
							widgetAttribs.align = 'center';
							break;
						default:
							var classAttrArr = value.match(/kaltura_([a-zA-Z]*)_([\w]*)/);
							if (classAttrArr && classAttrArr.length == 3) {
								var classAttrib = classAttrArr[1];
								var classValue = classAttrArr[2];
								switch(classAttrib) {
									case 'id':
										if (classValue)
											widgetAttribs.wid = classValue;
										break;
									case 'uiconfid':
										if (classValue)
											widgetAttribs.uiconfid = classValue;
										break;
									case 'entryid':
										if (classValue)
											widgetAttribs.entryid = classValue;
										break;
									case 'responsive':
										if (classValue)
											widgetAttribs.responsive = classValue;
										break;
								}
							}
							break;
					}
				});

				widgetAttribs.width = $item.attr('width');
				widgetAttribs.height = $item.attr('height');

				if ($item.attr('style'))
					widgetAttribs.style = $item.attr('style');

				var widgetStr = tagStart;
				jQuery.each(widgetAttribs, function(propName, propValue) {
					widgetStr += (' ' + propName + '="' + propValue + '"');
				});
				widgetStr += (' ' + tagEnd);
				$item.replaceWith(widgetStr)
			});

			obj.content = $content.html();
		},

		_parseAttributes: function (attribute_string) {
			var attributeName = '';
			var attributeValue = '';
			var withInName;
			var withInValue;
			var attributes = new Array();
			var whiteSpaceRegExp = new RegExp('^[ \n\r\t]+', 'g');

			if (attribute_string == null || attribute_string.length < 2)
				return null;

			withInName = withInValue = false;

			for (var i = 0; i < attribute_string.length; i++) {
				var chr = attribute_string.charAt(i);

				if ((chr == '"' || chr == "'") && !withInValue)
					withInValue = true;
				else if ((chr == '"' || chr == "'") && withInValue) {
					withInValue = false;

					var pos = attributeName.lastIndexOf(' ');
					if (pos != -1)
						attributeName = attributeName.substring(pos + 1);

					attributes[attributeName.toLowerCase()] = attributeValue.substring(1);

					attributeName = '';
					attributeValue = '';
				} else if (!whiteSpaceRegExp.test(chr) && !withInName && !withInValue)
					withInName = true;

				if (chr == '=' && withInName)
					withInName = false;

				if (withInName)
					attributeName += chr;

				if (withInValue)
					attributeValue += chr;
			}
			return attributes;
		}
	});

	// Register plugin
	tinymce.PluginManager.add('kaltura', tinymce.plugins.Kaltura);
})();