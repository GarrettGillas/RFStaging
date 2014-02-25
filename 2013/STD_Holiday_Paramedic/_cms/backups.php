<?php include('includes/header.html') ?>

<h1>Backups</h1>

<a href="index.html">Back to main page</a>
<a href="admin.php">Back to admin page</a>

<br/>
<br/>

<b>Backups:</b>

<br/>

<?php
if ($handle = opendir('backup/')) {
    /* This is the correct way to loop over the directory. */
    while (false !== ($entry = readdir($handle))) {
	if ($entry != "." && $entry != "..") {
            echo "<a href='backup/$entry'>$entry</a><br/>";
        }
    }
    closedir($handle);
}
?>

<?php include('includes/footer.html') ?>