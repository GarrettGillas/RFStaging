<?php
/**
 * VARIABLES TO UPDATE
 * $logo = The logo on the top left of the page.
 * $logo = The logo on the top right of the page.
 * $orgin_path = The path you want to start from.
 * 
 */

$orgin_path = '.';
$logo = "/_includes/logo-windows.jpg";
$logo2 = "/_includes/logo-razorfish.png";
$page_title = "Windows OLA";
$location = "<strong>Razorfish Portland</strong><br>
700 SW Taylor<br>Suite 400<br>Portland, OR 97205<br>";
$contact = "<strong>Firstname Lastname</strong><br>
Account Director<br>
(123) 456-7890<br>
first.last@razorfish.com";


$directories_to_ignore = array('.','..','styles','includes','Scripts','com','css','fonts','js');
$filetypes_to_ignore = array('zip','swf','txt','bak','php','tiff','tif','DS_Store','fla','js','xml','as','f4v');
?>

<?php include '../../_includes/ssi/head.php'; ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $page_title; ?></title>
<style type="text/css" media="all">@import url(<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/_includes/styles/styles.css);</style>
<script type="text/javascript" src="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/_includes/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/_includes/js/breadcrumbs.js"></script>
<script type="text/javascript" src="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/_includes/js/rzf.extranet.projectcontent.js"></script>

<script type="text/javascript">
<?php $ds = DIRECTORY_SEPARATOR; ?>
<?php $uploadPath = urlencode(realpath(dirname(__FILE__).$ds."uploads")); ?>
var uploadPath = "<?php echo $uploadPath; ?>";
</script>

<link rel="shortcut icon" href="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/_includes/images/favicon.ico" type="image/x-icon">
<link rel="icon" href="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/_includes/images/favicon.ico" type="image/x-icon">
</head>


<body class="client">
<?php include '../../_includes/ssi/header.php'; ?>

<div id="content">
<?php #include '../../_includes/ssi/aside-info.php'; ?>
<?php include '../../_includes/ssi/aside-uploader.php'; ?>
<?php include '../../_includes/ssi/aside-accordion.php'; ?>
<?php #include '../../_includes/ssi/aside-public.php'; ?> 

<section>
<script>breadcrumbs();</script>

<article>
<h1><?php echo $page_title; ?></h1>

<h2>Banners</h2>
<div id="bannersContainer">

</div>

<h2>Images</h2>
<div id="imagesContainer">

</div>

<h2>Documents</h2>
<div id="documentsContainer">

</div>


<?php include '_cms/cms.php'; ?>

</article>
</section>
</div><!--|#content|-->

<?php include '../../_includes/ssi/footer.php'; ?>
</body></html>