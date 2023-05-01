<?php
/*
echo "work";
print_r($_REQUEST);*/

if(isset($_REQUEST['action'])){

	$include_class = $_REQUEST['action'].".php";
	include ($include_class);
//	echo $include_class;
//    print_r($_REQUEST);
	// include ($include_class);
   // echo "work2";
	/* Start Product Master */
	if($_REQUEST['action'] == 'jobs'){

		$jobs = new jobs();
		switch($_REQUEST['subaction']){
			case 'add':
				if(strpos($_SESSION['userper'],'a') !== false) {
					if($jobs->add()){
						echo'<script>location.href="index.php?controller=jobs&action=jobs&subaction=listData";</script>';
					}
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Add Record</div>';
				}
				break;
			case 'addForm':
				if(strpos($_SESSION['userper'],'a') !== false) {
                    $jobs->addForm();
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Add Record</div>';
				}
				break;
			case 'listData':
                {
                    
                    $jobs->listData();
                }

				break;
			case 'edit':
				if($jobs->edit()){
					echo'<script>location.href="index.php?controller=jobs&action=jobs&subaction=listData";</script>';
				}
				break;
			case 'editForm':
				if(strpos($_SESSION['userper'],'e') !== false) {
                    $jobs->editForm();
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Add Record</div>';

				}
				break;
			case 'delete':
				if(strpos($_SESSION['userper'],'d') !== false) {
                    $jobs->delete();
					echo'<script>location.href="index.php?controller=jobs&action=jobs&subaction=listData";</script>';
				}else{
					echo '<div class="alert alert-error">You donot have Sufficient Permissions to Add Record</div>';

				}
				break;
		}
	}
}
else{
		echo '<center><div class="notmsgHeader" ><img src="images/error.gif">&nbsp;&nbsp;<strong>You may be in wrong place!!!</strong></div></center>';
}
?>