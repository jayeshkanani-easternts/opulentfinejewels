<?php
//include("includes/configure.php");
if(isset($_GET['action'])){
	$include_class = $_GET['action'].".php";
	include ($include_class);
	if($_GET['action'] == 'appointment'){
		$appointment = new appointment();	
		switch($_GET['subaction']){
			case 'listData':
//				if(strpos($_SESSION['userper'],'v') !== false) {
					$appointment->listData();
//				}
//				else{
//					echo '<div class="alert alert-error">You donot have Sufficient Permissions to View Record</div>';	
//				}
				break;
			case 'delete':
//				if(strpos($_SESSION['userper'],'d') !== false) {
					if($appointment->delete()){
						echo '<script>location.href="index.php?controller=appointment&action=appointment&subaction=listData";</script>';
					}
//				}else {
//					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Delete Record</div>';	
//				}
				break;
		}
	}
}
?>