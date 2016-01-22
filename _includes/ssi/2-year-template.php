<?php
include '../_includes/ssi/siteconfig.php';
include '../_includes/ssi/checkauth.php';
if($_SESSION['is_partner'] !== false) echo "<script>window.location = '".$tld."/unavailable';</script>"; 
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
<script>if(typeof window.history.pushState=='function'){window.history.pushState({},"Hide","<?php echo "http://".$_SERVER['HTTP_HOST'].strtok($_SERVER["REQUEST_URI"],'?'); ?>");}</script>
</head>


<body class="year<?php echo $bodyclasses; ?>">
<?php include '../_includes/ssi/header.php'; ?>

<div id="content">
<?php 
/* Project Info Widget  */ 
if($_SESSION['is_admin'] == false && $infowidget == "true"){ 
  include '../_includes/ssi/aside-info.php'; 
} 

/* Add Project Widget   */    
if($_SESSION['is_admin'] == true && $addprojectwidget == "true"){ 
  $_SESSION['edit_redirect'] = curPageURL(); 
  include '../_includes/ssi/add-project.php';
}

/* Accordion Nav Widget */ 
if($navwidget == "true"){ 
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
  global $exclude_list, $dir_path, $tld;

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
          // Show nothing for non-admins
        }

        elseif (strpos($file_entry,'internal') !== false) {

            // Makes Project Public
            if(isset($_GET['tpublic'.$extravar])){
              $foldvar1 = $entry;
              $foldvar2 = str_replace("-internal", "", $foldvar1);
              rename($foldvar1,$foldvar2); 
              echo "<script>location.reload();</script>";
            }

            // Deletes Project/Folder             
            if(isset($_GET['tdelete'.$extravar])){
              system("rmdir ".escapeshellarg($entry) . " /s /q");  // Deletes Project on Windows Servers
              exec ('rm -rf '.$entry);                             // Deletes Project on Linux Servers
              echo "<script>location.reload();</script>";
            }

            // Renames Project/Folder
            if(isset($_GET['trename'.$extravar])){
              $paramurl  = ($_GET['trename'.$extravar]);
              $paramurl2 = str_replace(" ", "-", $paramurl);
              $paramurl2 = str_replace("_", "-", $paramurl2);
              $paramurl2 = str_replace("%20", "-", $paramurl2);
              $paramurl2 = preg_replace('#[^\w()/\-]#',"",$paramurl2);
              $paramurl2 = str_replace("----", "-", $paramurl2);
              $paramurl2 = str_replace("---", "-", $paramurl2);
              $paramurl2 = str_replace("--", "-", $paramurl2);

              rename($entry,$paramurl2);
              echo "<script>location.reload();</script>";
            }  

            // Output Admin Controls
            echo "<span class='edit-del'>&#91;\n"; 
            echo "<a class='confirm-ren".$extravar."'>Rename</a> - \n";
            echo "<a href='?tdelete".$extravar."=' class='confirm-del'>Delete</a> - \n";
            echo "<a href='?tpublic".$extravar."=' class='confirm-pub'>Make Public</a> \n"; 
            echo "&#93;</span>\n"; 

            // "Rename Project" Ajax Form
            echo "<form class='new-project".$extravar." inline-project' method='get'> \n";
            echo "<p>Enter a new name for the project (".$entry.") in the field below. Project names may contain letters, parentheses and dashes but may not have spaces or other special characters.</p> \n";
            echo "<input type='text' name='trename".$extravar."' id='trename".$extravar."' maxlength='50' onclick=\"this.value='';\" onfocus='this.select()' onblur=\"this.value=!this.value?'Example':this.value;\" value='Example'><br> \n";
            echo "<input type='submit' value='rename project'>";
            echo "<input type='button' value='cancel' id='hidr".$extravar."'> \n";
            echo "<a href='".$tld."user-guide/#ddmp'><img src='".$tld."_includes/images/help_icon_grey.png' class='helplink'></a>";
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
              system("rmdir ".escapeshellarg($entry) . " /s /q");  // Deletes Project on Windows Servers
              exec ('rm -rf '.$entry);                             // Deletes Project on Linux Servers
              echo "<script>location.reload();</script>";
            }

            // Renames Project/Folder
            if(isset($_GET['trename'.$extravar])){
              
              $paramurl  = ($_GET['trename'.$extravar]);
              $paramurl2 = str_replace(" ", "-", $paramurl);
              $paramurl2 = str_replace("_", "-", $paramurl2);
              $paramurl2 = str_replace("%20", "-", $paramurl2);
              $paramurl2 = preg_replace('#[^\w()/\-]#',"",$paramurl2);
              $paramurl2 = str_replace("----", "-", $paramurl2);
              $paramurl2 = str_replace("---", "-", $paramurl2);
              $paramurl2 = str_replace("--", "-", $paramurl2);

              rename($entry,$paramurl2);
              echo "<script>location.reload();</script>";
            }  

            // Output Admin Controls
            echo "<span class='edit-del'>&#91;\n"; 
            echo "<a class='confirm-ren".$extravar."'>Rename</a> - \n";
            echo "<a href='?tdelete".$extravar."=' class='confirm-del'>Delete</a> - \n";
            echo "<a href='?tprivate".$extravar."=' class='confirm-priv'>Make Private</a>\n"; 
            echo "&#93;</span>\n"; 

            // "Rename Project" Ajax Form
            echo "<form class='new-project".$extravar." inline-project' method='get'> \n";
            echo "<p>Enter a new name for the project (".$entry.") in the field below. Project names may contain letters, parentheses and dashes but may not have spaces or other special characters.</p> \n";
            echo "<input type='text' name='trename".$extravar."' id='trename".$extravar."' maxlength='50' onclick=\"this.value='';\" onfocus='this.select()' onblur=\"this.value=!this.value?'Example':this.value;\" value='Example'><br> \n";
            echo "<input type='submit' value='rename project'>";
            echo "<input type='button' value='cancel' id='hidr".$extravar."'> \n";
            echo "<a href='".$tld."user-guide/#ddmp'><img src='".$tld."_includes/images/help_icon_grey.png' class='helplink'></a>";
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