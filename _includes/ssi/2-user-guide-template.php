<?php
include '../_includes/ssi/siteconfig.php';
include '../_includes/ssi/checkauth.php';
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $page_title2; ?></title>
<link rel="shortcut icon" href="<?php echo $tld; ?>_includes/images/favicon.ico" type="image/x-icon">
<style type="text/css" media="all">@import url(<?php echo $tld; ?>_includes/styles/styles.css);</style>
<script type="text/javascript" src="<?php echo $tld; ?>_includes/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $tld; ?>_includes/js/rzf.extranet.projectcontent.js"></script>
</head>


<body class="guide <?php if($_SESSION['is_admin'] == false){echo "clientlogin";} ?>">
<?php include '../_includes/ssi/header.php'; ?> 

<div id="content"> 
<?php /* Project Info Widget  */ #include '../_includes/ssi/aside-info.php'; ?>
<?php /* Accordion Nav Widget */ include '../_includes/ssi/aside-accordion.php'; mkmap(".."); echo "</div><!--|.asidewrap|-->\n</aside>"; ?>

<section>
<script type="text/javascript">breadcrumbs(); window.onload = jQuery.reject;</script>

<article>
<h1><?php echo $page_title2; ?></h1>

<h2>Using the Client Preview Platform</h2>
<p>The Razorfish Client Preview Platform is a tool for Razorfish employees to use to post creative media for internal and client reviews. It has been purpose built to be fast and flexible so that teams can review and revise media across global offices at a an extremly fast pace. By posting all files directly in the browser, and being able to modify them there as well, we can avoid the use of FTP and other slow file transfer systems.</p>

<h2>Uploading Files</h2>
<p>To upload files to project pages, simply drag one or more files into the upload box on left hand side of the page as pictured below. The following files can be uploaded and viewed using the browser based uploader tool. One they are uploaded, they will be sorted into the 3 categories listed below.</p> 
<br>
<p>Note that for Banners and Images, the filename must have it's dimensions (example: <code><strong>banner-300x250.swf</strong></code>) to be viewed inline on the staging page like the example below. Documents will always be download or open in a new tab.</p>


<table border="0" cellpadding="0" cellspacing="0" class="guidetable">
<tbody>
<tr>
<td>	
<p><strong>Banners</strong></p>
<p>.SWF,  .HTML, .HTM</p>
</td>
<td rowspan="3" valign="top">
<p><strong>Dependancy files that can be uploaded but will not be viewable:</strong></p>
<!--<p>(Folders)</p>-->
<p>.FLV, .AS, .XML, .JSON</p>
<p>.EOT, .TTF, .OTF, .WOFF, .SVG</p>
<p>.JS, .ICO, .PHP</p>
<p>.TXT, .RTF</p>
<p>.MP4, .OGV, .WEBM, .M4V</p>	
</td>
</tr>

<tr><td>
<p><strong>Images</strong></p>
<p>.GIF, .JPG, .JPEG, .PNG</p>	
</td></tr>

<tr><td>
<p><strong>Documents</strong></p>
<p>.PDF, .PPT, .PPTX, .DOCX, .DOC, .XLSX, .XLS</p>	
</td></tr>
</tbody>
</table>

<img src="<?php echo "http://".$_SERVER['HTTP_HOST'] ?>/_includes/images/user-thumbs1.png" class="guide-thumbs">
<p class="guide-labels"><span class="g-a1">Upload</span><span class="g-a2">View</span><span class="g-a3">Delete</span></p>

<h2>Viewing Files</h2>
<p>To view files that have been uploaded, select a project name from the File Menu on the left if you are not on a project page already. Observe the file categories (Banners, Images and Documents). Click on a file that you wish to view and it will appear inline on the page.</p>

<h2>Deleting Files</h2>
<p>When you are done viewing a file. Move the mouse over the file's name again. The [delete] option will appear on the right hand side of the page if you are a razorfish employee. Click the [delete] button to remove the file. This option is disabled for non-Razorfish employees.</p>

<hr>

<h2>Adding Titles</h2>
<p>To add additional titles to the bottom section of a project page, hover the mouse over EXTERNAL LINKS and select [edit]. To add a new title use the following markup (ex ##NEW TITLE). Enter your login password and click the Apply Changes button. Note that this feature is only available to logged in Razorfish employees.</p>

<h2>Adding Links</h2>
<p>In the same manner as listed above hover the mouse over the section labeled EXTERNAL LINKS and select [edit]. The correct markup for links is [<code><strong>Link Name</strong></code>](<code><strong>http://example.com/</strong></code>). All links created this way will open in a new tab or window by default.</p>

<h2>Applying Changes</h2>
<p>Note, to save your new edits to the page you’ll need to enter your password and click Apply Changes to save your work. Clicking Cancel will unto any changes that have been made to the page.</p>

<img src="<?php echo "http://".$_SERVER['HTTP_HOST'] ?>/_includes/images/user-thumbs2.png" class="guide-thumbs">
<p class="guide-labels"><span class="g-a1">Add Titles</span><span class="g-a2">Add Links</span><span class="g-a3">Apply Changes</span></p>




</article>
</section>
</div><!--|#content|-->

<?php include '../_includes/ssi/footer.php'; ?>
</body></html>