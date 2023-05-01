<?php
//include("includes/configure.php");
if(isset($_GET['action'])){
	$include_class = $_GET['action'].".php";
	include ($include_class);
	if($_GET['action'] == 'brochure'){
		$brochure = new brochure();
		switch($_GET['subaction']){
			case 'listData':
				$brochure->listData();
				break;
			case 'delete':
				if($brochure->delete()){
					echo '<script>location.href="index.php?controller=brochure&action=brochure&subaction=listData";</script>';
				}
				break;
		}
	}
}
?>