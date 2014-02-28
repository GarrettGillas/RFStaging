<?php
include '../_includes/ssi/siteconfig.php';
include '../_includes/ssi/checkauth.php';
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $page_title2; ?></title>
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
<?php include '../_includes/ssi/aside-info.php'; ?>
<?php #include '../_includes/ssi/aside-uploader.php'; ?>
<?php include '../_includes/ssi/aside-accordion.php'; mkmap(".."); echo "</div><!--|.asidewrap|-->\n</aside>"; ?>
<?php #include '../_includes/ssi/aside-public.php'; ?> 

<section>
<script>breadcrumbs();</script>

<article>
<h1><?php echo $page_title2; ?></h1>

<h2>Using the Client Preview Platform</h2>
<p>The Razorfish Client Preview Platform is a tool for Razorfish employees to use to post creative media for internal and client reviews. It has been purpose built to be fast and flexible so that teams can review and revise media across global offices at a an extremly fast pace. By posting all files directly in the browser, and being able to modify them there as well, we can avoid the use of FTP and other slow file transfer systems.</p>

<br>
<hr>

<h2>Uploading Files</h2>
<p><strong>Banners</strong></p>
<p>.SWF,  .HTML, .HTM</p>
<br>

<p><strong>Images</strong></p>
<p>.GIF, .JPG, .JPEG, .PNG</p>
<br>

<p><strong>Documents</strong></p>
<p>.PDF, .PPT, .PPTX, .DOCX, .DOC, .XLSX, .XLS</p>
<br>

<p><strong>Files that you can upload but will not be viewable (need to add)</strong></p>
<br>

<p>(Folders)</p>
<p>.FLV, .AS, .XML, .JSON</p>
<p>.EOT, .TTF, .OTF, .WOFF, .SVG</p>
<p>.JS, .ICO, .PHP</p>
<p>.TXT, .RTF</p>
<p>.MP4, .OGV, .WEBM, .M4V</p>

 
<p></p>

<img src="<?php echo "http://".$_SERVER['HTTP_HOST'] ?>/_includes/images/user-thumbs1.png" class="guide-thumbs">
<p class="guide-labels"><span class="g-a1">Upload</span><span class="g-a2">View</span><span class="g-a3">Delete</span></p>

<h2>Viewing Files</h2>
<p>Select a project from the File Menu. Observe the file categories (Banners, Images, Documents, External Links) Click on any file you wish to view.</p>

<h2>Deleting Files</h2>
<p>Select a project from the File Menu. Observe the file categories (Banners, Images, Documents, External Links) Rollover and view you wish to delete: Observe the [delete] option - click to delete file.</p>

<hr>

<h2>Adding Titles</h2>
<p></p>

<img src="<?php echo "http://".$_SERVER['HTTP_HOST'] ?>/_includes/images/user-thumbs2.png" class="guide-thumbs">
<p class="guide-labels"><span class="g-a1">Add Titles</span><span class="g-a2">Add Links</span><span class="g-a3">Apply Changes</span></p>

<h2>Adding Links</h2>
<p>From the File Menu, select your project. Now in project view hover over ‘EXTERNAL LINKS’. Observe the [EDIT] option and click.</p>

<p>Click inside the text exit window below ## EXTERNAL LINKS - edit, enter your password, and click Apply changesor, Go Back to cancel.</p>

<h2>Applying Changes</h2>
<p></p>

<hr>

<h2>Creating New Projects</h2>
<p>At this time only Technical Producion Managers can create new client, year and project pages. If you need a new page setup, please contact <a href="mailto:garrett.gillas@razorfish.com?subject=Razorfish Client Preview Support Question">Support</a>.</p>





</article>
</section>
</div><!--|#content|-->

<?php include '../_includes/ssi/footer.php'; ?>
</body></html>