<?php
/*include("includes/configure.php");*/
if(isset($_GET['action'])){
	$include_class = $_GET['action'].".php";
	include ($include_class);
	if($_GET['action'] == 'subscription'){
		$subscription = new subscription();	
		switch($_GET['subaction']){
			case 'listData':
				if(strpos($_SESSION['userper'],'v') !== false) {
					$subscription->listData();
				}
				else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to View Record</div>';	
				}	
				break;
			case 'delete':
				if(strpos($_SESSION['userper'],'d') !== false) {
					if($subscription->delete()){
						echo '<script>location.href="index.php?controller=subscription&action=subscription&subaction=listData";</script>';
					}
				}else {
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Delete Record</div>';	
				}
				break;
		}
	}
}
?>