<?php
$ds          = DIRECTORY_SEPARATOR;   
$storeFolder = 'uploads';   
// $file = 'uploadlog.txt';//dirname( __FILE__ ).$ds.basename('uploadlog.txt');
// file_put_contents(urldecode($_POST['contentUploadPath']).$ds.$file, urldecode($_POST['contentUploadPath']).$ds.PHP_EOL, FILE_APPEND | LOCK_EX);
if (!empty($_FILES)) {
    $count=0;
    foreach ($_FILES['file']['name'] as $filename) 
    {
        $temp=$storeFolder;
        $tmp=$_FILES['file']['tmp_name'][$count];
        $count=$count + 1;
        $temp=realpath($_POST['contentUploadPath']) . $ds . basename($filename);
        // Log file stuff: 
        // file_put_contents($file, $temp.PHP_EOL, FILE_APPEND | LOCK_EX);
        move_uploaded_file($tmp,$temp);
        $temp='';
        $tmp='';
    }    
}
?> 
