<?php
if(isset($_REQUEST['action'])){
	$include_class = $_REQUEST['action'].".php";
	include ($include_class);
	
	/* Start Product Master */
	if($_REQUEST['action'] == 'story'){
		$story = new story();	
		switch($_REQUEST['subaction']){
			case 'add':
				if(strpos($_SESSION['userper'],'a') !== false) {
					if($story->add()){
						echo'<script>location.href="index.php?controller=story&action=story&subaction=listData&msg=addmsg";</script>';
					}
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Add Record</div>';
				}
				break;
			case 'addForm':
				$story->addForm();
				break;
			case 'listData':
				$story->listData();
				break;
			case 'edit':
				if($story->edit()){
					echo'<script>location.href="index.php?controller=story&action=story&subaction=listData";</script>';
				}
				break;
			case 'editForm':
				$story->editForm();
				break;
			case 'delete':			    
				$story->delete();
				echo'<script>location.href="index.php?controller=story&action=story&subaction=listData";</script>';
				break;
		}
	}
}
else{
		echo '<center><div class="notmsgHeader" ><img src="images/error.gif">&nbsp;&nbsp;<strong>You may be in wrong place!!!</strong></div></center>';
}
?>