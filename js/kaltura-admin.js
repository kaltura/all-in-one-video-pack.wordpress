(function ($) {
	$(document).ready(function () {
		/** Collapse categories */
		$('.kaltura-caret').on('click', function () {
			var parentDiv = $(this).parent();
			var searchId = this.parentElement.id;
			/** Open siblings*/
			if ($(this).hasClass('kaltura-caret-right')) {
				$(parentDiv).siblings().each(function () {
					var siblingId = this.id;
					var caret = $(this).find('span');
					if (siblingId.indexOf(searchId) != -1) {
						$(this).show();
						if ($(caret).hasClass('kaltura-caret-right')) {
							return false;
						}
					}
				});
				/**Change class name and html.*/
				$(this).addClass('kaltura-caret-down');
				$(this).removeClass('kaltura-caret-right');
				$(this).html('&#9660');
			} else {
				/** Close siblings*/
				$(parentDiv).siblings().each(function () {
					var siblingId = this.id;

					if (siblingId.indexOf(searchId) != -1) {
						$(this).hide();
					}
				});
				/**Change class name and html.*/
				$(this).addClass('kaltura-caret-right');
				$(this).removeClass('kaltura-caret-down');
				$(this).html('&#9658');
			}
		});

		$('#clear-categories').on('click', function () {
			$('#filter-categories .filter-category-input').removeAttr('checked');
			$('#filter-categories-button').click();
		});

		/** Check sub categories checkboxes. */
		$('.filter-category-input').on('click', function () {
			var parentDiv = $(this).parent().closest('li');
			var searchId = this.id;
			var that = this;
			/** If we checked the checkbox then check the other checkboxes. */
			$(parentDiv).siblings().each(function () {
				var inputElement = $(this).find('input');
				var inputElementId = inputElement.attr('id');
				if (inputElementId.indexOf(searchId) != -1) {
					$(inputElement).prop('checked', $(that).prop('checked'));
				}
			});
		});

		$('#filter-media-owner-type').on('change', function () {
			$('#filter-categories-button').click();
		});
	});


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
				action : 'kaltura_ajax',
				kaction: 'delete',
				entryid: entryId
			};
			$.ajax({
				url    : ajaxurl,
				data   : params,
				success: onDeleteSuccess,
				error  : onDeleteError
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

	$(function () {
		if ($('body').hasClass('settings_page_kaltura_options')) {
			$.validator.messages.required = "";
			var validator = $("form.registration").validate({
				rules         : {
					first_name       : "required",
					last_name        : "required",
					email            : {
						required: true,
						email   : true
					},
					phone            : "required",
					company          : "required",
					job_title        : "required",
					describe_yourself: "required",
					country          : "required",
					state            : "required",
					would_you_like   : "required",
					agree_to_terms   : "required"
				},
				messages      : {
					agree_to_terms: "You must agree to the Kaltura Terms of Use"
				},
				invalidHandler: function (form, validator) {
					var errors = validator.numberOfInvalids();
					if (errors) {

					} else {

					}
				},
				errorPlacement: function (error, element) {
					if (element.attr('name') == 'agree_to_terms')
						error.appendTo(element.parent());
					//error.appendTo( element.parent("td").next("td") );
				}
			});

			$('select[name=country]').change();

			$('select[name=country]').change(function () {
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
			$('.delete').click(function () {
				var entryId = $(this).data('id');
				deleteEntry(entryId);
			});
		}

		$(document.body).on('click', '#kaltura-media-button', function (event) {
			var elem = $(event.currentTarget),
					editor = elem.data('editor'),
					options = {
						state: 'iframe:kaltura_upload'
					};

			event.preventDefault();

			wp.media.editor.open(editor, options);
			wp.media.editor.get(editor).setState('iframe:kaltura_upload');
		});
	});
})(jQuery);