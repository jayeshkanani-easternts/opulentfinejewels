<?php
if(isset($_REQUEST['action'])){
	
	$include_class = $_REQUEST['action'].".php";
	include ($include_class);

	/* Start Product Master */
	if($_REQUEST['action'] == 'city'){
		
		$city = new city();	
		
		switch($_REQUEST['subaction']){
			
			
			case 'listData':
				
					$city->listData();
				
				break;
			
		}
	}
	/* Start News_Master */
	if($_REQUEST['action'] == 'details'){
		$details = new details();	
		switch($_REQUEST['subaction']){
			
			
			case 'listData':
				
					$details->listData();
				
				
				break;
			
			
		}
	}
	
	if($_REQUEST['action'] == 'dashboard'){
		
		$dashboard = new dashboard();	
		switch($_REQUEST['subaction']){
			
			
			case 'listData':
				
					$dashboard->listData();
				
				
				break;
			
			
		}
	}
}
else{
		echo '<center><div class="notmsgHeader" ><img src="images/error.gif">&nbsp;&nbsp;<strong>You may be in wrong place!!!</strong></div></center>';
}


?>