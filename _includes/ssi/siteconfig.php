<?php
/*************************************************************************************************/
/* Project information & setup for the Razorfish Client Preview platfom.                         */
/* For documentation & support contact Garrett Gillas at Razorfish Portland.                     */
/* Email: garrett.gillas@razorfish.com                                                           */
/*                                                                                               */
/* Contents:                                                                                     */
/*   1. User Account Setup                                                                       */
/*   2. Setup Company, Client, Contact Info & Logos                                              */
/*   3. Toggle Sidebar Widgets                                                                   */
/*   4. Global Exclusion Handling                                                                */
/*   5. Other Global Variables                                                                   */
/*                                                                                               */
/*************************************************************************************************/
if(!isset($_SESSION)) { session_start(); }
error_reporting(error_reporting() & ~E_NOTICE);  

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

/*************************************************************************************************/
/* 1. Setup User Accounts                                                                        */
/*************************************************************************************************/
    $adminAccount = "RFEmployee";  
   $adminPassword = "Snapper4781"; 

   $clientAccount = "OneConsumer"; 
  $clientPassword = "W1nd0w$8!";

  $partnerAccount = "WinPartner";  
 $partnerPassword = "Win765!gg";

/*************************************************************************************************/
/* 2. Setup Company, Client, Contact Info, Logos, Platform Version & Font Class                  */
/*************************************************************************************************/
           $brand = "Razorfish";

      $page_title = "Microsoft Windows";

      $office_loc = "Razorfish Portland";
        $add1_loc = "700 SW Taylor";
        $add2_loc = "Suite 400";
        $add3_loc = "Portland, OR 97205";

       $cont_name = "Jackie VanderZanden";
      $cont_title = "Client Partner";
      $cont_phone = "503.889.4530";
      $cont_email = "jackie.vanderzanden@razorfish.com";

            $logo = "_includes/clients/windows.png";
           $logo2 = "_includes/brands/razorfish.png";

        $bodyfont = "Segoe";
     
     $cms_version = "3.2";

/*************************************************************************************************/
/* 3. Toggle Sidebar Widgets (All values should be "true" or "false".)                           */
/*************************************************************************************************/
      $infowidget = "false";  // Project Information Widget   
       $navwidget = "true";  // Side Navigation Widget        
   $partnerwidget = "true";  // Partner User Info Widget   

     $guidewidget = "true";  // User Guide Table of Contents 
   $addyearwidget = "true";  // "Add New Year" Widget        
$addprojectwidget = "true";  // "Add New Project" Widget     
  $uploaderwidget = "true";  // "File Uploader" Widget       

/*************************************************************************************************/
/* 4. Global Exclusion Handling (Add files and folders that you would like hidden here)          */
/*************************************************************************************************/
    $exclude_list = array(
                    ".", 
                    "..",
                    ".git",
                    ".gitignore",
                    ".DS_Store",
                    ".htaccess",
                    "_includes",
                    "_cms",
                    "404",
                    "unavailable",
                    "uploads",
                    "media",
                    "login",
                    "brands",
                    "settings",
                    "user-guide",
                    "robots.txt",
                    "login.php",
                    "index.php",
                    "README.md",
                    "Thumbs.db",
                    "errors.log",
                    "PHP_errors.log");

/*************************************************************************************************/
/* 5. Generate Page Titles & Other Global Variables (No need to edit below this line)            */
/*************************************************************************************************/
         $myTitle = basename(getcwd());
         $myTitle = str_replace("-", " ", $myTitle);
         $myTitle = str_replace("_", " ", $myTitle);
  $page_title_raw = $myTitle;
     $page_title2 = ucwords($page_title_raw);
           $bvar1 = "";
           $bvar2 = "";
           $bvar3 = " ".$bodyfont;

if($_SESSION['is_admin'] == false){ $bvar1 = " clientlogin"; } 
if(strpos($page_title2,'Internal') !== false){ $bvar2 = " pvtpage"; }

     $bodyclasses = $bvar1.$bvar2.$bvar3;
             $tld = "http://".$_SERVER['HTTP_HOST']."/";
         $contact = "<strong>".$cont_name."</strong><br>".$cont_title."<br>".$cont_phone."<br><a href='mailto:".$cont_email."'>".$cont_email."</a>";
        $location = "<strong>".$office_loc."</strong><br>".$add1_loc."<br>".$add2_loc."<br>".$add3_loc."<br>";
        $userinfo = array(
    $adminAccount => $adminPassword,
   $clientAccount => $clientPassword,
  $partnerAccount => $partnerPassword,);
?>
