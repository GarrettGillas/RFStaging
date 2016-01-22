<?php
include '../_includes/ssi/siteconfig.php';
include '../_includes/ssi/checkauth.php';
if($_SESSION['is_admin'] == false) echo "<script>window.location = '".$tld."/unavailable';</script>"; 
/*************************************************************************************************/
/* Global settings for the Razorfish Client Preview platfom.                                     */
/* These settings overwrite settings that are defined in siteconfig.php.                         */
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
<script>if(typeof window.history.pushState=='function'){window.history.pushState({},"Hide","<?php echo "http://".$_SERVER['HTTP_HOST'].strtok($_SERVER["REQUEST_URI"],'?'); ?>");}</script>
</head>


<body class="settings<?php echo $bodyclasses; ?>">
<?php include '../_includes/ssi/header.php'; ?> 

<div id="content"> 
<?php 
/* Project Info Widget  */ 
if($infowidget == "true"){ 
  include '../_includes/ssi/aside-info.php'; 
} 

/* Accordion Nav Widget */ 
if($_SESSION['is_partner'] == false && $navwidget == "true"){ 
	include '../_includes/ssi/aside-accordion.php'; 
	mkmap(".."); echo "</div><!--|.asidewrap|-->\n</aside>"; 
} 
?>

<section>
<script type="text/javascript">breadcrumbs(); window.onload = jQuery.reject;</script>

<article id="top" name="top">
<h1><?php echo $page_title2; ?></h1>

<h2>Setting up the <?php echo $brand; ?> Client Preview Platform</h2>

<p>The Razorfish Client Preview platform is a tool for Razorfish employees to use to post creative media for internal and client reviews. This page is designed
to assist in the setup of a new staging environment and is inly visible to Administrators. Here are a few things to bear in mind when setting up a new site:</p> 

<ol>
<li>Additional company logos can be added by uploading them to the folder "<code>_includes/brands/</code>" and then selected from this page.</li>
<li>Additional client logos can be added by placing them in the folder "<code>_includes/clients/</code>" and then selecting them below.</li>
<li>Any new logos will need to be transparent PNGs that are formatted in the same way as the files that come with this platform.</li>
<li>All usernames an passwords must be manually setup in the <code>setupconfig.php</code> file.</li>
</ol>

<p>The following accounts have been setup on this site. If any of the usernames below say "example", then they need to be manually by an administrator. 
If you need further assistance, contact 
<a href="mailto:garrett.gillas@razorfish.com?subject=<?php echo $brand; ?> Client Preview Support Question - <?php echo $tld; ?>">Support</a>.</p>

<p>Admin Username: <code><?php echo $adminAccount; ?></code><br>
Client Username: <code><?php echo $clientAccount; ?></code><br>
Partner Username: <code><?php echo $partnerAccount; ?></code></p>

<hr>

<?php
// Overwrites site settings in siteconfig.php
if(isset($_GET['brand'])){
	$configfile = '../_includes/ssi/siteconfig.php';
	$oldcontents = file_get_contents($configfile);

	// Pulling url parameters from form submission
	$new_brand      = ($_GET["brand"]);
	$new_office_loc = ($_GET["office_loc"]);
	$new_add1_loc   = ($_GET["add1_loc"]);
	$new_add2_loc   = ($_GET["add2_loc"]);
	$new_add3_loc   = ($_GET["add3_loc"]);
	$new_cont_name  = ($_GET["cont_name"]);
	$new_cont_title = ($_GET["cont_title"]);
	$new_cont_phone = ($_GET["cont_phone"]);
	$new_cont_email = ($_GET["cont_email"]);
	$new_page_title = ($_GET["page_title"]);
	$new_logo       = ($_GET["logo"]);
	$new_logo2      = ($_GET["logo2"]);
	$new_bodyfont   = ($_GET["bodyfont"]);

	// Pulling widget checkbox url parameters & defining emptys 
	if (($_GET["infowidget"]) == "true") $new_infowidget = "true";
	else $new_infowidget = "false";

	if (($_GET["addyearwidget"]) == "true") $new_addyearwidget = "true";
	else $new_addyearwidget = "false";

	if (($_GET["navwidget"]) == "true") $new_navwidget = "true";
	else $new_navwidget = "false";

	if (($_GET["addprojectwidget"]) == "true") $new_addprojectwidget = "true";
	else $new_addprojectwidget = "false";

	if (($_GET["partnerwidget"]) == "true") $new_partnerwidget = "true";
	else $new_partnerwidget = "false";

	if (($_GET["uploaderwidget"]) == "true") $new_uploaderwidget = "true";
	else $new_uploaderwidget = "false";

	if (($_GET["guidewidget"]) == "true") $new_guidewidget = "true";
	else $new_guidewidget = "false";

	// Preparing variables in arrays to pass on to siteconfig.php
	$old_entries = array(
		'brand = "'.$brand.'"',
		'office_loc = "'.$office_loc.'"',
		'add1_loc = "'.$add1_loc.'"',
		'add2_loc = "'.$add2_loc.'"',
		'add3_loc = "'.$add3_loc.'"',
		'cont_name = "'.$cont_name.'"',
		'cont_title = "'.$cont_title.'"',
		'cont_phone = "'.$cont_phone.'"',
		'cont_email = "'.$cont_email.'"',
		'logo2 = "'.$logo2.'"',
		'page_title = "'.$page_title.'"',
		'logo = "'.$logo.'"',
		'infowidget = "'.$infowidget.'"',
		'addyearwidget = "'.$addyearwidget.'"',
		'navwidget = "'.$navwidget.'"',
		'addprojectwidget = "'.$addprojectwidget.'"',
		'partnerwidget = "'.$partnerwidget.'"',
		'uploaderwidget = "'.$uploaderwidget.'"',
		'guidewidget = "'.$guidewidget.'"',
		'bodyfont = "'.$bodyfont.'"',
		);

	$new_entries = array(
		'brand = "'.$new_brand.'"',
		'office_loc = "'.$new_office_loc.'"',
		'add1_loc = "'.$new_add1_loc.'"',
		'add2_loc = "'.$new_add2_loc.'"',
		'add3_loc = "'.$new_add3_loc.'"',
		'cont_name = "'.$new_cont_name.'"',
		'cont_title = "'.$new_cont_title.'"',
		'cont_phone = "'.$new_cont_phone.'"',
		'cont_email = "'.$new_cont_email.'"',
		'logo2 = "'.$new_logo2.'"',
		'page_title = "'.$new_page_title.'"',
		'logo = "'.$new_logo.'"',
		'infowidget = "'.$new_infowidget.'"',
		'addyearwidget = "'.$new_addyearwidget.'"',
		'navwidget = "'.$new_navwidget.'"',
		'addprojectwidget = "'.$new_addprojectwidget.'"',
		'partnerwidget = "'.$new_partnerwidget.'"',
		'uploaderwidget = "'.$new_uploaderwidget.'"',
		'guidewidget = "'.$new_guidewidget.'"',
		'bodyfont = "'.$new_bodyfont.'"',
		);

	// Pulling in array values and writing to siteconfig.php
	$all_entries = str_replace($old_entries,$new_entries,$oldcontents);	
	file_put_contents($configfile, $all_entries); 
	echo "<script>location.reload();</script>";	
}
?>

<form id="setup-form" action="?reconfig" method="get">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td class="lcol">Company Name:</td>
<td class="rcol">
<input type="text" maxlength="40" name="brand" value="<?php echo $brand; ?>">
</td></tr>

<tr><td class="lcol">Company Address:</td>
<td class="rcol"><input type="text" maxlength="40" name="office_loc" value="<?php echo $office_loc; ?>">
</td></tr>

<tr><td class="lcol"></td>
<td class="rcol">
<input type="text" maxlength="40" name="add1_loc" value="<?php echo $add1_loc; ?>"></td></tr>

<tr><td class="lcol"></td>
<td class="rcol">
<input type="text" maxlength="40" name="add2_loc" value="<?php echo $add2_loc; ?>"></td></tr>

<tr><td class="lcol"></td>
<td class="rcol">
<input type="text" maxlength="40" name="add3_loc" value="<?php echo $add3_loc; ?>"></td></tr>

<tr><td class="lcol">Account Director Name:</td>
<td class="rcol">
<input type="text" maxlength="40" name="cont_name" value="<?php echo $cont_name; ?>"></td></tr>

<tr><td class="lcol">Title:</td>
<td class="rcol">
<input type="text" maxlength="40" name="cont_title" value="<?php echo $cont_title; ?>"></td></tr>

<tr><td class="lcol">Phone:</td>
<td class="rcol">
<input type="text" maxlength="40" name="cont_phone" value="<?php echo $cont_phone; ?>"></td></tr>

<tr><td class="lcol">Email:</td>
<td class="rcol">
<input type="text" maxlength="40" name="cont_email" value="<?php echo $cont_email; ?>"></td></tr>

<tr><td class="lcol">Company Logo:</td>
<td class="rcol bgcell logosquish">
<?php
//Looks for available Publicis Comapny logos.
function mkmap_brands($dir_accord){
	
	global $exclude_list,$logo2;
    $ffs_accord = array_diff(scandir($dir_accord,1), $exclude_list);  
    
    foreach($ffs_accord as $file_accord){
        if($file_accord != '.' && $file_accord!= '..' ){
            $path_accord = $dir_accord.'/'.$file_accord;
            $path_accord2 = str_replace("../", "", $path_accord);
            
            // Displays available Publicis logos as form entries.
            echo "<input type='radio' class='brandimgs' name='logo2' value='".$path_accord2."'";
            if ($path_accord2 == $logo2) echo " checked";
            echo ">\n<img src='".$path_accord."' class='brands'>\n";
        }        
    }    
}
mkmap_brands("../_includes/brands"); 
?>
</td></tr>

<tr><td class="lcol">Client Name:</td>
<td class="rcol">
<input type="text" maxlength="40" name="page_title" value="<?php echo $page_title; ?>">
</td></tr>

<tr><td class="lcol">Client Logo:</td>
<td class="rcol bgcell imgsquish">
<?php
//Looks for available client logos.
function mkmap_clients($dir_accord){

	global $exclude_list,$logo;
	$ffs_accord = array_diff(scandir($dir_accord,1), $exclude_list);  
     
	foreach($ffs_accord as $file_accord){
		if($file_accord != '.' && $file_accord!= '..' ){
			$path_accord = $dir_accord.'/'.$file_accord;
			$path_accord2 = str_replace("../", "", $path_accord);
           
			// Displays vailable client logos as form entries.
			echo "<input type='radio' class='clientimgs' name='logo' value='".$path_accord2."'";
			if ($path_accord2 == $logo) echo " checked";
			echo ">\n<img src='".$path_accord."' class='brands'>\n";
        }        
    }    
}
mkmap_clients("../_includes/clients"); 
?>
</td></tr>

<tr><td class="lcol">Enable / Disable Widgets:</td>
<td class="rcol bgcell">
<ul class="widgetlist">
<li><input type="checkbox" name="infowidget" value="true"<?php if($infowidget == "true") echo " checked"; ?>>Project Information Widget</li> 
<li><input type="checkbox" name="addyearwidget" value="true"<?php if($addyearwidget == "true") echo " checked"; ?>>"Add New Year" Widget</li>
<li><input type="checkbox" name="navwidget" value="true"<?php if($navwidget == "true") echo " checked"; ?>>Side Navigation Widget</li>
<li><input type="checkbox" name="addprojectwidget" value="true"<?php if($addprojectwidget == "true") echo " checked"; ?>>"Add New Project" Widget</li>
<li><input type="checkbox" name="partnerwidget" value="true"<?php if($partnerwidget == "true") echo " checked"; ?>>Partner User Info Widget</li>
<li><input type="checkbox" name="uploaderwidget" value="true"<?php if($uploaderwidget == "true") echo " checked"; ?>>"File Uploader" Widget</li>
<li><input type="checkbox" name="guidewidget" value="true"<?php if($guidewidget == "true") echo " checked"; ?>>User Guide Table of Contents Widget</li>
</ul>
</td></tr>

<tr><td class="lcol">Font Used:</td>
<td class="rcol bgcell">
<ul class="widgetlist">
<li class="Helvetica"><input type="radio" name="bodyfont" value="Helvetica"<?php if($bodyfont == "Helvetica") echo " checked"; ?>> Helvetica (default)</li>
<li class="OpenSans"><input type="radio" name="bodyfont" value="OpenSans"<?php if($bodyfont == "OpenSans") echo " checked"; ?>> Open Sans</li>
<li class="Segoe"><input type="radio" name="bodyfont" value="Segoe"<?php if($bodyfont == "Segoe") echo " checked"; ?>> Segoe UI</li>
<li class="Tahoma"><input type="radio" name="bodyfont" value="Tahoma"<?php if($bodyfont == "Tahoma") echo " checked"; ?>> Tahoma</li>
<li class="Calibri"><input type="radio" name="bodyfont" value="Calibri"<?php if($bodyfont == "Calibri") echo " checked"; ?>> Calibri</li>
<li class="Lato"><input type="radio" name="bodyfont" value="Lato"<?php if($bodyfont == "Lato") echo " checked"; ?>> Lato</li>
</ul>
</td></tr>

<tr><td colspan="2"><hr></td></tr>

<tr><td class="lcol"></td>
<td class="rcol endcol">
<input type="button" name="back" value="Cancel" onclick="javascript:history.go(0)">
<input type="submit" name="submit" class='confirm-settings' value="Apply Changes">
<a href="#top"><img src="<?php echo $tld; ?>_includes/images/help_icon_grey.png" class="helplink"></a>
</td></tr>
</table>
</form>

</article>
</section>
</div><!--|#content|-->

<?php include '../_includes/ssi/footer.php'; ?>
</body></html>