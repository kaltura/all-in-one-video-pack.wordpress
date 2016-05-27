/**
 * jquery.fileupload Kaltura UI helper
 */
(function (factory) {
    'use strict';
    if (typeof define === 'function' && define.amd) {
        // Register as an anonymous AMD module:
        define([
            'jquery',
            './jquery.fileupload'
        ], factory);
    } else {
        // Browser globals:
        factory(
            window.jQuery
        );
    }
}(function ($) {
    'use strict';

    var originalAdd = $.blueimp.fileupload.prototype.options.add;
    var originalFail = $.blueimp.fileupload.prototype.options.fail;

    var jqXHR = null;

    $.widget('blueimp.fileupload', $.blueimp.fileupload, {

        options: {
            ignoreChunkHeader:true,
            dataType: 'json',
            uploadBoxId : null,
            jqXHR : null,
            context: null,

            add: function(e,data){
                var widget = $(e.target);
                if (widget.fileupload('option', 'addConfirmCallback')) {
                    if (!widget.fileupload('option', 'addConfirmCallback')()) {
                        return;
                    }
                }
                var uploadBoxId = widget.fileupload('getUploadBoxId',e,data);
                data.uploadBoxId = uploadBoxId;
                var uploadbox = widget.fileupload('getUploadBox',uploadBoxId);
                if (uploadbox.data('uplsuccessmsghtml')) {
                    $("#successmsg", uploadbox).html(uploadbox.data('uplsuccessmsghtml'));
                    $("#successmsg", uploadbox).removeClass('alert-danger').addClass('alert-success');
                }
                var uploadManager = UploaderManagerSingleton.getInstance();
                var fileTypes = widget.fileupload('option', 'fileTypes');
                widget.fileupload('option', 'acceptFileTypes', formatFileTypes(widget.fileupload('option', 'fileTypes')));
                var file = data.files[0];

                $('#fileupload', uploadbox).addClass('hidden');
                $('#fileupload', uploadbox).addClass('hidden');
                $("#cancelBtn", uploadbox).removeClass('hidden');
                $('#progress', uploadbox).removeClass('hidden');
                $("#upload-file-info", uploadbox).html('Now uploading: ' + file.name);

                // catch the cancel event and abort the upload
                $('.cancelBtn', uploadbox).click(function (event) {
                    if ( data.jqXHR) {
                        data.jqXHR.abort();
                    }
                    else{
                        data.textStatus = 'abort';
                        widget.fileupload('option','fail')(e,data);
                    }
                    uploadManager.removeWidget(uploadBoxId);
                });

                // call the original add() action to invoke processing and validation
                $.blueimp.fileupload.prototype.autoUpload = false;
                originalAdd.call(this, e, data);

                if(file.error !== undefined){
                    $(this).fileupload('onError', file.error, uploadBoxId);
                }
                else{
                    if (!uploadManager.hasWidget(uploadBoxId)) {
                        // add the upload the the upload manager
                        uploadManager.addWidget(widget, e, data);
                    }
                }
            },
            progress: function (e, data) {
                var widget = $(e.target);                
                var uploadBoxId = widget.fileupload('getUploadBoxId',e,data);

                // update the progress only in incremental values
                var progressBar = '#uploadbox' + uploadBoxId + ' #progress #progressBar';
                var dataLoaded = data.loaded;
                var currentDataLoaded = $(progressBar).data('dataLoaded');
                if (currentDataLoaded && currentDataLoaded > dataLoaded) {
                    dataLoaded = currentDataLoaded;
                }
                $(progressBar).data('dataLoaded', dataLoaded);

                var progress = parseInt(dataLoaded / data.total * 100, 10);
                var text = formatSize(dataLoaded) + (" of ");
                text += formatSize(data.total);

                displayProgress(text, progress, uploadBoxId);
            },
            done: function(e,data){
                var widget = $(e.target);                
                var uploadBoxId = widget.fileupload('getUploadBoxId',e,data);
                if (data.textStatus == 'success') {
                    // succesful upload
                    var uploadbox = widget.fileupload('getUploadBox',uploadBoxId);
                    $("#progress", uploadbox).addClass('progress-success').removeClass('active');
                    $("#successmsg", uploadbox).removeClass('hidden');
                    $("#cancelBtn", uploadbox).addClass('hidden');
                    $('#progress .anchor .message', uploadbox).css('color', '#fff');

                    // remove this widget from the uploads manager
                    var uploadManager = UploaderManagerSingleton.getInstance();
                    uploadManager.removeWidget(uploadBoxId);
                }
                else{
                    widget.fileupload('onError', data.textStatus, uploadBoxId);                    
                }
            },
            addfail: function(e,data){
                var widget = $(e.target);
                var uploadBoxId = widget.fileupload('getUploadBoxId',e,data);
                widget.fileupload('onError', data.message, uploadBoxId);                                    
            },
            failed: function(e, data){
                var widget = $(e.target);
                var uploadBoxId = widget.fileupload('getUploadBoxId',e,data);
                widget.fileupload('onError', 'could not upload file', uploadBoxId);
            },
            fail: function(e, data){
                var widget = $(e.target);

                // call the original fail
                if (originalFail != undefined) {
                    originalFail.call(this, e, data);
                }

                var uploadBoxId = widget.fileupload('getUploadBoxId',e,data);
                var uploadManager = UploaderManagerSingleton.getInstance();
                var error = '';

                var uploadbox = widget.fileupload('getUploadBox',uploadBoxId);

                if (data.errorThrown) {
                    error = data.errorThrown;
                }
                if (data.textStatus && !error) {
                    error = data.textStatus;
                }

                if (error == 'timeout') {
                    // try and reload
                    setTimeout(function(){uploadManager.resumeUpload(uploadBoxId);},1000);     
                }
                else if (error == 'abort') {
                    // update the status message
                    $("#progress", uploadbox).addClass('progress-danger').removeClass('active');
                    $("#cancelBtn", uploadbox).addClass('hidden');
                    if (!uploadbox.data('uplsuccessmsghtml')) {
                        uploadbox.data('uplsuccessmsghtml', $("#successmsg", uploadbox).html());
                    }
                    $("#successmsg", uploadbox).text(('Upload Cancelled') + '!').removeClass('hidden').toggleClass('alert-danger alert-success');

                    // notify by callback
                    widget.fileupload('onCancel', uploadBoxId);                    

                    // remove this widget from the uploads manager
                    uploadManager.removeWidget(uploadBoxId);
                }
                else if(data.textStatus.code){
                    // server error - do not reload
                    widget.fileupload('onError', error, uploadBoxId);
                    uploadManager.removeWidget(uploadBoxId);
                }
                else {
                    // if we have an upload token, try to reload
                    if (data.uploadTokenId) {                
                        setTimeout(function(){uploadManager.resumeUpload(uploadBoxId);},5000);
                    }
                    else{
                        widget.fileupload('onError', error, uploadBoxId);
                        uploadManager.removeWidget(uploadBoxId);                        
                    }
                }
            }
        },
        getUploadManager: function(){
            return UploaderManagerSingleton.getInstance();
        },
        onError: function(error, uploadBoxId){
            displayError(error, uploadBoxId);
            this._trigger( "error", null, { error: error, uploadBoxId: uploadBoxId } );
        },
        onCancel: function(uploadBoxId){
            this._trigger( "cancel", null, { uploadBoxId: uploadBoxId } );
        },
        getUploadBox: function(uploadboxId){
            return $('#uploadbox' + uploadboxId);
        },
        getUploadBoxId: function(e, data){
            // options
            var widget = $(e.target);            
            var uploadBoxId = widget.fileupload('option','uploadBoxId');
            if (uploadBoxId) {
                return uploadBoxId;
            }  
            // data
            uploadBoxId = data.uploadBoxId;
            if (uploadBoxId) {
                return uploadBoxId;
            }
            // data-uploadboxid
            var input = data.fileInput;
            if (!input) {
                input = $(data.dataId);
            }
            uploadBoxId = input.data('uploadboxid');
            return uploadBoxId;
        },
        addUploadBox: function (e, data){
            //this is used to add another uploadBox to the screen and also in order to avoid dead-ends - for example with singleUpload config if an error occurred
            var widget = $(e.target);
            var uploadBoxId = widget.fileupload('getUploadBoxId',e,data);
            var categoryId = widget.fileupload('option', 'categoryId');
            /*var addUrl = baseUrl + "/entry/add/boxId/" + (uploadBoxId + 1) + "/catid/" + categoryId;
            var context2 = widget.fileupload('option', 'context');
            if (context2) {
                addUrl += '/context/' + context2;
            }
            addUrl += "?format=ajax";
            $.getJSON(addUrl, asyncCallback).error( transportError );*/
            console.log('show next upload box -- boxId:' + (uploadBoxId + 1) + ', categoryId' + categoryId);
        }
    });

    /**
     *  create a regex for accepted file types
     */
     var formatFileTypes = function(fileTypes){
        var fileTypesRegex = null;

        if (fileTypes) {
            fileTypes = fileTypes.replace(/;?\*\./g,'|');
            fileTypesRegex = new RegExp("(\\.|\\/)(" + fileTypes + ")$",'i');
        }

        return fileTypesRegex;
    };


    /**
     *  format file size
     */
     var formatSize = function(size){
        var val = '';
       
       //  display gigbytes
        if(Math.floor(size / 1024 / 1024 / 1024) >= 1) {
            val += Math.round(size / 1024 / 1024 / 1024 * 100)/100 + 'Gb';
        }
        // display megabytes if file size more than 5mb
        // otherwise display kilobytes
        else if(Math.floor(size / 1024 / 1024) >= 5) {
            val += Math.round(size / 1024 / 1024 * 100)/100 + 'Mb';
        }
        else {
            val += Math.round(size / 1024, 2) + 'Kb';
        }
        return val;
    };


    /**
     *  display errors
     */
    var displayError = function(error, uploadBoxId){
        var widget = '#uploadbox' + uploadBoxId;
        $(widget + ' #progressBar').html(('Oops') + '! ' + error).width('100%');
        $(widget + " #progress").addClass('progress-danger').removeClass('active');
        $(widget + " #cancelBtn").addClass('hidden');
        var widgetText = '#uploadbox' + uploadBoxId + ' #progress .anchor .message';
        $(widgetText).hide();
    };

    /**
     *  display progress
     */
    var displayProgress = function(text, progress, uploadBoxId){
        // use widget id to bypass mixup with this, $this and that
        var widget = '#uploadbox' + uploadBoxId + ' #progress #progressBar';
        var widgetText = '#uploadbox' + uploadBoxId + ' #progress .anchor .message';
        $(widgetText).text(text);
        $(widget).css('width', Math.max(progress,1) + '%');
    };    


    /**
     *  KMS uploader widget manager
     */
    function UploaderManager(){
        this.widgets = {};
        this.uploads = {};

        this.addWidget = function($this, e, data){
            var uploadBoxId = data.uploadBoxId;

            if (!this.widgets[uploadBoxId]) {
                this.widgets[uploadBoxId] = {w: $this, e:e, data: data};
            }
        };

        this.hasWidget = function(uploadBoxId){
            return typeof(this.widgets[uploadBoxId]) != 'undefined';
        };

        this.removeWidget = function(uploadBoxId){
            if (this.widgets[uploadBoxId]) {
                delete(this.widgets[uploadBoxId]);
            }
        };

        this.uploadsPending = function(){
            return (this.widgets.length > 0);
        };

        this.resumeAllUploads = function(){
            var key;
            for (key in this.widgets) {
                if (this.widgets.hasOwnProperty(key)){
                    var widget = this.widgets[key];
                    $.blueimp.fileupload.prototype.options.add.call(widget.w, widget.e, widget.data);
                }
            }
        };

        this.resumeUpload = function(uploadBoxId){
            if (this.widgets[uploadBoxId]) {
                var widget = this.widgets[uploadBoxId];
                $.blueimp.fileupload.prototype.options.add.call(widget.w, widget.e, widget.data);
            }
        };
    }


    /**
     *  singleton wrapper for the widget manager 
     */
    var UploaderManagerSingleton = (function () {
        var instance;
        function createInstance() {
            var object = new UploaderManager();
            return object;
        }
        return {
            getInstance: function () {
                if (!instance) {
                    instance = createInstance();
                }
                return instance;
            }
        };
    })();



    /**
     *  handle the user navigating of page while uploads are in progress
     */
    window.onbeforeunload = function (e) {

        // check for uploads in progress
        var uploadManager = UploaderManagerSingleton.getInstance();
        if (!uploadManager.uploadsPending()) {
            return void(0);
        }

        // resume the uploads
        uploadManager.resumeAllUploads();

        // show the user message
        var message = ("You're still uploading! Are you sure you want to leave this page?");

        var e = e || window.event;
        // For IE and Firefox prior to version 4
        if (e) {
            e.returnValue = message;
        }

        // For Safari
        return message;
    };
}));

