<?php
if($_REQUEST['action'] == 'testimonialtype'){
?>
<div class="box-header">
	<h2>Testimonial Type Management</h2>
	<div class="box-icon">
		<a href="index.php?controller=testimonial&action=testimonialtype&subaction=listData" Title="List Records"><i class="fa fa-list"></i></a><a href="index.php?controller=testimonial&action=testimonialtype&subaction=addForm" title="Add New Record"><i class="fa fa-plus"></i></a>
	</div>
</div>
<?php
}else{
?>
<div class="box-header">
	<h2>Testimonial Management</h2>
	<div class="box-icon">
		<a href="index.php?controller=testimonial&action=testimonial&subaction=listData" Title="List Records"><i class="fa fa-list"></i></a><a href="index.php?controller=testimonial&action=testimonial&subaction=addForm" title="Add New Record"><i class="fa fa-plus"></i></a>
	</div>
</div>
<?php
}
?>