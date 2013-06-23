(function($) {
	$.fn.kalturaEntryStatusChecker = function(opts) {
		var self = this;
		var defaultOptions = { 
			url: null,
			idPrefix: null,
			idSelector: null,
			loader: null,
			interval: 10*1000 // every 10 seconds
		};  
		var options = $.extend({}, defaultOptions, opts);
		
		var _players = [];
		var _$playersList = jQuery(options.playersList);
		
		var _queueCheck = function () {
			if (self.find('li.statusConverting').size() > 0) {
				setTimeout(_checkStatuses, options.interval);
			}
		}
		
		var _checkStatuses = function() {
			if (options.loader)
				options.loader.show();
			
			var entryIds = [];
			self.find('li.statusConverting ' + options.idSelector).each(function(index, element) {
				var entryId = element.id.replace(options.idPrefix, '');
				entryIds.push(entryId);
			});
			
			jQuery.ajax({
				url: options.url,
				data: { 'entryIds[]': entryIds },
				dataType: 'json',
				cache: false,
				success: _checkStatusesSuccess,
				error: _checkStatusesError
			});
		}
		
		var _checkStatusesSuccess = function(data) {
			if (data) {
				jQuery.each(data, function(entryId, status) {
					if (status == 2)
					{
						var $li = self.find('li #' + options.idPrefix + entryId).parent();
						var $img = $li.find('img');
						$img.show();
						$img.attr('src', $img.attr('src') + "?" + new Date().getTime());
						$li.attr('class', 'statusReady');
					}
					else if(status == -1 || status == -2 || status == 3)
					{
						self.find('li #' + options.idPrefix + entryId).parent().attr('class', 'statusError');
					}
				});
			}
			_queueCheck();
			
			if (options.loader)
				options.loader.hide();
		}
		
		var _checkStatusesError = function() {
			_queueCheck();
			
			if (options.loader)
				options.loader.hide();
		}
 
		this.intialize = function() {
			var $li = self.find('li.statusConverting').parent();
			$li.each(function(index, element) {
				jQuery(element).find('img').hide();
			});
			_queueCheck();
			return self;
		};  
 
		return this.intialize();
	}
})(jQuery);