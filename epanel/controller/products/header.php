<?php
if($_REQUEST['action'] == 'products'){
?>
<div class="box-header">
	<h2>Project Management (<?php echo getfldValue('producttype','pTypeID',$_REQUEST['pTypeID'],'pTypeTitle'); ?>&nbsp;&nbsp;<a href="index.php?controller=products&action=producttype&subaction=listData" Title="Go Back to Projects Type's List"><i class="fa fa-reply"></i></a>)</h2>
	<div class="box-icon">
		<a href="index.php?controller=products&action=products&subaction=listData&pTypeID=<?php echo $_REQUEST['pTypeID']; ?>" Title="List Records"><i class="fa fa-list"></i></a><a href="index.php?controller=products&action=products&subaction=addForm&pTypeID=<?php echo $_REQUEST['pTypeID']; ?>" title="Add New Record"><i class="fa fa-plus"></i></a>
	</div>
</div>
<?php
}
if($_REQUEST['action'] == 'producttype'){
?>
<div class="box-header">
	<h2>Project's Type Management</h2>
	<div class="box-icon">
		<a href="index.php?controller=products&action=producttype&subaction=listData" Title="List Records"><i class="fa fa-list"></i></a><a href="index.php?controller=products&action=producttype&subaction=addForm" title="Add New Record"><i class="fa fa-plus"></i></a>
	</div>
</div>
<?php
}
if($_REQUEST['action'] == 'productoptions'){
?>
<div class="box-header">
	<h2>Project's Options Management</h2>
	<div class="box-icon">
		<a href="index.php?controller=products&action=productoptions&subaction=listData" Title="List Records"><i class="fa fa-list"></i></a><a href="index.php?controller=products&action=productoptions&subaction=addForm" title="Add New Record"><i class="fa fa-plus"></i></a>
	</div>
</div>
<?php
}
if($_REQUEST['action'] == 'productimages'){
?>
<div class="box-header">
	<h2>Project's Images Management (<?php echo getfldValue('products','productID',$_REQUEST['productID'],'pTypeID'); ?>&nbsp;&nbsp;<a href="index.php?controller=products&action=products&subaction=listData&pTypeID=<?php echo getfldValue('products','productID',$_REQUEST['productID'],'productTitle'); ?>" Title="Go Back to Projects's List"><i class="fa fa-reply"></i></a>)</h2>
	<div class="box-icon">
		<a href="index.php?controller=products&action=productimages&subaction=listData&productID=<?php echo $_REQUEST['productID']; ?>" Title="List Records"><i class="fa fa-list"></i></a><a href="index.php?controller=products&action=productimages&subaction=addForm&productID=<?php echo $_REQUEST['productID']; ?>" title="Add New Record"><i class="fa fa-plus"></i></a>
	</div>
</div>
<?php
}
if($_REQUEST['action'] == 'productfloors'){
?>
<div class="box-header">
	<h2>Project's Floor Plan Management (<?php echo getfldValue('products','productID',$_REQUEST['productID'],'productTitle'); ?>&nbsp;&nbsp;<a href="index.php?controller=products&action=products&subaction=listData&pTypeID=<?php echo getfldValue('products','productID',$_REQUEST['productID'],'pTypeID'); ?>" Title="Go Back to Projects's List"><i class="fa fa-reply"></i></a>)</h2>
	<div class="box-icon">
		<a href="index.php?controller=products&action=productfloors&subaction=listData&productID=<?php echo $_REQUEST['productID']; ?>" Title="List Records"><i class="fa fa-list"></i></a><a href="index.php?controller=products&action=productfloors&subaction=addForm&productID=<?php echo $_REQUEST['productID']; ?>" title="Add New Record"><i class="fa fa-plus"></i></a>
	</div>
</div>
<?php
}
?>
<?php 
if($_REQUEST['action'] == 'inquirylist'){
?>
<div class="box-header">
	<h2>Inquiry Management </h2>
	
</div>
<?php
}
?>
<?php
if($_REQUEST['action'] == 'productsitegallery'){
?>
<div class="box-header">
	<h2>Project's Site Gallery Management (<?php echo getfldValue('products','productID',$_REQUEST['productID'],'productTitle'); ?>&nbsp;&nbsp;<a href="index.php?controller=products&action=products&subaction=listData&pTypeID=<?php echo getfldValue('products','productID',$_REQUEST['productID'],'pTypeID'); ?>" Title="Go Back to Projects's List"><i class="fa fa-reply"></i></a>)</h2>
	<div class="box-icon">
		<a href="index.php?controller=products&action=productsitegallery&subaction=listData&productID=<?php echo $_REQUEST['productID']; ?>" Title="List Records"><i class="fa fa-list"></i></a><a href="index.php?controller=products&action=productsitegallery&subaction=addForm&productID=<?php echo $_REQUEST['productID']; ?>" title="Add New Record"><i class="fa fa-plus"></i></a>
	</div>
</div>
<?php
}
?>
<?php
if($_REQUEST['action'] == 'industry_type'){
?>
<div class="box-header">
	<h2>Industry Type Management</h2>
	<div class="box-icon">
		<a href="index.php?controller=products&action=industry_type&subaction=listData" Title="List Records"><i class="fa fa-list"></i></a><a href="index.php?controller=products&action=industry_type&subaction=addForm" title="Add New Record"><i class="fa fa-plus"></i></a>
	</div>
</div>
<?php
}
?>
<?php
if($_REQUEST['action'] == 'stakeholder'){
?>
<div class="box-header">
	<h2>Stakeholder Management</h2>
	<div class="box-icon">
		<a href="index.php?controller=products&action=stakeholder&subaction=listData&pid=<?php echo $_REQUEST['pid']; ?>" Title="List Records"><i class="fa fa-list"></i></a><a href="index.php?controller=products&action=stakeholder&subaction=addForm&pid=<?php echo $_REQUEST['pid']; ?>" title="Add New Record"><i class="fa fa-plus"></i></a>
	</div>
</div>
<?php
}
?>
