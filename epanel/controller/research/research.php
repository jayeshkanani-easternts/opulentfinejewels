<script>
$(document).ready(function(){
	flag = 0;
	          $('input').on('blur', function() {      
				if ($("#researchFrm").valid() && flag == 0) {
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
	
	
			/* if image then image div will display and if video select then video div will be displayed*/
			var c = $('#type').val();
       
            if(c == 'Video')
            {
                $('#image_div').hide();
                $('#url').show();
            }
            else
            {
                $('#image_div').show();
                $('#url').hide();
            }
			$('#type').change(function(){
				var c = $(this).val();
				if(c == 'Video')
				{
					$('#image_div').hide();
					$('#url').show();
				}
				else
				{
					$('#image_div').show();
					$('#url').hide();
				}
			}); 
	
	
});
</script>
<?php
include WS_PFBC_ROOT."Form.php";
class research
{
	function addForm()
	{
		$form = new Form("addFrm");
		$form->configure(array(
			"prevent" => array("bootstrap","jQuery"),
			"view" => new View_SideBySide,
			"id" => "researchFrm"
		));
		$status = array("E" => "Enabled", "D" => "Disabled");
		$position = array("H" => "Home Page", "I" => "Inner Pages");
		$type = array("General" => "General" , "Beauty" => "Beauty","Fitness" => "Fitness" , "Health & Wellness" => "Health & Wellness" , "Pain" => "Pain" ,"Weight loss" => "Weight loss");
		$form->addElement(new Element_HTML("<legend>New Research</legend>"));
		$form->addElement(new Element_Hidden("controller", "research"));
		$form->addElement(new Element_Hidden("action", "research"));
		$form->addElement(new Element_Hidden("subaction", "add"));
		$form->addElement(new Element_Hidden("createdate"));
		$form->addElement(new Element_Hidden("username"));
		/* Actual Form Fields Started */		
		$form->addElement(new Element_Textbox("Research Title:", "researchTitle", array(
			"placeholder" => "Title"
			)));
		$form->addElement(new Element_Select("Type:", "type",$type, array(
			"placeholder" => "Type",
            "id" => "type",
			)));
		
		$form->addElement(new Element_HTML('<div id = "">'));
		$form->addElement(new Element_File("Upload File : <br>", "file", array(
			"placeholder" => "Photo"
			)));
	  	$form->addElement(new Element_HTML('</div>'));
		
		$form->addElement(new Element_HTML('<label class="control-label">Last Sort Order : '.get_last_sortorder('research').'</label><br><br>'));		
		$form->addElement(new Element_Textbox("Sort Order:", "sortorder", array(
			"required" => 1, 
			"placeholder" => "SortOrder"	
        )));
       
        
		$form->addElement(new Element_Select("Status:", "status", $status, array(
			"required" => 1, 
			"placeholder" => "Status"
			)));			
		$form->addElement(new Element_HTML('<hr>'));
		$form->addElement(new Element_Button);	
		$form->addElement(new Element_Button("Cancel", "button", array(
			"onclick" => "history.go(-1);"
		)));
		$form->render();
	}
	function add()
	{
		$upload = $_FILES["file"]["name"];
		$username=$_SESSION['username'];
		$target_path = $_FILES["file"]["name"];
		$sql = "Insert into research set 
		researchTitle = '".ets_db_real_escape_string($_POST['researchTitle'])."',
		type='".$_POST['type']."',
		username = '".$username."',
		createdate= now(),
		sortorder='".$_POST['sortorder']."',
		status = '".$_POST['status']."',
		remote_ip ='".$_SERVER['REMOTE_ADDR']."'
		";
		$qry = ets_db_query($sql) or die(ets_db_error().$sql);
		$id = ets_db_insert_id();
        
		
		if($upload == ''){
			$updqry = "update research set 
			file = '-'
			where researchID = '".$id."'
			";
		}
		else{
			$t_path = DIR_FS_RESEARCH_PATH.$id.'-'.$target_path;
			move_uploaded_file($_FILES["file"]["tmp_name"],$t_path);
			$updqry = "update research set 
			file = '".$id.'-'.$upload."'
			where researchID = '".$id."'
			";
		}
		$updres = ets_db_query($updqry) or die(ets_db_error());
		return true;
	}
	function editForm()
	{		
		
		$sql = "select * from research where researchID ='".$_REQUEST['researchID']."'";
		
		$qry = ets_db_query($sql) or die(ets_db_error().$sql);
		if(ets_db_num_rows($qry) > 0){
			$rs=ets_db_fetch_array($qry);
			$form = new Form("frmEdit");
			$form->configure(array(
			"prevent" => array("bootstrap","jQuery"),
			"view" => new View_SideBySide,
			"id" => "researchFrm"
			));
			
			$status = array("E" => "Enabled", "D" => "Disabled");
			$position = array("H" => "Home Page", "I" => "Inner Pages");
            $type = array("General" => "General" , "Beauty" => "Beauty","Fitness" => "Fitness" , "Health & Wellness" => "Health & Wellness" , "Pain" => "Pain" ,"Weight loss" => "Weight loss");
			$form->addElement(new Element_HTML("<legend>Edit research</legend>"));
			$form->addElement(new Element_Hidden("controller", "research"));
			$form->addElement(new Element_Hidden("action", "research"));
			$form->addElement(new Element_Hidden("subaction", "edit"));
			$form->addElement(new Element_Hidden("researchID", $_REQUEST['researchID']));
			$form->addElement(new Element_Hidden("prevImage", $rs['file']));
			$form->addElement(new Element_Hidden("createdate"));
			$form->addElement(new Element_Hidden("username"));
			
			/* Actual Form Fields Started */
			$form->addElement(new Element_Textbox("Title:", "researchTitle", array(
			     "value"=> $rs['researchTitle'],
			      "placeholder" => "Title"
			)));
            
			
			$form->addElement(new Element_Select("Type:", "type",$type, array(
			"placeholder" => "Type",
            "id" => "type",
			)));
			$form->addElement(new Element_HTML('<div id = "">'));
			$form->addElement(new Element_HTML('<a href="'.DIR_WS_RESEARCH_PATH.$rs['file'].' "> View Previous File </a>'));
            
			$form->addElement(new Element_File("Upload File: ", "file", array(
			     "placeholder" => "Upload File"
			)));
            $form->addElement(new Element_HTML('</div>'));
		
			$form->addElement(new Element_HTML('<label class="control-label">Last Sort Order : '.get_last_sortorder('research').'</label><br><br>'));			
			$form->addElement(new Element_Textbox("Sort Order:", "sortorder", array(
			"value"=> $rs['sortorder'],
			"required" => 1, 
			"placeholder" => "Sort Order"
			)));
            
			$form->addElement(new Element_Select("Status:", "status", $status, array(
			"value"=> $rs['status'],
			"required" => 1, 
			"placeholder" => "Status"
			)));	
			$form->addElement(new Element_HTML('<hr>'));
			$form->addElement(new Element_Button);
			$form->addElement(new Element_Button("Cancel", "button", array(
				"onclick" => "history.go(-1);"
			)));
			$form->render();
		}
		else
		{
			echo "No Tax Found...";
		}
		
	}
	function edit()
	{
		$updimg = true;		
		$error = false;
		$username = $_SESSION['username'];
		if($_FILES["file"]['size'] == 0 ||  $_FILES["file"] == $_POST['prevImage']){
			$updimg = false;
			$upload = $_POST['prevImage'];
		}
		if($updimg){
			@unlink(DIR_FS_RESEARCH_PATH.$_POST['prevImage']);
			$upload = $_POST['researchID'].'-'.$_FILES["file"]["name"];
			$target_path = DIR_FS_RESEARCH_PATH.$_POST['researchID'].'-'.$_FILES["file"]["name"];
			if(!move_uploaded_file($_FILES["file"]["tmp_name"],$target_path)){
				$error = true;
				echo "Error in updating member image..";
			}
		}
		if(!$error){
			$updqry = ets_db_query("update research set 
			researchTitle = '".ets_db_real_escape_string($_POST['researchTitle'])."',
			type='".$_POST['type']."',
			file = '".$upload."',					
			username = '".$username."',	
			sortorder='".$_POST['sortorder']."',
			status = '".$_POST['status']."',
			modifieddate = now(),
			remote_ip ='".$_SERVER['REMOTE_ADDR']."'		
			where researchID='" .$_POST['researchID']."'") or die ("Updating   image records query failed: ".ets_db_error());

			return true;
		}else{
			echo "Error in uploading image..";
			return false;
		}
	}
	function listData()
	{
?>
<script>
$(document).ready(function() {
	var listURL = 'helperfunc/researchList.php';
	$('#researchlist').dataTable({
		"ajax": listURL
		
	});
});

</script>
<?php
		$subvar = 'onclick="return confirmSubmit();"';	

		echo '<table cellpadding="1" cellspacing="2" border="0" class="table table-striped table-bordered dataTable" id="researchlist" width="100%">
		<thead>
		<tr>
			<th align="left">Title</th>
			<th align="left">Type</th>
			<th align="left">Status</th>
			<th align="left">Sort Order</th>
			<th>Action</th>
		</tr>
		</thead>
		<tbody></tbody>	
		<tfoot>
				<tr>
					<th align="left">Title</th>
					<th align="left">Type</th>	
					<th align="left">Status</th>
					<th align="left">Sort Order</th>
					<th>Action</th>
				</tr>
		</tfoot>		
		 </table>';		
		?>
<script>
	$('.table').editable({
		selector: 'a.estatus,a.esortorder',
		params:{"tblName":"research"},
		value: 1,
		source: [{value: 'E', text: 'Active'},{value: 'D', text: 'Disabled'}]
	});
</script>
<?php		
	}	
	function delete()
	{
		$selqry = "Select * from research where researchID='".$_GET['researchID']."'";
		$selres = ets_db_query($selqry);
		$arr = ets_db_fetch_array($selres);
		@unlink(DIR_FS_RESEARCH_PATH.$arr['image']);
		$delsql = "Delete from research where researchID='".$_GET['researchID']."'";
		$delqry = ets_db_query($delsql) or die(ets_db_error().$delsql);
		
		return true;		
	}
}
?>