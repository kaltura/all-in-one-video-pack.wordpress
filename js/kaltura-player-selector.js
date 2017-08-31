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
			flashVars : ''
		};

		var intervalId = null;
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
			if (data.length > 0) {
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
			} else {
				_$playersList.empty();
				var option = jQuery('<option>');
				option.text('Players not found');
				_$playersList.append(option);
				$('.players-missing').show();
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

			if ( !( options.entryConverting || options.entryError ) ) {
				_embedPreviewPlayer();
			}
			else {
				jQuery( '.kaltura-responsive-player-wrapper' ).hide();
				if ( options.entryConverting ) {
					jQuery( '.entry-converting' ).show();
					_checkEntryStatus();
					intervalId = setInterval( _checkEntryStatus, 10 * 1000 );
				}
				else if ( options.entryError ) {
					jQuery( '.entry-error' ).show();
				}
			}

			var playerHasHoveringControls = _checkHoveringControls(player);

			_$hoveringControlsInputElement.attr('value', playerHasHoveringControls);
		};

		var _embedPreviewPlayer = function() {
			var html5Url = _getIframeEmbedUrl();
			var iframe = _getIframeMarkup( html5Url );
			jQuery( '#' + options.previewId ).empty().append( iframe );
		};

		var _getIframeMarkup = function( src ) {
			return jQuery( '<iframe>' )
				.attr( 'width', '100%' )
				.attr( 'height', '100%' )
				.attr( 'frameborder', '0' )
				.attr( 'src', src );
		};

		var _getIframeEmbedUrl = function() {
			var url = options.html5Url + '/uiconf_id/' + _$playersList.val() + '/entry_id/' + options.entryId + '?iframeembed=true';
			var params = _convertFlashParams(options.flashVars);
			url = url + '&' + $.param(params);

			return url;
		};
		var _convertFlashParams = function (params) {
			var result = {
				flashvars: {}
			};
			$.each(params, function (key, value) {
				if (typeof value != "object") {
					result.flashvars[key] = value
				} else {
					var concatedKeys = _concatPlaylistKeys(key, value);
					jQuery.extend(result.flashvars, concatedKeys);
				}
			});
			return result;
		};

		var _concatPlaylistKeys = function (index, objects) {
			var result = {};
			$.each(objects, function (key, value) {
				var title = index + '.' + key;
				result[title] = value;
			});
			return result;
		};

		var _checkEntryStatus = function() {
			jQuery.ajax( {
				url: ajaxurl + '?action=kaltura_ajax&kaction=getentrystatus',
				data: {
					entryId: options.entryId
				}
			} )
				.success( _checkEntryStatusCallback )
				.fail(function() {
					clearInterval(intervalId);
				});
		};

		var _checkEntryStatusCallback = function( data ) {
			if ( data == '2' ) {
				// entry is ready, we can embed
				clearTimeout( intervalId );
				jQuery( '.entry-converting' ).hide();
				jQuery( '.kaltura-responsive-player-wrapper' ).show();
				_embedPreviewPlayer();
			}
			else if ( data == '-1' || data == '-2' ) {
				// an error occurred, show error message
				jQuery( '.entry-converting' ).hide();
				jQuery( '.entry-error' ).show();
			}
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