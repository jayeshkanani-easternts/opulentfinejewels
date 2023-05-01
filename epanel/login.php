<?php
include "includes/app_top.php";
$msg = "";
if(isset($_GET['action']) && $_GET['action'] == 'chk'){
	
	$pass =  ets_db_real_escape_string($_POST['pwd']);
	$login = ets_db_real_escape_string($_POST['user']);
	$check_hash = hash('sha256', $login . $pass);
	
	
	$chklogin = ets_db_query("Select * from user_master where loginID = '".$login."' and password = '".$check_hash."'") or die(ets_db_error());
	if(ets_db_num_rows($chklogin) > 0){
		while($logrs = ets_db_fetch_array($chklogin)){
			$_SESSION['logged'] = 1;
			$_SESSION['username'] = $logrs['firstname'];
			$_SESSION['group'] = $logrs['group_id'];
			$_SESSION['userID'] = $logrs['userID'];
			$_SESSION['loginID'] = $logrs['loginID'];
			$_SESSION['login'] = $logrs['userID'];
			$_SESSION['email'] = $logrs['email'];
		$insertsession = ets_db_query("Insert into session_log_master (session_log_id,user_id,loginID,remote_ip,last_access,status) values(null,{$logrs['userID']},'".$logrs['loginID']."','".$_SERVER['REMOTE_ADDR']."',now(),'I')") or die(ets_db_error().$insertsession);	
		}
		echo '<script>location.href="index.php";</script>';
	}
	else{
		$msg = '<center><span class="erromsg">Sorry, Authorization is failed..</span></center>'; 
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo ADMINTITLE; ?></title>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/modernizr.prodesignz.js"></script>
<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
<script type="text/javascript">
<!--
jQuery(function(){
$(".login_error_message").slideDown("slow");

});
//-->
</script>
</head>
<body>
<?php if($msg != '') { ?> <div class="login_error_message"><?php echo $msg; ?></div> <?php } ?>
<div class="container">
	<div class="row">
		<div class="login-container">
		<!-- <center><div class="logo"><img src="img/login/easternts_logo.gif"></div></center> -->
		<center><div class="logo" style="margin-top:160px;"><h1>EASTERN</h1></center>
		</div>
	</div>
	</div>
	<div class="container">
		<div class="row">
		<form action="login.php?action=chk" class="form-signin" method="post" style="margin:0px auto;">
        <h2 class="form-signin-heading">sign in now</h2>
        <div class="login-wrap">
			<input type="text" class="form-control" name="user" id="inputEmail" placeholder="Your Login ID">
			<input class="form-control" type="password" name="pwd" id="inputPassword" placeholder="Your Password">
            
            <button type="submit" class="btn btn-lg btn-login btn-block">Sign in</button>
            
            
            

        </div>

          <!-- Modal -->
          

      </form>
			</div>
		</div>
	</div>
	
	
	
	
	
	
	
</div> <!-- /container -->
</body>
</html>