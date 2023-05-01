<script>
$(document).ready(function(){
	flag = 0;
	          $('input').on('blur', function() {      
				if ($("#sliderFrm").valid() && flag == 0) {
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
<?php
include WS_PFBC_ROOT."Form.php";
class personality
{
	function addForm()
	{
		$form = new Form("addFrm");
		$form->configure(array(
			"prevent" => array("bootstrap","jQuery"),
			"view" => new View_SideBySide,
			"id" => "sliderFrm"
		));
		$status = array("E" => "Enabled", "D" => "Disabled");
		$position = array("H" => "Home Page", "I" => "Inner Pages");
		$form->addElement(new Element_HTML("<legend>New personality</legend>"));
		$form->addElement(new Element_Hidden("controller", "personality"));
		$form->addElement(new Element_Hidden("action", "personality"));
		$form->addElement(new Element_Hidden("subaction", "add"));
		$form->addElement(new Element_Hidden("createdate"));
		$form->addElement(new Element_Hidden("username"));
		/* Actual Form Fields Started */		
		$form->addElement(new Element_Textbox("Personality Title:", "personalityTitle", array(
			"placeholder" => "Title"
			)));

        $form->addElement(new Element_Textbox("Personality SubTitle:", "personalitySubTitle", array(
            "placeholder" => "Personality SubTitle"
        )));

		$form->addElement(new Element_File("personality Image: <br>(200 × 200 pixels)", "image", array(
			"required" => 1, 
			"placeholder" => "Photo"
			)));
		$form->addElement(new Element_Select("Status:", "status", $status, array(
			"required" => 1, 
			"placeholder" => "Status"
			)));
        $form->addElement(new Element_HTML('<label class="control-label">Last Sort Order : '.get_last_sortorder('personality').'</label><br><br>'));		
		$form->addElement(new Element_Textbox("Sort Order:", "sortorder", array(
			"required" => 1, 
			"placeholder" => "SortOrder"	
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
		$personalityslug = pro_SeoSlug(stripslashes($_POST['personalityTitle']));
		$upload = $_FILES["image"]["name"];
		$mobile_upload = $_FILES["mobile_image"]["name"];
		$username=$_SESSION['username'];
		$target_path = $_FILES["image"]["name"];
		$sql = "Insert into personality set 
		personalityTitle = '".$_POST['personalityTitle']."',
		personalitySubTitle = '".$_POST['personalitySubTitle']."',
		status = '".$_POST['status']."',
		sortorder='".$_POST['sortorder']."',
		username = '".$username."',
		createdate= now(),
		remote_ip ='".$_SERVER['REMOTE_ADDR']."'
		";
		$qry = ets_db_query($sql) or die(ets_db_error().$sql);
		
		$id = ets_db_insert_id();
        
		
		$seoBase = "personality";
        insSeoLnk($id,$seoBase,$personalityslug);
		
		$img_path= DIR_FS_PERSONALITY_PATH.$id.'-'.$target_path;
		if(move_uploaded_file($_FILES["image"]["tmp_name"],$img_path)){
            
			$updqry = "update personality set 
			image = '".$id.'-'.$upload."'
			where 	personalityID = '".$id."'
			";
			$updres = ets_db_query($updqry) or die(ets_db_error());
		
			return true;
		}else{
           echo "in else";
		    echo "Error in uploading Image..";
		}
	}
	function editForm()
	{		
		$sql = "select * from personality where personalityID ='".$_REQUEST['personalityID']."'";
		$qry = ets_db_query($sql) or die(ets_db_error().$sql);
		if(ets_db_num_rows($qry) > 0){
			$rs=ets_db_fetch_array($qry);
			$form = new Form("frmEdit");
			$form->configure(array(
			"prevent" => array("bootstrap","jQuery"),
			"view" => new View_SideBySide,
			"id" => "sliderFrm"
			));
			$status = array("E" => "Enabled", "D" => "Disabled");
			$position = array("H" => "Home Page", "I" => "Inner Pages");
			$form->addElement(new Element_HTML("<legend>Edit personality</legend>"));
			$form->addElement(new Element_Hidden("controller", "personality"));
			$form->addElement(new Element_Hidden("action", "personality"));
			$form->addElement(new Element_Hidden("subaction", "edit"));
			$form->addElement(new Element_Hidden("personalityID", $_REQUEST['personalityID']));
			$form->addElement(new Element_Hidden("prevImage", $rs['image']));
			$form->addElement(new Element_Hidden("prevMobileImage", $rs['mobile_image']));
			$form->addElement(new Element_Hidden("createdate"));
			$form->addElement(new Element_Hidden("username"));
			/* Actual Form Fields Started */
            $form->addElement(new Element_Textbox("Personality Title:", "personalityTitle", array(
			"placeholder" => "personalityTitle",
			"value" => $rs['personalityTitle']
			)));

            $form->addElement(new Element_Textbox("Personality SubTitle:", "personalitySubTitle", array(
                "placeholder" => "Personality SubTitle",
                "value" => $rs['personalitySubTitle']
            )));
            
			$form->addElement(new Element_HTML('<img src="'.DIR_WS_PERSONALITY_PATH.$rs['image'].'" width="10%" height="10%" ">'));
            
			$form->addElement(new Element_File("personality Image: <br>(200 × 200 pixels)", "image", array(
			     "placeholder" => "personality Image"
			)));
			
			$form->addElement(new Element_Textbox("Sortorder:", "sortorder", array(
			"required" => 1, 
			"value"=> $rs['sortorder']
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
			echo "No Such Entry Found";
		}
		
	}
	function edit()
	{
		$personalityslug = pro_SeoSlug(stripslashes($_POST['personalityTitle']));
		$id=$_POST['personalityID'];
		$updimg = true;		
		$updimg1 = true;		
		$error = false;
		$mobile_error = false;
		$username = $_SESSION['username'];
		if($_FILES["image"]['size'] == 0 ||  $_FILES["image"] == $_POST['prevImage']){
			$updimg = false;
			$upload = $_POST['prevImage'];
		}
        

		if($updimg){
			@unlink(DIR_FS_PERSONALITY_PATH.$_POST['prevImage']);
			$upload = $_POST['personalityID'].'-'.$_FILES["image"]["name"];
			$target_path = DIR_FS_PERSONALITY_PATH.$_POST['personalityID'].'-'.$_FILES["image"]["name"];
			if(!move_uploaded_file($_FILES["image"]["tmp_name"],$target_path)){
				$error = true;
				echo "Error in updating member image..";
			}
		}

     
        $updqry = ets_db_query("update personality set 
        image = '".$upload."',					
        personalityTitle = '".$_POST['personalityTitle']."',
		personalitySubTitle = '".$_POST['personalitySubTitle']."',
        username = '".$username."',	
        modifieddate = now(),
		status = '".$_POST['status']."',
		sortorder = '".$_POST['sortorder']."',
        remote_ip ='".$_SERVER['REMOTE_ADDR']."'		
        where personalityID='" .$_POST['personalityID']."'") or die ("Updating image records query failed: ".ets_db_error());

		$seoBase = "personality";
        updSeoLnk($id,$seoBase,$personalityslug);
		
        return true;
            
		
	}
	function listData()
	{
?>
<script>
$(document).ready(function() {
	var listURL = 'helperfunc/personalityList.php';
	$('#personalitylist').dataTable({
		"ajax": listURL
		
	});
});

</script>
<?php
		$subvar = 'onclick="return confirmSubmit();"';	

		echo '<table cellpadding="1" cellspacing="2" border="0" class="table table-striped table-bordered dataTable" id="personalitylist" width="100%">
		<thead>
		<tr>
			<th align="left">Id</th>			
			<th align="left">Title</th>		
			<th align="left">Personality SubTitle</th>
			<th align="left">Image</th>		
			<th>Action</th>
		</tr>
		</thead>
		<tbody></tbody>	
		<tfoot>
				<tr>
					<th align="left">Id</th>	
                    <th align="left">Title</th>	
					<th align="left">Personality SubTitle</th>
					<th align="left">Image</th>		
                    <th>Action</th>
				</tr>
		</tfoot>		
		 </table>';		
		?>

<?php		
	}	
	function delete()
	{
		$selqry = "Select * from personality where personalityID='".$_GET['personalityID']."'";
		$selres = ets_db_query($selqry);
		$arr = ets_db_fetch_array($selres);
		@unlink(DIR_FS_PERSONALITY_PATH.$arr['image']);
		$delsql = "Delete from personality where personalityID='".$_GET['personalityID']."'";
		$delqry = ets_db_query($delsql) or die(ets_db_error().$delsql);
		
		return true;		
	}
}
?>
