<?php
if(isset($_REQUEST['action'])){
	
	$include_class = $_REQUEST['action'].".php";
	include ($include_class);
	/* Start album Master */
	if($_REQUEST['action'] == 'album'){
		$album = new album();
		switch($_REQUEST['subaction']){
			case 'add':
				if(strpos($_SESSION['userper'],'a') !== false) {
					if($album->add()){
						echo '<script>location.href="index.php?controller=gallery&action=album&subaction=listData";</script>';
					}else{
						echo '<script>location.href="index.php?controller=gallery&action=album&subaction=listData";</script>';
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
					$album->addForm();
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
					$album->listData();
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
					if($album->edit()){
					echo '<script>location.href="index.php?controller=gallery&action=album&subaction=listData";</script>';
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
					$album->editForm();
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
					if($album->delete()){
					echo '<script>location.href="index.php?controller=gallery&action=album&subaction=listData";</script>';
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
	if($_REQUEST['action'] == 'gallery'){
		$gallery = new gallery();
		switch($_REQUEST['subaction']){
			case 'add':
				if(strpos($_SESSION['userper'],'a') !== false) {
					if($gallery->add()){
						echo '<script>location.href="index.php?controller=gallery&action=gallery&subaction=listData";</script>';
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
					$gallery->addForm();
				}else {
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Add Record</div>';	
				}
				
				break;
			case 'listData':
				if(strpos($_SESSION['userper'],'v') !== false) {
					
					$gallery->listData();
				}
				else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to View Record</div>';	
				}
				
				break;
			case 'edit':
				if(strpos($_SESSION['userper'],'e') !== false) {
					if($gallery->edit()){
					echo '<script>location.href="index.php?controller=gallery&action=gallery&subaction=listData";</script>';
					}
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Edit Records</div>';	
				}
				
				break;
			case 'editForm':
					if(strpos($_SESSION['userper'],'e') !== false) {
					$gallery->editForm();
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Edit Records</div>';	
				}
				
				break;
				case 'delete':			
					if(strpos($_SESSION['userper'],'d') !== false) {
					if($gallery->delete()){
					echo '<script>location.href="index.php?controller=gallery&action=gallery&subaction=listData";</script>';
					}	
				}else {
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Delete Record</div>';	
				}
				
				break;
		}
	}
		if($_REQUEST['action'] == 'albumtype'){
		$albumtype = new albumtype();
		switch($_REQUEST['subaction']){
			case 'add':
				if(strpos($_SESSION['userper'],'a') !== false) {
					if($albumtype->add()){
						echo '<script>location.href="index.php?controller=gallery&action=albumtype&subaction=listData";</script>';
					}else{
						echo '<script>location.href="index.php?controller=gallery&action=albumtype&subaction=listData";</script>';
					}
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Add Record</div>';
				}
				
				break;
			case 'addForm':
				if(strpos($_SESSION['userper'],'a') !== false) {
					$albumtype->addForm();
				}else {
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Add Record</div>';	
				}
				
				break;
			case 'listData':
				if(strpos($_SESSION['userper'],'v') !== false) {
					$albumtype->listData();
				}
				else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to View Record</div>';	
				}
				
				break;
			case 'edit':
				if(strpos($_SESSION['userper'],'e') !== false) {
					if($albumtype->edit()){
					echo '<script>location.href="index.php?controller=gallery&action=albumtype&subaction=listData";</script>';
					}
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Edit Records</div>';	
				}
				
				break;
			case 'editForm':
					if(strpos($_SESSION['userper'],'e') !== false) {
					$albumtype->editForm();
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Edit Records</div>';	
				}
				
				break;
				case 'delete':			
					if(strpos($_SESSION['userper'],'d') !== false) {
					if($albumtype->delete()){
					echo '<script>location.href="index.php?controller=gallery&action=albumtype&subaction=listData";</script>';
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