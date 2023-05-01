<?php
// manage sessions 
session_start();
error_reporting(~E_NOTICE||~E_WARNING);


$gen_root = $_SERVER['DOCUMENT_ROOT'];
define('HTTP_SERVER','http://www.yugeva.com');
define('WS_ROOT', '/');
define('WS_ADMIN_ROOT', '/epanel/');

define('FS_INDEX_PATH', $gen_root);

define('DIR_WS_INCLUDES','includes/');
define('DIR_WS_CLASSES',DIR_WS_INCLUDES.'classes/');
define('WS_PFBC_ROOT', 'PFBC/');
define('DIR_WS_CONTROLLER_PATH','controller/');
define('DIR_WS_FUNCTIONS',DIR_WS_INCLUDES.'functions/');
define('DIR_WS_PAGE_PATH','/');
define('DIR_WS_IMAGE_PATH',HTTP_SERVER.WS_ROOT.'images/');
define('DIR_WS_TEMPLATE','template/');

define('DIR_FS_INCLUDES',$gen_root.'/console/includes/');
define('DIR_FS_TEMPLATE',$gen_root.'/console/template/');
define('DIR_FS_CONTROLLER',$gen_root.'/console/controller');

define('DIR_FS_UPLOAD_PATH',$gen_root.'/upload/files/download/'); 
define('DIR_WS_UPLOAD_PATH',HTTP_SERVER.WS_ROOT.'upload/files/download/');

define('DIR_FS_SLIDER_PATH',$gen_root.'/upload/slider/');
define('DIR_WS_SLIDER_PATH',HTTP_SERVER.WS_ROOT.'upload/slider/'); 

define('DIR_FS_STORY_PATH',$gen_root.'/upload/story/');
define('DIR_WS_STORY_PATH',HTTP_SERVER.WS_ROOT.'upload/story/'); 

define('DIR_FS_BANNER_PATH',$gen_root.'/upload/banners/');
define('DIR_WS_BANNER_PATH',HTTP_SERVER.WS_ROOT.'upload/banners/'); 

define('DIR_FS_RESEARCH_PATH',$gen_root.'/upload/research/');
define('DIR_WS_RESEARCH_PATH',HTTP_SERVER.WS_ROOT.'upload/research/'); 

define('DIR_FS_BENEFIT_PATH',$gen_root.'/upload/image/benefit/');
define('DIR_WS_BENEFIT_PATH',HTTP_SERVER.WS_ROOT.'upload/image/benefit/');

define('DIR_FS_SERVICES_PATH',$gen_root.'/upload/services/');
define('DIR_WS_SERVICES_PATH',HTTP_SERVER.WS_ROOT.'upload/services/');

define('DIR_FS_GALLERY_PATH',$gen_root.'/upload/image/gallery/');
define('DIR_WS_GALLERY_PATH',HTTP_SERVER.WS_ROOT.'upload/image/gallery/');

define('DIR_FS_CSR_GALLERY_PATH',$gen_root.'/upload/image/csrgallery/');
define('DIR_WS_CSR_GALLERY_PATH',HTTP_SERVER.WS_ROOT.'upload/image/csrgallery/');

define('DIR_FS_PROJECT_PATH',$gen_root.'/upload/image/project/');
define('DIR_WS_PROJECT_PATH',HTTP_SERVER.WS_ROOT.'upload/image/project/');

define('DIR_FS_COMPANY_PATH',$gen_root.'/upload/image/company/');
define('DIR_WS_COMPANY_PATH',HTTP_SERVER.WS_ROOT.'upload/image/company/');

define('DIR_FS_TESTIMONIAL_PATH',$gen_root.'/upload/image/testimonial/');
define('DIR_WS_TESTIMONIAL_PATH',HTTP_SERVER.WS_ROOT.'upload/image/testimonial/');

define('DIR_FS_EVENT_PATH',$gen_root.'/upload/event/'); 
define('DIR_WS_EVENT_PATH',HTTP_SERVER.WS_ROOT.'/upload/event/');

define('DIR_FS_BIODATA_PATH',$gen_root.'/upload/biodata/');
define('DIR_WS_BIODATA_PATH',HTTP_SERVER.WS_ROOT.'upload/biodata/'); 

define('DIR_FS_TEAM_PATH',$gen_root.'/upload/team/');
define('DIR_WS_TEAM_PATH',HTTP_SERVER.WS_ROOT.'upload/team/'); 

define('DIR_FS_PAGE_IMAGE_PATH',$gen_root.'/upload/image/pages/'); 
define('DIR_WS_PAGE_IMAGE_PATH',HTTP_SERVER.WS_ROOT.'upload/image/pages/'); 

define('DIR_FS_LOGO_PATH',$gen_root.'/upload/image/');
define('DIR_WS_LOGO_PATH',HTTP_SERVER.WS_ROOT.'upload/image/');

define('DIR_FS_SITE_PATH',$gen_root.'/');
define('DIR_FS_EPANEL_PATH',$gen_root.'/epanel/');

// Mail BOF
define('SWIFT_MAILER',$gen_root.'/swiftmailer/lib/');
// Mail EOF

define('FILEUSER','localhost'); // used for file owner
define('ADMINTITLE','Eastern - Admin Panel');

define('THUMB_WIDTH','200');
define('THUMB_HEIGHT','200');

$lang_id='1';
$host = "localhost";

$dbname = "yugeva_etsdb";
$user = "yugeva_etsusr";
$pwd = "8TU2P-9H~UM(";

global $db_link;
$db_link = ets_db_connect($host,$user,$pwd);
ets_db_select_db($dbname,$db_link);
$PHP_SELF = $_SERVER['PHP_SELF'];

$epanel_qry = "Select * from epanel_master where id = '1'";
$epanel_res = ets_db_query($epanel_qry);
$epanel_arr = ets_db_fetch_array($epanel_res);

if(basename($_SERVER['PHP_SELF']) != 'login.php'){
	if(!isset($_SESSION['logged'])){
		header('Location: login.php');
	}
}

?>
