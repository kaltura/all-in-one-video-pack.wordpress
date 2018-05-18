<?php KalturaHelpers::protectView( $this ); ?>

<script type="text/javascript">
	jQuery(function () {
		var params = <?php echo wp_json_encode($this->fileUploadParams); ?>;
		var rootCategory = <?php echo $this->rootCategory; ?>;
		var widget = jQuery('#uploadHook')
				.fileupload(params)
				.bind('fileuploaddone', onFileUploadDone)
				.bind('fileuploadfail', onGenericError)
				.bind('fileuploaderror', onGenericError)
				.bind('fileuploadcancel', onFileUploadCancel);

		// bind to the upload input
		jQuery('#uploadbox1').find('#fileinput').bind('change', function (e) {
			jQuery('#uploadHook').fileupload('add', {
				fileInput: jQuery(this),
				uploadBoxId: 1
			});
		});

		function createEntry(name, uploadTokenId) {
			jQuery.ajax({
						url: params.apiURL + '?service=baseEntry&action=add&format=9',
						data: _createEntryCreatePayload(name, params.ks, rootCategory),
						type: "GET",
						dataType: "jsonp"
					})
					.done(function (response) {
						if (isErrorResponse(response)) {
							return onGenericError();
						}
						attachUploadToken(response.id, uploadTokenId);
					})
					.fail(onGenericError);
		}

		function _createEntryCreatePayload(name, ks, rootCategory) {
			var data = {
				'entry:objectType': 'KalturaBaseEntry',
				'entry:name': name,
				'type': -1, // KalturaEntryType::AUTOMATIC
				'ks': ks
			};

			if(rootCategory != 0) {
				data['entry:categoriesIds'] = rootCategory;
			}

			return data;
		}

		function attachUploadToken(entryId, uploadTokenId) {
			setMessage('Attaching uploaded file...');
			jQuery.ajax({
						url: params.apiURL + '?service=baseEntry&action=addContent&format=9',
						data: {
							'entryId': entryId,
							'resource:objectType': 'KalturaUploadedFileTokenResource',
							'resource:token': uploadTokenId,
							'ks': params.ks
						},
						type: "GET",
						dataType: "jsonp"
					})
					.done(function (response) {
						if (isErrorResponse(response)) {
							return onGenericError();
						}
						setMessage('Redirecting to edit page...');
						var url = '<?php echo KalturaHelpers::generateTabUrl( array( 'tab' => 'kaltura_upload', 'kaction' => 'edit' ) ); ?>';
						url = url + '&entryid=' + entryId;
						window.location.href = url;
					})
					.fail(onGenericError);
		}

		function onFileUploadDone(e, data) {
			var file = data.files[0];
			setMessage('Creating media entry...');
			createEntry(file.name, data.uploadTokenId);
		}

		function onFileUploadCancel(e, data) {
			setMessage(null, true, true);
		}

		function isErrorResponse(result) {
			return (result && result.code && result.message);
		}

		function onGenericError() {
			setMessage('Something went wrong... ', true, true);
		}

		function setMessage(msg, isError, showRetry) {
			var $successMsg = jQuery('#successmsg');
			if (isError) {
				$successMsg.addClass('alert-danger');
			}
			if (msg) {
				$successMsg.text(msg);
			}
			if (showRetry) {
				$successMsg.append(jQuery(' <a href="#">Try again?</a>').click(function () {
					window.location.reload();
				}));
			}
		}
	});
</script>
<div id="uploadHook"></div>
<div class="row-fluid">
	<div id="uploadbox1">
		<div class="well">
			<div class="wrap_me">
				<div class="relative">
					<div id="uploadbutton">
						<form id='fileupload'>
							<span class="btn btn-primary btn-large fileinput-button">
								<i class="icon-plus icon-white"></i>&nbsp;Choose a file to upload
								<input id="fileinput" class="fileinput" data-uploadboxid="1" type="file" name="fileData" accept=".mts,.MTS,.qt,.mov,.mpg,.avi,.mp3,.m4a,.wav,.mp4,.wma,.vob,.flv,.f4v,.asf,.qt,.mov,.mpeg,.avi,.wmv,.m4v,.3gp,.jpg,.jpeg,.bmp,.png,.gif,.tif,.tiff,.mkv,.QT,.MOV,.MPG,.AVI,.MP3,.M4A,.WAV,.MP4,.WMA,.VOB,.FLV,.F4V,.ASF,.QT,.MOV,.MPEG,.AVI,.WMV,.M4V,.3GP,.JPG,.JPEG,.BMP,.PNG,.GIF,.TIF,.TIFF,.MKV,.AIFF,.arf,.ARF,.webm,.WEBM,.rm,.RM,.ra,.RA,.RV,.rv,.aiff">
							</span>
						</form>
					</div>
					<span id="upload-file-info" class="label"></span>
					<button class="cancelBtn btn hidden pull-right btn-danger" title="Cancel" id="cancelBtn">Cancel</button>
				</div>

				<div id="progress" class="progress hidden">
					<div id="progressBar" class="bar active"></div>
					<div class="anchor"><div class="message"></div></div>
				</div>

				<div id="successmsg" class="alert alert-success hidden text-center"></div>
				<p class="uploadMediaDetails"><?php echo __('All common video, audio and image formats in all resolutions are accepted by Kaltura.'); ?> <a href="https://knowledge.kaltura.com/node/79" target="_blank">Learn more</a>.</p>
			</div>
		</div>
	</div>
</div>
