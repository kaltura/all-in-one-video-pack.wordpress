<script type="text/javascript">
	jQuery("#media-upload-header a").each(function (i, obj) {
		var href = obj.href;
		var newUrl = href.substring(0, href.indexOf("?") + 1);
		var query = href.substring(href.indexOf("?") + 1);
		var queryArray = query.split("&");
		
		for (var prop in queryArray)
		{
			var keyVal = queryArray[prop];
			var key = keyVal.split("=")[0];
			var value = keyVal.split("=")[1]; 
			if (key != "kaction" && key != "kshowid" && key != "firstedit")
			{
				newUrl += (key + "=" + value + "&");
			}
		}
		
		if (newUrl[newUrl.length - 1] == "&")
			newUrl = newUrl.substring(0, newUrl.length - 1);
			
		obj.href = newUrl;
	});
	
	<?php if (@$viewData["jsCode"]):?> 
		<?php echo $viewData["jsCode"] ?>
	<?php endif; ?>
</script>