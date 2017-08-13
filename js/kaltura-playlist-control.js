(function ($) {
    $.kalturaPlaylistControl = function (opts) {
        var self = this;
        // options
        var defaultOptions = {
            url       : null,
            currentPlaylistId : null,
            playlistBoxselector: 'playlist-item-box',
            noResultsText: 'No results found',
            thumbWidth: 160,
            thumbHeight: 90
        };
        var currentElementObj = null;
        var currentPlaylistId = null;
        var currentItemBox = null;

        var options = $.extend({}, defaultOptions, opts);

        var _bindClick = function () {
            $('#kaltura-browse').on('click', 'li', function(){
                _getCurrentPlaylist(this);
            })
        };
        var _bindSelectPlaylist = function () {
            $(document.body).on('click', '#select-playlist', function (event) {
                var activePlaylist = $('.playlist-view li.active');
                var url = activePlaylist.data('url');
                var countOfMedia = jQuery('.playlist-item-box').find('.playlist-item').length;
                if (countOfMedia > 0){
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
                    var item = $('<div>', {class: "playlist-item"});
                    item.appendTo(currentItemBox);
                    var mediaBox = $('<div>', {class: "media-box"}).appendTo(item);
                    $('<img />', {
                        class: 'media-thumb',
                        src: value.thumbnailUrl + _getThumbResize()
                    }).appendTo(mediaBox);
                    var detailsBox = $('<div>', {class: "details-box"}).appendTo(item);
                    $('<div>', {class: "media-name", text: value.name}).appendTo(detailsBox);
                    $('<div>', {class: "media-description", text: value.description}).appendTo(detailsBox);
                });
            } else {
                $('<div>', {class: "no-results", text: options.noResultsText}).appendTo(currentItemBox);
            }
            _hideLoader();
        };

        var _getThumbResize = function() {
            return '/width/' + options.thumbWidth + '/height/' + options.thumbHeight + '/type/3';
        };

        var _showLoader = function () {
            jQuery('.playlist-loader').show();
        };

        var _hideLoader = function () {
            jQuery('.playlist-loader').hide();
        };

        this.initialize = function () {
            _bindSelectPlaylist();
            _bindClick();
            _getCurrentPlaylist();

            return self;
        };

        return this.initialize();
    }
})(jQuery);
