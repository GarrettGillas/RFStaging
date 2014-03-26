<?php
$ds          = DIRECTORY_SEPARATOR;   
$storeFolder = 'uploads';   

if (!empty($_FILES)) {
    $count=0;
    foreach ($_FILES['file']['name'] as $filename) 
    {
        $temp=$storeFolder;
        $tmp=$_FILES['file']['tmp_name'][$count];
        $count=$count + 1;
        $temp=realpath($_POST['contentUploadPath']) . $ds . basename($filename);
        move_uploaded_file($tmp,$temp);
        $temp='';
        $tmp='';
    }    
}
?> 
