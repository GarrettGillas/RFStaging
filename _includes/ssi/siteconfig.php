<?php
if(!isset($_SESSION)) { session_start(); }

// Supresses Error Reporting if Enabled
error_reporting(error_reporting() & ~E_NOTICE);  

/*************************************************************************************************/
/*  Project information setup for the Razorfish Client Preview platfom.                          */
/*  For documentation & support contact Garrett Gillas at Razorfish Portland.                    */
/*  Garrett.Gillas@razorfish.com                                                                 */
/*************************************************************************************************/
$page_title = "Microsoft Windows";

$location 	= "<strong>Razorfish Portland</strong><br>".
			  "700 SW Taylor<br>Suite 400<br>".
			  "Portland, OR 97205<br>";

$contact    = "<strong>Jackie VanderZanden</strong><br>".
			  "Client Partner<br>".
			  "503.889.4530<br>".
		  	  "<a href='mailto:jackie.vanderzanden@razorfish.com'>jackie.vanderzanden@razorfish.com</a>";

$logo 	    = "_includes/images/logo-windows.png";

$logo2 	    = "_includes/images/logo-razorfish.png";

/*************************************************************************************************/
/* Setup user login accounts here.                                                               */
/*************************************************************************************************/
$userinfo       = array(
			      'RFEmployee'=>'Snapper4781',
			      'OneConsumer'=>'W1nd0w$8!',
			      'WinPartner'=>'Win765!gg',);

$adminAccount   = 'RFEmployee'; 
$clientAccount  = 'OneConsumer'; 
$partnerAccount = 'WinPartner'; 

/*************************************************************************************************/
/* Global exclusion handling.                                                                    */
/*************************************************************************************************/
$exclude_list = array(
	".", 
	"..",
	".git",
	".DS_Store",
	".htaccess",
	".gitignore",
	"_services",
	"_includes",
	"_cms",
	"unavailable",
	"uploads",
	"media",
	"sandbox",
	"login",
	"404",
	"user-guide",
	"robots.txt",
	"PHP_errors.log",
    "login.php",
	"index.php",
	"README.md");

/*************************************************************************************************/
/* Page titles generated from folder names (Capitalization added and "-" & "_" have been removed)*/
/*************************************************************************************************/
$myTitle = basename(getcwd());
$myTitle = str_replace("-", " ", $myTitle);
$myTitle = str_replace("_", " ", $myTitle);
$page_title_raw = $myTitle;
$page_title2 = ucwords($page_title_raw);
$tld = "http://".$_SERVER['HTTP_HOST']."/";
?>
