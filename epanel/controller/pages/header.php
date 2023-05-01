<?php
if($_REQUEST['action'] == 'pages'){
?>
<div class="box-header">
	<h2>Pages Management</h2>
	<div class="box-icon">
		<a href="index.php?controller=pages&action=pages&subaction=listData" Title="List Records"><i class="fa fa-list"></i></a>
		<?php if(strpos($_SESSION['userper'],'a') !== false) { ?>
		<a href="index.php?controller=pages&action=pages&subaction=addForm" title="Add New Record"><i class="fa fa-plus"></i></a>
		<?php } ?>
	</div>
</div>
<?php
}
if($_REQUEST['action'] == 'pageimages'){
?>
<div class="box-header">
	<h2>Page Image Management</h2>
	<div class="box-icon">
		<a href="index.php?controller=pages&action=pageimages&subaction=listData" Title="List Records"><i class="fa fa-list"></i></a>
	</div>
</div>
<?php
}
elseif($_REQUEST['action'] == 'homecontent'){
?>
<div class="box-header">
	<h2>Editing Home Content</h2>
</div>
<?php
}
?>