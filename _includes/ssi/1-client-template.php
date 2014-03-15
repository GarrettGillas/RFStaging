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
<script type="text/javascript" src="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/_includes/js/rzf.extranet.projectcontent.js"></script>
<script>if(typeof window.history.pushState == 'function') { window.history.pushState({}, "Hide", "<?php echo "http://".$_SERVER['HTTP_HOST'] . strtok($_SERVER["REQUEST_URI"],'?'); ?>"); }</script>
</head>


<body class="root<?php if($_SESSION['is_admin'] == false){echo " clientlogin";} ?>">
<?php include '_includes/ssi/header.php'; ?>

<div id="content">
<?php /* Project Info Widget  */ if($_SESSION['is_admin'] == false){ include '_includes/ssi/aside-info.php'; } ?>
<?php /* Add New Year Widget  */ if($_SESSION['is_admin'] == true){ $_SESSION['edit_redirect'] = curPageURL(); include '_includes/ssi/add-year.php';} ?>
<?php /* Accordion Nav Widget */ include '_includes/ssi/aside-accordion.php'; mkmap("."); echo "</div><!--|.asidewrap|-->\n</aside>"; ?>

<section>
<script type="text/javascript">breadcrumbs(); window.onload = jQuery.reject;</script>

<article>
<h1><?php echo $page_title; ?></h1>

<?php
/* Global Exclusion Handling */
include '_includes/ssi/exclusions.php';
$thispath = $_SERVER["DOCUMENT_ROOT"] . strtok($_SERVER["REQUEST_URI"],'?');

if (isset($_GET["dir"])) {
  $dir_path = $thispath . $_GET["dir"];
}
else {
  $dir_path = $thispath;
}

/* Directory Navigation with SCANDIR */
function dir_nav() {
  global $exclude_list, $dir_path;
  $directories = array_diff(scandir($dir_path,1), $exclude_list);
  $extravar = "";

  foreach($directories as $entry) {
  $file_entry = str_replace("-", " ", $entry);
  $file_entry = str_replace("_", " ", $file_entry);
  $foldertoggle = strstr($file_entry, ' internal');
  $extravar .= "1"; 

    if(is_dir($dir_path.$entry)) {
      echo "<h2><a href='http://".$_SERVER['HTTP_HOST']."/".$entry."/"."'>".$entry."</a>\n";

      	// Outputs [public]/[private] toggle for admin users only. 
        if($_SESSION['is_admin'] == false){ 
          	//Show Nothing
        }

        else{        	
         	// Deletes Year/Folder             
        	if(isset($_GET['tdelete'.$extravar])){
            	exec ('rm -rf '.$entry);
              	echo "<script>location.reload();</script>";
          	}
          	// Output Admin Controls
        	echo "<span class='edit-del'>&#91; <a href='?tdelete".$extravar."=' class='confirm-del-year'>Delete</a> &#93;</span>\n";
		}        
    }
    echo "</h2>\n";
  }
}
dir_nav();
?>

</article>
</section>
</div><!--|#content|-->

<?php include '_includes/ssi/footer.php'; ?>
</body></html>