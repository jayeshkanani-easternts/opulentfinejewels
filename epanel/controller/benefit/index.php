<?php
if(isset($_REQUEST['action'])){
	
	$include_class = $_REQUEST['action'].".php";
	include ($include_class);
	
	/* Start benefit Master*/
	if($_REQUEST['action'] == 'benefit'){
		$benefit = new benefit();	
		switch($_REQUEST['subaction']){
			case 'add':
//				if(strpos($_SESSION['userper'],'a') !== false) {
				if($benefit->add()){
					echo'<script>location.href="index.php?controller=benefit&action=benefit&subaction=listData";</script>';
				}
//					}else{
//					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Add Record</div>';
//				}
				break;
			case 'addForm':
//				if(strpos($_SESSION['userper'],'a') !== false) {
					$benefit->addForm();
//				}else{
//					echo '<div class="alert alert-error">You do not have Sufficient Permissions to Add Record</div>';				
//				}
				break;
			case 'edit':
//				if(strpos($_SESSION['userper'],'e') !== false) {
				if($benefit->edit()){
					echo'<script>location.href="index.php?controller=benefit&action=benefit&subaction=listData";</script>';
				}
//				}else{
//					echo '<div class="alert alert-error">You do not have Sufficient Permissions to Edit Record</div>';				
//				}
				break;
			case 'editForm':
//				if(strpos($_SESSION['userper'],'e') !== false) {
					$benefit->editForm();
//				}else{
//					echo '<div class="alert alert-error">You do not have Sufficient Permissions to Edit Record</div>';				
//				}
				break;				
			case 'listData':
//				if(strpos($_SESSION['userper'],'v') !== false) {
					$benefit->listData();
//				}else{
//					echo '<div class="alert alert-error">You do not have Sufficient Permissions to View Record</div>';				
//				}
				break;
			case 'delete':
//				if(strpos($_SESSION['userper'],'d') !== false) {
					if($benefit->delete()){
						echo'<script>location.href="index.php?controller=benefit&action=benefit&subaction=listData";</script>';
					}
//				}else{
//					echo '<div class="alert alert-error">You do not have Sufficient Permissions to Delete Record</div>';					
//				}
				break;
		}
	}
	
}
else{
		echo '<center><div class="notmsgHeader" ><img src="images/error.gif">&nbsp;&nbsp;<strong>You may be in wrong place!!!</strong></div></center>';
}
?>

