<?php 

include("inc/config.php");

	$myfile = DIR_FS_BIODATA_PATH.$_GET['download'];	
	
if (file_exists($myfile)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header ("Content-Disposition:attachment; filename=\"$file\"");
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($myfile));
    ob_clean();
    flush();
    readfile($myfile);
    exit;
}
	

?>
