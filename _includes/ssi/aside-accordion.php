<aside class="accordion">
<h3>File Menu</h3>
<div class="asidewrap scroll-pane">

<!-- the jScrollPane script -->
<script type="text/javascript" src="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/_includes/js/jquery.jscrollpane.min.js"></script>
 
<script>
$(function()
{
	$('.scroll-pane').jScrollPane();
});
</script>

<?php
function mkmap($dir_accord){

$exclude_list = array(
    ".", 
    "..",
    ".git",
    ".DS_Store", 
    ".htaccess",
    "_services",
    "_includes",
    "_cms",
    "uploads",
    "login",
    "User-Guide",
    "robots.txt",
    "index.php",
    "login.php",
    "README.md");

    $ffs_accord = array_diff(scandir($dir_accord), $exclude_list);    
    foreach($ffs_accord as $file_accord){
    	echo "\n<ul>";
        if($file_accord != '.' && $file_accord!= '..' ){

            $file_accord2 = str_replace("-", " ", $file_accord);
            $file_accord2 = str_replace("_", " ", $file_accord2);

            $path_accord=$dir_accord.'/'.$file_accord;
             echo "<li><a href='".$path_accord."'>$file_accord2</a></li>";           

            if(is_dir($dir_accord.'/'.$file_accord)) mkmap($dir_accord.'/'.$file_accord);
            echo "</ul>\n";
        }
        
    }
    
}
?>
