<?php 

//here the code to generate Kaltura Seesion comes so that we can pass the KS to the upload widget.
//to ensure security of your account, always generate the KS on the backend, and pass a generated KS to the widget, do not generate a KS in the client side as this will expose your secret keys / passwords.
//additionally, make sure your KS is of type user, and that it permits upload and add actions on uploadToken and entry services. 
$the_user_ks_to_use = 'M2I4NmFkMmIxZmEyODBlZmI5ODVmNjViNjdjNGQzNjk3M2VlODQwN3w0NTA7NDUwOzE0NjQ0MzUyMjc7MjsxNDY0MzQ4ODI3LjM1MDQ7cm9tYW4ua3JlaWNobWFuQGthbHR1cmEuY29tOyosZGlzYWJsZWVudGl0bGVtZW50Ozs=';

?>
<!DOCTYPE html>
<html>
<head>
	<title>Chunked file upload with Kaltura</title>
	
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" media="screen" rel="stylesheet" type="text/css" />
	<link href="./css/jquery.fileupload-ui.css" media="screen" rel="stylesheet" type="text/css" />
	<link href="./css/jquery.fileupload-ui-kaltura.css" media="screen" rel="stylesheet" type="text/css" />
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript" src="./js/jquery.ui.widget.js"></script>
	<script type="text/javascript" src="./js/jquery.iframe-transport.js"></script>
	<script type="text/javascript" src="./js/webtoolkit.md5.js"></script>
	<script type="text/javascript" src="./js/jquery.fileupload.js"></script>
	<script type="text/javascript" src="./js/jquery.fileupload-process.js"></script>
	<script type="text/javascript" src="./js/jquery.fileupload-validate.js"></script>
	<script type="text/javascript" src="./js/jquery.fileupload-kaltura.js"></script>
	<script type="text/javascript" src="./js/jquery.fileupload-kaltura-base.js"></script>
</head>
<body>

<script type="text/javascript">
	
	$(function(){
			
			console.log('doc ready');

			var categoryId = -1;

	        var widget = $('#uploadHook').fileupload({
                // continue to pass this, even not used, to trigger chunk upload
                maxChunkSize: 3000000,
                dynamicChunkSizeInitialChunkSize: 1000000,
                dynamicChunkSizeThreshold: 50000000,
                dynamixChunkSizeMaxTime: 30,

                host: "https://www.kaltura.com",
	            apiURL: "https://www.kaltura.com/api_v3/",
                url: "https://www.kaltura.com/api_v3/?service=uploadToken&action=upload&format=1",
                ks: '<?php echo $the_user_ks_to_use; ?>',
                fileTypes: '*.mts;*.MTS;*.qt;*.mov;*.mpg;*.avi;*.mp3;*.m4a;*.wav;*.mp4;*.wma;*.vob;*.flv;*.f4v;*.asf;*.qt;*.mov;*.mpeg;*.avi;*.wmv;*.m4v;*.3gp;*.jpg;*.jpeg;*.bmp;*.png;*.gif;*.tif;*.tiff;*.mkv;*.QT;*.MOV;*.MPG;*.AVI;*.MP3;*.M4A;*.WAV;*.MP4;*.WMA;*.VOB;*.FLV;*.F4V;*.ASF;*.QT;*.MOV;*.MPEG;*.AVI;*.WMV;*.M4V;*.3GP;*.JPG;*.JPEG;*.BMP;*.PNG;*.GIF;*.TIF;*.TIFF;*.MKV;*.AIFF;*.arf;*.ARF;*.webm;*.WEBM;*.rm;*.RM;*.ra;*.RA;*.RV;*.rv;*.aiff',
                context: '',
                categoryId: categoryId,
                messages: {
                	acceptFileTypes: 'File type not allowed',
                	maxFileSize: 'File is too large',
                	minFileSize: 'File is too small'
            	},
                android: "",
                singleUpload: ""

            })
            // file added
            .bind('fileuploadadd',function(e, data){

            	console.log('fileuploaded');
                var uploadBoxId = widget.fileupload('getUploadBoxId',e,data);
                data.uploadBoxId = uploadBoxId;
                var uploadManager = widget.fileupload("getUploadManager");
                if (!uploadManager.hasWidget($(this)) && !widget.fileupload('option', 'android') && !widget.fileupload('option', 'singleUpload')) {
                    // load the next uploadbox (anyway even if there is an error)
                    widget.fileupload('addUploadBox',e,data);
                }
            })
			// actual upload start
			.bind('fileuploadsend',function(e, data){
				console.log('fileuploadsend');
 				var uploadBoxId = widget.fileupload('getUploadBoxId',e,data);
				var file = data.files[0];
                var uploadManager = widget.fileupload("getUploadManager");

            	if(file.error === undefined){
                    var context = widget.fileupload('option', 'context');
                    console.log('upload context: ' + context);
                    console.log('now uploading file name: ' + encodeURIComponent(file.name));
                    //here we should display an edit entry form to allow the user to add/save metadata to the entry
                    $("#uploadbox" + uploadBoxId + " .entry_details").removeClass('hidden');
                } else {
                	console.log('some kind of error when starting to upload ' + file.error);
                }
			})
			// upload done
            .bind('fileuploaddone', function(e, data){
            	console.log('fileuploaddone');
 				var uploadBoxId = widget.fileupload('getUploadBoxId',e,data);
                var file = data.files[0];
                console.log('upload complete success: ' + encodeURIComponent(file.name) + '/token/'+ data.uploadTokenId + '/boxId/' + uploadBoxId);
                console.log('Next, call the media.add and media.addContent API actions to create your Kaltura Media Entry and associate it with this newly uploaded file. Once media.addContent is called, the transcoding process will begin and your media entry will be prepared for playback and sharing. Use the Kaltura JS client library or call your backend service to execute media.add and media.addContent passing the uploadTokenId.');
            })
            // upload error
            .bind('fileuploaderror', function(e, data){
            	console.log('fileuploaderror');
                var uploadBoxId = widget.fileupload('getUploadBoxId',e,data);
                var uploadBox = widget.fileupload('getUploadBox',uploadBoxId);
                $("#entry_details", uploadBox).addClass('hidden');
                if (widget.fileupload('option', 'singleUpload')){
                    // load the next uploadbox (if an error occured and it's a single upload do not cause a dead end for the user)
                    widget.fileupload('addUploadBox',e,data);
                }
            })
			// upload cancelled
            .bind('fileuploadcancel', function(e, data){
            	console.log('fileuploadcancel');
                var uploadBoxId = widget.fileupload('getUploadBoxId',e,data);                
                var uploadBox = widget.fileupload('getUploadBox',uploadBoxId);
                $("#entry_details", uploadBox).addClass('hidden');                
        		console.log('Upload Cancel');
            });

            // bind to the first upload input
			$("#uploadbox1 #fileinput").bind('change', function (e) {
	    		$('#uploadHook').fileupload('add', {
	        		fileInput: $(this), 
	        		uploadBoxId: 1
	        	});
	        	console.log('file chosen');
			});
        });
</script>
<div id="uploadHook"></div>
<div class="row-fluid">
    <h1>Upload Media</h1>	
    <div id="uploadbox1">
		<div class="well">
			<div class="wrap_me">
				<div class="relative">
		            <div id="uploadbutton">
			         	<form id='fileupload'>
				            <span class="btn btn-primary btn-large fileinput-button">
				            	<i class="icon-plus icon-white"></i>&nbsp;Choose a file to upload	    			            <input id="fileinput" class="fileinput" data-uploadboxid="1" type="file" name="fileData" accept=".mts,.MTS,.qt,.mov,.mpg,.avi,.mp3,.m4a,.wav,.mp4,.wma,.vob,.flv,.f4v,.asf,.qt,.mov,.mpeg,.avi,.wmv,.m4v,.3gp,.jpg,.jpeg,.bmp,.png,.gif,.tif,.tiff,.mkv,.QT,.MOV,.MPG,.AVI,.MP3,.M4A,.WAV,.MP4,.WMA,.VOB,.FLV,.F4V,.ASF,.QT,.MOV,.MPEG,.AVI,.WMV,.M4V,.3GP,.JPG,.JPEG,.BMP,.PNG,.GIF,.TIF,.TIFF,.MKV,.AIFF,.arf,.ARF,.webm,.WEBM,.rm,.RM,.ra,.RA,.RV,.rv,.aiff">
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

		        <div id="successmsg" class="alert alert-success hidden text-center">
		            <span class="large">
		                <strong>Upload Completed!</strong> Next, call the <a href="https://developer.kaltura.com/api-docs/#/media.add" target="_blank">media.add</a> and <a href="https://developer.kaltura.com/api-docs/#/media.addContent" target="_blank">media.addContent</a> API actions to create your Kaltura Media Entry and associate it with this newly uploaded file. Once media.addContent is called, the transcoding process will begin and your media entry will be prepared for playback and sharing.</span>
		        </div>
		        <p class="uploadMediaDetails"><?php echo __('All common video, audio and image formats in all resolutions are accepted by Kaltura.'); ?> <a href="https://knowledge.kaltura.com/node/79" target="_blank">Learn more</a>.</p>
	        </div>
	        <div id="entry_details" class="entry_details hidden">
			</div>
		</div>
	</div>
</div>

</body>
</html>
