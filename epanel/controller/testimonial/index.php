<?php
if(isset($_REQUEST['action'])){
	$include_class = $_REQUEST['action'].".php";
	include ($include_class);
	
	/* Start Testimonial Master */
	if($_REQUEST['action'] == 'testimonial'){
		$testimonial = new testimonial();	
		switch($_REQUEST['subaction']){
			case 'add':
				if($testimonial->add()){
					echo'<script>location.href="index.php?controller=testimonial&action=testimonial&subaction=listData&msg=addmsg";</script>';
				}
				break;
			case 'addForm':
				$testimonial->addForm();
				/*
				$permission = getPermission($_SESSION['group'],'testimonial');
				$pos = strrpos($permission,"a");	
				if(!(is_bool($pos)) && $pos >= 0){
					$testimonial->newtestimonial_display();
				}else	{
					echo '<center><div class="notmsgHeader" ><img src="images/error.gif">&nbsp;&nbsp;&nbsp;<strong>You donot have Sufficient Permissions to Add New Records</strong></div></center>';	
				}*/
				break;
			case 'listData':
				$testimonial->listData();
				/*
				$permission = getPermission($_SESSION['group'],'testimonial');
				$pos = strrpos($permission,"v");	
				if(!(is_bool($pos)) && $pos >= 0){
					$testimonial->listtestimonial();
				}else {
					echo '<center><div class="notmsgHeader" ><img src="images/error.gif">&nbsp;&nbsp;&nbsp;<strong>You donot have Sufficient Permissions to View Records</strong></div></center>';
				} */
				break;
			case 'edit':
				if($testimonial->edit()){
					echo'<script>location.href="index.php?controller=testimonial&action=testimonial&subaction=listData";</script>';
				}
				break;
			case 'editForm':
				$testimonial->editForm();
				/*
				$permission = getPermission($_SESSION['group'],'testimonial');
				$pos = strrpos($permission,"e");	
				if(!(is_bool($pos)) && $pos >= 0){
					$testimonial->edittestimonial_display();
				}else{
					echo '<center><div class="notmsgHeader" ><img src="images/error.gif">&nbsp;&nbsp;&nbsp;<strong>You donot have Sufficient Permissions to Edit Records</strong></div></center>';
				}
				*/
				break;
			case 'delete':			    
				 $testimonial->delete();
					echo'<script>location.href="index.php?controller=testimonial&action=testimonial&subaction=listData";</script>';
				break;
		}
	}
	/* Start Start Type Master */
	if($_REQUEST['action'] == 'testimonialtype'){
		$testimonialtype = new testimonialtype();	
		switch($_REQUEST['subaction']){
			case 'add':
				if($testimonialtype->add()){
					echo'<script>location.href="index.php?controller=testimonial&action=testimonialtype&subaction=listData&msg=addmsg";</script>';
				}
				break;
			case 'addForm':
				$testimonialtype->addForm();
				break;
			case 'listData':
				$testimonialtype->listData();
				break;
			case 'edit':
				if($testimonialtype->edit()){
					echo'<script>location.href="index.php?controller=testimonial&action=testimonialtype&subaction=listData";</script>';
				}
				break;
			case 'editForm':
				$testimonialtype->editForm();
				break;
			case 'delete':			    
				 $testimonialtype->delete();
					echo'<script>location.href="index.php?controller=testimonial&action=testimonialtype&subaction=listData";</script>';
				break;
		}
	}
}
else{
		echo '<center><div class="notmsgHeader" ><img src="images/error.gif">&nbsp;&nbsp;<strong>You may be in wrong place!!!</strong></div></center>';
}
?>