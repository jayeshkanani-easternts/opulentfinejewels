<?php
if($_REQUEST['action'] == 'news'){
?>
<div class="box-header">
	<h2>News Management</h2>
	<div class="box-icon">
		
		<a href="index.php?controller=news&action=news&subaction=listData" data-toggle="tooltip" class="marker" Title="List Records"><i class="fa fa-list"></i></a>
		<?php if(strpos($_SESSION['userper'],'a') !== false) { ?>
		<a href="index.php?controller=news&action=news&subaction=addForm" data-toggle="tooltip" class="marker" title="Add New Record"><i class="fa fa-plus"></i></a>
		<?php } ?>
	</div>
</div>
<?php
}else{
?>
<div class="box-header">
	<h2>News Type Management</h2>
	<div class="box-icon">
		<a href="index.php?controller=news&action=newsmaster&subaction=listData"  Title="List Records"><i class="fa fa-list"></i></a>
		<?php if(strpos($_SESSION['userper'],'a') !== false) { ?>
		<a href="index.php?controller=news&action=newsmaster&subaction=addForm" title="Add New Record"><i class="fa fa-plus"></i></a>
		<?php } ?>
	</div>
</div>
<?php
}
?>