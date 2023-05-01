<?php
include (DIR_FS_INCLUDES.'functions/page_functions.php');

if(isset($_REQUEST['action'])){
	$include_class = $_REQUEST['action'].".php";
	include ($include_class);
	if($_REQUEST['action'] == 'pages'){
		$pages = new pages();
		switch($_REQUEST['subaction']){
			case 'listData':
				if(strpos($_SESSION['userper'],'v') !== false) {
					$pages->listData();
				}
				else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to View Record</div>';	
				}
				break;
			case 'edit':
				if(strpos($_SESSION['userper'],'e') !== false) {
					if($pages->edit()){
					echo '<script>location.href="index.php?controller=pages&action=pages&subaction=listData";</script>';
					}
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Edit Records</div>';	
				}
				break;
			case 'editForm':
				if(strpos($_SESSION['userper'],'e') !== false) {
					$pages->editForm();
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Edit Records</div>';	
				}
				break;
			case 'addForm':
				if(strpos($_SESSION['userper'],'a') !== false) {
					$pages->addForm();
				}else {
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Add Record</div>';	
				}
				break;
			case 'add':
				if(strpos($_SESSION['userper'],'a') !== false) {
					if($pages->add()){
						echo '<script>location.href="index.php?controller=pages&action=pages&subaction=listData";</script>';
					}else{
						echo '<script>location.href="index.php?controller=pages&action=pages&subaction=listData";</script>';
					}
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Add Record</div>';
				}
				break;
			case 'delete':
				if(strpos($_SESSION['userper'],'d') !== false) {
					if($pages->delete()){
					echo '<script>location.href="index.php?controller=pages&action=pages&subaction=listData";</script>';
					}	
				}else {
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Delete Record</div>';	
				}
				break;
		}
	} 
	if($_REQUEST['action'] == 'homecontent'){
		$homecontent = new homecontent();
		if($_REQUEST['subaction'] == 'editmaincontentform'){
			$permission = getPermission($_SESSION['group'],'pages');
			$pos = strrpos($permission,"e");
			if(!(is_bool($pos)) && $pos >= 0){
				$homecontent->editpg_display();
			}
			else{
				echo '<center><div class="notmsgHeader" ><img src="images/error.gif">&nbsp;&nbsp;<strong>You donot have Sufficient Permissions to edit home page content</strong></div></center>';
					
			}
		}
		if($_REQUEST['subaction'] == 'editmaincontent'){
				$homecontent->edit_homepg($_POST['page_content']);
echo '<script>location.href="index.php?controller=pages&action=homecontent&subaction=editmaincontentform&msg=edmainmsg";</script>';
		}
	}
	if($_REQUEST['action'] == 'pageimages'){
		$pageimages = new pageimages();

		switch($_REQUEST['subaction']){
			
			case 'listData':
				if(strpos($_SESSION['userper'],'v') !== false) {
					$pageimages->listData();
				}
				else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to View Record</div>';	
				}
				break;
			case 'edit':
				if(strpos($_SESSION['userper'],'e') !== false) {
					if($pageimages->edit()){
					echo '<script>location.href="index.php?controller=pages&action=pageimages&subaction=listData";</script>';
					}
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Edit Records</div>';	
				}
				break;
			case 'editForm':
				if(strpos($_SESSION['userper'],'e') !== false) {
					$pageimages->editForm();
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Edit Records</div>';	
				}
				break;
			case 'delete':
				if(strpos($_SESSION['userper'],'d') !== false) {
					if($pageimages->delete()){
					echo '<script>location.href="index.php?controller=pages&action=pageimages&subaction=listData";</script>';
					}	
				}else {
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Delete Record</div>';	
				}
				break;
		}
	}
} ?>
