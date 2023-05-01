<?php
//include("includes/configure.php");
if(isset($_GET['action'])){
	$include_class = $_GET['action'].".php";
	include ($include_class);
	if($_GET['action'] == 'contact'){
		$contact = new contact();	
		switch($_GET['subaction']){
			case 'listData':
				if(strpos($_SESSION['userper'],'v') !== false) {
					$contact->listData();
				}
				else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to View Record</div>';	
				}
				break;
			case 'delete':
				if(strpos($_SESSION['userper'],'d') !== false) {
					if($contact->delete()){
						echo '<script>location.href="index.php?controller=contact&action=contact&subaction=listData";</script>';
					}
				}else {
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Delete Record</div>';	
				}
				break;
		}
	}
}
?>