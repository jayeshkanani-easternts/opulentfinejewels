<?php
	include "includes/app_top.php";
	$insertsession = ets_db_query("Insert into session_log_master (session_log_id,user_id,loginID,remote_ip,last_access,status) values(null,'".$_SESSION['login']."','".$_SESSION['loginID']."','".$_SERVER['REMOTE_ADDR']."',now(),'O')") or die(ets_db_error().$insertsession);	
	session_destroy();
	

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php echo ADMINTITLE; ?></title>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
<script type="text/javascript">
<!--
jQuery(function(r,s){
$(".logoff_message").show(3000);
$(".logoff_message").fadeOut(4000);
});
//-->
</script>
</head>
<div class="container">
	<div class="row">
		<div class="login-container">
		<!-- <center><div class="logo"><img src="img/login/easternts_logo.gif"></div></center> -->
		<center><div class="logo" style="margin-top:180px;"><h1>EASTERN</h1></center>
		</div>
	</div>
	</div>
	<div class="container">
		<div class="row">
		<form class="form-signin" method="post" style="margin:0px auto;">
        <h2 class="form-signin-heading">LogOut</h2>
        <div class="login-wrap">
            <a href="login.php" class="btn btn-lg btn-login btn-block">Click here to log in again</a>
        </div>

          <!-- Modal -->
          

      </form>
			</div>
		</div>
	</div>
</body>
</html>