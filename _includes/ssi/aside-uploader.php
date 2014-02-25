<aside>
<h3>File Uploader</h3>
<div class="asidewrap">
<p class="small"><strong>Drop files here:</strong></p>
<link href="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/_includes/styles/dropzone.css" type="text/css" rel="stylesheet" />
<script src="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/_includes/js/dropzone.js"></script>
<? $ds = DIRECTORY_SEPARATOR; ?>
<form action="/_services/upload.php" class="dropzone" id="fileUploader" enctype="multipart/form-data"><input type="hidden" value="<?php echo urldecode($uploadPath); ?>" id="contentUploadPath" name="contentUploadPath" /></form> 
<p class="small"><strong>Supported formats:</strong> JPG, PNG, GIF, SWF, HTML, PDF, PPTX, DOCX, XLSX<br>
<strong>Maximum file size:</strong> 100MB</p>
</div><!--|.asidewrap|-->
</aside>
<script type="text/javascript">

$(function() {
	Dropzone.options.fileUploader = false;

	var fileUploader = new Dropzone("#fileUploader", {uploadMultiple: true});
	
	var currentUploadQueue = 0;
	var currentCompleteQueue = 0;

	fileUploader.on("addedfile", function(file) {
		currentUploadQueue += 1;
	});

	fileUploader.on("complete", function(file){
		currentCompleteQueue += 1;
		if(currentCompleteQueue == currentUploadQueue){
			fileUploader.removeAllFiles();
			ProjectContent.refresh(uploadPath);
			currentUploadQueue = currentCompleteQueue = 0;
		}

	});

	var bannersContainer = $('#bannersContainer');
	var imagesContainer = $('#imagesContainer');
	var documentsContainer = $('#documentsContainer');

	function pushContent(){
		$('#bannersContainer').empty();
		$('#imagesContainer').empty();
		$('#imagesContainer').empty();
		
		$.each(ProjectContent.banners_SWF, function( index, value ) {
			bannersContainer.append(value);
		});
		$.each(ProjectContent.banners_IMG, function( index, value ) {
			imagesContainer.append(value);
		});
		$.each(ProjectContent.documents, function( index, value ) {
			documentsContainer.append(value);
		});
	}

	$(document).on(ProjectContent.DATA_REFRESH_COMPLETE, function(e){
		setTimeout(1000, pushContent());
	})

	ProjectContent.refresh(uploadPath);

	bannersContainer.on('click', 'a', function(e){
		e.preventDefault();
	});

	imagesContainer.on('click', 'a', function(e){
		e.preventDefault();
	});

	documentsContainer.on('click', 'a', function(e){
		e.preventDefault();
	});

});

</script>