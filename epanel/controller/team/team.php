<?php
include WS_PFBC_ROOT."Form.php";

class team
{
	function addForm()
	{
		$form = new Form("addFrm");
		$form->configure(array(
			"prevent" => array("bootstrap","jQuery"),
			"view" => new View_SideBySide
		));
		$status = array("E" => "Enabled", "D" => "Disabled");
		$form->addElement(new Element_HTML("<legend>New Leadership</legend>"));
		$form->addElement(new Element_Hidden("controller", "team"));
		$form->addElement(new Element_Hidden("action", "team"));
		$form->addElement(new Element_Hidden("subaction", "add"));
		$form->addElement(new Element_Hidden("createdate"));
		$form->addElement(new Element_Hidden("username"));
		/* Actual Form Fields Started */		
		$form->addElement(new Element_Textbox("Full Name :", "name", array(
			"required" => 1, 
			"placeholder" => "Full Name"
			)));
		
        $form->addElement(new Element_Textbox("Designation :", "designation", array(
			"placeholder" => "Designation"
			)));
        
        $form->addElement(new Element_Textbox("Facebook:", "facebook", array(
			"placeholder" => "Facebook"
			)));
			
		$form->addElement(new Element_Textbox("Twitter:", "twitter", array(
			"placeholder" => "Twitter"
			)));
		$form->addElement(new Element_Textbox("Google+:", "google", array(
			"placeholder" => "Google+"
			)));
			
		$form->addElement(new Element_Textbox("Instagram:", "instagram", array(
			"placeholder" => "Instagram"
			)));
		$form->addElement(new Element_Textbox("Youtube:", "youtube", array(
			"placeholder" => "Youtube"
			)));
			
		$form->addElement(new Element_Textbox("Pinterest:", "pinterest", array(
			"placeholder" => "Pinterest"
			)));
		/*$form->addElement(new Element_Textbox("Contact No :", "phone", array(
			"required" => 1, 
			"placeholder" => "Contact No"
			)));
		
		$form->addElement(new Element_Textbox("Email:", "email", array(
			"required" => 1, 
			"placeholder" => "Email"
			)));*/
		$form->addElement(new Element_File("Image: <br>(900 * 990 pixels)", "image", array(
		    "required" => 1, 
			"placeholder" => "Photo"
        )));
        
        $form->addElement(new Element_TinyMCE("Short Description:", "short_description", array(
           "required" => 1
        )));
        
		$form->addElement(new Element_TinyMCE("Description:", "description", array(
           "required" => 1
        )));		
		$form->addElement(new Element_Textbox("Sort Order:", "sortorder", array(
			"required" => 1, 
			"placeholder" => "SortOrder"
			)));
        
        $form->addElement(new Element_HTML('<div><label class="control-label" style="width:100%;text-align:left;">Note : Images will be displayed in website in the ascending order of sort order </label><br><br></div>'));
			
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
		$team_slug = pro_SeoSlug(stripslashes($_POST['name']));
		
		
            $sql = "Insert into team_master set 
            name = '".ets_db_real_escape_string($_POST['name'])."',		
            qualification = '".ets_db_real_escape_string($_POST['designation'])."',		
           	facebook = '".ets_db_real_escape_string($_POST['facebook'])."',	
           	twitter = '".ets_db_real_escape_string($_POST['twitter'])."',	
           	google = '".ets_db_real_escape_string($_POST['google'])."',	
           	youtube = '".ets_db_real_escape_string($_POST['youtube'])."',	
           	instagram = '".ets_db_real_escape_string($_POST['instagram'])."',	
           	pinterest = '".ets_db_real_escape_string($_POST['pinterest'])."',	
            short_description = '".addslashes($_POST['short_description'])."',
            description = '".addslashes($_POST['description'])."',
            username = '".$username."',
            createdate= now(),
            sortorder='".$_POST['sortorder']."',
            status = '".$_POST['status']."',
            remote_ip ='".$_SERVER['REMOTE_ADDR']."'
            ";
            $qry = ets_db_query($sql) or die(ets_db_error().$sql);
            $team_id = ets_db_insert_id();
            insSeoLnk($team_id,ourteam,$team_slug);
            $target_path = DIR_FS_TEAM_PATH.$team_id.'-'.$_FILES["image"]["name"]; 
            $upload = $team_id.'-'.$_FILES["image"]["name"];
            if(move_uploaded_file($_FILES["image"]["tmp_name"],$target_path)){
               
                ets_db_query("Update team_master set
                image = '".$upload."'
                where team_id = '".$team_id."'
                ") or die(ets_db_error());
            }
            else{
            echo "Error in uploading Image..";
            }
            return true;
		
	}
	function editForm()
	{		
		$sql = "select * from team_master where team_id ='".$_REQUEST['team_id']."'";
		$qry = ets_db_query($sql) or die(ets_db_error().$sql);
		if(ets_db_num_rows($qry) > 0){
			$rs=ets_db_fetch_array($qry);
			$form = new Form("frmEdit");
			$form->configure(array(
			"prevent" => array("bootstrap","jQuery"),
			"view" => new View_SideBySide
			));
			$status = array("E" => "Enabled", "D" => "Disabled");
			$position = array("H" => "Home Page", "I" => "Inner Pages");
			$form->addElement(new Element_HTML("<legend>Edit Leadership</legend>"));
			$form->addElement(new Element_Hidden("controller", "team"));
			$form->addElement(new Element_Hidden("action", "team"));
			$form->addElement(new Element_Hidden("subaction", "edit"));
			$form->addElement(new Element_Hidden("team_id", $_REQUEST['team_id']));
			$form->addElement(new Element_Hidden("prevImage", $rs['image']));
			$form->addElement(new Element_Hidden("createdate"));
			$form->addElement(new Element_Hidden("username"));
			/* Actual Form Fields Started */
			$form->addElement(new Element_Textbox("Image Title:", "name", array(
				"value"=> $rs['name'],
				"required" => 1, 
				"placeholder" => "Full Name"
			)));
			$form->addElement(new Element_Textbox("Designation :", "qualification", array(
				"value"=> $rs['qualification'],
				"placeholder" => "Designation"
				)));
            
			 $form->addElement(new Element_Textbox("Facebook:", "facebook", array(
			     "placeholder" => "Facebook",
                 "value"=> $rs['facebook'],
			)));
			
            $form->addElement(new Element_Textbox("Twitter:", "twitter", array(
                "placeholder" => "Twitter",
                "value"=> $rs['twitter']
                )));
            $form->addElement(new Element_Textbox("Google+:", "google", array(
                "placeholder" => "Google+",
                "value"=> $rs['google']
                )));

            $form->addElement(new Element_Textbox("Instagram:", "instagram", array(
                "placeholder" => "Instagram",
                "value"=> $rs['instagram']
                )));
            $form->addElement(new Element_Textbox("Youtube:", "youtube", array(
                "placeholder" => "Youtube",
                "value"=> $rs['youtube']
                )));

            $form->addElement(new Element_Textbox("Pinterest:", "pinterest", array(
                "placeholder" => "Pinterest",
                "value"=> $rs['pinterest']
                )));
            /*$form->addElement(new Element_Textbox("Contact No :", "phone", array(
                "required" => 1, 
                "placeholder" => "Contact No"
                )));

            $form->addElement(new Element_Textbox("Email:", "email", array(
                "required" => 1, 
                "placeholder" => "Email"
                )));*/
          

           
			$form->addElement(new Element_HTML('<img src="'.DIR_WS_TEAM_PATH.$rs['image'].'" width="10%" height="10%" ">'));
			$form->addElement(new Element_File("Image:<br>(900 * 990 pixels)", "image", array(
			"placeholder" => " Image"
			)));
            
            $form->addElement(new Element_TinyMCE("Description:", "short_description", array("value"=> stripslashes($rs['short_description']))
			));	
			
			$form->addElement(new Element_TinyMCE("Description:", "description", array("value"=> stripslashes($rs['description']))
			));			
			$form->addElement(new Element_Textbox("Sort Order:", "sortorder", array(
			"value"=> $rs['sortorder'],
			"required" => 1, 
			"placeholder" => "Sort Order"
			)));		
            $form->addElement(new Element_HTML('<div><label class="control-label" style="width:100%;text-align:left;">Note : Images will be displayed in website in the ascending order of sort order </label><br><br></div>'));
            
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
			echo "No Entry Found...";
		}
		
	}
	function edit()
	{
		$updimg = true;		
		$error = false;
		if($_FILES["image"]['size'] == 0 ||  $_FILES["image"] == $_POST['prevImage']){
			$updimg = false;
			$upload = $_POST['prevImage'];
		}
		if($updimg){
			@unlink(DIR_FS_TEAM_PATH.$_POST['prevImage']);
			$upload = $_FILES["image"]["name"];
			$target_path = DIR_FS_TEAM_PATH.$_FILES["image"]["name"];
			if(!move_uploaded_file($_FILES["image"]["tmp_name"],$target_path)){
				$error = true;
				echo "Error in updating member image..";
			}
		}
		if(!$error){
			$team_slug = pro_SeoSlug(stripslashes($_POST['name']));
			$updqry = ets_db_query("update team_master set 
		    name = '".ets_db_real_escape_string($_POST['name'])."',		
            qualification = '".ets_db_real_escape_string($_POST['designation'])."',		
            image = '".$upload."',	
            facebook = '".ets_db_real_escape_string($_POST['facebook'])."',	
           	twitter = '".ets_db_real_escape_string($_POST['twitter'])."',	
           	google = '".ets_db_real_escape_string($_POST['google'])."',	
           	youtube = '".ets_db_real_escape_string($_POST['youtube'])."',	
           	instagram = '".ets_db_real_escape_string($_POST['instagram'])."',	
           	pinterest = '".ets_db_real_escape_string($_POST['pinterest'])."',	
            short_description = '".addslashes($_POST['short_description'])."',		
            description = '".addslashes($_POST['description'])."',	
			sortorder='".$_POST['sortorder']."',
			status = '".$_POST['status']."',
			modifieddate = now(),
			remote_ip ='".$_SERVER['REMOTE_ADDR']."'		
			where team_id='" .$_POST['team_id']."'") or die ("Updating   image records query failed: ".ets_db_error());
			$team_id = $_POST['team_id'];
			updSeoLnk($team_id,ourteam,$team_slug);
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
	var listURL = 'helperfunc/teamList.php';
	$('#teamlist').dataTable({
		"ajax": listURL,
	});
});

</script>
<?php
		$subvar = 'onclick="return confirmSubmit();"';	

		echo '
		<div id="no-more-tables">
		<table cellpadding="1" cellspacing="2" border="0" class="table table-striped table-bordered dataTable" id="teamlist" width="100%">
		<thead>
		<tr>
			<th align="left">Id</th>
			<th align="left">Title</th>
			<th align="left">Image</th>			
			<th align="left">Status</th>
			<th align="left">Sort Order</th>
			<th>Action</th>
		</tr>
		</thead>
		<tbody></tbody>	
		<tfoot class="hidden-xs">
				<tr>
					<th align="left">Id</th>
					<th align="left">Title</th>
					<th align="left">Image</th>					
					<th align="left">Status</th>
					<th align="left">Sort Order</th>
					<th>Action</th>
				</tr>
		</tfoot>		
		 </table>
		 </div>';		
		?>
<script>
	$('.table').editable({
		selector: 'a.estatus,a.esortorder',
		params:{"tblName":"team_master"},
		value: 1,
		source: [{value: 'E', text: 'Active'},{value: 'D', text: 'Disabled'}]
	});
</script>
<?php		
	}	
	function delete()
	{
		$image = getfldValue('team_master','team_id',$_GET['team_id'],'image');
        @unlink(DIR_FS_TEAM_PATH.$image);
        $delsql = "Delete from team_master where team_id='".$_GET['team_id']."'";
		$delqry = ets_db_query($delsql) or die(ets_db_error().$delsql);
		delSeoLnk($_GET['team_id'],"team");
		return true;		
	}
}
?>