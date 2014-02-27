<?php
/****************************/
/* PAGE VARIABLES TO UPDATE */
/****************************/
$location = "<strong>Razorfish Portland</strong><br>
            700 SW Taylor #400<br>
            Portland, OR 97205<br>";
$contact =  "<strong>Firstname Lastname</strong><br>
            Account Director<br>
            (123) 456-7890<br>
            first.last@razorfish.com";
$logo =     "/_includes/logo-windows.jpg";
$logo2 =    "/_includes/logo-razorfish.png";

/* PAGE TITLE GENERATED FROM SANITIZED DIRECTORY NAME */
$myTitle = basename(getcwd());
$myTitle = str_replace("-", " ", $myTitle);
$myTitle = str_replace("_", " ", $myTitle);
$page_title = $myTitle;
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $page_title; ?></title>
<style type="text/css" media="all">@import url(<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/_includes/styles/styles.css);</style>
<script type="text/javascript" src="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/_includes/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/_includes/js/breadcrumbs.js"></script>
<script type="text/javascript" src="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/_includes/js/rzf.extranet.projectcontent.js"></script>
<link rel="shortcut icon" href="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/_includes/images/favicon.ico" type="image/x-icon">
<link rel="icon" href="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/_includes/images/favicon.ico" type="image/x-icon">
</head>


<body class="guide">
<?php include '../_includes/ssi/header.php'; ?>

<div id="content">
<?php #include '../_includes/ssi/aside-info.php'; ?>
<?php #include '../_includes/ssi/aside-uploader.php'; ?>
<?php include '../_includes/ssi/aside-accordion.php'; mkmap(".."); echo "</div><!--|.asidewrap|-->\n</aside>"; ?>
<?php #include '../_includes/ssi/aside-public.php'; ?> 

<section>
<script>breadcrumbs();</script>

<article>
<h1><?php echo $page_title; ?></h1>

<h2>Using the Client Preview Platform</h2>
<p>The Razorfish Client Preview Platform is a tool for Razorfish employees to use to post creative media for internal and client reviews. It has been purpose built to be fast and flexible so that teams can review and revise media across global offices at a an extremly fast pace. By posting all files directly in the browser, and being able to modify them there as well, we can avoid the use of FTP and other slow file transfer systems.</p>

<h2>Uploading Files</h2>
<p></p>

<h2>Viewing Files</h2>
<p></p>

<h2>Deleting Files</h2>
<p></p>

<h2>Adding Files</h2>
<p></p>

<h2>Adding Links</h2>
<p></p>

<h2>Applying Changes</h2>
<p></p>

<h2>Creating New Projects</h2>
<p></p>





</article>
</section>
</div><!--|#content|-->

<?php include '../_includes/ssi/footer.php'; ?>
</body></html>