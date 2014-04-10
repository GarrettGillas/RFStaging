<footer>
<p>&copy;<script>var year = new Date();document.write(year.getFullYear());</script> <?php echo $brand; ?> &nbsp|&nbsp  
<a href="mailto:garrett.gillas@razorfish.com?subject=<?php echo $brand; ?> Client Preview Support Question - <?php echo $tld; ?>">Support</a>  &nbsp|&nbsp   
<a href="<?php echo $tld."user-guide/";?>">User Guide</a><?php if($_SESSION['username']): ?> &nbsp;|&nbsp; 

<?php if($_SESSION['is_admin'] == true) { ?>
<a href="<?php echo $tld."settings/";?>">Settings</a> &nbsp;|&nbsp;
<?php ;} ?>

<a href="<?php echo $tld; ?>login/?logout=1">
<?php 
if($_SESSION['is_admin'] == true) {echo "(Admin) ";} 
if($_SESSION['is_client'] == true) {echo "<!--(Client)--> ";}
if($_SESSION['is_partner'] == true) {echo "(Partner) ";} 
?>
Logout</a><?php endif; ?></p>

<p id="copy"><?php echo $brand; ?> Client Preview - <a href="https://razorfish-nw.atlassian.net/browse/EXTRANET-2" target="_blank">Version <?php echo $cms_version; ?></a></p>
<img src="<?php echo $tld.$logo2; ?>" id="logo3">
</footer>

<?php 
/*************************************************************************************************/
/* Adds class to <body> tag for supported versions of IE                                         */
/*************************************************************************************************/
		if (strpos($_SERVER['HTTP_USER_AGENT'], 'Trident/7.0; rv:11.0') !== false) { ?>
<script>$(function(){ $('body').addClass('ie11'); });</script>
<?php } if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 10.0; Windows NT 6.2; Trident/6.0') !== false) { ?>
<script>$(function(){ $('body').addClass('ie10'); });</script>
<?php } if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 9.0; Windows NT 6.1; Trident/5.0') !== false) { ?>
<script>$(function(){ $('body').addClass('ie9'); });</script>
<?php } ?>
