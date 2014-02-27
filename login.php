<?php

include '_includes/ssi/siteconfig.php';

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
    }
}


?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $page_title; ?></title>
<style type="text/css" media="all">@import url(<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/_includes/styles/styles.css);</style>
<script type="text/javascript" src="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/_includes/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/_includes/js/breadcrumbs.js"></script>
<script type="text/javascript" src="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/_includes/js/rzf.extranet.projectcontent.js"></script>
<link rel="shortcut icon" href="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/_includes/images/favicon.ico" type="image/x-icon">
<link rel="icon" href="<?php echo "http://".$_SERVER['HTTP_HOST']; ?>/_includes/images/favicon.ico" type="image/x-icon">
</head>
    
	<body class="root">

	<?php include '_includes/ssi/header.php'; ?>

		<div id="content">
			<?php include '_includes/ssi/aside-info.php'; ?>

			<section>
				<script>breadcrumbs();</script>
				<article class='login'>
					<h1>Welcome. Please log in.</h1>
					<form name="login" action="" method="post">
						<div class="loginFormRow">
							<span>Username:</span><input type="text" name="username" value="" />
						</div>
			            <div class="loginFormRow">
				            <span>Password:</span><input type="password" name="password" value="" />
				        </div>
				        <div class="loginFormRow">
							<input type="submit" name="submit" value="Submit" />
						</div>
			        </form>
			    </article>
			</section>
	    </div>

		<?php include '_includes/ssi/footer.php'; ?>
    </body>
</html>
