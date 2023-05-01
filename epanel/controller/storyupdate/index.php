<?php
if(isset($_REQUEST['action'])){
	$include_class = $_REQUEST['action'].".php";
	include ($include_class);
	
	/* Start storyupdate Master */
	if($_REQUEST['action'] == 'storyupdate'){
		$storyupdate = new storyupdate();	
		switch($_REQUEST['subaction']){
			case 'add':
				if($storyupdate->add()){
					echo'<script>location.href="index.php?controller=storyupdate&action=storyupdate&subaction=listData&msg=addmsg";</script>';
				}
				break;
			case 'addForm':
				$storyupdate->addForm();
				
				break;
			case 'listData':
				$storyupdate->listData();
				
				break;
			case 'edit':
				if($storyupdate->edit()){
					echo'<script>location.href="index.php?controller=storyupdate&action=storyupdate&subaction=listData";</script>';
				}
				break;
			case 'editForm':
				$storyupdate->editForm();
				
				break;
			case 'delete':			    
				 $storyupdate->delete();
					echo'<script>location.href="index.php?controller=storyupdate&action=storyupdate&subaction=listData";</script>';
				break;
		}
	}
	
}
else{
		echo '<center><div class="notmsgHeader" ><img src="images/error.gif">&nbsp;&nbsp;<strong>You may be in wrong place!!!</strong></div></center>';
}
?>