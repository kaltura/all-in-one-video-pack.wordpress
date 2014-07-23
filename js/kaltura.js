/*
 * Opens modal box with iframe 
 */
KalturaModal = {
	currentModalId: null,

	openModal: function (id, url, options) {
		var width = options.width;
		var height = options.height;


		var jqBody = jQuery("body");

		// create overlay div
		var jqOverlay = jQuery("<div>");
		jqOverlay.attr("id", "kalturaOverlay");
		jqBody.append(jqOverlay);

		// create modalbox div
		var jqModalbox = jQuery("<div>");
		jqModalbox.attr("id", id);
		jqModalbox.attr("class", "kalturaModal");
		jqModalbox.css("display", "block");
		jqModalbox.css("margin-top", "-" + (height / 2) + "px");
		jqModalbox.css("margin-left", "-" + (width / 2) + "px");
		jqModalbox.css("width", width + "px");

		// create content div inside objModalbox
		var jqModalboxContent = jQuery("<div>");
		jqModalboxContent.append('<iframe scrolling="no" width="' + width + '" height="' + height + '" frameborder="0" src="' + url + '"/>');
		jqModalbox.append(jqModalboxContent);

		jqBody.append(jqModalbox);

		this.currentModalId = id;
	},

	closeModal: function () {
		jqOverlay = jQuery("#kalturaOverlay");
		jqOverlay.remove();
		jqModalbox = jQuery("#" + this.currentModalId);
		jqModalbox.remove();

		this.currentModalId = null;
	}
}

Kaltura = {
	Delegate: {
		create: function (/*Object*/ scope, /*Function*/ method) {
			var f = function () {
				return method.apply(scope, arguments);
			}
			return f;
		}
	},

	animateModalSize: function (width, height, callback) {
		if (!callback)
			var callback = function () {
			};

		// if its not found, just run the callback
		if (jQuery("#TB_window").size() == 0) {
			callback();
			return;
		}

		this.originalWidth = Number(jQuery("#TB_window").css("width").replace("px", ""));
		this.originalHeight = Number(jQuery("#TB_iframeContent").css("height").replace("px", "")); // take the height of the iframe, because we ignore the height of the dark gray header (it's outside of the iframe)

		// no need to animate if dimensions are the same
		if ((width == this.originalWidth) && (height == this.originalHeight)) {
			callback();
			return
		}

		jQuery("#TB_window").animate(
			{
				width     : width + "px",
				marginTop : "-" + ((height + 27) / 2) + "px",
				marginLeft: "-" + (width / 2) + "px"
			},
			600
		);

		jQuery("#TB_iframeContent").animate(
			{
				width : width + "px",
				height: (height + 27) + "px"
			},
			600,
			null,
			callback
		);
	},

	restoreModalSize: function (callback) {

		// the original modal dimensions
		//var origWidth = 669;
		//var origHeight = 512;

		Kaltura.animateModalSize(
			this.originalWidth,
			this.originalHeight,
			function () {
				Kaltura.restoreModalBoxWp26();
				callback();
			}
		);
	},

	getTopWindow: function () {
		return (window.opener) ? window.opener : (window.parent) ? window.parent : window.top;
	},

	hackSimpleEditorModal: function () {
		var topWindow = Kaltura.getTopWindow();

		// hide the header
		topWindow.jQuery("#TB_title").hide();

		// restore top border
		topWindow.jQuery("#TB_iframeContent").css("margin-top", "0px");
	},

	restoreSimpleEditorHack: function () {
		var topWindow = Kaltura.getTopWindow();

		// restore the header
		topWindow.jQuery("#TB_title").show();

		// this will remove 1px of top border
		topWindow.jQuery("#TB_iframeContent").css("margin-top", null);
	},

	hackModalBoxWp26: function () {
		// IMPORTANT: this code must run from the top window and not from the thickbox iframe
		if (!Kaltura.compareWPVersion("2.6", ">="))
			return;

		// don't run twice
		if (typeof(tb_positionKalturaBackup) == "function")
			return;

		// run tb_position to set the default thick box dimensions
		tb_position();

		var height = jQuery("#TB_window").css("height");
		height = height.replace("px", "");
		height = Number(height);
		if (isNaN(height))
			height = 0;

		jQuery("#TB_window").css("top", '');
		jQuery("#TB_window").css("margin-top", "-" + (height / 2) + "px");
		jQuery("#TB_window").css("height", '');
		jQuery("#TB_window").css("width", '900');
		jQuery("#TB_window").show(); // fixes compatibility with wordpress 3.1+, see: http://www.kaltura.org/pop-video-embed-dashboard-broken

		// backup and temporary remove the tb_position function
		tb_positionKalturaBackup = tb_position;
		tb_position = function () {
		};

		// init interval to restore tb_position function when the thickbox is closed
		Kaltura.modalBoxWp26Interval = setInterval(Kaltura.modalBoxWp26IntervalFunction, 100);
	},

	modalBoxWp26IntervalFunction: function () {
		// if thickbox was closed
		if (jQuery("#TB_window").css("display") != "block") {
			Kaltura.restoreModalBoxWp26();
		}
	},

	restoreModalBoxWp26: function () {
		if (!Kaltura.compareWPVersion("2.6", ">="))
			return;

		// clear the interval
		clearInterval(Kaltura.modalBoxWp26Interval);

		// restore the position of the thickbox
		tb_position = tb_positionKalturaBackup;
		tb_positionKalturaBackup = null;
		tb_position();
	},

	activatePlayer: function (thumbnailDivId, playerDivId) {
		jQuery('#' + playerDivId).show();
		jQuery('#' + thumbnailDivId).hide();
	},

	openCommentCW: function (baseUrl) {
		var postId = jQuery('[name=comment_post_ID]').val();
		var author = jQuery('#author').val();
		var email = jQuery('#email').val();

		KalturaModal.openModal('contribution_wizard', baseUrl + '&kaction=addcomment&postid=' + postId + '&author=' + author + '&email=' + email, { width: 900, height: 360 });
		jQuery("#contribution_wizard").addClass("modalContributionWizard");
	},

	doErrorFromComments: function (errorMsg) {
		KalturaModal.closeModal();
		alert(errorMsg);
	},

	isMacFF: function () {
		var userAgent = navigator.userAgent.toLowerCase();
		if (userAgent.indexOf('mac') != -1 && userAgent.indexOf('firefox') != -1) {
			return true;
		}
		return false;
	},

	hideTinyMCEToolbar: function () {
		var topWindow = Kaltura.getTopWindow();
		topWindow.jQuery("#content_tbl tr.mceFirst").hide();
	},

	showTinyMCEToolbar: function () {
		var topWindow = Kaltura.getTopWindow();
		topWindow.jQuery("#content_tbl tr.mceFirst").show();
	},

	compareWPVersion: function (compareVersion, operator) {
		// split to arrays
		var compareVersionArray = compareVersion.split(".");

		// remove all character except for "0-9" and "." (and hope that we won't have to add special support for beta and rc versions)
		var wpVersion = Kaltura_WPVersion.replace(/[^0-9.]/g, "");
		var wordpressVersionArray = wpVersion.split(".");


		var maxLen = 0;

		if (compareVersionArray.length > wordpressVersionArray.length)
			maxLen = compareVersionArray.length;
		else
			maxLen = wordpressVersionArray.length;

		// we add to every part of the version trailing zeros
		// so [1,6] and [12,4] would be [10,6] and [12,4], then we will join each array and compare it as 2 numbers
		for (var i = 0; i < maxLen; i++) {
			var v1 = "0";
			var v2 = "0";

			if (wordpressVersionArray[i])
				v1 = wordpressVersionArray[i];

			if (compareVersionArray[i])
				v2 = compareVersionArray[i];

			if (v1.length > v2.length) {
				for (var j = 0; j < v1.length - v2.length; j++) {
					v2 += (v2 + "0");
				}
			}

			if (v1.length < v2.length) {
				for (var j = 0; j < v2.length - v1.length; j++) {
					v1 += (v1 + "0");
				}
			}

			wordpressVersionArray[i] = v1;
			compareVersionArray[i] = v2;
		}

		// now we convert the array back to number
		var v1compare = Number(wordpressVersionArray.join(""));
		var v2compare = Number(compareVersionArray.join(""));


		// and we can just compare 2 number
		switch (operator) {
			case ">":
				if (v1compare > v2compare)
					return true;
				break;
			case "<":
				if (v1compare < v2compare)
					return true;
				break;
			case ">=":
				if (v1compare >= v2compare)
					return true;
				break;
			case "<=":
				if (v1compare <= v2compare)
					return true;
				break;
			case "=":
			case "==":
			default:
				if (v1compare == v2compare)
					return true;
				break;
		}

		return false;
	},

	switchSidebarTab: function (sender, type, page) {
		var menu = jQuery("#kaltura-sidebar-menu");
		if (menu.find("a[class=selected]").get(0) == sender)
			return; // so we won't load the selected tab

		menu.find("a").removeClass("selected"); // unselect all
		jQuery(sender).addClass("selected"); // select the current


		jQuery("#kaltura-sidebar-container").empty();
		jQuery("#kaltura-loader").show();

		var url = KalturaSidebarWidget.ajaxurl + "?action=kaltura_widget_ajax&kaction=" + type + "&page=" + page;
		jQuery.get(
			url,
			null,
			function (data, status) {
				jQuery("#kaltura-loader").hide();
				jQuery("#kaltura-sidebar-container").append(data);
			},
			"html"
		);
	},

	unbindOverlayClick: function () {
		jQuery("#TB_overlay").unbind("click");
	},

	bindOverlayClick: function () {
		jQuery("#TB_overlay").bind("click", tb_remove);
	}
}