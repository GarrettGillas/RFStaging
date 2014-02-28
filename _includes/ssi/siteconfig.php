<?php
if(!isset($_SESSION)) { session_start(); }
error_reporting(E_ALL ^ E_NOTICE);

/*************************************************************************************************/
/*  Project information setup for the Razorfish Client Preview platfom.                          */
/*  For documentation & support contact Garrett Gillas at Razorfish Portland.                    */
/*  Garrett.Gillas@razorfish.com                                                                 */
/*************************************************************************************************/
$page_title = "Microsoft Windows";
$location 	= "<strong>Razorfish Portland</strong><br>
			   700 SW Taylor<br>Suite 400<br>
			   Portland, OR 97205<br>";
$contact 	= "<strong>Jackie VanderZanden</strong><br>
			   Client Partner<br>
			   503.889.4530<br>
			   <a href='mailto:jackie.vanderzanden@razorfish.com'>jackie.vanderzanden@razorfish.com</a>";
$logo 		= "/_includes/logo-windows.jpg";
$logo2 		= "/_includes/logo-razorfish.png";

$userinfo = array(
			  'RFEmployee'=>'Snapper4781',
			  'RFClient'=>'Lincod4457',
);
$adminAccount = 'RFEmployee'; 

/*************************************************************************************************/
/* Sub Page Titles Generated from Folder Lables                                                  */
/*************************************************************************************************/
$myTitle = basename(getcwd());
$myTitle = str_replace("-", " ", $myTitle);
$myTitle = str_replace("_", " ", $myTitle);
$page_title2 = $myTitle;
?>
