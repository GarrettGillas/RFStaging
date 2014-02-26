<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<style type="text/css" media="all">@import url(<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/_includes/styles/styles.css);</style>
<head>


<body>
<?php
if(isset($_GET['delete']) && $_GET['delete'] == true) 
  { 
      unlink($path); 
      echo "<p>The file: ".$file." has been deleted. "; 
      echo "<a href=\"javascript:history.go(-1)\">Continue</a>.</p>";             
  }   
?>
</body></head>