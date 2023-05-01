<?php

if(isset($_REQUEST['action'])){
	$include_class = $_REQUEST['action'].".php";
	include ($include_class);
	
	/* Start faq Master */
	if($_REQUEST['action'] == 'faq'){
		
		$faq = new faq();	
		switch($_REQUEST['subaction']){
			case 'add':
				if($faq->add()){
					echo'<script>location.href="index.php?controller=faq&action=faq&subaction=listData&msg=addmsg";</script>';
				}
				break;
			case 'addForm':
				
				$faq->addForm();
				/*
				$permission = getPermission($_SESSION['group'],'faq');
				$pos = strrpos($permission,"a");	
				if(!(is_bool($pos)) && $pos >= 0){
					$faq->newfaq_display();
				}else	{
					echo '<center><div class="notmsgHeader" ><img src="images/error.gif">&nbsp;&nbsp;&nbsp;<strong>You donot have Sufficient Permissions to Add New Records</strong></div></center>';	
				}*/
				break;
			case 'listData':
				$faq->listData();
				/*
				$permission = getPermission($_SESSION['group'],'faq');
				$pos = strrpos($permission,"v");	
				if(!(is_bool($pos)) && $pos >= 0){
					$faq->listfaq();
				}else {
					echo '<center><div class="notmsgHeader" ><img src="images/error.gif">&nbsp;&nbsp;&nbsp;<strong>You donot have Sufficient Permissions to View Records</strong></div></center>';
				} */
				break;
			case 'edit':
				if($faq->edit()){
					echo'<script>location.href="index.php?controller=faq&action=faq&subaction=listData";</script>';
				}
				break;
			case 'editForm':
				$faq->editForm();
				/*
				$permission = getPermission($_SESSION['group'],'faq');
				$pos = strrpos($permission,"e");	
				if(!(is_bool($pos)) && $pos >= 0){
					$faq->editfaq_display();
				}else{
					echo '<center><div class="notmsgHeader" ><img src="images/error.gif">&nbsp;&nbsp;&nbsp;<strong>You donot have Sufficient Permissions to Edit Records</strong></div></center>';
				}
				*/
				break;
			case 'delete':			    
				 $faq->delete();
					echo'<script>location.href="index.php?controller=faq&action=faq&subaction=listData";</script>';
				break;
		}
	}
	/* Start Start Type Master */
	if($_REQUEST['action'] == 'faqtype'){
		$faqtype = new faqtype();	
		switch($_REQUEST['subaction']){
			case 'add':
				if($faqtype->add()){
					echo'<script>location.href="index.php?controller=faq&action=faqtype&subaction=listData&msg=addmsg";</script>';
				}
				break;
			case 'addForm':
				$faqtype->addForm();
				break;
			case 'listData':
				$faqtype->listData();
				break;
			case 'edit':
				if($faqtype->edit()){
					echo'<script>location.href="index.php?controller=faq&action=faqtype&subaction=listData";</script>';
				}
				break;
			case 'editForm':
				$faqtype->editForm();
				break;
			case 'delete':			    
				 $faqtype->delete();
					echo'<script>location.href="index.php?controller=faq&action=faqtype&subaction=listData";</script>';
				break;
		}
	}
}
else{
		echo '<center><div class="notmsgHeader" ><img src="images/error.gif">&nbsp;&nbsp;<strong>You may be in wrong place!!!</strong></div></center>';
}
?>