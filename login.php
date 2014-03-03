<?php
include '_includes/ssi/siteconfig.php';
$errorstatus = "";

if(isset($_GET['logout'])) {
    $_SESSION['username'] = '';
    header('Location:  ' . $_SERVER['PHP_SELF']);
}

if(isset($_POST['username'])) {
    if($userinfo[$_POST['username']] == $_POST['password']) {
        $_SESSION['username'] = $_POST['username'];
        if($_POST['username'] == $adminAccount){
        	$_SESSION['is_admin'] = true;
        }else{
        	$_SESSION['is_admin'] = false;
        }

        if(isset($_SESSION['LoginRedirect'])){
        	header('Location:  '.$_SESSION['LoginRedirect']);
        }else{
        	header('Location:  /index.php');
        }
        
    }else {
        //Invalid Login
        $errorstatus = "<div class='errorstatus'>\n" . 
        			   "<p><span class='wrong-pw'>Incorrect Username or Password.</span><br>\n" . 
        			   "<a href='mailto:garrett.gillas@razorfish.com?subject=Razorfish Client Preview - Login Request for " . $_SERVER['HTTP_HOST'] . "'>Request Login</a> &gt;</p>\n" . 
        			   "</div>"; 
    }
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $page_title; ?> | Razorfish Client Preview</title>
<style type="text/css" media="all">@import url(<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/_includes/styles/styles.css);</style>
<script type="text/javascript" src="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/_includes/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/_includes/js/breadcrumbs.js"></script>
<script type="text/javascript" src="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/_includes/js/rzf.extranet.projectcontent.js"></script>
<link rel="shortcut icon" href="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/_includes/images/favicon.ico" type="image/x-icon">
<link rel="icon" href="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/_includes/images/favicon.ico" type="image/x-icon">
</head>
    

<body class="login">
<?php include '_includes/ssi/header.php'; ?>

<div id="content">
<?php include '_includes/ssi/aside-info.php'; ?>
<?php #include '_includes/ssi/aside-uploader.php'; ?>
<?php #include '_includes/ssi/aside-accordion.php'; mkmap("."); echo "</div><!--|.asidewrap|-->\n</aside>"; ?>
<?php #include '_includes/ssi/aside-public.php'; ?> 

<section>
<script>breadcrumbs();</script>

<article class='login'>
<h1>Welcome. Please log in.</h1>

<form name="login" action="" id="form2" method="post">
<?php echo $errorstatus; ?>

<div class="loginFormRow">
<span>Username:</span><input type="text" name="username" value="">
</div><!--|.loginFormRow|-->

<div class="loginFormRow">
<span>Password:</span><input type="password" name="password" value="">
</div><!--|.loginFormRow|-->

<div class="loginFormRow">
<input type="submit" name="submit" value="Submit">
</div><!--|.loginFormRow|-->
</form>

</article>
</section>
</div><!--|#content|-->

<?php include '_includes/ssi/footer.php'; ?>
</body></html>