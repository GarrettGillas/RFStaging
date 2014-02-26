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
//-- Directory Navigation with SCANDIR
//-- 
//-- optional placemenet
$exclude_list_ACC = array(".", "..","_services","_includes",".git");
if (isset($_GET_ACC["dir_ACC"])) {
  $dir_path_ACC = $_SERVER["DOCUMENT_ROOT"]."/".$_GET_ACC["dir_ACC"];
}
else {
  $dir_path_ACC = $_SERVER["DOCUMENT_ROOT"]."/";
}
//-- until here
function dir_nav_ACC() {
  global $exclude_list_ACC, $dir_path_ACC;
  $directories_ACC = array_diff(scandir($dir_path_ACC), $exclude_list_ACC);

  foreach($directories_ACC as $entry_ACC) {
    if(is_dir($dir_path_ACC.$entry_ACC)) {
      echo "<h2><a href='".$_GET_ACC["dir_ACC"].$entry_ACC."/"."'>".$entry_ACC."</a></h2>\n";
    }
  }

  //-- separator
  foreach($directories_ACC as $entry_ACC) {
    if(is_file($dir_path_ACC.$entry_ACC)) {
      echo "<p><a href='".$_GET_ACC["dir_ACC"].$entry_ACC."'>".$entry_ACC."</a></p>\n";
    }
  }
}
dir_nav_ACC();
//-- optional placement 

if (isset($_GET["file"])) {
  echo "<div style='margin:1em;border:1px solid Silver;'>";
  highlight_file($dir_path_ACC.$_GET['file']);
  echo "</div>";
}
?>




<br><br><br><br><br><br><br><br>
<ul><a href="">2014</a>

<li><a href="">Windows OLA</a></li>
<li><a href="">Windows Interim Lorem Ipsum Dolor</a></li>
<li><a href="">other project 3</a></li>
<li><a href="">Other Project 4</a></li>
<li><a href="">Other Project 5</a></li>
<li><a href="">other project 6</a></li>
<li><a href="">Alonther long one as well too also WWWWWWWWWWWWWWWWWW</a></li>
<li><a href="">Other Project 7</a></li>

</ul>

<ul><a href="">2013</a>

<li><a href="">Other Project 1</a></li>
<li><a href="">Other Project 2</a></li>
<li><a href="">Other Project 3</a></li>
<li><a href="">Other Project 4</a></li>
<li><a href="">Other Project 5</a></li>
</ul>

<ul><a href="">2012</a>

<li><a href="">Other Project 1</a></li>
<li><a href="">Other Project 2</a></li>
<li><a href="">Other Project 3</a></li>
</ul>

<ul><a href="">2011</a>

<li><a href="">Other Project 1</a></li>
<li><a href="">Other Project 2</a></li>
<li><a href="">Other Project 3</a></li>
<li><a href="">Other Project 4</a></li>
</ul>

<ul><a href="">2010</a>

<li><a href="">Other Project 1</a></li>
</ul>

<ul><a href="">2009</a></ul>
<ul><a href="">2008</a></ul>



</div><!--|.asidewrap|-->
</aside>
