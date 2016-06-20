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
			id        : 'kplayer'
		};
		var options = $.extend({}, defaultOptions, opts);

		var _players = [];
		var _$playersList = jQuery(options.playersList);
		var _$hoveringControlsInputElement = jQuery('<input type="hidden" name="hoveringControls">');
		jQuery('form.kaltura-form').append(_$hoveringControlsInputElement);

		var _getPlayer = function(uiConfId) {
			var result = null;
			_players.forEach(function(player) {
				if(player.id == uiConfId) {
					result = player;
				}
			});
			return result;
		};

		var _showLoader = function () {
			jQuery('.kaltura-loader').show();
		};

		var _hideLoader = function () {
			jQuery('.kaltura-loader').hide();
		};

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
		};

		var _onPlayersLoadedError = function () {
			_$playersList.empty();
			_$playersList.append('<option>Error loading players</option>');
			_hideLoader();
		};

		var _onPlayerChange = function (args) {
			var uiConfId = _$playersList.val();
			var player = _getPlayer(uiConfId);
			var html5Url = options.html5Url;
			html5Url += ('/uiconf_id/' + uiConfId);
			if (options.entryId)
				html5Url += ('/entry_id/' + options.entryId);

			html5Url += '?iframeembed=true';
			var iframe = jQuery('<iframe>');
			iframe.attr("width", "100%");
			iframe.attr("height", "100%");
			iframe.attr("frameborder", "0");
			iframe.attr("src", html5Url);
			
			$('#' + options.previewId).empty().append(iframe);

			var playerHasHoveringControls = _checkHoveringControls(player);
			
			_$hoveringControlsInputElement.attr('value', playerHasHoveringControls);
		};

		var _checkHoveringControls = function (player) {
			parsedPlayerConfig = JSON.parse(player.config);
			return parsedPlayerConfig.plugins.controlBarContainer.hover === true;
		};

		var _disableSubmit = function () {
			jQuery(options.submit).attr('disabled', true);
		};

		var _enableSubmit = function () {
			jQuery(options.submit).removeAttr('disabled');
		};

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