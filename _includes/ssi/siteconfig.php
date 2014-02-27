<?php

if(!isset($_SESSION)) { session_start(); }

error_reporting(E_ALL ^ E_NOTICE);

$page_title = "Microsoft Windows";
$location = "<strong>Razorfish Portland</strong><br>700 SW Taylor<br>Suite 400<br>Portland, OR 97205<br>";
$contact = "<strong>Firstname Lastname</strong><br>Account Director<br>(123) 456-7890<br>first.last@razorfish.com";
$logo = "/_includes/logo-windows.jpg";
$logo2 = "/_includes/logo-razorfish.png";

$userinfo = array(
	'RFEmployee'=>'Snapper4781',
	'RFClient'=>'Lincod4457',
	'bogan'=>'commodore'
);

$adminAccount = 'RFEmployee';

/* PAGE TITLE GENERATED FROM SANITIZED DIRECTORY NAME */
$myTitle = basename(getcwd());
$myTitle = str_replace("-", " ", $myTitle);
$myTitle = str_replace("_", " ", $myTitle);
$page_title = $myTitle;

?>