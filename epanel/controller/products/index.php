<?php
if(isset($_REQUEST['action'])){
	$include_class = $_REQUEST['action'].".php";
	include ($include_class);
	/* Start Products Master*/
	if($_REQUEST['action'] == 'products'){
		$products = new products();	
		switch($_REQUEST['subaction']){
			case 'add':
				if($products->add()){
					echo'<script>location.href="index.php?controller=products&action=products&subaction=listData&pTypeID='.$_REQUEST['pTypeID'].'";</script>';
				}
				break;
			case 'addForm':
				if(strpos($_SESSION['userper'],'a') !== false) {
					$products->addForm();
				}else{
					echo '<div class="alert alert-error">You do not have Sufficient Permissions to Add Record</div>';				
				}
				break;
			case 'edit':
				if($products->edit()){
					echo'<script>location.href="index.php?controller=products&action=products&subaction=listData&pTypeID='.$_REQUEST['pTypeID'].'";</script>';
				}
				break;
			case 'editForm':
				if(strpos($_SESSION['userper'],'e') !== false) {
					$products->editForm();
				}else{
					echo '<div class="alert alert-error">You do not have Sufficient Permissions to Edit Record</div>';				
				}
				break;				
			case 'listData':
				if(strpos($_SESSION['userper'],'v') !== false) {
				    // echo "index listdata";
					$products->listData();
				}else{
					echo '<div class="alert alert-error">You do not have Sufficient Permissions to View Record</div>';				
				}
				break;
			case 'delete':
				if(strpos($_SESSION['userper'],'d') !== false) {
					if($products->delete()){
						echo'<script>location.href="index.php?controller=products&action=products&subaction=listData&pTypeID='.$_REQUEST['pTypeID'].'";</script>';
					}
				}else{
					echo '<div class="alert alert-error">You do not have Sufficient Permissions to Delete Record</div>';					
				}
				break;
		}
	}
	
	if($_REQUEST['action'] == 'stakeholder'){
		$stakeholder = new stakeholder();	
		switch($_REQUEST['subaction']){
			case 'add':
				if($stakeholder->add()){
					echo'<script>location.href="index.php?controller=products&action=stakeholder&subaction=listData&pid='.$_REQUEST['pid'].'";</script>';
				}
				break;
			case 'addForm':
				if(strpos($_SESSION['userper'],'a') !== false) {
					$stakeholder->addForm();
				}else{
					echo '<div class="alert alert-error">You do not have Sufficient Permissions to Add Record</div>';				
				}
				break;
			case 'edit':
				if($stakeholder->edit()){
					echo'<script>location.href="index.php?controller=products&action=stakeholder&subaction=listData&pid='.$_REQUEST['pid'].'";</script>';
				}
				break;
			case 'editForm':
				if(strpos($_SESSION['userper'],'e') !== false) {
					$stakeholder->editForm();
				}else{
					echo '<div class="alert alert-error">You do not have Sufficient Permissions to Edit Record</div>';				
				}
				break;				
			case 'listData':
				if(strpos($_SESSION['userper'],'v') !== false) {
					$stakeholder->listData();
				}else{
					echo '<div class="alert alert-error">You do not have Sufficient Permissions to View Record</div>';				
				}
				break;
			case 'delete':
				if(strpos($_SESSION['userper'],'d') !== false) {
					if($stakeholder->delete()){
						echo'<script>location.href="index.php?controller=products&action=stakeholder&subaction=listData&pid='.$_REQUEST['pid'].'";</script>';
					}
				}else{
					echo '<div class="alert alert-error">You do not have Sufficient Permissions to Delete Record</div>';					
				}
				break;
		}
	}
	
	if($_REQUEST['action'] == 'industry_type'){
		
		$industry_type = new industry_type();	
		switch($_REQUEST['subaction']){
			case 'add':
				if($industry_type->add()){
					echo'<script>location.href="index.php?controller=products&action=industry_type&subaction=listData";</script>';
				}
				break;
			case 'addForm':
				if(strpos($_SESSION['userper'],'a') !== false) {
					$industry_type->addForm();
				}else{
					echo '<div class="alert alert-error">You do not have Sufficient Permissions to Add Record</div>';				
				}
				break;
			case 'edit':
				if($industry_type->edit()){
					echo'<script>location.href="index.php?controller=products&action=industry_type&subaction=listData";</script>';
				}
				break;
			case 'editForm':
				if(strpos($_SESSION['userper'],'e') !== false) {
					$industry_type->editForm();
				}else{
					echo '<div class="alert alert-error">You do not have Sufficient Permissions to Edit Record</div>';				
				}
				break;				
			case 'listData':
				if(strpos($_SESSION['userper'],'v') !== false) {
					$industry_type->listData();
				}else{
					echo '<div class="alert alert-error">You do not have Sufficient Permissions to View Record</div>';				
				}
				break;
			case 'delete':
				if(strpos($_SESSION['userper'],'d') !== false) {
					if($industry_type->delete()){
						echo'<script>location.href="index.php?controller=products&action=industry_type&subaction=listData";</script>';
					}
				}else{
					echo '<div class="alert alert-error">You do not have Sufficient Permissions to Delete Record</div>';					
				}
				break;
		}
	}
	
if($_REQUEST['action'] == 'inquirylist'){
	
		$inquirylist = new inquirylist();	
		switch($_REQUEST['subaction']){				
			case 'listData':	
					$inquirylist->listData();
				
				break;
			case 'delete':
			
					if($inquirylist->delete()){
						echo'<script>location.href="index.php?controller=products&action=inquirylist&subaction=listData";</script>';
					}
				break;
		}
	}
	
if($_REQUEST['action'] == 'subscriptionlist'){
	
		$subscriptionlist = new subscriptionlist();	
		switch($_REQUEST['subaction']){				
			case 'listData':	
					$subscriptionlist->listData();
				
				break;
			case 'delete':
			
					if($subscriptionlist->delete()){
						echo'<script>location.href="index.php?controller=products&action=subscriptionlist&subaction=listData";</script>';
					}
				break;
		}
	}
	
	/* Start Product Type Master*/
	if($_REQUEST['action'] == 'producttype'){
	
		$producttype = new producttype();	
		switch($_REQUEST['subaction']){
			case 'add':
				
				if($producttype->add()){
					
					echo'<script>location.href="index.php?controller=products&action=producttype&subaction=listData&msg=addmsg";</script>';
				}
				break;
			case 'addForm':
				if(strpos($_SESSION['userper'],'a') !== false) {
					
					$producttype->addForm();
				}else{
					echo '<div class="alert alert-error">You do not have Sufficient Permissions to Add Record</div>';				
				}
				break;
			case 'edit':
				if($producttype->edit()){
					echo'<script>location.href="index.php?controller=products&action=producttype&subaction=listData&msg=addmsg";</script>';
				}
				break;
			case 'editForm':
				if(strpos($_SESSION['userper'],'e') !== false) {
					$producttype->editForm();
				}else{
					echo '<div class="alert alert-error">You do not have Sufficient Permissions to Edit Record</div>';				
				}
				break;				
			case 'listData':
				if(strpos($_SESSION['userper'],'v') !== false) {
					$producttype->listData();
				}else{
					echo '<div class="alert alert-error">You do not have Sufficient Permissions to View Record</div>';				
				}
				break;
			case 'delete':
				if(strpos($_SESSION['userper'],'d') !== false) {
					if($producttype->delete()){
						echo'<script>location.href="index.php?controller=products&action=producttype&subaction=listData&msg=addmsg";</script>';
					}
				}else{
					echo '<div class="alert alert-error">You do not have Sufficient Permissions to Delete Record</div>';					
				}
				break;
		}
	}
	/* Start Product Options Master*/
	if($_REQUEST['action'] == 'productoptions'){
		$productoptions = new productoptions();	
		switch($_REQUEST['subaction']){
			case 'add':
				if($productoptions->add()){
					echo'<script>location.href="index.php?controller=products&action=productoptions&subaction=listData&msg=addmsg";</script>';
				}
				break;
			case 'addForm':
				if(strpos($_SESSION['userper'],'a') !== false) {
					$productoptions->addForm();
				}else{
					echo '<div class="alert alert-error">You do not have Sufficient Permissions to Add Record</div>';				
				}
				break;
			case 'edit':
				if($productoptions->edit()){
					echo'<script>location.href="index.php?controller=products&action=productoptions&subaction=listData&msg=addmsg";</script>';
				}
				break;
			case 'editForm':
				if(strpos($_SESSION['userper'],'e') !== false) {
					$productoptions->editForm();
				}else{
					echo '<div class="alert alert-error">You do not have Sufficient Permissions to Edit Record</div>';				
				}
				break;				
			case 'listData':
				if(strpos($_SESSION['userper'],'v') !== false) {
					$productoptions->listData();
				}else{
					echo '<div class="alert alert-error">You do not have Sufficient Permissions to View Record</div>';				
				}
				break;
			case 'delete':
				if(strpos($_SESSION['userper'],'d') !== false) {
					if($productoptions->delete()){
						echo'<script>location.href="index.php?controller=products&action=productoptions&subaction=listData&msg=addmsg";</script>';
					}
				}else{
					echo '<div class="alert alert-error">You do not have Sufficient Permissions to Delete Record</div>';					
				}
				break;
		}
	}
	/* Start Product Images Master*/
	if($_REQUEST['action'] == 'productimages'){
		$productimages = new productimages();	
		switch($_REQUEST['subaction']){
			case 'add':
				if($productimages->add()){
					echo'<script>location.href="index.php?controller=products&action=productimages&subaction=listData&productID='.$_REQUEST['productID'].'";</script>';
				}
				break;
			case 'addForm':
				if(strpos($_SESSION['userper'],'a') !== false) {
					$productimages->addForm();
				}else{
					echo '<div class="alert alert-error">You do not have Sufficient Permissions to Add Record</div>';				
				}
				break;
			case 'edit':
				if($productimages->edit()){
					echo'<script>location.href="index.php?controller=products&action=productimages&subaction=listData&productID='.$_REQUEST['productID'].'";</script>';
				}
				break;
			case 'editForm':
				if(strpos($_SESSION['userper'],'e') !== false) {
					$productimages->editForm();
				}else{
					echo '<div class="alert alert-error">You do not have Sufficient Permissions to Edit Record</div>';				
				}
				break;
			case 'listData':
				if(strpos($_SESSION['userper'],'v') !== false) {
					$productimages->listData();
				}else{
					echo '<div class="alert alert-error">You do not have Sufficient Permissions to View Record</div>';				
				}
				break;
			case 'delete':
				if(strpos($_SESSION['userper'],'d') !== false) {
					if($productimages->delete()){
						echo'<script>location.href="index.php?controller=products&action=productimages&subaction=listData&productID='.$_REQUEST['productID'].'";</script>';
					}
				}else{
					echo '<div class="alert alert-error">You do not have Sufficient Permissions to Delete Record</div>';					
				}
				break;
		}
	}
	if($_REQUEST['action'] == 'productfloors'){
		$productfloors = new productfloors();	
		switch($_REQUEST['subaction']){
			case 'add':
				if($productfloors->add()){
					echo'<script>location.href="index.php?controller=products&action=productfloors&subaction=listData&productID='.$_REQUEST['productID'].'";</script>';
				}
				break;
			case 'addForm':
				if(strpos($_SESSION['userper'],'a') !== false) {
					$productfloors->addForm();
				}else{
					echo '<div class="alert alert-error">You do not have Sufficient Permissions to Add Record</div>';				
				}
				break;
			case 'edit':
				if($productfloors->edit()){
					echo'<script>location.href="index.php?controller=products&action=productfloors&subaction=listData&productID='.$_REQUEST['productID'].'";</script>';
				}
				break;
			case 'editForm':
				if(strpos($_SESSION['userper'],'e') !== false) {
					$productfloors->editForm();
				}else{
					echo '<div class="alert alert-error">You do not have Sufficient Permissions to Edit Record</div>';				
				}
				break;
			case 'listData':
				if(strpos($_SESSION['userper'],'v') !== false) {
					$productfloors->listData();
				}else{
					echo '<div class="alert alert-error">You do not have Sufficient Permissions to View Record</div>';				
				}
				break;
			case 'delete':
				if(strpos($_SESSION['userper'],'d') !== false) {
					if($productfloors->delete()){
						echo'<script>location.href="index.php?controller=products&action=productfloors&subaction=listData&productID='.$_REQUEST['productID'].'";</script>';
					}
				}else{
					echo '<div class="alert alert-error">You do not have Sufficient Permissions to Delete Record</div>';					
				}
				break;
		}
	}
	if($_REQUEST['action'] == 'productsitegallery'){
		$productsitegallery = new productsitegallery();	
		switch($_REQUEST['subaction']){
			case 'add':
				if($productsitegallery->add()){
					echo'<script>location.href="index.php?controller=products&action=productsitegallery&subaction=listData&productID='.$_REQUEST['productID'].'";</script>';
				}
				break;
			case 'addForm':
				if(strpos($_SESSION['userper'],'a') !== false) {
					$productsitegallery->addForm();
				}else{
					echo '<div class="alert alert-error">You do not have Sufficient Permissions to Add Record</div>';				
				}
				break;
			case 'edit':
				if($productsitegallery->edit()){
					echo'<script>location.href="index.php?controller=products&action=productsitegallery&subaction=listData&productID='.$_REQUEST['productID'].'";</script>';
				}
				break;
			case 'editForm':
				if(strpos($_SESSION['userper'],'e') !== false) {
					$productsitegallery->editForm();
				}else{
					echo '<div class="alert alert-error">You do not have Sufficient Permissions to Edit Record</div>';				
				}
				break;
			case 'listData':
				if(strpos($_SESSION['userper'],'v') !== false) {
					$productsitegallery->listData();
				}else{
					echo '<div class="alert alert-error">You do not have Sufficient Permissions to View Record</div>';				
				}
				break;
			case 'delete':
				if(strpos($_SESSION['userper'],'d') !== false) {
					if($productsitegallery->delete()){
						echo'<script>location.href="index.php?controller=products&action=productsitegallery&subaction=listData&productID='.$_REQUEST['productID'].'";</script>';
					}
				}else{
					echo '<div class="alert alert-error">You do not have Sufficient Permissions to Delete Record</div>';					
				}
				break;
		}
	}
}
else{
		echo '<center><div class="notmsgHeader" ><img src="images/error.gif">&nbsp;&nbsp;<strong>You may be in wrong place!!!</strong></div></center>';
}
?>
