<?php
if(isset($_REQUEST['action'])){
	$include_class = $_REQUEST['action'].".php";
	include ($include_class);
	
	/* Start Product Master */
	if($_REQUEST['action'] == 'banner'){
		$banner = new banner();	
		switch($_REQUEST['subaction']){
			case 'add':
				if(strpos($_SESSION['userper'],'a') !== false) {
					if($banner->add()){
						echo'<script>location.href="index.php?controller=banner&action=banner&subaction=listData&msg=addmsg";</script>';
					}
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Add Record</div>';
				}
				break;
			case 'addForm':
				if(strpos($_SESSION['userper'],'a') !== false) {
					$banner->addForm();
				}
				else {
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Add Record</div>';	
				}
				break;
			case 'listData':
				if(strpos($_SESSION['userper'],'v') !== false) {
					$banner->listData();
				}
				else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to View Record</div>';	
				}
				break;
			case 'edit':
				if(strpos($_SESSION['userper'],'e') !== false) {
					if($banner->edit()){
					echo'<script>location.href="index.php?controller=banner&action=banner&subaction=listData";</script>';
				}
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Edit Records</div>';	
				}
				break;
			case 'editForm':
				if(strpos($_SESSION['userper'],'e') !== false) {
					$banner->editForm();
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Edit Records</div>';	
				}
				break;
			case 'delete':
				if(strpos($_SESSION['userper'],'d') !== false) {
					$banner->delete();
					echo'<script>location.href="index.php?controller=banner&action=banner&subaction=listData";</script>';
				}else {
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Delete Record</div>';	
				}
				break;
		}
	}
}
else{
		echo '<center><div class="notmsgHeader" ><img src="images/error.gif">&nbsp;&nbsp;<strong>You may be in wrong place!!!</strong></div></center>';
}
?>