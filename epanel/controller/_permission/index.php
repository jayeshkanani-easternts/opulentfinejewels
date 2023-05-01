<?php
if(isset($_REQUEST['action'])){
	$include_class = $_REQUEST['action'].".php";
	include ($include_class);
	if($_REQUEST['action'] == 'permission'){
		$permissions = new permission();
		switch($_REQUEST['subaction']){
			case 'add':
				if(strpos($_SESSION['userper'],'a') !== false) {
					if($permissions->add()){
						echo '<script>location.href="index.php?controller=permission&action=permission&subaction=listData";</script>';
					}else{
						echo '<script>location.href="index.php?controller=permission&action=permission&subaction=listData";</script>';
					}
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Add Record</div>';
				}
				break;
			case 'addForm':
				if(strpos($_SESSION['userper'],'a') !== false) {
					$permissions->addForm();
				}else {
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Add Record</div>';	
				}
			break;
			case 'listData':
				if(strpos($_SESSION['userper'],'v') !== false) {
					$permissions->listData();
				}
				else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to View Record</div>';	
				}
				break;
			case 'edit':
				if(strpos($_SESSION['userper'],'e') !== false) {
					if($permissions->edit()){
					echo '<script>location.href="index.php?controller=permission&action=permission&subaction=listData";</script>';
					}
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Edit Records</div>';	
				}
				break;
			case 'editForm':
				if(strpos($_SESSION['userper'],'e') !== false) {
					$permissions->editForm();
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Edit Records</div>';	
				}
				break;
			case 'delete':
				if(strpos($_SESSION['userper'],'d') !== false) {
					if($permissions->delete()){
					echo '<script>location.href="index.php?controller=permission&action=permission&subaction=listData";</script>';
					}	
				}else {
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Delete Record</div>';	
				}
				break;
		}
	}
	
}
?>