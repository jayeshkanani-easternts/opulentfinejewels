<?php
if(isset($_REQUEST['action'])){
	$include_class = $_REQUEST['action'].".php";
	include ($include_class);
	
	if($_REQUEST['action'] == 'popup'){
		$popup = new popup();	
		switch($_REQUEST['subaction']){
			case 'add':
				if($popup->add()){
						echo'<script>location.href="index.php?controller=popup&action=popup&subaction=addForm";</script>';
					}
				break;
			case 'addForm':
				$popup->addForm();
				break;
			
		}
	}
}
else{
		echo '<center><div class="notmsgHeader" ><img src="images/error.gif">&nbsp;&nbsp;<strong>You may be in wrong place!!!</strong></div></center>';
}
?>