<?php
if(isset($_REQUEST['action'])){
	
	$include_class = $_REQUEST['action'].".php";
	include ($include_class);
	/* Start album Master */
	if($_REQUEST['action'] == 'csralbum'){
		$csralbum = new csralbum();
		switch($_REQUEST['subaction']){
			case 'add':
				if(strpos($_SESSION['userper'],'a') !== false) {
					if($csralbum->add()){
						echo '<script>location.href="index.php?controller=csrgallery&action=csralbum&subaction=listData";</script>';
					}else{
						echo '<script>location.href="index.php?controller=csrgallery&action=csralbum&subaction=listData";</script>';
					}
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Add Record</div>';
				}
				/*if($album->add()){
					echo'<script>location.href="index.php?controller=gallery&action=album&subaction=listData&msg=addmsg";</script>';
				}*/
				break;
			case 'addForm':
				if(strpos($_SESSION['userper'],'a') !== false) {
					$csralbum->addForm();
				}else {
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Add Record</div>';	
				}
				/*$album->addForm();
				$permission = getPermission($_SESSION['group'],'album');
				$pos = strrpos($permission,"a");	
				if(!(is_bool($pos)) && $pos >= 0){
					$album->newalbum_display();
				}else	{
					echo '<center><div class="notmsgHeader" ><img src="images/error.gif">&nbsp;&nbsp;&nbsp;<strong>You donot have Sufficient Permissions to Add New Records</strong></div></center>';	
				}*/
				break;
			case 'listData':
				if(strpos($_SESSION['userper'],'v') !== false) {
					$csralbum->listData();
				}
				else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to View Record</div>';	
				}
				/*$album->listData();
				$permission = getPermission($_SESSION['group'],'album');
				$pos = strrpos($permission,"v");	
				if(!(is_bool($pos)) && $pos >= 0){
					$album->listalbum();
				}else {
					echo '<center><div class="notmsgHeader" ><img src="images/error.gif">&nbsp;&nbsp;&nbsp;<strong>You donot have Sufficient Permissions to View Records</strong></div></center>';
				} */
				break;
			case 'edit':
				if(strpos($_SESSION['userper'],'e') !== false) {
					if($csralbum->edit()){
					echo '<script>location.href="index.php?controller=csrgallery&action=csralbum&subaction=listData";</script>';
					}
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Edit Records</div>';	
				}
				/*
				if($album->edit()){
					echo'<script>location.href="index.php?controller=gallery&action=album&subaction=listData";</script>';
				}*/
				break;
			case 'editForm':
					if(strpos($_SESSION['userper'],'e') !== false) {
					$csralbum->editForm();
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Edit Records</div>';	
				}
				/*$album->editForm();
				$permission = getPermission($_SESSION['group'],'album');
				$pos = strrpos($permission,"e");	
				if(!(is_bool($pos)) && $pos >= 0){
					$album->editalbum_display();
				}else{
					echo '<center><div class="notmsgHeader" ><img src="images/error.gif">&nbsp;&nbsp;&nbsp;<strong>You donot have Sufficient Permissions to Edit Records</strong></div></center>';
				}
				*/
				break;
				case 'delete':
					if(strpos($_SESSION['userper'],'d') !== false) {
					if($csralbum->delete()){
					echo '<script>location.href="index.php?controller=csrgallery&action=csralbum&subaction=listData";</script>';
					}	
				}else {
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Delete Record</div>';	
				}
				 /*$album->delete();
					echo'<script>location.href="index.php?controller=gallery&action=album&subaction=listData";</script>';*/
				break;
		}
	}
	
/* Start Gallery Master */
	if($_REQUEST['action'] == 'csrgallery'){
		$csrgallery = new csrgallery();
		switch($_REQUEST['subaction']){
			case 'add':
				if(strpos($_SESSION['userper'],'a') !== false) {
					if($csrgallery->add()){
						echo '<script>location.href="index.php?controller=csrgallery&action=csrgallery&subaction=listData";</script>';
					}
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Add Record</div>';
				}
				/*if($gallery->add()){
					echo'<script>location.href="index.php?controller=gallery&action=gallery&subaction=listData&msg=addmsg";</script>';
				}*/
				break;
			case 'addForm':
				if(strpos($_SESSION['userper'],'a') !== false) {
					$csrgallery->addForm();
				}else {
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Add Record</div>';	
				}
				
				break;
			case 'listData':
				if(strpos($_SESSION['userper'],'v') !== false) {
					
					$csrgallery->listData();
				}
				else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to View Record</div>';	
				}
				
				break;
			case 'edit':
				if(strpos($_SESSION['userper'],'e') !== false) {
					if($csrgallery->edit()){
					echo '<script>location.href="index.php?controller=csrgallery&action=csrgallery&subaction=listData";</script>';
					}
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Edit Records</div>';	
				}
				
				break;
			case 'editForm':
					if(strpos($_SESSION['userper'],'e') !== false) {
					$csrgallery->editForm();
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Edit Records</div>';	
				}
				
				break;
				case 'delete':			
					if(strpos($_SESSION['userper'],'d') !== false) {
					if($csrgallery->delete()){
					echo '<script>location.href="index.php?controller=csrgallery&action=csrgallery&subaction=listData";</script>';
					}	
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