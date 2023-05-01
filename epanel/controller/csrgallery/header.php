<?php
if($_REQUEST['action'] == 'csralbum'){
?>
<div class="box-header">
	<h2>CSR Album Management</h2>
	<div class="box-icon">
		<a href="index.php?controller=csrgallery&action=csralbum&subaction=listData" Title="List Records"><i class="fa fa-list"></i></a><a href="index.php?controller=csrgallery&action=csralbum&subaction=addForm" title="Add New Record"><i class="fa fa-plus"></i></a>
	</div>
</div>
<?php
}if($_REQUEST['action'] == 'csrgallery'){
?>
<div class="box-header">
	<h2>CSR Gallery Management</h2>
	<div class="box-icon">
		<a href="index.php?controller=csrgallery&action=csrgallery&subaction=listData" Title="List Records"><i class="fa fa-list"></i></a><a href="index.php?controller=csrgallery&action=csrgallery&subaction=addForm" title="Add New Record"><i class="fa fa-plus"></i></a>
	</div>
</div>
<?php
} 
?>