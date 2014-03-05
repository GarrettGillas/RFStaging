<?php
include '../../_includes/ssi/siteconfig.php';
include '../../_includes/ssi/checkauth.php';
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $page_title2; ?> | Razorfish Client Preview</title>
<style type="text/css" media="all">@import url(<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/_includes/styles/styles.css);</style>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/_includes/js/polyfills.js"></script>
<script type="text/javascript" src="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/_includes/js/breadcrumbs.js"></script>
<script type="text/javascript" src="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/_includes/js/swfObject.jquery.js"></script>
<script type="text/javascript" src="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/_includes/js/rzf.extranet.projectcontent.js"></script>
<script type="text/javascript">
if(document.URL.indexOf('index.php')>-1){
	window.location.href = window.location.href.substr(0, window.location.href.indexOf('index.php'));
}
</script>
<script>
<?php $ds = DIRECTORY_SEPARATOR; ?>
<?php $uploadPath = urlencode(realpath(dirname(__FILE__).$ds."uploads")); ?>
var uploadPath = "<?php echo $uploadPath; ?>";
</script>
<!--[if lt IE 9]>
<script type="text/javascript" src="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/_includes/js/html5shiv.js"></script>
<style type="text/css" media="all">@import url(<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/_includes/styles/ie.css);</style>
<![endif]-->
<link rel="shortcut icon" href="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/_includes/images/favicon.ico" type="image/x-icon">
<link rel="icon" href="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/_includes/images/favicon.ico" type="image/x-icon">
</head>


<body class="client">
<?php include '../../_includes/ssi/header.php'; ?> 

<div id="content">
<?php #include '../../_includes/ssi/aside-info.php'; ?>
<?php
if($_SESSION['is_admin'] == true){
	$_SESSION['edit_redirect'] = curPageURL();
	include '../../_includes/ssi/aside-uploader.php';
}	
?>
<?php include '../../_includes/ssi/aside-accordion.php'; mkmap("../.."); echo "</div><!--|.asidewrap|-->\n</aside>"; ?>
<?php #include '../../_includes/ssi/aside-public.php'; ?> 

<section>
<script>breadcrumbs();</script>

<article>
<h1><?php echo $page_title2; ?></h1>

<h2 id="bannersTitle">Banners</h2>
<div id="bannersContainer" class="linksContainer"></div>

<h2 id="imagesTitle">Images</h2>
<div id="imagesContainer" class="linksContainer"></div>

<h2 id="documentsTitle">Documents</h2>
<div id="documentsContainer" class="linksContainer"></div>


<?php include '_cms/cms.php'; ?>

</article>
</section>
</div><!--|#content|-->

<?php include '../../_includes/ssi/footer.php'; ?>

<script>
$(function() {


	var bannersContainer = $('#bannersContainer');
	var imagesContainer = $('#imagesContainer');
	var documentsContainer = $('#documentsContainer');



	bannersContainer.hide();
	imagesContainer.hide();
	documentsContainer.hide();
	$('#bannersTitle').hide();
	$('#imagesTitle').hide();
	$('#documentsTitle').hide();

	/* Looking for dimensions in the filenames (such as 300x250) */
	var pattern = new RegExp(/(([0-9]{2,4})[xX]([0-9]{2,4}))/);

	$('.linksContainer').on('click', 'a.assetLink', function(e){
		e.preventDefault();
		var _assetLink = this;
		var assetDimensions = {};
		var assetExpand = {};
		var assetObject = {};
		$('body').remove('#downloadIFrame');
		$('.linksContainer .assetExpand').hide(200, function(){
			
			$(_assetLink).removeClass('open');
			if($(this).has('div')){
				$(this).flash().remove();
			}
			$(this).remove();
		})

		if(!$(_assetLink).hasClass('open')){
			$(_assetLink).addClass('open');
			if(!$(_assetLink).hasClass('doc')){
				dimensionsTemp = $(_assetLink).attr('href').match(pattern);
				if(dimensionsTemp!=null&&dimensionsTemp[2]>0&&dimensionsTemp[3]>0){
					assetDimensions.width = dimensionsTemp[2];
					assetDimensions.height = dimensionsTemp[3];
					assetExpand = document.createElement('div');
					$(assetExpand).addClass('assetExpand');
					$(assetExpand).css({'height': (assetDimensions.height)});
					$(assetExpand).css({'width': (assetDimensions.width)});
					$(assetExpand).hide();
					$(_assetLink).after(assetExpand);
					if($(_assetLink).hasClass('img')){
						assetObject = document.createElement('img');
						$(assetObject).attr('src', $(_assetLink).attr('href'));
						$(assetExpand).append(assetObject)
					}else if($(_assetLink).hasClass('swf')){
						assetObject = document.createElement('div');
						$(assetObject).attr('id', 'swfContainer');
						$(assetExpand).append(assetObject);
						$(assetObject).flash({swf:$(_assetLink).attr('href'),height:assetDimensions.height,width:assetDimensions.width});
					}
					$(assetExpand).show(300);
				}else{
					if($(_assetLink).hasClass('img')){
						assetObject = document.createElement('img');
						var win=window.open($(_assetLink).attr('href'), '_blank');
						win.focus();
					}else if($(_assetLink).hasClass('swf')){
						$(_assetLink).css({'color': '#ff0000'});
						$(_assetLink).append(' - ERROR: Cannot display SWF. The filename does not specify a dimension.');
					}
				}
				
			}else{
				//var temp = window.open($(_assetLink).attr('href'));
				$(_assetLink).addClass('doc');
			}
		}
		
	});

	function pushContent(){
		bannersContainer.empty();
		imagesContainer.empty();
		documentsContainer.empty();
		
		$.each(ProjectContent.banners_SWF, function( index, value ) {
			bannersContainer.append(value);
		});
		$.each(ProjectContent.banners_IMG, function( index, value ) {
			imagesContainer.append(value);
		});
		$.each(ProjectContent.documents, function( index, value ) {
			documentsContainer.append(value);
		});

		if (!bannersContainer.is(':empty')){
			$('#bannersTitle').fadeIn();
			bannersContainer.fadeIn();
		}else{
			$('#bannersTitle').hide();
			bannersContainer.hide();
		}

		if (!imagesContainer.is(':empty')){
			$('#imagesTitle').fadeIn();
			imagesContainer.fadeIn();
		}else{
			$('#imagesTitle').hide();
			imagesContainer.hide();
		}

		if (!documentsContainer.is(':empty')){
			$('#documentsTitle').fadeIn();
			documentsContainer.fadeIn();
		}else{
			$('#documentsTitle').hide();
			documentsContainer.hide();
		}


		<?php if($_SESSION['is_admin'] == true): ?>

		$('.assetLinkItemContainer').each(function(i, el){
			var _fileName = $(el).find('.assetLink').attr('href');
			var outputDeleteLinkContainer = document.createElement('span');
			var outputDeleteLink = document.createElement('a');

			$(outputDeleteLink).attr('href', _fileName);
			$(outputDeleteLink).html("DELETE");
			$(outputDeleteLink).addClass('deleteButton');
			$(outputDeleteLinkContainer).addClass('edit-del');
			$(this).append(outputDeleteLinkContainer);
			$(outputDeleteLinkContainer).append("[ ").append($(outputDeleteLink)).append(" ]");
		});

		$('.assetLinkItemContainer').on('click', '.deleteButton', function(e){
			e.preventDefault();
			if(confirm('Are you sure you want to delete '+$(this).attr('href')+"?")){
				$.ajax({
					type: "POST",
					url: "/_services/delete.php?"+new Date().getTime(),
					data: {filePath: uploadPath, fileToDelete: $(this).attr('href'), delete: true},
					context: document.body
				}).done(function(data) {
					ProjectContent.refresh(uploadPath);
				});
			}
		});
		<?php endif; ?>
	}

	$(document).on(ProjectContent.DATA_REFRESH_COMPLETE, function(e){
		setTimeout(1000, pushContent());
	})	
	ProjectContent.refresh(uploadPath);	
});
</script>

</body></html>