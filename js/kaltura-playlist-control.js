(function ($) {
    $.kalturaPlaylistControl = function (opts) {
        var self = this;
        // options
        var defaultOptions = {
            url       : null,
            currentPlaylistId : null,
            playlistBoxselector: 'playlist-item-box',
            noResultsText: 'No results found'
        };

        var currentPlaylist = {
            element : null,
            itemsBox: null
        };
        var options = $.extend({}, defaultOptions, opts);

        var _bindClick = function () {
            $('#kaltura-browse').on('click', 'li', function(){
                _getCurrentPlaylist(this);
            })
        };
        var _bindSelectPlaylist = function () {
            $(document.body).on('click', '#select-playlist', function (event) {
                var activePlaylist = $('.playlist-view li.active');
                var playlistInfoElement = activePlaylist.find('.playlist-info');
                var url = playlistInfoElement.data('url');
                window.location = url;
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

            var playlistId = activePlaylist.find('.playlist-info').val();
            var itemsBox = jQuery(".playlist-item-box");
            var playlist = {
                element : activePlaylist,
                playlistId: playlistId,
                itemsBox:itemsBox
            }
            currentPlaylist = playlist;
            _fetchPlaylistItems();
        }

        var _onPlayersLoadedError = function () {
            _hideLoader();
        };

        var _fetchPlaylistItems = function () {
            currentPlaylist.itemsBox.empty();
            _showLoader();
            id = currentPlaylist.playlistId;
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
                    var item = $('<div>', {class: "playlist-item"});
                    item.appendTo(currentPlaylist.itemsBox);
                    var mediaBox = $('<div>', {class: "media-box"}).appendTo(item);
                    $('<img />', {
                        class: 'media-thumb',
                        src: value.thumbnailUrl
                    }).appendTo(mediaBox);
                    var detailsBox = $('<div>', {class: "details-box"}).appendTo(item);
                    $('<div>', {class: "media-name", text: value.name}).appendTo(detailsBox);
                    $('<div>', {class: "media-description", text: value.description}).appendTo(detailsBox);
                });
            } else {
                $('<div>', {class: "no-results", text: options.noResultsText}).appendTo(currentPlaylist.itemsBox);
            }
            _hideLoader();
        };

        var _showLoader = function () {
            jQuery('.kaltura-loader').show();
        };

        var _hideLoader = function () {
            jQuery('.kaltura-loader').hide();
        };

        this.intialize = function () {
            _bindSelectPlaylist();
            _bindClick();
            _getCurrentPlaylist();

            return self;
        };

        return this.intialize();
    }
})(jQuery);