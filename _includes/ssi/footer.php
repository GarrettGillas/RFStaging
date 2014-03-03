<footer>
<p>&copy; <script>var year = new Date();document.write(year.getFullYear());</script> Razorfish, LLC  &nbsp|&nbsp  
<a href="mailto:garrett.gillas@razorfish.com?subject=Razorfish Client Preview Support Question">Support</a>  &nbsp|&nbsp   
<a href="<?php echo "http://".$_SERVER['HTTP_HOST']."/user-guide/";?>">User Guide</a>
<?php if($_SESSION['username']): ?> &nbsp;|&nbsp; 
<a href="/login.php?logout=1"><?php if($_SESSION['is_admin'] == true) {echo "(Admin) ";}?>Logout</a>
<?php endif; ?></p>
<p id="copy">Razorfish Client Preview <a href="https://razorfish-nw.atlassian.net/browse/EXTRANET-2" target="_blank">Version 1.5</a></p>
<a href="http://www.razorfish.com/" target="_blank"><img src="<?php echo "http://".$_SERVER['HTTP_HOST'].$logo2; ?>" id="logo3"></a>
</footer>
