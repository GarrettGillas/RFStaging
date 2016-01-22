<?php
include '../../../_includes/ssi/siteconfig.php';

/*************************************************************************************************/
/* Password defined here (moved to siteconfig.php).                                              */
/*************************************************************************************************/

$pass = $userinfo[$adminAccount];

require_once "includes/markdown.php";

// Stores the contents of the page
$contents = NULL;

// Don't change the password here, used for testing if you are using the default password.
if(strcmp($pass,"CHANGE_THIS_PASSWORD") == 0) {?>
	Change default password in admin.php. Look for variable '$pass'.
<?php
	return;
}

$fn = "includes/page.txt"; 
$backup_folder = './backup';
$error_msg = '';

$home_page = "http://" . $_SERVER['HTTP_HOST'] . rtrim(dirname($_SERVER['PHP_SELF']), '/\\') . "/";

// If the user wants to go back to dopple page, without applying changes
if(isset($_POST['back'])) {
	header ("location: " . $home_page);
	return;
}

// The user wants to see a list of backups
if(isset($_POST['backups'])) {
	header ("location: " . $home_page . "backups.php");
	return;
}

// If user wants to add addition
if(isset($_POST['addition'])) {

	// Check password
	if(strcmp($_POST['pass'],$pass) == 0) {
	
		// If magic quotes is enabled, strip slashes
		$addition;
		if (get_magic_quotes_gpc()) {
			$addition = stripslashes($_POST['addition']);
		}
		else {
			$addition = $_POST['addition'];
		}

		// Make a backup of the old version
		// Check to see if the backup folder exists
		if(!file_exists($backup_folder))
		{
			mkdir($backup_folder);
		}
		copy($fn, "backup/".date("Y-m-d_H-i-s").".txt");
	
		// Write the change
		$file = fopen($fn, "w");
		fwrite($file, $addition);
		fclose($file);

		// Generate the static page
        $file = fopen('index.php', 'w');
        $header = file_get_contents('includes/header.html');
        $footer = file_get_contents('includes/footer.html');
	    $markdown = Markdown(file_get_contents($fn));
        fwrite($file, $header);
        fwrite($file, $markdown);
        fwrite($file, $footer);
        fclose($file);
	
		header ("location: " . $home_page);
		return;
		} 
		else {
		// Bad password
		$error_msg = "<span class='wrong-pw'>Incorrect password.</span>";
        if (get_magic_quotes_gpc()) {
			$contents = stripslashes($_POST['addition']);
		}
		else {
			$contents = $_POST['addition'];
		}
	}
}

if($contents == NULL) {
    $contents = file_get_contents($fn); 
}
?>

<?php include '../../../_includes/ssi/siteconfig.php'; ?>
<?php include '../../../_includes/ssi/siteconfig.php'; ?>
<!DOCTYPE html>
<html>
<head>
<meta charset=utf-8 />
<title></title>
<style type="text/css" media="all">@import url(<?php echo $tld; ?>_includes/styles/styles.css);</style>
<script type="text/javascript" src="<?php echo $tld; ?>_includes/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $tld; ?>_includes/js/jquery.textarea.js"></script>
<script type="text/javascript">
jQuery(document).ready(function () {
	$("textarea").tabby();
}); 
</script>
</head>


<body onload="resizeTextArea()" onresize="resizeTextArea()" class="iframe">
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" id="form1">
<input type="hidden" name="pass" class="cms-pass" value="<?php echo $pass; ?>">
<textarea id="area" name="addition"><?=$contents?></textarea>
<div id="form-right">
<input type="submit" name="submit" value="Apply Changes">
<input type="submit" name="back" value="Cancel">
<a href="<?php echo $tld; ?>user-guide/#cms" target="_blank"><img src="<?php echo $tld; ?>_includes/images/help_icon.png" class="helplink"></a>
</div><!--|#form-right|-->
</form>

</body></html>