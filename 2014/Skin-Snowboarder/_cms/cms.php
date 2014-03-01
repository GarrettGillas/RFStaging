<script language="JavaScript">
function autoResize(id){
    var newheight;
    var newwidth;

    if(document.getElementById){
        newheight=document.getElementById(id).contentWindow.document .body.scrollHeight;
        newwidth=document.getElementById(id).contentWindow.document .body.scrollWidth;
    }
    document.getElementById(id).height= (newheight) + "px";
    document.getElementById(id).width= (newwidth) + "px";
}

function setURL(url){
    document.getElementById('iframe1').src = url;
}
</script>

<div class="iframe-wrapper">
<p class="cl2">[ <a onclick="setURL('_cms/admin.php')">edit</a> ]</p>

<iframe src="<?php print "http://".$_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]; ?>_cms/index.php"  width="680px" height="150px" id="iframe1" marginheight="0" frameborder="0" onLoad="autoResize('iframe1');"></iframe>
</div><!--|.iframe-wrapper|-->
