<?php
/*include("includes/configure.php");*/
if(isset($_GET['action'])){
	$include_class = $_GET['action'].".php";
	include ($include_class);
	if($_GET['action'] == 'job'){
		$job = new job();	
		switch($_GET['subaction']){
			case 'listjob':
				$job->listjob();
				break;
			case 'deletejob':
				if($job->delete()){
					echo '<script>location.href="index.php?controller=job&action=job&subaction=listjob";</script>';
				}
				break;
		}
	}
}
?>