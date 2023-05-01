<?php
if(isset($_REQUEST['action'])){
	$include_class = $_REQUEST['action'].".php";
	include ($include_class);
	
	/* Start Module*/
	if($_REQUEST['action'] == 'module'){
		$module = new module();	
		switch($_REQUEST['subaction']){
			case 'add':
				if(strpos($_SESSION['userper'],'a') !== false) {
					if($module->add()){
						echo '<script>location.href="index.php?controller=module&action=module&subaction=listData";</script>';
					}else{
						echo '<script>location.href="index.php?controller=module&action=module&subaction=listData";</script>';
					}
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient modules to Add Record</div>';
				}
				/*if($module->add()){
					echo'<script>location.href="index.php?controller=module&action=module&subaction=listData&msg=addmsg";</script>';
				}*/
				break;
			case 'addForm':
				if(strpos($_SESSION['userper'],'a') !== false) {
					$module->addForm();
				}else {
					echo '<div class="alert alert-error">You donot have Sufficient modules to Add Record</div>';	
				}
				/*$module->addForm();
				$module = getmodule($_SESSION['group'],'module');
				$pos = strrpos($module,"a");	
				if(!(is_bool($pos)) && $pos >= 0){
					$module->newmodule_display();
				}else	{
					echo '<center><div class="notmsgHeader" ><img src="images/error.gif">&nbsp;&nbsp;&nbsp;<strong>You donot have Sufficient modules to Add New Records</strong></div></center>';	
				}*/
				break;
			case 'listData':
				if(strpos($_SESSION['userper'],'v') !== false) {
					$module->listData();
				}
				else{
					echo '<div class="alert alert-error">You donot have Sufficient modules to View Record</div>';	
				}
				/*$module->listData();
				$module = getmodule($_SESSION['group'],'module');
				$pos = strrpos($module,"v");	
				if(!(is_bool($pos)) && $pos >= 0){
					$module->listmodule();
				}else {
					echo '<center><div class="notmsgHeader" ><img src="images/error.gif">&nbsp;&nbsp;&nbsp;<strong>You donot have Sufficient modules to View Records</strong></div></center>';
				} */
				break;
			case 'edit':
				if(strpos($_SESSION['userper'],'e') !== false) {
					if($module->edit()){
					echo '<script>location.href="index.php?controller=module&action=module&subaction=listData";</script>';
					}
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient modules to Edit Records</div>';	
				}
				/*
				if($module->edit()){
					echo'<script>location.href="index.php?controller=module&action=module&subaction=listData";</script>';
				}*/
				break;
			case 'editForm':
				if(strpos($_SESSION['userper'],'e') !== false) {
					$module->editForm();
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient modules to Edit Records</div>';	
				}
				/*$module->editForm();
				$module = getmodule($_SESSION['group'],'module');
				$pos = strrpos($module,"e");	
				if(!(is_bool($pos)) && $pos >= 0){
					$module->editmodule_display();
				}else{
					echo '<center><div class="notmsgHeader" ><img src="images/error.gif">&nbsp;&nbsp;&nbsp;<strong>You donot have Sufficient modules to Edit Records</strong></div></center>';
				}
				*/
				break;
			case 'delete':
				if(strpos($_SESSION['userper'],'d') !== false) {
					if($module->delete()){
					echo '<script>location.href="index.php?controller=module&action=module&subaction=listData";</script>';
					}	
				}else {
					echo '<div class="alert alert-error">You donot have Sufficient modules to Delete Record</div>';	
				}
				 /*$module->delete();
					echo'<script>location.href="index.php?controller=module&action=module&subaction=listData";</script>';*/
				break;
		}
	}
}
else{
		echo '<center><div class="notmsgHeader" ><img src="images/error.gif">&nbsp;&nbsp;<strong>You may be in wrong place!!!</strong></div></center>';
}


?>