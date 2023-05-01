<?php
if($_REQUEST['action'] == 'faqtype'){
?>
<div class="box-header">
	<h2>FAQ Type Management</h2>
	<div class="box-icon">
		<a href="index.php?controller=faq&action=faqtype&subaction=listData" Title="List Records"><i class="fa fa-list"></i></a>
		<a href="index.php?controller=faq&action=faqtype&subaction=addForm" title="Add New Record"><i class="fa fa-plus"></i></a>
	</div>
</div>
<?php
}else{
?>
<div class="box-header">
	<h2>FAQ Management</h2>
	<div class="box-icon">
		<a href="index.php?controller=faq&action=faq&subaction=listData" Title="List Records"><i class="fa fa-list"></i></a>
		<a href="index.php?controller=faq&action=faq&subaction=addForm" title="Add New Record"><i class="fa fa-plus"></i></a>
	</div>
</div>
<?php
}
?>