<?php
if($_REQUEST['action'] == 'album'){
?>
<div class="box-header">
	<h2>Album Management</h2>
	<div class="box-icon">
		<a href="index.php?controller=gallery&action=album&subaction=listData" Title="List Records"><i class="fa fa-list"></i></a>
		<?php if(strpos($_SESSION['userper'],'a') !== false) { ?>
		<a href="index.php?controller=gallery&action=album&subaction=addForm" title="Add New Record"><i class="fa fa-plus"></i></a>
		<?php } ?>
	</div>
</div>
<?php
}if($_REQUEST['action'] == 'gallery'){
?>
<div class="box-header">
	<h2>Gallery Management</h2>
	<div class="box-icon">
		<a href="index.php?controller=gallery&action=gallery&subaction=listData" Title="List Records"><i class="fa fa-list"></i></a>
		<?php if(strpos($_SESSION['userper'],'a') !== false) { ?>
		<a href="index.php?controller=gallery&action=gallery&subaction=addForm" title="Add New Record"><i class="fa fa-plus"></i></a>
		<?php } ?>
	</div>
</div>
<?php
} if($_REQUEST['action'] == 'albumtype'){
?>
<div class="box-header">
	<h2>Album Type Management</h2>
	<div class="box-icon">
		<a href="index.php?controller=gallery&action=albumtype&subaction=listData" Title="List Records"><i class="fa fa-list"></i></a>
		<?php if(strpos($_SESSION['userper'],'a') !== false) { ?>
		<a href="index.php?controller=gallery&action=albumtype&subaction=addForm" title="Add New Record"><i class="fa fa-plus"></i></a>
		<?php } ?>
	</div>
</div>
<?php } ?>