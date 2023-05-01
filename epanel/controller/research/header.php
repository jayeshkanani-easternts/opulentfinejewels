<div class="box-header">
	<h2>Research Management</h2>
	<div class="box-icon">
		<a href="index.php?controller=research&action=research&subaction=listData" Title="List Records"><i class="fa fa-list"></i></a>
		
		<?php if(strpos($_SESSION['userper'],'a') !== false) { ?>
		 <a href="index.php?controller=research&action=research&subaction=addForm" title="Add New Record"><i class="fa fa-plus"></i></a>
		<?php } ?>
	</div>
</div>
