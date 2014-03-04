<aside>
<h3>File Uploader</h3>
<div class="asidewrap">
<p class="small"><strong>Drop files here:</strong></p>
<link href="<?php echo "http://" . $_SERVER['HTTP_HOST']; ?>/_includes/styles/dropzone.css" type="text/css" rel="stylesheet" />
<script src="<?php echo "http://" . $_SERVER['HTTP_HOST']; ?>/_includes/js/dropzone.js"></script>
<?php $ds = DIRECTORY_SEPARATOR; ?>
<form action="/_services/upload.php" class="dropzone" id="fileUploader" enctype="multipart/form-data"><input type="hidden" value="<?php echo urldecode($uploadPath); ?>" id="contentUploadPath" name="contentUploadPath" /></form> 
<p class="small"><strong>Supported formats:</strong> JPG, PNG, GIF,<br> SWF, HTML, PDF, PPT, DOC,
(<a href="<?php echo "http://".$_SERVER['HTTP_HOST']."/user-guide/";?>" style="text-decoration:underline;">more</a>)<br>
<strong>Maximum file size:</strong> 100MB</p>

<script type="text/javascript">
$(function() {

	var currentUploadQueue = 0;
	var currentCompleteQueue = 0;

	Dropzone.options.fileUploader = {
		uploadMultiple : true,
		acceptedFiles : ".SWF,  .HTML, .HTM, .GIF, .JPG, .JPEG, .PNG, .PDF, .PPT, .PPTX, .DOCX, .DOC, .XLSX, .XLS, .FLV, .AS, .XML, .JSON, .EOT, .TTF, .OTF, .WOFF, .SVG, .JS, .ICO, .PHP, .TXT, .RTF, .MP4, .OGV, .WEBM, .M4V",
		dictInvalidFileType: "File type not supported.",
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
</div><!--|.asidewrap|-->
</aside>
