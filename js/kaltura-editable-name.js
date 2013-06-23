(function($){
	$.fn.kalturaEditableName = function(opts) {
		// support mutltiple elements
		if (this.length > 1){
			this.each(function() {
				$(this).kalturaEditableName(opts)
			});
			return this;
		}

		// private vars;
		var _currentContent;
		var _$inputBox;
		var _$wait;
		var self = this, $self = jQuery(this);

		// private function;
		var _onNameClick = function(args) {
			jQuery(self).unbind('click');

			_$wait = jQuery('<span>Saving...</span>');
			_$wait.hide();

			_$inputBox = jQuery('<input type="text">');
			_$inputBox.attr('name', options.name);
			_$inputBox.blur(_onInputBlur);
			_$inputBox.keypress(_onInputKeyPress);
			_currentContent = jQuery.trim(jQuery(this).text());
			_$inputBox.val(_currentContent);

			jQuery(self).empty().append(_$inputBox).append(_$wait);
			_$inputBox.focus();
		}

		var _onInputBlur = function(args) {
			_save();
		}

		var _onInputKeyPress = function(args) {
			if (args.keyCode == 13)
				_save();
			if (args.keyCode == 27)
				_finishEditing();
		}

		var _save = function() {
			if (_currentContent != _$inputBox.val()) // if changed
			{
				var params = {};
				params[options.namePostParam] = _$inputBox.val();
				params[options.idPostParam] = self.attr('id').replace(options.idPrefix, '');
				_$inputBox.hide();
				_$wait.show();
				jQuery.ajax({
					url: options.url,
					data: params,
					type: 'POST',
					success: _onSaveHandler,
					error: _onErrorHandler
				});
			}
			else
			{
				_finishEditing();
			}
		}

		var _onSaveHandler = function(data) {
			if (data != 'ok')
				return _onErrorHandler();

			_currentContent = _$inputBox.val();
			_finishEditing();
		}

		function _onErrorHandler() {
			_finishEditing();
		}

		var _finishEditing = function() {
			jQuery(self).click(_onNameClick).empty().append(_currentContent);
		}

		// options
		var defaultOptions = { name: 'name' };
		var options = $.extend({}, defaultOptions, opts);

		this.intialize = function() {
			this.click(_onNameClick);
			return $self;
		};

		return this.intialize();
	}
})(jQuery);