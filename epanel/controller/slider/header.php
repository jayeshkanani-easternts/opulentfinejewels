<div class="box-header">
	<h2>Slider Management</h2>
	<div class="box-icon">
		<a href="index.php?controller=slider&action=slider&subaction=listData" Title="List Records"><i class="fa fa-list"></i></a>
		
		<?php if(strpos($_SESSION['userper'],'a') !== false) { ?>
		<a href="index.php?controller=slider&action=slider&subaction=addForm" title="Add New Record"><i class="fa fa-plus"></i></a>
		<?php } ?>
	</div>
</div>
