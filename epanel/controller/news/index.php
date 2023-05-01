<?php
if(isset($_REQUEST['action'])){
	$include_class = $_REQUEST['action'].".php";
	include ($include_class);	
	/* Start Product Master */
	if($_REQUEST['action'] == 'news'){
		$news = new news();	
		switch($_REQUEST['subaction']){
			case 'add':
				if(strpos($_SESSION['userper'],'a') !== false) {
					if($news->add()){
						echo '<script>location.href="index.php?controller=news&action=news&subaction=listData";</script>';
					}
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Add Record</div>';
				}
				/*if($news->add()){
					echo'<script>location.href="index.php?controller=news&action=news&subaction=listData&msg=addmsg";</script>';
				}*/
				break;
			case 'addForm':
				if(strpos($_SESSION['userper'],'a') !== false) {
					$news->addForm();
				}else {
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Add Record</div>';	
				}
				/*$news->addForm();
				$permission = getPermission($_SESSION['group'],'news');
				$pos = strrpos($permission,"a");	
				if(!(is_bool($pos)) && $pos >= 0){
					$news->newnews_display();
				}else	{
					echo '<center><div class="notmsgHeader" ><img src="images/error.gif">&nbsp;&nbsp;&nbsp;<strong>You donot have Sufficient Permissions to Add New Records</strong></div></center>';	
				}*/
				break;
			case 'listData':
				if(strpos($_SESSION['userper'],'v') !== false) {
					$news->listData();
				}
				else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to View Record</div>';	
				}
				/*$news->listData();
				$permission = getPermission($_SESSION['group'],'news');
				$pos = strrpos($permission,"v");	
				if(!(is_bool($pos)) && $pos >= 0){
					$news->listnews();
				}else {
					echo '<center><div class="notmsgHeader" ><img src="images/error.gif">&nbsp;&nbsp;&nbsp;<strong>You donot have Sufficient Permissions to View Records</strong></div></center>';
				} */
				break;
			case 'edit':
				if(strpos($_SESSION['userper'],'e') !== false) {
					if($news->edit()){
					echo '<script>location.href="index.php?controller=news&action=news&subaction=listData";</script>';
					}
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Edit Records</div>';	
				}
				/*if($news->edit()){
					echo'<script>location.href="index.php?controller=news&action=news&subaction=listData";</script>';
				}*/
				break;
			case 'editForm':
				if(strpos($_SESSION['userper'],'e') !== false) {
					$news->editForm();
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Edit Records</div>';	
				}
				/*$news->editForm();
				$permission = getPermission($_SESSION['group'],'news');
				$pos = strrpos($permission,"e");	
				if(!(is_bool($pos)) && $pos >= 0){
					$news->editnews_display();
				}else{
					echo '<center><div class="notmsgHeader" ><img src="images/error.gif">&nbsp;&nbsp;&nbsp;<strong>You donot have Sufficient Permissions to Edit Records</strong></div></center>';
				}
				*/
				break;
			case 'delete':			
				if(strpos($_SESSION['userper'],'d') !== false) {
					if($news->delete()){
					echo '<script>location.href="index.php?controller=news&action=news&subaction=listData";</script>';
					}	
				}else {
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Delete Record</div>';	
				}
				 /*$news->delete();	echo'<script>location.href="index.php?controller=news&action=news&subaction=listData";</script>';*/
				break;
			case 'ajaxPost':
				$news->ajaxPost();
				break;
		}
	}
	/* Start News_Master */
	if($_REQUEST['action'] == 'newsmaster'){
		$newsmaster = new newsmaster();	
		switch($_REQUEST['subaction']){
			case 'add':
				if(strpos($_SESSION['userper'],'a') !== false) {
					if($newsmaster->add()){
						echo '<script>location.href="index.php?controller=news&action=newsmaster&subaction=listData";</script>';
					}
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Add Record</div>';
				}
				/*if($newsmaster->add()){
					echo'<script>location.href="index.php?controller=news&action=newsmaster&subaction=listData&msg=addmsg";</script>';
				}*/
				break;
			case 'addForm':
				if(strpos($_SESSION['userper'],'a') !== false) {
					$newsmaster->addForm();
				}else {
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Add Record</div>';	
				}
				/*$newsmaster->addForm();
				$permission = getPermission($_SESSION['group'],'news');
				$pos = strrpos($permission,"a");	
				if(!(is_bool($pos)) && $pos >= 0){
					$news->newnews_display();
				}else	{
					echo '<center><div class="notmsgHeader" ><img src="images/error.gif">&nbsp;&nbsp;&nbsp;<strong>You donot have Sufficient Permissions to Add New Records</strong></div></center>';	
				}*/
				break;
			case 'listData':
				if(strpos($_SESSION['userper'],'v') !== false) {
					$newsmaster->listData();
				}
				else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to View Record</div>';	
				}
				/*$newsmaster->listData();
				$permission = getPermission($_SESSION['group'],'news');
				$pos = strrpos($permission,"v");	
				if(!(is_bool($pos)) && $pos >= 0){
					$news->listnews();
				}else {
					echo '<center><div class="notmsgHeader" ><img src="images/error.gif">&nbsp;&nbsp;&nbsp;<strong>You donot have Sufficient Permissions to View Records</strong></div></center>';
				} */
				break;
			case 'edit':
				if(strpos($_SESSION['userper'],'e') !== false) {
					if($newsmaster->edit()){
					echo '<script>location.href="index.php?controller=news&action=newsmaster&subaction=listData";</script>';
					}
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Edit Records</div>';	
				}
			/*	if($newsmaster->edit()){
					echo'<script>location.href="index.php?controller=news&action=newsmaster&subaction=listData";</script>';
				}*/
				break;
			case 'editForm':
				if(strpos($_SESSION['userper'],'e') !== false) {
					$newsmaster->editForm();
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Edit Records</div>';	
				}
				/*$newsmaster->editForm();
				$permission = getPermission($_SESSION['group'],'news');
				$pos = strrpos($permission,"e");	
				if(!(is_bool($pos)) && $pos >= 0){
					$news->editnews_display();
				}else{
					echo '<center><div class="notmsgHeader" ><img src="images/error.gif">&nbsp;&nbsp;&nbsp;<strong>You donot have Sufficient Permissions to Edit Records</strong></div></center>';
				}
				*/
				break;
			case 'delete':		
				if(strpos($_SESSION['userper'],'d') !== false) {
					if($newsmaster->delete()){
					echo '<script>location.href="index.php?controller=news&action=newsmaster&subaction=listData";</script>';
					}	
				}else {
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Delete Record</div>';	
				}
				/* $newsmaster->delete();
					echo'<script>location.href="index.php?controller=news&action=newsmaster&subaction=listData";</script>';*/
				break;
		}
	}
}
else{
		echo '<center><div class="notmsgHeader" ><img src="images/error.gif">&nbsp;&nbsp;<strong>You may be in wrong place!!!</strong></div></center>';
}


?>