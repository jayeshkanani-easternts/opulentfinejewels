<?php
// manage sessions 
session_start();
error_reporting(E_ALL);
error_reporting(~E_NOTICE || ~E_WARNING);

/*$gen_root = $_SERVER['DOCUMENT_ROOT'].'/yugeva';  
define('HTTP_SERVER','http://localhost');
//	define('WS_ROOT', '/yugeva/');
define('HTTP_SERVER','http://192.168.2.103');*/ 

//live  
//if($_SERVER['HTTP_HOST']=='www.yugeva.com') {
    /*$gen_root = $_SERVER['DOCUMENT_ROOT'];
    define('HTTP_SERVER','https://www.korinoptoelectronics.com');
    define('WS_ROOT', '/');*/
//}
//else{ 

//local
$gen_root = $_SERVER['DOCUMENT_ROOT'];
define('WS_ROOT', '/');
define('HTTP_SERVER', 'https://www.opulentfinejewels.com');
//If the HTTPS is not found to be "on"
if(!isset($_SERVER["HTTPS"]) || $_SERVER["HTTPS"] != "on")
{
    //Tell the browser to redirect to the HTTPS URL.
    header("Location: " . HTTP_SERVER . $_SERVER["REQUEST_URI"], true, 301);
    //Prevent the rest of the script from executing.
    exit;
}else if(explode('.', $_SERVER['HTTP_HOST'])[0] != "www" ){ // www subdomain is not added
    //Tell the browser to redirect to the HTTPS URL.
    header("Location: " . HTTP_SERVER . $_SERVER["REQUEST_URI"], true, 301);
    //Prevent the rest of the script from executing.
    exit;
}
//}

/*
$gen_root = $_SERVER['DOCUMENT_ROOT'] . '/ofj/code';
define('WS_ROOT', '/ofj/code/');
define('HTTP_SERVER', 'http://localhost');*/

define('DIR_WS_INCLUDES', 'includes/');
define('DIR_WS_TEMPLATE', 'template/');
define('DIR_WS_PAGE_PATH', 'content/');

define('DIR_FS_PAGE_IMAGE_PATH', $gen_root . 'upload/image/pages/');
define('DIR_WS_PAGE_IMAGE_PATH', HTTP_SERVER . WS_ROOT . 'upload/image/pages/');

define('DIR_FS_SLIDER_PATH', $gen_root . '/upload/slider/');
define('DIR_WS_SLIDER_PATH', HTTP_SERVER . WS_ROOT . 'upload/slider/');

define('DIR_FS_BROCHURE_PATH', $gen_root . '/upload/brochure/');
define('DIR_WS_BROCHURE_PATH', HTTP_SERVER . WS_ROOT . 'upload/brochure/');

define('DIR_FS_BIODATA_PATH', $gen_root . '/upload/biodata/');
define('DIR_WS_BIODATA_PATH', $gen_root . '/upload/biodata/');

define('DIR_FS_STORY_PATH', $gen_root . '/upload/story/');
define('DIR_WS_STORY_PATH', HTTP_SERVER . WS_ROOT . 'upload/story/');

define('DIR_FS_BANNER_PATH', $gen_root . '/upload/banners/');
define('DIR_WS_BANNER_PATH', HTTP_SERVER . WS_ROOT . 'upload/banners/');

define('DIR_FS_PROJECT_PATH',$gen_root.'/upload/image/project/');
define('DIR_WS_PROJECT_PATH',HTTP_SERVER.WS_ROOT.'upload/image/project/');

define('DIR_FS_RESEARCH_PATH', $gen_root . '/upload/research/');
define('DIR_WS_RESEARCH_PATH', HTTP_SERVER . WS_ROOT . 'upload/research/');

define('DIR_FS_BENEFIT_PATH', $gen_root . '/upload/image/benefit/');
define('DIR_WS_BENEFIT_PATH', HTTP_SERVER . WS_ROOT . 'upload/image/benefit/');

define('DIR_FS_SERVICES_PATH', $gen_root . '/upload/services/');
define('DIR_WS_SERVICES_PATH', HTTP_SERVER . WS_ROOT . 'upload/services/');

define('DIR_FS_COMPANY_PATH', $gen_root . '/upload/image/company/');
define('DIR_WS_COMPANY_PATH', HTTP_SERVER . WS_ROOT . 'upload/image/company/');

define('DIR_FS_TESTIMONIAL_PATH', $gen_root . '/upload/image/testimonial/');
define('DIR_WS_TESTIMONIAL_PATH', HTTP_SERVER . WS_ROOT . 'upload/image/testimonial/');

define('DIR_FS_SERVICE_PATH', $gen_root . '/upload/image/services/');
define('DIR_WS_SERVICE_PATH', HTTP_SERVER . WS_ROOT . '/upload/image/services/');

define('DIR_FS_GALLERY_PATH', $gen_root . '/upload/image/gallery/');
define('DIR_WS_GALLERY_PATH', HTTP_SERVER . WS_ROOT . '/upload/image/gallery/');

define('DIR_FS_PERSONALITY_PATH', $gen_root . '/upload/personality/');
define('DIR_WS_PERSONALITY_PATH', HTTP_SERVER . WS_ROOT . 'upload/personality/');

define('DIR_FS_TEAM_PATH', $gen_root . '/upload/team/');
define('DIR_WS_TEAM_PATH', HTTP_SERVER . WS_ROOT . 'upload/team/');

define('DIR_FS_LOGO_PATH', $gen_root . '/upload/image/');
define('DIR_WS_LOGO_PATH', HTTP_SERVER . WS_ROOT . 'upload/image/');

define('DIR_FS_SERVICE_IMAGE_PATH', $gen_root . '/upload/image/services/');
define('DIR_WS_SERVICE_IMAGE_PATH', HTTP_SERVER . WS_ROOT . 'upload/image/services/');

define('DIR_FS_NEWS_PATH', $gen_root . '/upload/image/news/');
define('DIR_WS_NEWS_PATH', HTTP_SERVER . WS_ROOT . 'upload/image/news/');

define('RECAPTCHA_PUBLIC_KEY', '6LeOvc4SAAAAAIrtkAJQ9al9WCxKunmDrzcyC10R'); // replace your_public_key with your reCAPTCHA public key (from the API Signup Page https://www.google.com/recaptcha/admin/create?app=php)
define('RECAPTCHA_PRIVATE_KEY', '6LeOvc4SAAAAAN6HeDf0cHtZJNdQ1nOMnlojN8RB'); // replace your_private_key with your reCAPTCHA private key (from the API Signup Page https://www.google.com/recaptcha/admin/create?app=php)
define('RECAPTCHA_THEME', 'white'); // red, white, blackglass, clean

define('SITENAME', " | Opulent Fine Jewels");
define('THUMB_WIDTH', '190');
define('THUMB_HEIGHT', '132');
define('PHOTO_LIST_NO', '12');
define('SEP', '/');

 
//Mail Configuration Starts
define('MAIL_HOST', 'smtp.gmail.com');
define('MAIL_MAILER', 'SMTP');
define('MAIL_SMTPAuth', true);
define('MAIL_SMTPSecure', 'tls');
define('MAIL_PORT', 587);
define('MAIL_USERNAME', 'noreplay.opulentfinejewels@gmail.com');
define('MAIL_PASSWORD', 'opulent@3#');
define('MAIL_PRIORITY', 1);
define('MAIL_XMAILER', 'Opulent Fine Jewels');
define('MAIL_CHARSET', 'UTF-8');
define('MAIL_ENCODING', '8bit');
define('MAIL_WORDWRAP', 900);
define('MAIL_CONTENTTYPE', 'text/html; charset=utf-8\r\n');
define('MAIL_FROM', 'noreplay.opulentfinejewels@gmail.com');
define('MAIL_FROMNAME', 'Opulent Fine Jewels');

/* Added*/
define('LOGO_ALT', 'Opulent Fine Jewels');
define('MAIL_LOGO', HTTP_SERVER . WS_ROOT . 'images/logo.png');
define('MAIL_TO', 'noreplay.opulentfinejewels@gmail.com');
/* Added*/

//live
$host = "localhost";
//
//if($_SERVER['HTTP_HOST']=='www.yugeva.com'){
   /* $dbname = "korinopt_opto";
    $user = "korinopt_opto";
    $pwd = "W+#wZMX0{e2e";*/
//}
//else{

//local
   $dbname = "opulentf_opulent";
    $user = "opulentf_opulent";
    $pwd = "}eqpQEZENz0d";
//}

/*$dbname = "ofj";
$user = "root";
$pwd = "";*/




define('DB_SERVER', 'localhost');
define('DB_SERVER_USERNAME', $user);
define('DB_SERVER_PASSWORD', $pwd);
define('DB_DATABASE', $dbname);


global $db_link;
$db_link = ets_db_connect($host, $user, $pwd);
?>