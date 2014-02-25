<?php
$the_dir_list = array();
$the_dir_list = getDirectories($orgin_path);

function getFilesInDir($dir = '.'){
	$the_file_list = array();
	if($dir == '.'){
		$path = '.';
	}else{
		$path = './'.$dir;
	}
	//debug(is_dir($path));
	if(is_dir($path)) {
		if ($handle = opendir($path)) {
			while (false !== ($file = readdir($handle))){
				//if(is_file($file)){
					if(checkFile($file)){
						$the_file_list[] = $file;
					}
				//}
			}
			closedir($handle);
		}
	}
	
	//debug($the_file_list);
	if(!empty($the_file_list)){
		return $the_file_list;
	}else{
		return array();
	}
}

function getDirectories($dir = '.'){
	$the_dir_list = array();
	if($dir != '.'){
		$path = '.';
	}else{
		$path = './'.$dir;
	}
	if ($handle = opendir($path)) {
		while (false !== ($file = readdir($handle))){
			if(is_dir($file)){
				if(checkDir($file)){
					$the_dir_list[] = $file;
				}
			}
		}
		closedir($handle);
	}
	if(!empty($the_dir_list)){
		return $the_dir_list;
	}else{
		return array();
	}
}

function checkFile($file){
	$fileCheck = $GLOBALS['directories_to_ignore'];
	$extCheck = $GLOBALS['filetypes_to_ignore'];
	$error = array();
	foreach ($fileCheck as $check){
		if($file == $check){
			$error[] = $check;
		}
	}
	foreach ($extCheck as $check){
		if(getFileExtension($file) == $check){
			$error[] = $check;
		}
	}
	if(empty($error)){
		return true;
	}else{
		return false;
	}
}

function checkDir($file){
	$fileCheck = $GLOBALS['directories_to_ignore'];
	$error = array();
	foreach ($fileCheck as $check){
		if($file == $check){
			$error[] = $check;
		}
	}
	if(empty($error)){
		return true;
	}else{
		return false;
	}
}

function getFileExtension($filename){
	$ext = pathinfo($filename, PATHINFO_EXTENSION);
	return $ext;
}

function debug($str){
	echo "<pre>";
	print_r($str);
	echo "</pre>";
}
?>
