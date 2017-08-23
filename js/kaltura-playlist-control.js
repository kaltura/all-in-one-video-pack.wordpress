(function ($) {
    $.kalturaPlaylistControl = function (opts) {
        var self = this;
        // options
        var defaultOptions = {
            url       : null,
            playlistUrl: null,
            sendToEditorUrl: null,
            currentPlaylistId : null,
            playlistBoxselector: 'playlist-item-box',
            noResultsText: 'No results found',
            thumbWidth: 320,
            thumbHeight: 180
        };
        var currentElementObj = null;
        var currentPlaylistId = null;
        var currentItemBox = null;
        var playlistContainer = jQuery(".kaltura-nano-playlist-content");
        var playlistBox = jQuery(".kaltura-nano-playlist");
        var options = $.extend({}, defaultOptions, opts);

        var _bindClick = function () {
            $('#kaltura-browse').on('click', 'li', function(){
                _getCurrentPlaylist(this);
            })
        };
        var _bindSelectPlaylist = function () {
            $(document.body).on('click', '#select-playlist', function (event) {
                var url = getSendUrl();
                var countOfMedia = jQuery('.playlist-item-box').find('.playlist-item').length;
                if (countOfMedia > 0) {
                    window.location = url;
                }
            });
        };

        var _getCurrentPlaylist = function (element) {
            var currentElement = typeof element !== 'undefined' ?  element : null;
            var playlistItems = jQuery('#kaltura-browse');
            var activePlaylist = null;
            if (currentElement === null){
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

            _fetchPlaylistItems();
        };

        var _onPlayersLoadedError = function () {
            _hideLoader();
        };

        var _fetchPlaylistItems = function () {
            currentItemBox.empty();
            _showLoader();
            var id = currentPlaylistId;
            var input = {
                entryId: id
            };
            jQuery.ajax({
                url     : options.url,
                cache   : false,
                success : _browsePlaylistItems,
                error   : _onPlayersLoadedError,
                data    : input,
                dataType: 'json'
            });
        };
        var _browsePlaylistItems = function (data) {
            if(data.length > 0) {
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
                    $('<div>', {class: "media-description", text: value.description}).appendTo(detailsBox);
                });
            } else {
                $('#select-playlist').addClass('disabled');
                $('<div>', {class: "no-results", text: options.noResultsText}).appendTo(currentItemBox);
            }
            _hideLoader();
        };

        var _getThumbResize = function() {
            return '/width/' + options.thumbWidth + '/height/' + options.thumbHeight + '/type/3';
        };

        var _showLoader = function () {
            jQuery('.playlist-items-loader').show();
        };

        var _hideLoader = function () {
            jQuery('.playlist-items-loader').hide();
        };

        var _addLoader = function() {
            var item = $('<li>', {class: "playlist-loading"});
            var loader = $('<div>', {class: "kaltura-loader"});
            loader.appendTo(item);
            item.appendTo(playlistContainer);
        };

        var _removeLoader = function() {
            playlistContainer.find('.playlist-loading').remove();
        };

        var _playlistInit = function () {
            playlistBox.nanoScroller({ contentClass: 'kaltura-nano-playlist-content' });

        };
        var _playlistBindScroll = function () {
            playlistBox.bind("scrollend", function (e) {
                var page = playlistBox.data('page');
                var pageSize = playlistBox.data('page-size');
                var loading = playlistBox.data('loading');
                if (loading == false) {
                    var newPage = ++page;
                    _fetchPlaylists(newPage, pageSize);
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
                error: _onPlayersLoadedError,
                data: input,
                dataType: 'json'
            });

        };

        var _browsePlaylists = function (data) {
            if(data.items.length > 0) {
                $.each(data.items, function (key, value) {
                    var item = $('<li>', {'data-playlist-id': value.id});
                    item.appendTo(playlistContainer);
                    var playlistWrapper = $('<div>', {class: "playlists-wrap"}).appendTo(item);
                    $('<div>', {class: "playlist-title", text: value.name, id: 'entryId_' + value.id, 'data-playlist' : value.id}).appendTo(playlistWrapper);

                    playlistBox.data('loading', false);
                    playlistBox.data('page', data.page);
                    _playlistInit();
                });
            } else {
                playlistBox.data('loading', true);
            }
            _removeLoader();
        };

        var getSendUrl = function () {
            var playlistIds = {
                entryIds: [currentPlaylistId]
            };
            return options.sendToEditorUrl + '&' + $.param(playlistIds)
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
