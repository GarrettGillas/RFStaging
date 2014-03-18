<aside class="accordion">
<h3>File Menu</h3>
<div class="asidewrap scroll-pane" unselectable="on">
<script type="text/javascript">$(function(){ $('.scroll-pane').jScrollPane(); });</script>

<?php
function mkmap($dir_accord){

/*************************************************************************************************/
/* Accordion navigation exclusion handling, exclusions.php has separate exclusion handling.      */
/*************************************************************************************************/
$exclude_list = array(
    ".", 
    "..",
    ".git",
    ".DS_Store",
    ".htaccess",
    ".gitignore",
    "_services",
    "_includes",
    "_cms",
    "uploads",
    "media",
    "sandbox",
    "login",
    "404",
    "user-guide",
    "robots.txt",
    "PHP_errors.log",
    "index.php",
    "login.php",
    "README.md");

    $ffs_accord = array_diff(scandir($dir_accord,1), $exclude_list);  
    // Needs better sorting function. This works for now. 

    foreach($ffs_accord as $file_accord){
        echo "<ul>";
        if($file_accord != '.' && $file_accord!= '..' ){

            $file_accord2 = str_replace("-", " ", $file_accord);
            $file_accord2 = str_replace("_", " ", $file_accord2);
            $path_accord = $dir_accord.'/'.$file_accord;
            $foldertoggle = strstr($file_accord2, ' internal');

            echo "<li><a href='".$path_accord."' title='".$file_accord2."' class='reg".$foldertoggle."'>$file_accord2</a></li>";           

            if(is_dir($dir_accord.'/'.$file_accord)) mkmap($dir_accord.'/'.$file_accord);
            echo "</ul>\n";
        }        
    }    
}
?>
