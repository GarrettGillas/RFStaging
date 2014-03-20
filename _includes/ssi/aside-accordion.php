<aside class="accordion">
<h3>File Menu</h3>
<div class="asidewrap scroll-pane" unselectable="on">
<script type="text/javascript">$(function(){ $('.scroll-pane').jScrollPane(); });</script>

<?php
function mkmap($dir_accord){
global $exclude_list;

    $ffs_accord = array_diff(scandir($dir_accord,1), $exclude_list);  
    
    /* Displays links to year pages */ 
    foreach($ffs_accord as $file_accord){
        echo "<ul>";
        if($file_accord != '.' && $file_accord!= '..' ){
            $path_accord = $dir_accord.'/'.$file_accord;
            echo "<li><a href='".$path_accord."/' title='".$file_accord."' class='reg'>$file_accord</a></li>\n";           

            /* Displays links to project pages */ 
            if(is_dir($dir_accord.'/'.$file_accord)) {
                $dir_accord2 = ($dir_accord.'/'.$file_accord);
                $dir_accord3 = array_diff(scandir($dir_accord2), $exclude_list);
                natcasesort($dir_accord3);

                foreach($dir_accord3 as $file_accord){
                    if($file_accord != '.' && $file_accord!= '..' ){
                        $file_accord2 = str_replace("-", " ", $file_accord);
                        $file_accord2 = str_replace("_", " ", $file_accord2);
                        $foldertoggle = strstr($file_accord2, ' internal');

                        echo "<li class='sec'><a href='".$dir_accord2."/".$file_accord."/' title='".$file_accord2."' class='reg".$foldertoggle."'>$file_accord2</a></li>\n";
                    }
                }
            }

            echo "</ul>\n";
        }        
    }    
}
?>
