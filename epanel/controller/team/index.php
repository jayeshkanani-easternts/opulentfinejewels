<?php
if(isset($_REQUEST['action'])){
	$include_class = $_REQUEST['action'].".php";
	include ($include_class);
	
	/* Start Product Master */
	if($_REQUEST['action'] == 'team'){
		$team = new team();	
		switch($_REQUEST['subaction']){
			case 'add':
				if(strpos($_SESSION['userper'],'a') !== false) {
					if($team->add()){
						echo'<script>location.href="index.php?controller=team&action=team&subaction=listData&msg=addmsg";</script>';
					}
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Add Record</div>';
				}
				break;
			case 'addForm':
				$team->addForm();
				break;
			case 'listData':
				$team->listData();
				break;
			case 'edit':
				if($team->edit()){
					echo'<script>location.href="index.php?controller=team&action=team&subaction=listData";</script>';
				}
				break;
			case 'editForm':
				$team->editForm();
				break;
			case 'delete':			    
				$team->delete();
				echo'<script>location.href="index.php?controller=team&action=team&subaction=listData";</script>';
				break;
		}
	}
	

}
else{
		echo '<center><div class="notmsgHeader" ><img src="images/error.gif">&nbsp;&nbsp;<strong>You may be in wrong place!!!</strong></div></center>';
}
?>