<?php
function ReadFolderDirectory($dir,$listDir= array())
{
    $listDir = array();
    if($handler = opendir($dir))
    {
        while (($sub = readdir($handler)) !== FALSE)
        {
            if ($sub != "." && $sub != ".." && $sub != "Thumb.db" && $sub != ".DS_Store")
            {
                if(is_file($dir."/".$sub))
                {
                    $listDir[] = $sub;
                }elseif(is_dir($dir."/".$sub))
                {
                    $listDir[$sub] = ReadFolderDirectory($dir."/".$sub); 
                } 
            } 
        }    
        closedir($handler); 
    } 
    return $listDir;    
}

// $output = json_encode(ReadFolderDirectory(urldecode(realpath($_POST['pathToContent']))));
$output = json_encode(ReadFolderDirectory(urldecode($_POST['pathToContent'])));
header('Content-Type: application/json');
echo $output;
?>
