// when wordpress is showing all the tabs, we want to hide our browse tab
jQuery(function(){
	if (jQuery('#media-upload-header li').size() > 2)
		jQuery('#media-upload-header li#tab-kaltura_browse').remove();
});