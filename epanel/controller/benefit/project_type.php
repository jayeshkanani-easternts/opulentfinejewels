<script>
$(document).ready(function(){
			  flag = 0;
	          $('input').on('blur', function() {      
				if ($("#ptypeFrm").valid() && flag == 0) {
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
class project_type
{
	function addForm()
	{
		$form = new Form("addFrm");
		$form->configure(array(
			"prevent" => array("bootstrap","jQuery"),
			"view" => new View_SideBySide,
			"id" => "ptypeFrm"
		));
		$status = array("E" => "Enabled", "D" => "Disabled");
		$proj_type = array("Y" => "Yes", "N" => "No");
		$query = 'select pTypeID, pTypeTitle, pTypeParent from project_type ORDER BY pTypeID'; 
		$result = ets_db_query($query); 
		$menu_array = array(); 
		while($row=ets_db_fetch_array($result)){ 
			$menu_array[$row['pTypeID']] = $row; 
		}

		$form->addElement(new Element_HTML("<legend>New Project's Type</legend>"));
		$form->addElement(new Element_Hidden("controller", "projects"));
		$form->addElement(new Element_Hidden("action", "project_type"));
		$form->addElement(new Element_Hidden("subaction", "add"));
		$form->addElement(new Element_Hidden("createdate"));
		$form->addElement(new Element_Hidden("sortorder","1"));
		$form->addElement(new Element_Hidden("status","E"));
		/* Actual Form Fields Started */
		$typeParents = '<select name="pTypeParent" id="mainpages" class="span3"><option value="0">Project Type Parent</option>'.display_parent_items($menu_array,'pTypeParent','pTypeID','pTypeTitle').'</select>';
		
		$form->addElement(new Element_Textbox("Type Title:", "pTypeTitle", array(
				"required" => 1,
				"placeholder" => "project Type"
				)));
		
		$form->addElement(new Element_HTML('
			<div class="control-group"><label class="control-label" for="frmedit-element-5">Type Parent:</label><div class="controls">'.$typeParents.'</div></div>
		'));
		$form->addElement(new Element_TinyMCE("Project Description:", "pTypeDescr", array(
				"required" => 1,
				"placeholder" => "Project Description"
				)));
		$form->addElement(new Element_HTML('<label class="control-label">Last Sort Order : '.get_last_sortorder('project_type').'</label><br><br>'));						
		$form->addElement(new Element_Textbox("Sortorder:", "sortorder", array(
			"required" => 1,
			"placeholder" => "Sortorder"	
			)));	
		$form->addElement(new Element_Select("Status:", "status", $status, array(
			"required" => 1
			)));
		$form->addElement(new Element_Select("Has Project:", "HasProject", $proj_type, array(
			"required" => 1
			)));	
		$form->addElement(new Element_File("Upload file:", "projectfile", array(
				"placeholder" => "Upload File"
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
		$username = $_SESSION['fname'];
		$pTypeslug = pro_SeoSlug(stripslashes($_POST['pTypeTitle']));
		$sql = "Insert into project_type set 
		username = '".$username."',
		createdate = now(),
		pTypeTitle = '".ets_db_real_escape_string($_POST['pTypeTitle'])."',
		pTypeDescr = '".ets_db_real_escape_string($_POST['pTypeDescr'])."',
		pTypeParent = '".$_POST['pTypeParent']."',
		sortorder = '".$_POST['sortorder']."',
		status = '".$_POST['status']."',
		HasProject = '".$_POST['HasProject']."',
		
		remote_ip ='".$_SERVER['REMOTE_ADDR']."'
		";
		if(ets_db_query($sql)){
			$pTypeID = ets_db_insert_id();
			
			$path = DIR_FS_PROJECT_PATH;
			if(!file_exists($path))
				{
					mkdir($path);
					exec("chown ".FILEUSER.FILEUSER." ".$path);
					exec("chmod 0777 ".$path);
					
				}
			
			$targetl_path = DIR_FS_PROJECT_PATH.$pTypeID.'-'.$_FILES["projectfile"]["name"]; 
			move_uploaded_file($_FILES["projectfile"]["tmp_name"],$targetl_path);
			$updqry = "Update project_type set projectFile = '".$pTypeID.'-'.$_FILES["projectfile"]["name"]."'
			where pTypeID = '".$pTypeID."'";
			$updres = ets_db_query($updqry) or die(ets_db_error());
			
			$parentList = '';
			$parentID = getproject_typeParent($_POST['pTypeParent']);
			$parentList[] = pro_SeoSlug(getproject_typeTitle($_POST['pTypeParent']));
			if($parentID > 0){
				
				$parentList[] = pro_SeoSlug(getproject_typeTitle($parentID));
				$parentID1 = getproject_typeParent($parentID);
				if($parentID1 > 0){
					$parentList[] = pro_SeoSlug(getproject_typeTitle($parentID1));
					$parentID2 = getproject_typeParent($parentID1);
				}
				if($parentID2 > 0){
					$parentList[] = pro_SeoSlug(getproject_typeTitle($parentID2));
					$parentID3 = getproject_typeParent($parentID2);
				}
				if($parentID3 > 0){
					$parentList[] = pro_SeoSlug(getproject_typeTitle($parentID3));
					$parentID4 = getproject_typeParent($parentID3);
				}
				
			}
			if($_POST['pTypeParent'] == 0){
				$seoBase = "projects";
			}else{
				$seoBase = implode("/", array_reverse($parentList));
				$seoBase = "projects/".$seoBase;
			}
			insSeoLnk($pTypeID,$seoBase,$pTypeslug);
			return true;
		}else{
			die(ets_db_error());
			echo "Error in Inserting Project Types..";
		}
		
		return true;
	}
	function editForm()
	{		
		$sql = "select * from  project_type where pTypeID ='".$_REQUEST['pTypeID']."'";
		$qry = ets_db_query($sql) or die(ets_db_error().$sql);
		if(ets_db_num_rows($qry) > 0){
			$rs=ets_db_fetch_array($qry);
			$form = new Form("html5");
			$form->configure(array(
				"prevent" => array("bootstrap","jQuery"),
				"view" => new View_SideBySide,
				"id" => "ptypeFrm"
			));
			$status = array("E" => "Enabled", "D" => "Disabled");
			$proj_type = array("Y" => "Yes", "N" => "No");
			$query = 'select pTypeID, pTypeTitle, pTypeParent from project_type ORDER BY pTypeID'; 
			$result = ets_db_query($query); 
			$menu_array = array(); 
			while($row=ets_db_fetch_array($result)){ 
				$menu_array[$row['pTypeID']] = $row; 
			}
			$pTypeParent = $rs['pTypeParent'];
			$form->addElement(new Element_HTML("<legend>Edit Projects's Type</legend>"));
			$form->addElement(new Element_Hidden("controller", "projects"));
			$form->addElement(new Element_Hidden("action", "project_type"));
			$form->addElement(new Element_Hidden("subaction", "edit"));
			$form->addElement(new Element_Hidden("pTypeID", $_REQUEST['pTypeID']));
			
			$typeParents = '<select name="pTypeParent" id="mainpages" class="span3"><option value="0">Project Type Parent</option>'.display_parent_items($menu_array,'pTypeParent','pTypeID','pTypeTitle',$pTypeParent).'</select>';

			/* Actual Form Fields Started */
			$form->addElement(new Element_Textbox("Type Title:", "pTypeTitle", array(
				"required" => 1, 
				"value"=> stripslashes($rs['pTypeTitle'])
			)));
			$form->addElement(new Element_HTML('
				<div class="control-group"><label class="control-label" for="frmedit-element-5">Type Parent:</label><div class="controls">'.$typeParents.'</div></div>
			'));
			$form->addElement(new Element_TinyMCE("Project Description:", "pTypeDescr", array(
					"required" => 1,
					"value" => stripcslashes($rs['pTypeDescr'])
					)));
			$form->addElement(new Element_HTML('<label class="control-label">Last Sort Order : '.get_last_sortorder('project_type').'</label><br><br>'));					
			$form->addElement(new Element_Textbox("Sortorder:", "sortorder", array(
				"required" => 1,
				"value"=> $rs['sortorder']
			)));	
			$form->addElement(new Element_Select("Status:", "status", $status, array(
				"required" => 1,
				"value"=> $rs['status']
			)));		
			$form->addElement(new Element_Select("Has Project:", "HasProject", $proj_type, array(
			"required" => 1,
			"value"=> $rs['HasProject']
			)));	
			if($rs["projectFile"] != ""){
				$projectfile_path = DIR_WS_PROJECT_PATH.$rs["projectFile"];
				$form->addElement(new Element_HTML('<a href="'.$projectfile_path.'" target="_blank">View File</a>'));
				$form->addElement(new Element_Hidden("Oldprojectfile",$rs["projectFile"]));
			}
			$form->addElement(new Element_File("Upload file:", "projectfile", array(
				"placeholder" => "Upload File"
				)));
			
			$form->addElement(new Element_HTML('<hr>'));
			$form->addElement(new Element_Button);
			$form->addElement(new Element_Button("Cancel", "button", array(
				"onclick" => "history.go(-1);"
			)));
			$form->addElement(new Element_HTML('<hr>'));
			$form->render();
		}
		else
		{
			echo "No Found...";
		}
		
	}
	function edit()
	{
	    	$username=$_SESSION['username'];
	    	$modifieddate = date("Y-m-d");
			if($_FILES['projectfile']['name']==''){
				$lfilename = $_POST['Oldprojectfile'];
			}else{
				$lfilename = $_POST['pTypeID'].'-'.$_FILES['projectfile']['name'];
			}
	    	$pTypeslug = pro_SeoSlug(stripslashes($_POST['pTypeTitle']));
		$sql = "update project_type set 
			username = '".$username."',
			createdate = '".$createdate."',
			pTypeTitle = '".ets_db_real_escape_string($_POST['pTypeTitle'])."',
			pTypeDescr = '".ets_db_real_escape_string($_POST['pTypeDescr'])."',
			pTypeParent = '".$_POST['pTypeParent']."',
			sortorder ='".$_POST['sortorder']."',
			status = '".$_POST['status']."',
			HasProject = '".$_POST['HasProject']."',
			projectFile = '".$lfilename."',
			remote_ip ='".$_SERVER['REMOTE_ADDR']."'
			where pTypeID = '".$_POST['pTypeID']."'";
		if(ets_db_query($sql)){
			$pTypeID = $_POST['pTypeID'];
			$path = DIR_FS_PROJECT_PATH;
			if(!file_exists($path))
				{
					mkdir($path);
					exec("chown ".FILEUSER.FILEUSER." ".$path);
					exec("chmod 0777 ".$path);
					
				}
			if($_FILES['projectfile']['name']!=''){
				$target_path = DIR_FS_PROJECT_PATH.$_POST['pTypeID'].'-'.$_FILES["projectfile"]["name"]; 
				move_uploaded_file($_FILES["projectfile"]["tmp_name"],$target_path);
			}
			$parentList = '';
			$parentID = getproject_typeParent($_POST['pTypeParent']);
			$parentList[] = pro_SeoSlug(getproject_typeTitle($_POST['pTypeParent']));
			
			if($parentID > 0){
				
				$parentList[] = pro_SeoSlug(getproject_typeTitle($parentID));
				$parentID1 = getproject_typeParent($parentID);
				if($parentID1 > 0){
					$parentList[] = pro_SeoSlug(getproject_typeTitle($parentID1));
					$parentID2 = getproject_typeParent($parentID1);
				}
				if($parentID2 > 0){
					$parentList[] = pro_SeoSlug(getproject_typeTitle($parentID2));
					$parentID3 = getproject_typeParent($parentID2);
				}
				if($parentID3 > 0){
					$parentList[] = pro_SeoSlug(getproject_typeTitle($parentID3));
					$parentID4 = getproject_typeParent($parentID3);
				}
			}
			if($_POST['pTypeParent'] == 0){
				$seoBase = "projects";
			}else{
				$seoBase = implode("/", array_reverse($parentList));
				$seoBase = "projects/".$seoBase;
			}
			
			updSeoLnk($pTypeID,$seoBase,$pTypeslug);
			
			return true;
			
		}else{
			echo "Error in updating project type..";
		}
	}	
	function listData(){
?>
	<script>
	$(document).ready(function() {
		var listURL = 'helperfunc/projecttypeList.php';
		$('#project_typelist').dataTable({
			"ajax": listURL
		});
		
		$('.esortorder').editable({params:{"tblName":"project_type"}});
	});
	</script>
<?php
	$subvar = 'onclick="return confirmSubmit();"';
	echo '<div id="no-more-tables">
	<table cellpadding="1" cellspacing="2" border="0" class="table table-striped table-bordered dataTable" id="project_typelist" width="100%">
		<thead>
		<tr>
			<th width="5%">Id</th>
			<th width="25%">Type</th>
			<th width="25%">Parent Type</th>
			<th width="10%">Status</th>
			<th width="10%">Sort-Order</th>
			<th width="25%">Action</th>
		</tr>
		</thead>
		<tbody></tbody>	
		<tfoot>	
		<tr>
			<th>Id</th>
			<th>Type</th>
			<th>Parent Type</th>
			<th>Status</th>
			<th>Sort-Order</th>
			<th>Action</th>
		</tr>
		</tfoot>
	</table></div>';	
?>
<script>
	$('.table').editable({
		selector: 'a.estatus,a.esortorder',
		params:{"tblName":"project_type"},
		value: 1,
		source: [{value: 'E', text: 'Active'},{value: 'D', text: 'Disabled'}]
	});
</script>
<?php	
	}
	function delete()
	{
		$sql = "Select * from project_type where pTypeParent = '".$_GET['pTypeID']."'";
		$res = ets_db_query($sql) or die(ets_db_error());
		$num = ets_db_num_rows($res);
		
		if($num > 0)
		{
			echo 'if';
			while($arr = ets_db_fetch_array($res))
			{
				$pqry = "Select * from projects where pTypeID = '".$arr['pTypeID']."'";
				$pres = ets_db_query($pqry);
				
				while($parr = ets_db_fetch_array($pres))
				{
					$path = DIR_FS_PROJECT_PATH.$parr['projectID'];
					delete_folder($path);
					
					$pdelqry = "Delete from gallery where projectID = '".$parr['projectID']."'";
					$pdelres = ets_db_query($pdelqry);
					
					$pdelqry = "Delete from seo_link_master where module_id = '".$parr['projectID']."' and module_name like '%projects/%'";
					$pdelres = ets_db_query($pdelqry);
				}
				
				$pdelqry = "Delete from projects where pTypeID = '".$arr['pTypeID']."'";
				$pdelres = ets_db_query($pdelqry);
				
				$pdelqry = "Delete from seo_link_master where module_id = '".$arr['pTypeID']."' and module_name like '%projects/%'";
				$pdelres = ets_db_query($pdelqry);
				@unlink(DIR_FS_PROJECT_PATH.$arr['projectFile']);
			}
		}
		
		else
		{
				
				$pqry = "Select * from projects where pTypeID = '".$_GET['pTypeID']."'";
				$pres = ets_db_query($pqry);
				
				
				while($parr = ets_db_fetch_array($pres))
				{
					$path = DIR_FS_PROJECT_PATH.$parr['projectID'];
					delete_folder($path);
					
					$pdelqry = "Delete from gallery where projectID = '".$parr['projectID']."'";
					$pdelres = ets_db_query($pdelqry);
					
					$pdelqry = "Delete from seo_link_master where module_id = '".$parr['projectID']."' and module_name like '%projects/%'";
					$pdelres = ets_db_query($pdelqry);
				}
				
				$pdelqry = "Delete from projects where pTypeID = '".$_GET['pTypeID']."'";
				$pdelres = ets_db_query($pdelqry);
				
				$pdelqry = "Delete from seo_link_master where module_id = '".$_GET['pTypeID']."' and module_name like '%projects/%'";
				$pdelres = ets_db_query($pdelqry);
				@unlink(DIR_FS_PROJECT_PATH.$arr['projectFile']);
		}
		
		$projectFile = getfldValue('project_type','pTypeID',$_GET['pTypeID'],'projectFile');
		@unlink(DIR_FS_PROJECT_PATH.$projectFile);
		$sql = "Delete from project_type where pTypeParent = '".$_GET['pTypeID']."'";
		$res = ets_db_query($sql) or die(ets_db_error());
		
		
		$delsql = "Delete from project_type where pTypeID = '".$_GET['pTypeID']."'";
		$delqry = ets_db_query($delsql) or die(ets_db_error().$delsql);
		
		delSeoLnk($_GET['pTypeID'],"projects");
		
		return true;		
	}	
}
?>
