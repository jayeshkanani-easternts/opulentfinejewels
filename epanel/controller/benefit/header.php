<?php
if($_REQUEST['action'] == 'benefit'){
?>
<div class="box-header">
	<h2>Benefit Management</h2>
	<div class="box-icon">
		<a href="index.php?controller=benefit&action=benefit&subaction=listData" Title="List Records"><i class="fa fa-list"></i></a>
		<?php 
//			if(strpos($_SESSION['userper'],'a') !== false) { 
		?>
		<a href="index.php?controller=benefit&action=benefit&subaction=addForm" title="Add New Record"><i class="fa fa-plus"></i></a>
		<?php 
//			}
		?>
	</div>
</div>
<?php
}
?>

