<?php
include '../_includes/ssi/siteconfig.php';
include '../_includes/ssi/checkauth.php';
if($_SESSION['is_partner'] !== false){ header( "Location: ".$tld."/unavailable" ); } 
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $page_title . " - " . $page_title2; ?> | Razorfish Client Preview</title>
<link rel="shortcut icon" href="<?php echo $tld; ?>_includes/images/favicon.ico" type="image/x-icon">
<style type="text/css" media="all">@import url(<?php echo $tld; ?>_includes/styles/styles.css);</style>
<script type="text/javascript" src="<?php echo $tld; ?>_includes/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $tld; ?>_includes/js/rzf.extranet.projectcontent.js"></script>
<script>if(typeof window.history.pushState == 'function') { window.history.pushState({}, "Hide", "<?php echo "http://".$_SERVER['HTTP_HOST'] . strtok($_SERVER["REQUEST_URI"],'?'); ?>"); }</script>
</head>


<body class="year<?php echo $bodyclasses; ?>">
<?php include '../_includes/ssi/header.php'; ?>

<div id="content">

<?php 
/* Project Info Widget  */ 
if($_SESSION['is_admin'] == false && $infowidget == "yes"){ 
  include '../_includes/ssi/aside-info.php'; 
} 

/* Add Project Widget   */ 
if($_SESSION['is_admin'] == true && $addprojectwidget == "yes"){ 
  $_SESSION['edit_redirect'] = curPageURL(); 
  include '../_includes/ssi/add-project.php';
} 

/* Accordion Nav Widget */ 
if($navwidget == "yes"){ 
  include '../_includes/ssi/aside-accordion.php'; 
  mkmap(".."); 
  echo "</div><!--|.asidewrap|-->\n</aside>"; 
}
?>

<section>
<script type="text/javascript">breadcrumbs(); window.onload = jQuery.reject;</script>

<article>
<h1><?php echo $page_title2; ?></h1>

<?php
$dir_path = $_SERVER["DOCUMENT_ROOT"] . strtok($_SERVER["REQUEST_URI"],'?');

/* Directory Navigation with SCANDIR */
function dir_nav() {
  global $exclude_list, $dir_path;

    $directories = array_diff(scandir($dir_path), $exclude_list);
    natcasesort($directories);
    $extravar = "";

  foreach($directories as $entry) {
  // Cleaning up the strings and look for the word "internal".
  $file_entry = str_replace("-", " ", $entry);
  $file_entry = str_replace("_", " ", $file_entry);
  $foldertoggle = strstr($file_entry, ' internal');
  $extravar .= "1"; 

    if(is_dir($dir_path.$entry)) {
      echo "<p class='pro-name".$foldertoggle."'>\n<a href='http://".$_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"].$entry."/"."'>".$file_entry."</a>\n";
        
        // Outputs [public]/[private] toggle for admin users only. 
        if($_SESSION['is_admin'] == false){ 
          //show nothing
        }

        elseif (strpos($file_entry,'internal') !== false) {

            // Make ProjectPublic
            if(isset($_GET['tpublic'.$extravar])){
              $foldvar1 = $entry;
              $foldvar2 = str_replace("-internal", "", $foldvar1);
              rename($foldvar1,$foldvar2); 
              echo "<script>location.reload();</script>";
            }

            // Deletes Project/Folder             
            if(isset($_GET['tdelete'.$extravar])){
              system("rmdir ".escapeshellarg($entry) . " /s /q"); //Delete for Windows
              //exec ('rm -rf '.$entry); //Delete for Linux 
              echo "<script>location.reload();</script>";
            }

            // Duplicates & Renames Project/Folder
            if(isset($_GET['trename'.$extravar])){
              $fname = str_replace(" ", "-", $fname);
              copy($entry,$fname); 
              echo "<script>location.reload();</script>";
            }

            // Output Admin Controls
            echo "<span class='edit-del'>&#91;\n"; 
            echo "<a class='confirm-ren".$extravar."'>Duplicate</a> - \n";
            echo "<a href='?tdelete".$extravar."=' class='confirm-del'>Delete</a> - \n";
            echo "<a href='?tpublic".$extravar."=' class='confirm-pub'>Make Public</a> \n"; 
            echo "&#93;</span>\n"; 

            // "Duplicate Project" Ajax Form
            echo "<form class='new-project".$extravar." inline-project' action='?trename=" . $_GET['fname']. "' method='get'> \n";
            echo "<p>Enter a name for the new copy of project (<strong>".$entry."</strong>) that you would like to create in the field below. Project names may contain letters and dashes but may not have spaces or special characters.</p> \n";
            echo "<input type='text' name='fname' id='fname' maxlength='50' onclick=\"this.value='';\" onfocus='this.select()' onblur=\"this.value=!this.value?'New-Name':this.value;\" value='New-Name'><br> \n";
            echo "<input type='submit' value='rename project'>";
            echo "<input type='submit' value='cancel' id='hidr".$extravar."'> \n";
            echo "</form> \n";

            echo "<script>$( 'a.confirm-ren".$extravar."' ).click(function() { $( 'form.new-project".$extravar."' ).show( 'fast' ); }); "; 
            echo "$( '#hidr".$extravar."' ).click(function() { $( 'form.new-project".$extravar."' ).hide( 1000 );});</script> \n";
        }

        else {

            // Makes Project Private
            if(isset($_GET['tprivate'.$extravar])){
              $foldvar1 = $entry;
              $foldvar2 = $entry . "-internal";
              rename($foldvar1,$foldvar2); 
              echo "<script>location.reload();</script>";
            }

            // Deletes Project/Folder             
            if(isset($_GET['tdelete'.$extravar])){
              system("rmdir ".escapeshellarg($entry) . " /s /q"); //Delete for Windows
              //exec ('rm -rf '.$entry); //Delete for Linux 
              echo "<script>location.reload();</script>";
            }

            // Duplicates & Renames Project/Folder
            if(isset($_GET['trename'.$extravar])){
              $fname = str_replace(" ", "-", $fname);
              copy($entry,$fname); 
              echo "<script>location.reload();</script>";
            }

            // Output Admin Controls
            echo "<span class='edit-del'>&#91;\n"; 
            echo "<a class='confirm-ren".$extravar."'>Duplicate</a> - \n";
            echo "<a href='?tdelete".$extravar."=' class='confirm-del'>Delete</a> - \n";
            echo "<a href='?tprivate".$extravar."=' class='confirm-priv'>Make Private</a>\n"; 
            echo "&#93;</span>\n"; 

            // "Duplicate Project" Ajax Form
            echo "<form class='new-project".$extravar." inline-project' action='?trename=" . $_GET['fname']. "' method='get'> \n";
            echo "<p>Enter a name for the new copy of project (<strong>".$entry."</strong>) that you would like to create in the field below. Project names may contain letters and dashes but may not have spaces or special characters.</p> \n";
            echo "<input type='text' name='fname' id='fname' maxlength='50' onclick=\"this.value='';\" onfocus='this.select()' onblur=\"this.value=!this.value?'New-Name':this.value;\" value='New-Name'><br> \n";
            echo "<input type='submit' value='duplicate project'>";
            echo "<input type='submit' value='cancel' id='hidr".$extravar."'> \n";
            echo "</form> \n";

            echo "<script>$( 'a.confirm-ren".$extravar."' ).click(function() { $( 'form.new-project".$extravar."' ).show( 'fast' ); }); "; 
            echo "$( '#hidr".$extravar."' ).click(function() { $( 'form.new-project".$extravar."' ).hide( 1000 );});</script> \n";

        }
      echo "</p>\n\n";
    }
  }
}
dir_nav();
?>

</article>
</section>
</div><!--|#content|-->

<?php include '../_includes/ssi/footer.php'; ?>
</body></html>