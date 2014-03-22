<?php
include '../_includes/ssi/siteconfig.php';
include '../_includes/ssi/checkauth.php';
/*************************************************************************************************/
/* This page displays different content depending on account type that the user is logged in as: */
/* "Admin" (full access), "Client" (view access) or "Partner" (very limited access).             */
/*************************************************************************************************/
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $page_title2; ?> | Razorfish Client Preview</title>
<link rel="shortcut icon" href="<?php echo $tld; ?>_includes/images/favicon.ico" type="image/x-icon">
<style type="text/css" media="all">@import url(<?php echo $tld; ?>_includes/styles/styles.css);</style>
<script type="text/javascript" src="<?php echo $tld; ?>_includes/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $tld; ?>_includes/js/rzf.extranet.projectcontent.js"></script>
</head>


<body class="guide <?php if($_SESSION['is_admin'] == false){echo "clientlogin";} ?>">
<?php include '../_includes/ssi/header.php'; ?> 

<div id="content"> 
<?php /* Guide Contents       */ if($_SESSION['is_admin'] == true){ include '../_includes/ssi/aside-guide.php';} ?>
<?php /* Project Info Widget  */ #include '../_includes/ssi/aside-info.php'; ?>
<?php /* Accordion Nav Widget */ if($_SESSION['is_partner'] == false){ include '../_includes/ssi/aside-accordion.php'; mkmap(".."); echo "</div><!--|.asidewrap|-->\n</aside>"; } ?>
<?php /* Partner Login Widget */ if($_SESSION['is_partner'] == true){ include '../_includes/ssi/aside-partner.php';} ?>

<section>
<script type="text/javascript">breadcrumbs(); window.onload = jQuery.reject;</script>

<article>
<h1><?php echo $page_title2; ?></h1>


<?php if(($_SESSION['is_partner'] == true) || ($_SESSION['is_client'] == true) || ($_SESSION['is_admin'] == true)  ){ ?>

<h2>Using the Client Preview Platform</h2>

<p>The Razorfish Client Preview platform is a tool for Razorfish employees to use to post creative media for internal and client reviews. 
It has been purpose built to be scalable and flexible so that teams can review and revise media across global offices at a an extremly fast pace.</p> 

<?php } ?>
<?php if($_SESSION['is_admin'] == true){  ?>

<p>By adding projects directyly in the browser, posting media files on the page, and being able to modify them there as well, we can avoid 
the use of FTP and other slow file transfer systems. We also have the ability to link projects to third party websites such as ad servers
and rich media vendors should the need arise. Please see the instructions below for further information on how to use this platform.</p>

<p>If you are a developer and would like deploy the Razorfish Client Preview platform to another account, developer documentaion can be downloaded 
from <a href="https://razorfish.box.com/rfstaging" target="_blank">Box.com</a> (WIP).</p>

<hr> 
<span class="edit-del" id="addyear" name="addyear">[ Setting Up ]</span>

<h2>Adding Years</h2>

<p>If you are currently using a new install of the Razorfish Client Preview platfrom, the first thing that you'll need to do is add a year
to start putting projects under. After you have logged in and are on the main page, enter the project year that you would like to create 
in the field on the form on the left hand side. After hitting "create", you should see the year you have entered appear on the right hand 
side of the page.</p>

<h2 id="addproject" name="addproject">Creating New Projects</h2>

<p>Once you are on the year page and you would like to add a new project, go to the box on the left hand side of the page again. There, you will
need to enter the name of the project that you would like to create. Special characters are not allowed (aside from dashes) and avoid using 
acronyms, job codes and any other illegible jargon when naming you projects.</p>

<img src="<?php echo $tld; ?>_includes/images/user-thumbs3.png" class="guide-thumbs">
<p class="guide-labels"><span class="g-a1">Add Year</span><span class="g-a2">Add Project</span><span class="g-a3">Delete Project</span></p>

<h2>Duplicate, Delete and Make Private</h2>

<p>Once you have a project setup, you will see several controls that appear on the right hand side of the page when you mouse over it's name. 
By hitting "duplicate" you can make a copy of a project and give it a new name. By hitting "delete" you can remove a project permanently and 
will not be able to recover any of your files. By hitting "make private" you effectivly hide the project from the client and they will not have 
access to nor will they be able to see it in the navigation. You can make it viewable to the client once again by hitting "make public".</p>


<hr>
<span class="edit-del" id="upload" name="upload">[ File Handling ]</span>

<h2>Uploading Files</h2>
<p>To upload files to project pages, simply drag one or more files into the upload box on left hand side of the page as pictured below. 
The following files can be uploaded and viewed using the browser based uploader tool. One they are uploaded, they will be sorted into 
the 3 categories listed below.</p> 

<table border="0" cellpadding="0" cellspacing="0" class="guidetable">
<tbody>
<tr>
<td>	
<p><strong>Banners</strong></p>
<p>.SWF</p>
</td>
<td rowspan="3" valign="top">
<p><strong>Dependancy files that can be uploaded but will not be viewable:</strong></p>
<p>.FLV, .AS, .XML, .JSON</p>
</td>
</tr>

<tr><td>
<p><strong>Images</strong></p>
<p>.GIF, .JPG, .JPEG, .PNG</p>	
</td></tr>

<tr><td>
<p><strong>Documents</strong></p>
<p>.PDF, .PPT, .PPTX, .DOC, .DOCX, .XLS, .XLSX</p>	
</td></tr>
</tbody>
</table>
<br>

<p>Note that for Banners and Images, the filename must have it's dimensions (example: <code><strong>banner-300x250.swf</strong></code>) 
to be viewed inline on the staging page like the example below. Documents will always be download or open in a new tab.</p>

<h2>Viewing Files</h2>
<p>To view files that have been uploaded, select a project name from the File Menu on the left if you are not on a project page already. 
Observe the file categories (Banners, Images and Documents). Click on a file that you wish to view and it will appear inline on the page.</p>

<img src="<?php echo $tld; ?>_includes/images/user-thumbs1.png" class="guide-thumbs">
<p class="guide-labels"><span class="g-a1">Upload</span><span class="g-a2">View</span><span class="g-a3">Delete</span></p>

<h2>Deleting Files</h2>
<p>When you are done viewing a file. Move the mouse over the file's name again. The [delete] option will appear on the right hand side 
of the page if you are a razorfish employee. Click the [delete] button to remove the file. This option is disabled for non-Razorfish employees.</p>


<hr>
<span class="edit-del" id="cms" name="cms">[ External Content ]</span>

<h2>Adding Links</h2>
<p>In the same manner as listed above hover the mouse over the section labeled EXTERNAL LINKS and select [edit]. The correct markup 
for links is [<code><strong>Link Name</strong></code>](<code><strong>http://example.com/</strong></code>). All links created this 
way will open in a new tab or window by default.</p>

<h2>Adding Titles</h2>
<p>To add additional titles to the bottom section of a project page, hover the mouse over EXTERNAL LINKS and select [edit]. To add a 
new title use the following markup (ex ##NEW TITLE). Enter your login password and click the Apply Changes button. Note that this feature 
is only available to logged in Razorfish employees.</p>

<h2>Applying Changes</h2>
<p>Note, to save your new edits to the page you’ll need to enter your password and click Apply Changes to save your work. Clicking Cancel 
will unto any changes that have been made to the page.</p>

<img src="<?php echo $tld; ?>_includes/images/user-thumbs2.png" class="guide-thumbs">
<p class="guide-labels"><span class="g-a1">Add Titles</span><span class="g-a2">Add Links</span><span class="g-a3">Apply Changes</span></p>


<hr>
<span class="edit-del" id="other" name="other">[ Other Media ]</span>

<h2>Uploading Other Media Types</h2>

<p>While the Razorfish Client Preview platform is very quick and efficent for posting standard media types, occasionally you might need to 
post a rich media unit, landing page, or other html-based content. In these cases, the files vill need to be posted the old-fashioned way 
with FTP. However, these types of projects can still be kept alongside other medi types by uploading them to a projects media folder 
(example: <code><strong><?php echo $tld; ?>2014/example-project/media/example.html</strong></code>). If you need FTP access to this site, 
contact <a href="mailto:garrett.gillas@razorfish.com?subject=Razorfish Client Preview Support Question - <?php echo $tld; ?>">Support</a> 
or your project manager for access.</p>

<h2>Adding Links</h2>

<p>Once you have manually uploaded your files via FTP, be sure to link to them form the "External Links" section at the bottom of your 
project page as explained <a href="#cms">above</a>.</p>

<hr>
<span class="edit-del" id="viewing" name="viewing">[ Viewing Media ]</span>

<?php } ?>
<?php if(($_SESSION['is_partner'] == true) || ($_SESSION['is_client'] == true) || ($_SESSION['is_admin'] == true)  ){ ?>

<h2>Viewing Files</h2>

<p>To view files on the Razorfish Client Preview Platform, go to the project page that has the file(s) that you would like to preview. 
Then, click on the filename of the banner, image or document that you would like to view. Banners and images will display directly on the 
page while documents will either download or open in a new tab, depending on the type of file that they are.</p>

<?php } ?>
<?php if($_SESSION['is_admin'] == true){  ?>

<h2>Sharing Content with the Client</h2>

<p>To share a project with a client, simply copy the URL of the page you would like to share and send it in an email with the client's 
username and password for this site. Clients should never, under any circumstance receive the Admin login for the Razorfish Client Preview 
Platform. They can however receive and use the partner login if they wish to share an individual project page with a third party vendor or 
partner.</p>

<?php } ?>
<?php if($_SESSION['is_client'] == true){ ?>

<h2>Sharing Files with Partners</h2>

<p>To share a project with a partner, simply copy the URL of the page you would like to share and send it in an email with the partner's 
username and password for this site. Partners should never, under any circumstance receive the regular login for the Razorfish Client Preview 
Platform.</p>

<?php } ?>
<?php if($_SESSION['is_admin'] == true){  ?>

<hr>
<span class="edit-del" id="support" name="support">[ Support ]</span>

<h2>Additional Support</h2>

<p>This project is being tracked an updated on jira <a href="https://razorfish-nw.atlassian.net/browse/EXTRANET-2" target="_blank">here</a>. 
If you need FTP access to this site or for any other questions regarding this platform, contact your project manager or 
<a href="mailto:garrett.gillas@razorfish.com?subject=Razorfish Client Preview Support Question - <?php echo $tld; ?>">Garrett Gillas</a> 
at Razorfish Portland.</p>
<br>

<?php } ?>


</article>
</section>
</div><!--|#content|-->

<?php include '../_includes/ssi/footer.php'; ?>
</body></html>