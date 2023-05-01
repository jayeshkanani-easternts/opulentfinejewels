<script> 
$(document).ready(function(){
    $('#mainpages').select2({
		placeholder: "Select a Main Page"
	});
});
</script>
<?php
include WS_PFBC_ROOT."Form.php";
class producttype
{
	function addForm()
	{
		$form = new Form("addFrm");
		$form->configure(array(
			"prevent" => array("bootstrap","jQuery"),
			"view" => new View_SideBySide
		));
		$status = array("E" => "Enabled", "D" => "Disabled");
		$proj_type = array("Y" => "Yes", "N" => "No");
		$query = 'select pTypeID, pTypeTitle, pTypeParent from producttype ORDER BY pTypeID';
		$result = ets_db_query($query); 
		$menu_array = array(); 
		while($row=ets_db_fetch_array($result)){ 
			$menu_array[$row['pTypeID']] = $row; 
		}

		$form->addElement(new Element_HTML("<legend>New Project's Type</legend>"));
		$form->addElement(new Element_Hidden("controller", "products"));
		$form->addElement(new Element_Hidden("action", "producttype"));
		$form->addElement(new Element_Hidden("subaction", "add"));
		$form->addElement(new Element_Hidden("createdate"));
		$form->addElement(new Element_Hidden("sortorder","1"));
		$form->addElement(new Element_Hidden("status","E"));
		/* Actual Form Fields Started */
		$typeParents = '<select name="pTypeParent" id="mainpages" class="span3"><option value="0">Project Type Parent</option>'.display_parent_items($menu_array,'pTypeParent','pTypeID','pTypeTitle').'</select>';
		
		$form->addElement(new Element_Textbox("Type Title:", "pTypeTitle", array(
				"required" => 1,
				"placeholder" => "Product Type"
				)));
		
		$form->addElement(new Element_HTML('
			<div class="control-group"><label class="control-label" for="frmedit-element-5">Type Parent:</label><div class="controls">'.$typeParents.'</div></div>
		'));
		$form->addElement(new Element_TinyMCE("Project Description:", "pTypeDescr", array(
				"required" => 1,
				"placeholder" => "Project Description"
				)));
		$form->addElement(new Element_HTML('<label class="control-label">Last Sort Order : '.get_last_sortorder('producttype').'</label><br><br>'));
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
		$username = $_SESSION['username'];
		$pTypeslug = pro_SeoSlug(stripslashes($_POST['pTypeTitle']));
		$sql = "Insert into producttype set 
		username = '".$username."',
		createdate = now(),
		pTypeTitle = '".ets_db_real_escape_string($_POST['pTypeTitle'])."',
		pTypeDescr = '".ets_db_real_escape_string($_POST['pTypeDescr'])."',
		pTypeParent = '".$_POST['pTypeParent']."',
		sortorder = '".$_POST['sortorder']."',
		status = '".$_POST['status']."',
		HasProject = '".$_POST['HasProject']."',
		projectFile = '".$_FILES["projectfile"]["name"]."',
		remote_ip ='".$_SERVER['REMOTE_ADDR']."'
		";
		
		if(ets_db_query($sql)){
			$pTypeID = ets_db_insert_id();
			
			$targetl_path = DIR_FS_PROJECT_PATH.$_FILES["projectfile"]["name"]; 
			
			move_uploaded_file($_FILES["projectfile"]["tmp_name"],$targetl_path);
			
			$parentList = '';
			$parentID = getproductTypeParent($_POST['pTypeParent']);
			$parentList[] = pro_SeoSlug(getproductTypeTitle($_POST['pTypeParent']));
			if($parentID > 0){
				
				$parentList[] = pro_SeoSlug(getproductTypeTitle($parentID));
				$parentID1 = getproductTypeParent($parentID);
				if($parentID1 > 0){
					$parentList[] = pro_SeoSlug(getproductTypeTitle($parentID1));
					$parentID2 = getproductTypeParent($parentID1);
				}
				if($parentID2 > 0){
					$parentList[] = pro_SeoSlug(getproductTypeTitle($parentID2));
					$parentID3 = getproductTypeParent($parentID2);
				}
				if($parentID3 > 0){
					$parentList[] = pro_SeoSlug(getproductTypeTitle($parentID3));
					$parentID4 = getproductTypeParent($parentID3);
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
			echo "Error in Inserting Project Types..";
		}
		
		return true;
	}
	function editForm()
	{		
		$sql = "select * from  producttype where pTypeID ='".$_REQUEST['pTypeID']."'";
		$qry = ets_db_query($sql) or die(ets_db_error().$sql);
		if(ets_db_num_rows($qry) > 0){
			$rs=ets_db_fetch_array($qry);
			$form = new Form("html5");
			$form->configure(array(
				"prevent" => array("bootstrap","jQuery"),
				"view" => new View_SideBySide
			));
			$status = array("E" => "Enabled", "D" => "Disabled");
			$proj_type = array("Y" => "Yes", "N" => "No");
			$query = 'select pTypeID, pTypeTitle, pTypeParent from producttype ORDER BY pTypeID';
			$result = ets_db_query($query); 
			$menu_array = array(); 
			while($row=ets_db_fetch_array($result)){ 
				$menu_array[$row['pTypeID']] = $row; 
			}
			$pTypeParent = $rs['pTypeParent'];
			$form->addElement(new Element_HTML("<legend>Edit Projects's Type</legend>"));
			$form->addElement(new Element_Hidden("controller", "products"));
			$form->addElement(new Element_Hidden("action", "producttype"));
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
			$form->addElement(new Element_HTML('<label class="control-label">Last Sort Order : '.get_last_sortorder('producttype').'</label><br><br>'));
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
				$lfilename = $_FILES['projectfile']['name'];
			}
	    	$pTypeslug = pro_SeoSlug(stripslashes($_POST['pTypeTitle']));
		$sql = "update producttype set 
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
			if($_FILES['projectfile']['name']!=''){
				$target_path = DIR_FS_PROJECT_PATH.$_FILES["projectfile"]["name"]; 
				move_uploaded_file($_FILES["projectfile"]["tmp_name"],$target_path);
			}
			$parentList = '';
			$parentID = getproductTypeParent($_POST['pTypeParent']);
			$parentList[] = pro_SeoSlug(getproductTypeTitle($_POST['pTypeParent']));
			
			if($parentID > 0){
				
				$parentList[] = pro_SeoSlug(getproductTypeTitle($parentID));
				$parentID1 = getproductTypeParent($parentID);
				if($parentID1 > 0){
					$parentList[] = pro_SeoSlug(getproductTypeTitle($parentID1));
					$parentID2 = getproductTypeParent($parentID1);
				}
				if($parentID2 > 0){
					$parentList[] = pro_SeoSlug(getproductTypeTitle($parentID2));
					$parentID3 = getproductTypeParent($parentID2);
				}
				if($parentID3 > 0){
					$parentList[] = pro_SeoSlug(getproductTypeTitle($parentID3));
					$parentID4 = getproductTypeParent($parentID3);
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
		var listURL = 'helperfunc/producttypeList.php';
		$('#producttypelist').dataTable({
			"ajax": listURL
		});
		/*
		$('#producttypelist').dataTable({
			"bProcessing": true,
			"sAjaxSource": listURL,
			"aaSorting": [[2,'asc'], [4,'asc']],
			"sDom": "<'row-fluid'<'span8'l><'span4'f>r>t<'row-fluid'<'span8'i><'span4'p>>",
			"sPaginationType": "bootstrap",
			"iDisplayLength": 50,
			"oLanguage": {"sLengthMenu": "_MENU_ records per page"} 
		});
		*/
		$('.esortorder').editable({params:{"tblName":"producttype"}});
	});
	</script>
<?php
	$subvar = 'onclick="return confirmSubmit();"';
	echo '<div id="no-more-tables">
	<table cellpadding="1" cellspacing="2" border="0" class="table table-striped table-bordered dataTable" id="producttypelist" width="100%">
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
		params:{"tblName":"producttype"},
		value: 1,
		source: [{value: 'E', text: 'Active'},{value: 'D', text: 'Disabled'}]
	});
</script>
<?php	
	}
	function delete()
	{
		$delsql = "Delete from producttype where pTypeID = '".$_GET['pTypeID']."'";
		$delqry = ets_db_query($delsql) or die(ets_db_error().$delsql);
		return true;		
	}	
}
?>
