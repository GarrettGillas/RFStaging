<aside class="add-year">
<h3>Add Year</h3>
<div class="asidewrap">

<form class="new-project" action="?tcreate=<?php echo $_GET['fname'];?>" method="get">
<label>Enter the project year that you would like to create in the field below.</label>
<input type="text" name="fname" id="fname" maxlength="4" onclick="this.value='';" onfocus="this.select()" onblur="yearValidation(this.value,event);" value="20XX" onkeypress="yearValidation(this.value,event);"><br>
<input type="submit" value="create" style="float:none;">
<a href="<?php echo $tld; ?>user-guide/#addyear" target="_blank"><img src="<?php echo $tld; ?>_includes/images/help_icon_grey.png" class="helplink"></a>
</form>

<?php
/* Copies Year Template and Creates/Names New Folder in the Root Directory */
$paramurl = ($_GET['fname']);

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

copydir("_includes/Example-Year",$paramurl);
echo "<script>location.reload();</script>";
}  
?>
</div><!--|.asidewrap|-->
</aside><!--|.add-year|-->
