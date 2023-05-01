<?php
if(isset($_REQUEST['action'])){
	$include_class = $_REQUEST['action'].".php";
	include ($include_class);
	
	/* Start Product Master */
	if($_REQUEST['action'] == 'epanel'){
		$epanel = new epanel();	
		switch($_REQUEST['subaction']){
			case 'add':
				if(strpos($_SESSION['userper'],'a') !== false) {
					if($epanel->add()){
						echo'<script>location.href="index.php?controller=settings&action=epanel&subaction=addForm";</script>';
					}
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Add Record</div>';
				}
				break;
			case 'addForm':
				$epanel->addForm();
				break;
			
		}
	}
	
	if($_REQUEST['action'] == 'website'){
		$website = new website();	
		switch($_REQUEST['subaction']){
			case 'add':
				if(strpos($_SESSION['userper'],'a') !== false) {
					if($website->add()){
						echo'<script>location.href="index.php?controller=settings&action=website&subaction=addForm";</script>';
					}
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Add Record</div>';
				}
				break;
			case 'addForm':
				$website->addForm();
				break;
			
		}
	}
}
else{
		echo '<center><div class="notmsgHeader" ><img src="images/error.gif">&nbsp;&nbsp;<strong>You may be in wrong place!!!</strong></div></center>';
}
?>