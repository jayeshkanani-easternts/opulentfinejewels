<script>

	          $('input').on('blur', function() {      
				if ($("#testiFrm").valid()) {
					$('input[type=submit]').prop('disabled', false);  
				} else {
					$('input[type=submit]').prop('disabled', 'disabled');
				}
			  });
});
</script>
<?php
include WS_PFBC_ROOT."Form.php";
class testimonial
{
	function addForm()
	{
		$form = new Form("addFrm");
		$form->configure(array(
			"prevent" => array("bootstrap","jQuery"),
			"view" => new View_SideBySide,
			"id" => "testiFrm"
		));
		$status = array("E" => "Enabled", "D" => "Disabled");
		$form->addElement(new Element_HTML("<legend>New Testimonial</legend>"));
		$form->addElement(new Element_Hidden("controller", "testimonial"));
		$form->addElement(new Element_Hidden("action", "testimonial"));
		$form->addElement(new Element_Hidden("subaction", "add"));
		
		/* Actual Form Fields Started */
		$testimonial = gettestimoniallist();
		
		
		$form->addElement(new Element_Select("Testimonial Type:", "testimonial_type",$testimonial, array(
			"placeholder" => "Testimonial Type"
			)));
		$form->addElement(new Element_Textbox("Name:", "name", array(
			"required" => 1, 
			"placeholder" => "Name"
			)));
		 $form->addElement(new Element_Textbox("City:", "tour_Name", array(
			"required" => 1, 
			"placeholder" => "City"
			)));
		$form->addElement(new Element_Textarea("review:", "review", array(
			"required" => 1, 
			"placeholder" => "review"
			)));
        $form->addElement(new Element_File("Photo:", "image", array(
			"required" => 1, 
			"placeholder" => "Photo"
			)));
		$form->addElement(new Element_HTML('<label class="control-label">Last Sort Order : '.get_last_sortorder('testimonial').'</label><br><br>'));			
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
		$username=$_SESSION['username'];
        $target_path = $_FILES["image"]["name"];
		$sql = "Insert into testimonial set 
		testimonial_type = '".$_POST['testimonial_type']."',
		name = '".ets_db_real_escape_string($_POST['name'])."',
		tour_Name = '".ets_db_real_escape_string($_POST['tour_Name'])."',
		review = '".ets_db_real_escape_string($_POST['review'])."',
		username = '".$username."',
		createdate= now(),
		sortorder='".$_POST['sortorder']."',
		status = '".$_POST['status']."',
		remote_ip ='".$_SERVER['REMOTE_ADDR']."'
		";
		
		
		$qry = ets_db_query($sql) or die(ets_db_error().$sql);
	$id = ets_db_insert_id();
        	if(move_uploaded_file($_FILES["image"]["tmp_name"],DIR_FS_TESTIMONIAL_PATH.$id.'-'.$target_path)){

		
			$updqry = "update sliderimage set 
			image = '".$id.'-'.$upload."'
			where sliderID = '".$id."'
			";
			$updres = ets_db_query($updqry) or die(ets_db_error());
		
			return true;
		}else{
		echo "Error in uploading Image..";
		}
	}
	
	function editForm()
	{		
		$sql = "select * from testimonial where testimonial_Id ='".$_REQUEST['testimonial_Id']."'";
		$qry = ets_db_query($sql) or die(ets_db_error().$sql);
		
		if(ets_db_num_rows($qry) > 0){
			$rs=ets_db_fetch_array($qry);
			$form = new Form("html5");
			$form->configure(array(
			"prevent" => array("bootstrap","jQuery"),
			"view" => new View_SideBySide,
			"id" => "testiFrm"
			));
			$status = array("E" => "Enabled", "D" => "Disabled");
			$form->addElement(new Element_HTML("<legend>Edit Testimonial</legend>"));
			$form->addElement(new Element_Hidden("controller", "testimonial"));
			$form->addElement(new Element_Hidden("action", "testimonial"));
			$form->addElement(new Element_Hidden("subaction", "edit"));
            $form->addElement(new Element_Hidden("prevImage", $rs['image']));
			$form->addElement(new Element_Hidden("testimonial_Id", $_REQUEST['testimonial_Id']));
			/* Actual Form Fields Started */
			$testimonial = gettestimoniallist();
			$form->addElement(new Element_Select("Testimonial Type:", "testimonial_type",$testimonial, array(
			"value"=> $rs['testimonial_type'],
			"placeholder" => "Testimonial Type"
			)));
			$form->addElement(new Element_Textbox("Name:", "name", array(
			"value"=> $rs['name'],
			"required" => 1, 
			"placeholder" => "Name"
			)));
			$form->addElement(new Element_Textbox("City:", "tour_Name", array(
			"value"=> $rs['tour_Name'],
			"required" => 1, 
			"value"=> $rs['tour_Name']
			)));
			$form->addElement(new Element_Textarea("review:", "review", array(
			"value"=> $rs['review'],
			"required" => 1, 
			"placeholder" => "review"
			)));
            	$form->addElement(new Element_HTML('<img src="'.DIR_WS_TESTIMONIAL_PATH.$rs['image'].'" width="10%" height="10%" ">'));
			$form->addElement(new Element_File("Slider Image:", "image", array(
			"placeholder" => "Slider Image"
			)));
			$form->addElement(new Element_HTML('<label class="control-label">Last Sort Order : '.get_last_sortorder('testimonial').'</label><br><br>'));			
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
		if($_FILES["image"]['size'] == 0 ||  $_FILES["image"] == $_POST['prevImage']){
			$updimg = false;
			$upload = $_POST['prevImage'];
		}
		if($updimg){
			@unlink(DIR_FS_TESTIMONIAL_PATH.$_POST['prevImage']);
			$upload = $_POST['testimonial_Id'].'-'.$_FILES["image"]["name"];
			$target_path = DIR_FS_TESTIMONIAL_PATH.$_POST['testimonial_Id'].'-'.$_FILES["image"]["name"];
			if(!move_uploaded_file($_FILES["image"]["tmp_name"],$target_path)){
				$error = true;
				echo "Error in updating member image..";
			}
		}
		$username = $_SESSION['username'];
		$updqry = ets_db_query("update testimonial set 
		testimonial_type = '".$_POST['testimonial_type']."',
		name = '".ets_db_real_escape_string($_POST['name'])."',
        tour_Name = '".ets_db_real_escape_string($_POST['tour_Name'])."',		
        review = '".ets_db_real_escape_string($_POST['review'])."',
		username = '".$username."',	
        	image = '".$upload."',	
		sortorder='".$_POST['sortorder']."',
		status = '".$_POST['status']."',
		modifieddate = now(),
		remote_ip ='".$_SERVER['REMOTE_ADDR']."'
		where testimonial_Id='" .$_POST['testimonial_Id']."'") or die ("Updating Testimonial records query failed: ".ets_db_error());	
		return true;
	}
	function listData()
	{
?>
<script>
$(document).ready(function() {
	var listURL = 'helperfunc/testimonialList.php';
	$('#testimoniallist').dataTable({
		"ajax": listURL
	});
});
</script>	
<?php
		$subvar = 'onclick="return confirmSubmit();"';	
		echo '<div id="no-more-tables"><table cellpadding="1" cellspacing="2" border="0" class="table table-striped table-bordered dataTable" id="testimoniallist" width="100%">
		<thead>
		<tr>
			<th align="left">ID</th>
			<th align="left">Name</th>
			<th align="left">City</th>
			<th align="left">Status</th>
			<th align="left">Sortorder</th>
			<th>Action</th>
		</tr>
		</thead>
		<tbody></tbody>	
		<tfoot>
				<tr>
					<th align="left">ID</th>
					<th align="left">Name</th>
					<th align="left">City</th>
					<th align="left">Status</th>
					<th align="left">Sortorder</th>
					<th>Action</th>
				</tr>
		</tfoot>
		 </table></div>';		
	?>
<script>
	$('.table').editable({
		selector: 'a.estatus,a.esortorder',
		params:{"tblName":"testimonial"},
		value: 1,
		source: [{value: 'E', text: 'Active'},{value: 'D', text: 'Disabled'}]
	});
</script>
<?php		
	}		
function delete()
	{
        	$selqry = "Select * from testimonial where testimonial_Id='".$_GET['testimonial_Id']."'";
		$selres = ets_db_query($selqry);
		$arr = ets_db_fetch_array($selres);
		@unlink(DIR_FS_TESTIMONIAL_PATH.$arr['image']);
		$delsql = "Delete from testimonial where testimonial_Id='".$_GET['testimonial_Id']."'";
		$delqry = ets_db_query($delsql) or die(ets_db_error().$delsql);
		return true;		
	}
	
	
	}
?>
