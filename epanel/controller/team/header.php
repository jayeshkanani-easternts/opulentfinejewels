<?php 
if($_REQUEST['action'] == 'team')
{
?>	
<div class="box-header">
	<h2>Leadership Management</h2>
	<div class="box-icon">
		<a href="index.php?controller=team&action=team&subaction=listData" Title="List Records"><i class="fa fa-list"></i></a><a href="index.php?controller=team&action=team&subaction=addForm" title="Add New Record"><i class="fa fa-plus"></i></a>
	</div>
</div>

<?php } ?>