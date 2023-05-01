<script>
$(document).ready(function(){
	flag = 0;
	          $('input').on('blur', function() {      
				if ($("#pageimageFrm").valid() && flag == 0) {
					$('input[type=submit]').prop('disabled', false);  
				} else {
					$('input[type=submit]').prop('disabled', 'disabled');
				}
			  });
			  
			  $('input[type=file]').bind('change', function() {

				  //this.files[0].size gets the size of your file.
				  var iSize = ($("input[type=file]")[0].files[0].size / 1024); 
					iSize = (Math.round(iSize * 100) / 100)
				var max = '<?php echo (int)ini_get('upload_max_filesize'); ?>' * 1024;	
				  if(iSize > max)
				  {
					  $('input[type=submit]').prop('disabled', 'disabled');
					  flag = 1;
					  alert('Maximum file upload size is : '+'<?php echo (int)ini_get('upload_max_filesize'); ?>'+' MB');
				  }
					  
				  else
				  {
					 $('input[type=submit]').prop('disabled', false); 
					 flag = 0;
				  }
					 

				});

});
</script>
<script> 
$(document).ready(function(){
    $('#mainpages').select2({
		placeholder: "Select a Main Page"
	});
});
</script>
<?php 
include WS_PFBC_ROOT."Form.php";
class pageimages{
	
	
	function editForm(){
		$sql = "select * from page_master where page_id = '".$_REQUEST['page_id']."'";
		$qry = ets_db_query($sql) or die(ets_db_error().$sql);
		if(ets_db_num_rows($qry) > 0){
			$rs=ets_db_fetch_array($qry);
			$form = new Form("frmedit");
			$form->configure(array(
				"prevent" => array("bootstrap","jQuery"),
				"view" => new View_SideBySide,
				"id" => "pageimageFrm"
			));
				
			$form->addElement(new Element_HTML("<legend>Edit Page Image <b>".$rs['page_title']."</b></legend>"));
			$form->addElement(new Element_Hidden("controller", "pages"));
			$form->addElement(new Element_Hidden("action", "pageimages"));
			$form->addElement(new Element_Hidden("subaction", "edit"));
			$form->addElement(new Element_Hidden("page_id", $_REQUEST['page_id']));
			$form->addElement(new Element_Hidden("prevImage", $rs['page_image']));
			
			/* Actual Form Fields Started */
			
			$form->addElement(new Element_HTML('<img src="'.DIR_WS_PAGE_IMAGE_PATH.$rs['page_image'].'" width="10%" height="10%" style="margin-left:200px;">'));
			$form->addElement(new Element_File("Browse Image:", "page_image", array( 
			"placeholder" => "Browse Image"
			)));
			
			$form->addElement(new Element_HTML('<hr>'));
			$form->addElement(new Element_Button);
			$form->addElement(new Element_Button("Cancel", "button", array(
				"onclick" => "location.href = 'index.php?controller=pages&action=pages&subaction=listData';"
			)));
			$form->render();
		}else{
			echo "No Page Found...";
		}
	}
	function edit(){		
		$updimg = $_FILES["page_image"]["name"];	
		$error = false;
		$path = DIR_FS_PAGE_IMAGE_PATH;
		if(!file_exists($path))
			{
				mkdir($path);
				exec("chown ".FILEUSER.FILEUSER." ".$path);
				exec("chmod 0777 ".$path);
				
			}
		if($updimg != ""){
			@unlink(DIR_FS_PAGE_IMAGE_PATH.$_POST['prevImage']);
			$upload = $_POST['page_id']."-".$_FILES["page_image"]["name"];
			$target_path = DIR_FS_PAGE_IMAGE_PATH.$_POST['page_id']."-".$_FILES["page_image"]["name"];
			if(!move_uploaded_file($_FILES["page_image"]["tmp_name"],$target_path)){
				$error = true;
				echo "Error in Uploading File....";
			}
			
			if(!$error){
				$updSQL = "update page_master set 
				page_image = '".$upload."'
				where page_id= '".$_POST['page_id']."'";
				if(ets_db_query($updSQL)){
					//return true;
				}else{
					echo "Updating  page_master records query failed: ".ets_db_error();
					//return false;
				}
			
			}
		}
		
		return !$error;
	}
	function listData(){
?>
<script>
$(document).ready(function() {
	var listURL = 'helperfunc/pageImageList.php';
	$('#listpage').dataTable({
		"ajax": listURL
		
	});
});
</script>

<?php

		echo '<div id="no-more-tables">
		<table class="table table-striped table-bordered dataTable" id="listpage">
			<thead>
				<tr>
					<th>Page ID</th>
					<th>Page Name</th>
					<th>Image</th>
					<th>Image Action</th>
				</tr>
			</thead>
		<tbody></tbody>	
		<tfoot>
			<tr>
				<th>Page ID</th>
				<th>Page Name</th>
				<th>Image</th>
				<th>Image Action</th>
			</tr>
		</tfoot>
		
		 </table></div>';
	}
	function delete()
	{
		$selImage = ets_db_query("Select * from page_master where page_id = '".$_REQUEST['page_id']."'");
		$rs = ets_db_fetch_array($selImage);
		@unlink(DIR_FS_PAGE_IMAGE_PATH.$rs['page_image']);
		$delsql = "update page_master set page_image = '' where page_id='".$_REQUEST['page_id']."'";
		$delqry = ets_db_query($delsql) or die(ets_db_error().$delsql);
		return true;		
	}		
}
?>
