<?php
include '../_includes/ssi/siteconfig.php';
include '../_includes/ssi/checkauth.php';
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $page_title . " - " . $page_title2; ?> | Razorfish Client Preview</title>
<link rel="shortcut icon" href="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/_includes/images/favicon.ico" type="image/x-icon">
<style type="text/css" media="all">@import url(<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/_includes/styles/styles.css);</style>
<script type="text/javascript" src="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/_includes/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/_includes/js/rzf.extranet.projectcontent.js"></script>
<script>if(typeof window.history.pushState == 'function') { window.history.pushState({}, "Hide", "<?php echo "http://".$_SERVER['HTTP_HOST'] . strtok($_SERVER["REQUEST_URI"],'?'); ?>"); }</script>
</head>


<body class="year<?php if($_SESSION['is_admin'] == false){echo " clientlogin";} ?>">
<?php include '../_includes/ssi/header.php'; ?>

<div id="content">
<?php /* Project Info Widget  */ include '../_includes/ssi/aside-info.php'; ?>
<?php /* Accordion Nav Widget */ include '../_includes/ssi/aside-accordion.php'; mkmap(".."); echo "</div><!--|.asidewrap|-->\n</aside>"; ?>

<section>
<script type="text/javascript">breadcrumbs(); window.onload = jQuery.reject;</script>

<article>
<h1><?php echo $page_title2; ?></h1>

<?php
/* Directory Navigation with SCANDIR */
error_reporting(E_ALL ^ E_NOTICE);

/* Global Exclusion Handling */
include '../_includes/ssi/exclusions.php';
$thispath = $_SERVER["DOCUMENT_ROOT"] . strtok($_SERVER["REQUEST_URI"],'?');

if (isset($_GET["dir"])) {
  $dir_path = $thispath . $_GET["dir"];
}
else {
  $dir_path = $thispath;
}

function dir_nav() {
  global $exclude_list, $dir_path;
    $directories = array_diff(scandir($dir_path), $exclude_list);

  foreach($directories as $entry) {
  // Cleaning up the strings and look for the word "internal".
  $file_entry = str_replace("-", " ", $entry);
  $file_entry = str_replace("_", " ", $file_entry);
  $foldertoggle = strstr($file_entry, ' internal');
  $extravar .= "1"; 


    if(is_dir($dir_path.$entry)) {
      echo "<p class='pro-name" . $foldertoggle . "'><a href='".$_GET["dir"].$entry."/"."'>".$file_entry."</a>\n";
        
        // Outputs [public]/[private] toggle for admin users only. 
        if($_SESSION['is_admin'] == false){ 
        }

        elseif (strpos($file_entry,'internal') !== false) {

          if(isset($_GET['tpublic'.$extravar])){
            $foldvar1 = $entry;
            $foldvar2 = str_replace("-internal", "", $foldvar1);
            rename($foldvar1,$foldvar2); 
            echo "<script>location.reload();</script>";
          }
          echo "<span class='edit-del pcolor'>&#91; <a href='?tpublic".$extravar."='>Make Public</a> &#93;</span>\n"; 
        }

        else {
          if(isset($_GET['tprivate'.$extravar])){
            $foldvar1 = $entry;
            $foldvar2 = $entry . "-internal";
            rename($foldvar1,$foldvar2); 
            echo "<script>location.reload();</script>";
          }
          echo "<span class='edit-del'>&#91; <a href='?tprivate".$extravar."='>Make Private</a> &#93;</span>\n";
          
        }
      echo "</p>\n";
    }
  }
}
dir_nav();
?>

<script>

</script>

</article>
</section>
</div><!--|#content|-->

<?php include '../_includes/ssi/footer.php'; ?>
</body></html>