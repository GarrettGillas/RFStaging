<?php include '../../../_includes/ssi/siteconfig.php'; ?>
<!DOCTYPE html>
<html>
<head>
<meta charset=utf-8 />
<title></title>
<style type="text/css" media="all">@import url(../../../_includes/styles/styles.css);</style>

<script  type="text/javascript">
function externalLinks() {
  for(var c = document.getElementsByTagName("a"), a = 0;a < c.length;a++) {
    var b = c[a];
    b.getAttribute("href") && b.hostname !== location.hostname && (b.target = "_blank")
  }
}
;
externalLinks();
</script>
</head>


<body class="iframe">
<ul>
<?php if($_SESSION['is_admin'] == true): ?><li>[ <a href="admin.php" target="_parent" class="cl2">edit</a> ]</li><?php endif; ?>
</ul>

<h2>EXTERNAL LINKS</h2>

<p><a href="http://nike.com/" target="_blank" class="cl2">Nike Fuelband</a>  </p>

<h2>Rich Media</h2>

<h2>PSDs</h2>
</body></html>