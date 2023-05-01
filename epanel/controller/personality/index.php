<?php
if(isset($_REQUEST['action'])){
	$include_class = $_REQUEST['action'].".php";
	include ($include_class);
	
	/* Start Product Master */
	if($_REQUEST['action'] == 'personality'){
		$personality = new personality();	
		switch($_REQUEST['subaction']){
			case 'add':
//				if(strpos($_SESSION['userper'],'a') !== false) {
					if($personality->add()){
						echo'<script>location.href="index.php?controller=personality&action=personality&subaction=listData&msg=addmsg";</script>';
					}
//				}else{
//					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Add Record</div>';
//				}
				break;
			case 'addForm':
//				if(strpos($_SESSION['userper'],'a') !== false) {
					$personality->addForm();
//				}
//				else {
//					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Add Record</div>';	
//				}
				break;
			case 'listData':
//				if(strpos($_SESSION['userper'],'v') !== false) {
					$personality->listData();
//				}
//				else{
//					echo '<div class="alert alert-error">You donot have Sufficient Permissions to View Record</div>';	
//				}
				break;
			case 'edit':
//				if(strpos($_SESSION['userper'],'e') !== false) {
					if($personality->edit()){
					echo'<script>location.href="index.php?controller=personality&action=personality&subaction=listData";</script>';
				}
//				}else{
//					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Edit Records</div>';	
//				}
				break;
			case 'editForm':
//				if(strpos($_SESSION['userper'],'e') !== false) {
					$personality->editForm();
//				}else{
//					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Edit Records</div>';	
//				}
				break;
			case 'delete':
//				if(strpos($_SESSION['userper'],'d') !== false) {
					$personality->delete();
					echo'<script>location.href="index.php?controller=personality&action=personality&subaction=listData";</script>';
//				}else {
//					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Delete Record</div>';	
//				}
				break;
		}
	}
}
else{
		echo '<center><div class="notmsgHeader" ><img src="images/error.gif">&nbsp;&nbsp;<strong>You may be in wrong place!!!</strong></div></center>';
}
?>