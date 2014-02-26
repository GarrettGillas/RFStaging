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
    $exclude_list_scan_accord = array(".", "..","_services","_includes","README.md","robots.txt",".git",".DS_Store",".htaccess","index.php","_cms","uploads");
    $ffs_accord = array_diff(scandir($dir_accord), $exclude_list_scan_accord);
    
    foreach($ffs_accord as $file_accord){
    	echo "\n<ul>";
        if($file_accord != '.' && $file_accord!= '..' ){

            $path_accord=$dir_accord.'/'.$file_accord;
             echo "<li><a href='".$path_accord."'>$file_accord</a></li>";           

            if(is_dir($dir_accord.'/'.$file_accord)) mkmap($dir_accord.'/'.$file_accord);
            echo "</ul>\n";
        }
        
    }
    
}
?>
