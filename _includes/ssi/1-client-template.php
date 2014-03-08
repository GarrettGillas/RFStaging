<?php
include '_includes/ssi/siteconfig.php';
include '_includes/ssi/checkauth.php';
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $page_title; ?> | Razorfish Client Preview</title>
<link rel="shortcut icon" href="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/_includes/images/favicon.ico" type="image/x-icon">
<style type="text/css" media="all">@import url(<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/_includes/styles/styles.css);</style>
<script type="text/javascript" src="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/_includes/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/_includes/js/polyfills.js"></script>
<script type="text/javascript" src="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/_includes/js/rzf.extranet.projectcontent.js"></script>
</head>


<body class="root<?php if($_SESSION['is_admin'] == false){echo " clientlogin";} ?>">
<?php include '_includes/ssi/header.php'; ?>

<div id="content">
<?php /* Project Info Widget  */ include '_includes/ssi/aside-info.php'; ?>
<?php /* Accordion Nav Widget */ include '_includes/ssi/aside-accordion.php'; mkmap("."); echo "</div><!--|.asidewrap|-->\n</aside>"; ?>

<section>
<script type="text/javascript">breadcrumbs(); window.onload = jQuery.reject;</script>

<article>
<h1><?php echo $page_title; ?></h1>

<?php
/* Directory Navigation with SCANDIR */
error_reporting(E_ALL ^ E_NOTICE);

/* Global Exclusion Handling */
include '_includes/ssi/exclusions.php';

if (isset($_GET["dir"])) {
  $dir_path = $_SERVER["DOCUMENT_ROOT"].$_SERVER["REQUEST_URI"].$_GET["dir"];
}
else {
  $dir_path = $_SERVER["DOCUMENT_ROOT"].$_SERVER["REQUEST_URI"];
}

function dir_nav() {
  global $exclude_list, $dir_path;
  $directories = array_diff(scandir($dir_path), $exclude_list);

  foreach($directories as $entry) {
    if(is_dir($dir_path.$entry)) {
      echo "<h2><a href='".$_GET["dir"].$entry."/"."'>".$entry."</a></h2>\n";
    }
  }
}
dir_nav();
?>

</article>
</section>
</div><!--|#content|-->

<?php include '_includes/ssi/footer.php'; ?>
</body></html>