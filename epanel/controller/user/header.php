<?php
if($_REQUEST['action'] == 'user'){
?>
<div class="box-header">
	<h2>User Management</h2>
	<div class="box-icon">
		<a href="index.php?controller=user&action=user&subaction=listData" Title="List Records"><i class="fa fa-list"></i></a><a href="index.php?controller=user&action=user&subaction=addForm" title="Add New Record"><i class="fa fa-plus"></i></a>
	</div>
</div>
<?php 
} else if($_REQUEST['action'] == 'usergroup'){
?>	
<div class="box-header">
	<h2>User Group Management</h2>
	<div class="box-icon">
		<a href="index.php?controller=user&action=usergroup&subaction=listData" Title="List Records"><i class="fa fa-list"></i></a><a href="index.php?controller=user&action=usergroup&subaction=addForm" title="Add New Record"><i class="fa fa-plus"></i></a>
	</div>
</div>	
<?php
}else{
?>
<div class="box-header">
	<h2>Change Password</h2>
</div>
<?php
}
?>