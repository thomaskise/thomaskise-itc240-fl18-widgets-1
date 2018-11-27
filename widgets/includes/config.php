<?php
/*
config.php

stores configuration information for our web application

*/

//removes header already sent errors
ob_start();

define('SECURE',false); #force secure, https, for all site pages

define('PREFIX', 'widgets_fl18_'); #Adds uniqueness to your DB table names.  Limits hackability, naming collisions

header("Cache-Control: no-cache");header("Expires: -1");#Helps stop browser & proxy caching

define('DEBUG',true); #we want to see all errors

include 'db_functions/db_credentials.php';//stores database info
include 'common.php';//stores favorite functions

//prevents date errors
date_default_timezone_set('America/Los_Angeles');

//create config object
$config = new stdClass;

//CHANGE TO MATCH YOUR PAGES
$config->nav1['index.php'] = "Home";
$config->nav1['engagement_list.php']= 'Engagements';
$config->nav1['dailyspecials.php']= 'Daily Specials';
$config->nav1['travel.php']= 'Travel Inquiry';
$config->nav1['contact.php']= 'General Inquiry';
$config->nav1['template.php']= 'Template';
$config->nav1['db_test.php']= 'DB Template';
//echo var_dump($config->nav1);
//die();
//set-up heros
//include 'config-widgets.php'; //low priority - also need to uncomment header.php line 63
/*    $config->heros[] = '<img src="images/coulson.png" />';
    $config->heros[] = '<img src="images/fury.png" />';
    $config->heros[] = '<img src="images/hulk.png" />';
    $config->heros[] = '<img src="images/thor.png" />';
    $config->heros[] = '<img src="images/black-widow.png" />';
    $config->heros[] = '<img src="images/captain-america.png" />';
    $config->heros[] = '<img src="images/machine.png" />';
    $config->heros[] = '<img src="images/iron-man.png" />';
    $config->heros[] = '<img src="images/loki.png" />';
    $config->heros[] = '<img src="images/giant.png" />';
    $config->heros[] = '<img src="images/hawkeye.png" />'; */
//echo var_dump($heros);
//die();


//set-up planets
//    include 'includes/planets.php';

//create default page identifier
define('THIS_PAGE',basename($_SERVER['PHP_SELF']));
include 'config-page-switch.php'; //get page variables
//START NEW THEME STUFF - be sure to add trailing slash!
$sub_folder = 'widgets/';//change to 'widgets' or 'sprockets' etc.
$config->theme = 'Brick';//sub folder to themes values "Brick" or "Clean"

//will add sub-folder if not loaded to root:
$config->physical_path = $_SERVER["DOCUMENT_ROOT"] . '/' . $sub_folder;
//force secure website
if (SECURE && $_SERVER['SERVER_PORT'] != 443) {#force HTTPS
	header("Location: https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
}else{
    //adjust protocol
    $protocol = (SECURE==true ? 'https://' : 'http://'); // returns true
    
}
$config->virtual_path = $protocol . $_SERVER["HTTP_HOST"] . '/' . $sub_folder;

define('ADMIN_PATH', $config->virtual_path . 'admin/'); # Could change to sub folder
define('INCLUDE_PATH', $config->physical_path . 'includes/');


//CHANGE ITEMS BELOW TO MATCH YOUR SHORT TAGS
$config->banner = 'Widgets';
$config->loadhead = '';//place items in <head> element
$config->siteName = "Wild Duck Coffee";


//creates theme virtual path for theme assets, JS, CSS, images
$config->theme_virtual = $config->virtual_path . 'themes/' . $config->theme . '/';

/*
 * adminWidget allows clients to get to admin page from anywhere
 * code will show/hide based on logged in status
*/
/*
 * adminWidget allows clients to get to admin page from anywhere
 * code will show/hide based on logged in status
*/
if(startSession() && isset($_SESSION['AdminID']))
{#add admin logged in info to sidebar or nav
    
    $config->adminWidget = '
        <a href="' . ADMIN_PATH . 'admin_dashboard.php">ADMIN</a> 
        <a href="' . ADMIN_PATH . 'admin_logout.php">LOGOUT</a>
    ';
}else{//show login (YOU MAY WANT TO SET TO EMPTY STRING FOR SECURITY)
    
    $config->adminWidget = '
        <a  href="' . ADMIN_PATH . 'admin_login.php">LOGIN</a>
    ';
}

/*
function to create navigation from 
as associative array

*/
function bc_links($nav1){
    
    global $config;
    $myReturn = '';
    foreach($nav1 as $url => $text){
        
        $url = $config->virtual_path . $url; //add virtual path
        if(THIS_PAGE == $url)
        {//current page - add highlight
              $myReturn .= '
            <li class="nav-item active px-lg-4">
                <a class="nav-link text-uppercase text-expanded" href="' . $url . '">' . $text . '</a>
            </li>
            '; 
        }else{//no highlight
             $myReturn .= '
            <li class="nav-item px-lg-4">
                <a class="nav-link text-uppercase text-expanded" href="' . $url . '">' . $text . '</a>
            </li>
            '; 
        }
    }
    
    return $myReturn;

}//end bc_links()
?>