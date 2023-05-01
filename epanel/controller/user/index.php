<?php
if(isset($_REQUEST['action'])){
	$include_class = $_REQUEST['action'].".php";
	include ($include_class);
	if($_REQUEST['action'] == 'user'){
		$user = new users();	
		switch($_REQUEST['subaction']){
			case 'add':
				if(strpos($_SESSION['userper'],'a') !== false) {
					if($user->add()){
						echo '<script>location.href="index.php?controller=user&action=user&subaction=listData";</script>';
					}else{
						echo '<script>location.href="index.php?controller=user&action=user&subaction=listData";</script>';
					}
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Add Record</div>';
				}
				/*if($user->add()){
				echo '<script>location.href="index.php?controller=user&action=user&subaction=listData&msg=addusermsg";</script>';
				}*/
				break;
			case 'addForm':
				if(strpos($_SESSION['userper'],'a') !== false) {
					$user->addForm();
				}else {
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Add Record</div>';	
				}
				/*$permission = getPermission($_SESSION['group'],'user');
				$pos = strrpos($permission,"a");
				if(!(is_bool($pos)) && $pos >= 0){
					$user->addForm();
				}
				else
				{
					echo '<center><div class="notmsgHeader" ><img src="images/error.gif">&nbsp;&nbsp;<strong>You donot have Sufficient Permissions to Create New User</strong></div></center>';	
				}*/
				break;
			case 'listData':
				if(strpos($_SESSION['userper'],'v') !== false) {
					$user->listData();
				}
				else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to View Record</div>';	
				}
				/*$permission = getPermission($_SESSION['group'],'user');
				$pos = strrpos($permission,"v");	
				if(!(is_bool($pos)) && $pos >= 0){
					$user->listData();
				}else{
					echo '<center><div class="notmsgHeader" ><img src="images/error.gif">&nbsp;&nbsp;<strong>You donot have Sufficient Permissions to View Records</strong></div></center>';	
				}*/
				break;
			case 'edit':
				if(strpos($_SESSION['userper'],'e') !== false) {
					if($user->edit()){
					echo '<script>location.href="index.php?controller=user&action=user&subaction=listData";</script>';
					}
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Edit Records</div>';	
				}
				/*if($user->edit()){
				echo '<script>location.href="index.php?controller=user&action=user&subaction=listData&msg=editusermsg";</script>';
				}*/
				break;
			case 'editForm':
				if(strpos($_SESSION['userper'],'e') !== false) {
					$user->editForm();
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Edit Records</div>';	
				}
				/*$permission = getPermission($_SESSION['group'],'user');
				$pos = strrpos($permission,"e");
				if(!(is_bool($pos)) && $pos >= 0){
					$user->editForm();
					}
				else
				{
					echo '<center><div class="notmsgHeader" ><img src="images/error.gif">&nbsp;&nbsp;<strong>You donot have Sufficient Permissions to Edit User Detail</strong></div></center>';	
				}*/
				break;
			case 'delete':
				if(strpos($_SESSION['userper'],'d') !== false) {
					if($user->delete()){
					echo '<script>location.href="index.php?controller=user&action=user&subaction=listData";</script>';
					}	
				}else {
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Delete Record</div>';	
				}
			case 'pwdForm':
				
					$user->pwdForm();
					break;
				
			case 'editpwd':
				
					if($user->editpwd()){
						
					echo '<script>location.href="index.php?controller=user&action=user&subaction=listData";</script>';
					}
					
				break;
		}
	}

    else if($_REQUEST['action'] == 'usergroup'){
		$usergroup = new usergroup();	
		switch($_REQUEST['subaction']){
			case 'add':
				if(strpos($_SESSION['userper'],'a') !== false) {
					if($usergroup->add()){
						echo '<script>location.href="index.php?controller=user&action=usergroup&subaction=listData";</script>';
					}else{
						echo '<script>location.href="index.php?controller=user&action=usergroup&subaction=listData";</script>';
					}
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Add Record</div>';
				}
				/*if($user->add()){
				echo '<script>location.href="index.php?controller=user&action=user&subaction=listData&msg=addusermsg";</script>';
				}*/
				break;
			case 'addForm':
				if(strpos($_SESSION['userper'],'a') !== false) {
					$usergroup->addForm();
				}else {
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Add Record</div>';	
				}
				/*$permission = getPermission($_SESSION['group'],'user');
				$pos = strrpos($permission,"a");
				if(!(is_bool($pos)) && $pos >= 0){
					$user->addForm();
				}
				else
				{
					echo '<center><div class="notmsgHeader" ><img src="images/error.gif">&nbsp;&nbsp;<strong>You donot have Sufficient Permissions to Create New User</strong></div></center>';	
				}*/
				break;
			case 'listData':
				if(strpos($_SESSION['userper'],'v') !== false) {
					$usergroup->listData();
				}
				else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to View Record</div>';	
				}
				/*$permission = getPermission($_SESSION['group'],'user');
				$pos = strrpos($permission,"v");	
				if(!(is_bool($pos)) && $pos >= 0){
					$user->listData();
				}else{
					echo '<center><div class="notmsgHeader" ><img src="images/error.gif">&nbsp;&nbsp;<strong>You donot have Sufficient Permissions to View Records</strong></div></center>';	
				}*/
				break;
			case 'edit':
				if(strpos($_SESSION['userper'],'e') !== false) {
					if($usergroup->edit()){
					echo '<script>location.href="index.php?controller=user&action=usergroup&subaction=listData";</script>';
					}
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Edit Records</div>';	
				}
				/*if($user->edit()){
				echo '<script>location.href="index.php?controller=user&action=user&subaction=listData&msg=editusermsg";</script>';
				}*/
				break;
			case 'editForm':
				if(strpos($_SESSION['userper'],'e') !== false) {
					$usergroup->editForm();
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Edit Records</div>';	
				}
				/*$permission = getPermission($_SESSION['group'],'user');
				$pos = strrpos($permission,"e");
				if(!(is_bool($pos)) && $pos >= 0){
					$user->editForm();
					}
				else
				{
					echo '<center><div class="notmsgHeader" ><img src="images/error.gif">&nbsp;&nbsp;<strong>You donot have Sufficient Permissions to Edit User Detail</strong></div></center>';	
				}*/
				break;
			case 'delete':
				if(strpos($_SESSION['userper'],'d') !== false) {
					if($usergroup->delete()){
					echo '<script>location.href="index.php?controller=user&action=usergroup&subaction=listData";</script>';
					}	
				}else {
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Delete Record</div>';	
				}
				/*$permission = getPermission($_SESSION['group'],'user');
				$pos = strrpos($permission,"d");	
				if(!(is_bool($pos)) && $pos >= 0){
					if($user->deleteuser()){
					echo '<script>location.href="index.php?controller=user&action=user&subaction=listData&msg=deleteusermsg";</script>';
					}
				}else{
					echo'<script>';
					echo 'location.href="index.php?controller=user&action=user&subaction=listData&msg=deleteusermsg";';
					echo'</script>';
				}*/	
				break;
		}
	}	
}
?>