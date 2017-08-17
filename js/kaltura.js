Kaltura = {
	Delegate: {
		create: function (/*Object*/ scope, /*Function*/ method) {
			var f = function () {
				return method.apply(scope, arguments);
			};
			return f;
		}
	},

	getTopWindow: function () {
		return (window.opener) ? window.opener : (window.parent) ? window.parent : window.top;
	},

	activatePlayer: function (thumbnailDivId, playerDivId) {
		jQuery('#' + playerDivId).show();
		jQuery('#' + thumbnailDivId).hide();
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
	}
};
