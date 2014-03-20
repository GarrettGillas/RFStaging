<aside class="add-project">
<h3>Add Project</h3>
<div class="asidewrap">

<form class="new-project" action="?tcreate=<?php echo $_GET['fname'];?>" method="get">
<label>Enter a name for the project that you would like to create in the field below. Project names may contain letters and dashes but may not have spaces or special characters.</label>
<input type="text" name="fname" id="fname" maxlength="50" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'Example-Project':this.value;" value="Example-Project"><br>
<input type="submit" value="create">
</form>

<?php
/* Copies Template File and Creates/Names New Folder in Current Year Folder */
$paramurl = ($_GET['fname']);
$paramurl2 = str_replace(" ", "-", $paramurl);
 

if(isset($_GET['fname'])){
  function copydir($source,$destination)
  {
    if(!is_dir($destination)){
      $oldumask = umask(0); 
      mkdir($destination, 01777);
      umask($oldumask);
    }

    $dir_handle = @opendir($source) or die("Unable to open");   
    while ($file = readdir($dir_handle)) 
    {
      if($file!="." && $file!=".." && !is_dir("$source/$file")) 
        copy("$source/$file","$destination/$file");

      if($file!="." && $file!=".." && is_dir("$source/$file")) 
        copydir("$source/$file","$destination/$file");
    }
    closedir($dir_handle);
  }

copydir("../_includes/Example-Year/Example-Project",$paramurl2);
echo "<script>location.reload();</script>";
}  
?>

</div><!--|.asidewrap|-->
</aside><!--|.add-project|-->
