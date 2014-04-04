<?php
/*************************************************************************************************/
/* Project information setup for the Razorfish Client Preview platfom.                           */
/* For documentation & support contact Garrett Gillas at Razorfish Portland.                     */
/* Email: garrett.gillas@razorfish.com                                                           */
/*                                                                                               */
/* Contents:                                                                                     */
/*   1. Setup project name, contact info and logos.                                              */
/*   2. User account setup.                                                                      */
/*   3. Sidebar widgets.                                                                         */
/*   4. Global exclusion handling.                                                               */
/*   5. Other global variables.                                                                  */
/*                                                                                               */
/*************************************************************************************************/
if(!isset($_SESSION)) { session_start(); }
error_reporting(error_reporting() & ~E_NOTICE);  

/*************************************************************************************************/
/* 1. Setup project name, contact info and logos.                                                */
/*************************************************************************************************/
           $brand = "Razorfish";

      $page_title = "Microsoft Windows";

       $location  = "<strong>Razorfish Portland</strong><br>".
                    "700 SW Taylor<br>Suite 400<br>".
                    "Portland, OR 97205<br>";

         $contact = "<strong>Jackie VanderZanden</strong><br>".
                    "Client Partner<br>".
                    "503.889.4530<br>".
                    "<a href='mailto:jackie.vanderzanden@razorfish.com'>jackie.vanderzanden@razorfish.com</a>";

            $logo = "_includes/brands/client-windows.png";
           $logo2 = "_includes/brands/logo-razorfish.png";

/*************************************************************************************************/
/* 2. Setup user user accounts here.                                                             */
/*************************************************************************************************/
        $userinfo = array(
                    "RFEmployee"=>"Snapper4781",
                    "OneConsumer"=>"W1nd0w$8!",
                    "WinPartner"=>"Win765!gg",);

    $adminAccount = "RFEmployee";  
   $clientAccount = "OneConsumer"; 
  $partnerAccount = "WinPartner";  

/*************************************************************************************************/
/* 3. Toggle sidebar widgets here. All values should be "yes" by default.                        */
/*************************************************************************************************/
      $infowidget = "no";   // Project Information Widget   
       $navwidget = "yes";  // Side Navigation Widget        
   $partnerwidget = "yes";  // Partner User Info Widget     
     $guidewidget = "yes";  // User Guide Table of Contents 

   $addyearwidget = "yes";  // "Add New Year" Widget        
$addprojectwidget = "yes";  // "Add New Project" Widget     
  $uploaderwidget = "yes";  // "File Uploader" Widget       

/*************************************************************************************************/
/* 4. Global exclusion handling. Add files that you want hidden here.                            */
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
                    "user-guide",
                    "robots.txt",
                    "login.php",
                    "index.php",
                    "README.md",
                    "errors.log",
                    "PHP_errors.log");

/*************************************************************************************************/
/* 5. Generating page titles and other global variables. No need to edit below this line.        */
/*************************************************************************************************/
         $myTitle = basename(getcwd());
         $myTitle = str_replace("-", " ", $myTitle);
         $myTitle = str_replace("_", " ", $myTitle);
  $page_title_raw = $myTitle;
     $page_title2 = ucwords($page_title_raw);
           $bvar1 = "";
           $bvar2 = "";

if($_SESSION['is_admin'] == false){ $bvar1 = " clientlogin"; } 
if(strpos($page_title2,'Internal') !== false){ $bvar2 = " pvtpage"; }

     $bodyclasses = $bvar1.$bvar2;
             $tld = "http://".$_SERVER['HTTP_HOST']."/";
?>