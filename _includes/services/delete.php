<?php
$result["success"] = false;
header('Content-Type: application/json');
$result['filepath'] = urldecode($_POST['filePath']);

if($_POST['delete'] == true && isset($_POST['fileToDelete']) && isset($_POST['filePath'])) 
{
	$path = realpath(urldecode($_POST['filePath']));
	$ds = DIRECTORY_SEPARATOR;
	$file = $path . $ds . basename($_POST['fileToDelete']);
	$fileDeleted = unlink($file);
	$result['exists'] = file_exists($file);
	$result["success"] = $fileDeleted;	
}

$output = json_encode($result);
echo $output;
?>
