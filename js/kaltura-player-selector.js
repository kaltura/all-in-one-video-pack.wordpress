(function ($) {
	$.kalturaPlayerSelector = function (opts) {
		var self = this;
		// options
		var defaultOptions = {
			url       : null,
			defaultId : null,
			html5Url: null,
			previewId : null,
			entryId   : '_KMCLOGO',
			id        : 'kplayer',
			width     : 240,
			onSelect  : null
		};
		var options = $.extend({}, defaultOptions, opts);

		var _players = [];
		var _$playersList = jQuery(options.playersList);

		var _showLoader = function () {
			jQuery('.kaltura-loader').show();
		}

		var _hideLoader = function () {
			jQuery('.kaltura-loader').hide();
		}

		var _getPlayer = function (uiConfId) {
			for (var i = 0; i < _players.length; i++) {
				if (_players[i].id == uiConfId)
					return _players[i];
			}
			;
		}

		var _onPlayersLoadedSuccess = function (data) {
			_hideLoader();
			if (data) {
				_players = data;
				_$playersList.empty();
				jQuery.each(_players, function (index) {
					var player = _players[index];
					var option = jQuery('<option>');
					option.attr('value', player.id);
					if (player.id == options.defaultId)
						option.attr('selected', true);
					option.text(player.name);
					_$playersList.append(option);
				});
				_$playersList.change(_onPlayerChange);
				_onPlayerChange();
				_enableSubmit();
			}
		}

		var _onPlayersLoadedError = function () {
			_$playersList.empty();
			_$playersList.append('<option>Error loading players</option>');
			_hideLoader();
		}

		var _onPlayerChange = function (args) {
			var uiConfId = _$playersList.val();
			var player = _getPlayer(uiConfId);
			var html5Url = options.html5Url;
			html5Url += ('/uiconf_id/' + uiConfId);
			if (options.entryId)
				html5Url += ('/entry_id/' + options.entryId);

			html5Url += '?iframeembed=true';
			var height = _calculateHeight(player, options.width);
			var iframe = jQuery('<iframe>');
			iframe.attr("width", options.width);
			iframe.attr("height", height);
			iframe.attr("frameborder", "0");
			iframe.attr("src", html5Url);

			$('#' + options.previewId).empty().append(iframe);
			if (typeof(options.onSelect) == "function")
				options.onSelect();
		}

		var _calculateHeight = function (player, width) {
			var ratio = jQuery(options.dimensions).filter(':checked').val();
			ratio = '4:3' // don't preview 16:9, the player doesn't look good in small size
			var spacer = player.height - (player.width / 4) * 3; // assume the width and height saved in kaltura is 4/3
			if (ratio == '16:9')
				var height = (width / 16) * 9 + spacer;
			else
				var height = (width / 4) * 3 + spacer;
			return parseInt(height);
		}

		var _disableSubmit = function () {
			jQuery(options.submit).attr('disabled', true);
		}

		var _enableSubmit = function () {
			jQuery(options.submit).removeAttr('disabled');
		}

		this.intialize = function () {
			_disableSubmit();
			_showLoader();
			_$playersList.append('<option>Loading...</option>');

			//jQuery(options.dimensions).click(_onPlayerChange);
			jQuery.ajax({
				url     : options.url,
				cache   : false,
				success : _onPlayersLoadedSuccess,
				error   : _onPlayersLoadedError,
				dataType: 'json'
			});
			return self;
		};

		return this.intialize();
	}
})(jQuery);