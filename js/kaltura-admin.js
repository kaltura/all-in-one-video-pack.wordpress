(function($){
	function enableWaitCursor() {
		$('body').addClass('wait');
	}

	function disableWaitCursor() {
		$('body').removeClass('wait');
	}

	function deleteEntry(entryId) {
		var res = confirm("Are you sure?");
		if (res) {
			enableWaitCursor();
			var params = {
				action: 'kaltura_ajax',
				kaction: 'delete',
				entryid: entryId
			};
			$.ajax({
				url: ajaxurl,
				data: params,
				success: onDeleteSuccess,
				error: onDeleteError
			});
		}
	}

	function onDeleteSuccess(data) {
		if (data != 'ok')
			return onDeleteError();

		window.location.reload();
	}

	function onDeleteError() {
		disableWaitCursor();
		alert('Failed to delete the entry');
		window.location.reload();
	}

	$(function() {
		if ($('body').hasClass('settings_page_kaltura_options')) {
			$.validator.messages.required = "";
			var validator = $("form.registration").validate({
				rules: {
					first_name: "required",
					last_name: "required",
					email: {
						required: true,
						email: true
					},
					phone: "required",
					company: "required",
					job_title: "required",
					describe_yourself: "required",
					country: "required",
					state: "required",
					would_you_like: "required",
					agree_to_terms: "required"
				},
				messages: {
					agree_to_terms: "You must agree to the Kaltura Terms of Use"
				},
				invalidHandler: function(form, validator) {
					var errors = validator.numberOfInvalids();
					if (errors) {

					} else {

					}
				},
				errorPlacement: function(error, element) {
					if (element.attr('name') == 'agree_to_terms')
						error.appendTo(element.parent());
					//error.appendTo( element.parent("td").next("td") );
				}
			});

			$('select[name=country]').change();

			$('select[name=country]').change(function() {
				var notApplicable = 'Not Applicable';
				if ($(this).val() == 'US') {
					if ($('select[name=state]').val() == notApplicable) {
						$('select[name=state] option:first').attr('value', '');
						$('select[name=state]').val('').closest('tr').show();
					}
				}
				else {
					$('select[name=state] option:first').attr('value', notApplicable);
					$('select[name=state]').val(notApplicable).closest('tr').hide();
				}
			});
		}

		if ($('body').hasClass('media_page_kaltura_library')) {
			$('.delete').click(function() {
				var entryId = $(this).data('id');
				deleteEntry(entryId);
			});
		}
	});
})(jQuery);