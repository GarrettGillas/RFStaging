<script type="text/javascript">
/*function autoResize(id){
    var newheight;
    var newwidth;

    if(document.getElementById){
        newheight=document.getElementById(id).contentWindow.document .body.scrollHeight;
        newwidth=document.getElementById(id).contentWindow.document .body.scrollWidth;
    }
    document.getElementById(id).height= (newheight) + "px";
    document.getElementById(id).width= (newwidth) + "px";
}
*/
function newSite() {
    var sites = ['<?php echo "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]; ?>_cms/admin.php']   
    document.getElementById('iframe1').src = (sites);
}
</script>

<div class="iframe-wrapper">
<?php
// Displays "EDIT" btton to Admins only.
if($_SESSION['is_admin'] == true){
	echo "<p class='cl2'>[ <a onClick='newSite()'>edit</a> ]</p>";
}	
?>

<iframe src="<?php print "http://".$_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]; ?>_cms/index.php" width="680px" height="250px" id="iframe1" marginheight="0" frameborder="0" scrolling="no"></iframe>
</div><!--|.iframe-wrapper|-->
