<?php
include '../_includes/ssi/siteconfig.php';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $page_title; ?> | Razorfish Client Preview</title>
<link rel="shortcut icon" href="<?php echo $tld; ?>_includes/images/favicon.ico" type="image/x-icon">
<style type="text/css" media="all">@import url(<?php echo $tld; ?>_includes/styles/styles.css);</style>
<script type="text/javascript" src="<?php echo $tld; ?>_includes/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $tld; ?>_includes/js/rzf.extranet.projectcontent.js"></script>
</head>
    

<body class="error<?php echo $bodyclasses; ?>">
<?php include '../_includes/ssi/header.php'; ?>

<div id="content">

<?php 
/* Project Info Widget  */ 
if($infowidget == "true"){ 
	include '../_includes/ssi/aside-info.php';
} 

/* Partner Info Widget */ 
if($_SESSION['is_partner'] == true && $partnerwidget == "true"){
	include '../_includes/ssi/aside-partner.php';
} 
?>

<section>
<nav>
<a href="/">error</a>    
</nav>

<article>
<h1>404 Error: This page does not exist</h1>

<p>Go back to the <a href="/"><u>homepage</u></a> to find what you are looking for. Refer to the <a href="<?php echo $tld."user-guide/";?>"><u>User Guide</u></a> or contact <a href="mailto:garrett.gillas@razorfish.com?subject=Razorfish Client Preview Support Question">Support</a> if you have any further questions about using the Razorfish Client Preview site.</p>

</article>
</section>
</div><!--|#content|-->

<?php include '../_includes/ssi/footer.php'; ?>
</body></html>