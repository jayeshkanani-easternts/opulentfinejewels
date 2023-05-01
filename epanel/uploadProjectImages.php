<?php

include "includes/app_top.php";
include(DIR_WS_CLASSES."resize-class.php");



//	// *** 1) Initialise / load image
//	$resizeObj = new resize('sample.jpg');
//
//	// *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
//	$resizeObj -> resizeImage(200, 200, 'crop');
//
//	// *** 3) Save image
//	$resizeObj -> saveImage('sample-resized.jpg', 100);


$uploadPath = DIR_FS_PROJECT_PATH.$_REQUEST['projectID']."/";

$uploadUrl = DIR_WS_PROJECT_PATH.$_REQUEST['projectID']."/";

$title = explode('&',$_REQUEST['title']);
print_r($title);
$sortorder = explode('&',$_REQUEST['sortorder']);
$i = 0;

foreach($title as $t)
{
   $ititle = explode('=',$t)[1];
   $isortorder = explode('=',$sortorder[$i])[1];
   
   ets_db_query('INSERT INTO project_gallery SET 
                galleryTitle = "'.urldecode($ititle).'",
                projectID = "'.$_REQUEST['projectID'].'",
                sortorder = "'.urldecode($isortorder).'",
                type = "G",
                status = "E",
                username = "'.$_SESSION['fname'].'",
                createdate = "now()",
                remote_ip = "'.$_SERVER['REMOTE_ADDR'].'"');
   
   $id = ets_db_insert_id();
   $file_name = $id.'-'.$_FILES['file']['name'][$i];
   $path = $uploadPath;
   if(!file_exists($path))
   {
		mkdir($path);
        exec("chown ".FILEUSER.FILEUSER." ".$path);
		exec("chmod 0777 ".$path);			
   }
   if(move_uploaded_file($_FILES['file']['tmp_name'][$i],$uploadPath.$file_name))
   {
       ets_db_query('UPDATE project_gallery SET
       galleryImage = "'.$file_name.'"
       WHERE galleryID = "'.$id.'"');
       
        if(!file_exists($uploadPath.'thumbnail/'))
        {
                mkdir($uploadPath.'thumbnail/');
                exec("chown ".FILEUSER.FILEUSER." ".$uploadPath.'thumbnail/');
		        exec("chmod 0777 ".$uploadPath.'thumbnail/');			
        }
       
       $resizeObj = new resize($uploadPath.$file_name);
       // *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
	   $resizeObj -> resizeImage(THUMB_WIDTH, THUMB_HEIGHT, 'exact');

	   $resizeObj -> saveImage($uploadPath.'thumbnail/'.$file_name, 100);
   }
       
   $i++;
}


?>
