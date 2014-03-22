<aside class="uploader">
<h3>File Uploader</h3>

<div class="asidewrap">
<p class="small"><strong>Drop files here:</strong></p>

<link href="<?php echo $tld; ?>_includes/styles/dropzone.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="<?php echo $tld; ?>_includes/js/dropzone.js"></script>

<form action="/_services/upload.php" class="dropzone" id="fileUploader" enctype="multipart/form-data">
<input type="hidden" value="<?php echo urldecode($uploadPath); ?>" id="contentUploadPath" name="contentUploadPath" />
</form> 

<p class="small"><strong>Supported formats:</strong> SWF, JPG,<br> PNG, GIF, PDF, PPTX, DOCX...<br>
<strong>Maximum file size:</strong> 100MB</p>

<script type="text/javascript">
$(function() {

	var currentUploadQueue = 0;
	var currentCompleteQueue = 0;

	Dropzone.options.fileUploader = {
		uploadMultiple : true,
		acceptedFiles : ".SWF, .JSON, .GIF, .JPG, .JPEG, .PNG, .PDF, .PPT, .PPTX, .DOC, .DOCX, .XLS, .XLSX, .FLV, .AS, .XML",
		dictInvalidFileType: "File type not supported.",
		maxFilesize: 100,
		init: function(){
			fileUploader = this;
			fileUploader.on("addedfile", function(file) {
				currentUploadQueue += 1;
			});

			fileUploader.on("complete", function(file){
				currentCompleteQueue += 1;
				if(currentCompleteQueue == currentUploadQueue){
					setTimeout(function(){
						fileUploader.removeAllFiles();
					}, 3000)
					
					ProjectContent.refresh(uploadPath);
					currentUploadQueue = currentCompleteQueue = 0;
				}
			});
		}
	}
});
</script>

<a href="<?php echo $tld; ?>user-guide/#uploader" target="_blank"><img src="<?php echo $tld; ?>_includes/images/help_icon_grey.png" class="helplink"></a>

</div><!--|.asidewrap|-->
</aside><!--|.uploader|-->
