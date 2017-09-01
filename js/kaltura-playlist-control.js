(function ($) {
    $.kalturaPlaylistControl = function (opts) {
        var self = this;
        // options
        var defaultOptions = {
            url: null,
            playlistUrl: null,
            sendToEditorUrl: null,
            currentPlaylistId: null,
            playlistBoxselector: 'playlist-item-box',
            noResultsText: 'No results found',
            thumbWidth: 320,
            thumbHeight: 180
        };
        var currentElementObj = null;
        var currentPlaylistId = null;
        var currentItemBox = null;
        var playlistBox = jQuery(".kaltura-playlist");
        var playlistItemBox = jQuery('.playlist-item-box');
        var options = $.extend({}, defaultOptions, opts);
        var errorBox = jQuery('.playlist-errors-box');
        var currentXHR = null;

        var _bindClick = function () {
            $('#kaltura-browse').on('click', 'li', function () {
                if (currentXHR) {
                    currentXHR.abort();
                }
                currentItemBox.empty();
                _getCurrentPlaylist(this);
            })
        };
        var _bindSelectPlaylist = function () {
            $(document.body).on('click', '#select-playlist', function () {
                var url = getSendUrl();
                var countOfMedia = playlistItemBox.find('.playlist-item').length;
                if (countOfMedia > 0) {
                    window.location = url;
                }
            });
        };

        var _getCurrentPlaylist = function (element) {
            var currentElement = typeof element !== 'undefined' ? element : null;
            var playlistItems = jQuery('#kaltura-browse');
            var activePlaylist = null;
            if (currentElement === null) {
                activePlaylist = playlistItems.find('li.active');
            } else {
                playlistItems.find('li.active').removeClass('active');
                activePlaylist = jQuery(currentElement);
                activePlaylist.addClass('active');
            }

            var playlistId = activePlaylist.data('playlist-id');
            var itemsBox = jQuery(".playlist-item-box");
            currentElementObj = activePlaylist;
            currentPlaylistId = playlistId;
            currentItemBox = itemsBox;
            if (playlistId !== undefined) {
                _fetchPlaylistItems();
            }
        };

        var _onPlaylistItemsLoadedError = function () {
            _hideLoader();
            if(currentXHR.status === 0) {
                return;
            }
            _showError("An error occurred while loading this playlist. Please try again.");
        };

        var _fetchPlaylistItems = function () {
            _showLoader();
            var id = currentPlaylistId;
            var input = {
                entryId: id
            };
            currentXHR = jQuery.ajax({
                url     : options.url,
                cache   : false,
                success : _browsePlaylistItems,
                error   : _onPlaylistItemsLoadedError,
                data    : input,
                dataType: 'json'
            });
        };
        var _browsePlaylistItems = function (data) {
            _hideError();
            if (data.length > 0) {
                $.each(data, function (key, value) {
                    $('#select-playlist').removeClass('disabled');
                    var item = $('<div>', {class: "playlist-item"});
                    item.appendTo(currentItemBox);
                    var mediaBox = $('<div>', {class: "media-box"}).appendTo(item);
                    var mediaSeparator = $('<div>', {class: "media-separator"}).appendTo(mediaBox);
                    $('<img />', {
                        class: 'media-thumb',
                        src: value.thumbnailUrl + _getThumbResize()
                    }).appendTo(mediaBox);
                    var detailsBox = $('<div>', {class: "details-box"}).appendTo(item);
                    $('<div>', {class: "media-name", text: value.name}).appendTo(detailsBox);
                    if (value.description !== null){
                        $('<div>', {class: "media-description", text: value.description}).appendTo(detailsBox);
                    }
                });
                _updateScrollableBox(playlistItemBox);
            } else {
                $('#select-playlist').addClass('disabled');
                $('<div>', {class: "no-results", text: options.noResultsText}).appendTo(currentItemBox);
            }
            _hideLoader();
        };

         var _getThumbResize = function () {
            return '/width/' + options.thumbWidth + '/height/' + options.thumbHeight + '/type/3';
        };

        var _showLoader = function () {
            jQuery('.playlist-items-loader').show();
        };

        var _hideLoader = function () {
            jQuery('.playlist-items-loader').hide();
        };

        var _addLoader = function () {
            jQuery('.playlist-loading').show();
        };

        var _removeLoader = function () {
            jQuery('.playlist-loading').hide();
        };

        var _playlistInit = function () {
            playlistBox.perfectScrollbar();
        };
        var _playlistBindScroll = function () {
            playlistBox.on('ps-y-reach-end', function () {
                var page = playlistBox.data('page');
                var pageSize = playlistBox.data('page-size');
                var totalCount = playlistBox.data('total-count');
                var loading = playlistBox.data('loading');
                if (loading === false) {
                    if (totalCount > page * pageSize) {
                        var newPage = ++page;
                        _fetchPlaylists(newPage, pageSize);
                    }

                }
            });
        };

        var _fetchPlaylists = function (page, pageSize) {
            playlistBox.data('loading', true);
            _addLoader();
            var searchWord = $('input[name=search]').val();
            var input = {
                page: page,
                pageSize: pageSize,
                search: searchWord
            };
            jQuery.ajax({
                url: options.playlistUrl,
                cache: false,
                success: _browsePlaylists,
                error: _onPlaylistLoadedError,
                data: input,
                dataType: 'json'
            });

        };

        var _onPlaylistLoadedError = function () {
            _removeLoader();
            _showError("An error occurred while loading your playlists. Please try again.");
            playlistBox.data('loading', true);
            setTimeout(function () {
                playlistBox.data('loading', false);
            }, 1000);


        };

        var _browsePlaylists = function (data) {
            _hideError();
            if (data.items.length > 0) {
                $.each(data.items, function (key, value) {
                    var item = $('<li>', {'data-playlist-id': value.id});
                    item.appendTo(playlistBox);
                    var playlistWrapper = $('<div>', {class: "playlists-wrap"}).appendTo(item);
                    $('<div>', {
                        class: "playlist-title",
                        text: value.name,
                        id: 'entryId_' + value.id,
                        'data-playlist': value.id
                    }).appendTo(playlistWrapper);

                    playlistBox.data('loading', false);
                    playlistBox.data('page', data.page);
                    playlistBox.data('total-count', data.totalCount);
                });
                _updateScrollableBox(playlistBox);
            } else {
                playlistBox.data('loading', true);
            }
            _removeLoader();
        };

        var _updateScrollableBox = function (selector) {
            selector.perfectScrollbar('destroy');
            selector.perfectScrollbar();
        };

        var getSendUrl = function () {
            var playlistIds = {
                entryIds: [currentPlaylistId]
            };
            return options.sendToEditorUrl + '&' + $.param(playlistIds)
        };

        var _showError = function (message) {
            errorBox.html(message);
            errorBox.show();
        };

        var _hideError = function () {
            _removeLoader();
            _hideLoader();
            errorBox.hide();
        };

        this.initialize = function () {
            _playlistInit();
            _playlistBindScroll();
            _bindSelectPlaylist();
            _bindClick();
            _getCurrentPlaylist();

            return self;
        };

        return this.initialize();
    }
})(jQuery);
