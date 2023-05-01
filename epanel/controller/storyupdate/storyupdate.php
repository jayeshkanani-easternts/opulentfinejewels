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
class storyupdate
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
		$form->addElement(new Element_HTML("<legend>Add Story Update</legend>"));
		$form->addElement(new Element_Hidden("controller", "storyupdate"));
		$form->addElement(new Element_Hidden("action", "storyupdate"));
		$form->addElement(new Element_Hidden("subaction", "add"));
		
        
		$form->addElement(new Element_Textbox("Title:", "name", array(
			"required" => 1, 
			"placeholder" => "Name"
			)));
			
		$form->addElement(new Element_Textbox("Month:", "month", array(
			"required" => 1, 
			"placeholder" => "Month"
			)));
        $form->addElement(new Element_Textbox("Year:", "year", array(
			"required" => 1, 
			"placeholder" => "Year"
			)));
		
		$form->addElement(new Element_Textarea("Description:", "description", array(
			"required" => 1, 
			"placeholder" => "Description"
			)));
       
        
		$form->addElement(new Element_Textbox("Sort Order:", "sortorder", array(
			"required" => 1, 
			"placeholder" => "SortOrder"
			)));
        
        $form->addElement(new Element_HTML('<div><label class="control-label" style="width:100%;text-align:left;">Note : Updates will be displayed in website in the descending order of sort order </label><br><br></div>'));
        
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
		
		$sql = "Insert into storyupdate set 
		name = '".ets_db_real_escape_string($_POST['name'])."',
		year = '".ets_db_real_escape_string($_POST['year'])."',
		month = '".ets_db_real_escape_string($_POST['month'])."',
		description = '".ets_db_real_escape_string($_POST['description'])."',
		username = '".$username."',
		createdate= now(),
		sortorder='".$_POST['sortorder']."',
		status = '".$_POST['status']."',
		remote_ip ='".$_SERVER['REMOTE_ADDR']."'
		";
		$qry = ets_db_query($sql) or die(ets_db_error().$sql);
        $id = ets_db_insert_id();
        
		return true;
	}
    
	function editForm()
	{		
		$sql = "select * from storyupdate where storyupdate_Id ='".$_REQUEST['storyupdate_Id']."'";
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
			$form->addElement(new Element_HTML("<legend>Edit Success Story</legend>"));
			$form->addElement(new Element_Hidden("controller", "storyupdate"));
			$form->addElement(new Element_Hidden("action", "storyupdate"));
			$form->addElement(new Element_Hidden("subaction", "edit"));
			$form->addElement(new Element_Hidden("storyupdate_Id", $_REQUEST['storyupdate_Id']));
            $form->addElement(new Element_Hidden("prevImage", $rs['image']));
			/* Actual Form Fields Started */
			
            $form->addElement(new Element_Textbox("Title:", "name", array(
			"value"=> $rs['name'],
			"required" => 1, 
			"placeholder" => "Name"
			)));
			
			$form->addElement(new Element_Textbox("Month:", "month", array(
			"value"=> $rs['month'],
			"required" => 1,
			"placeholder" => "Month"
			)));
			
			$form->addElement(new Element_Textbox("Year:", "year", array(
			"value"=> $rs['year'],
			"required" => 1
			)));
            
			$form->addElement(new Element_Textarea("Description:", "description", array(
			"value"=> $rs['description'],
			"required" => 1, 
			"placeholder" => "Description"
			)));
           		
			$form->addElement(new Element_Textbox("Sort Order:", "sortorder", array(
			"value"=> $rs['sortorder'],
			"required" => 1, 
			"placeholder" => "Sort Order"
			)));	
            
            $form->addElement(new Element_HTML('<div><label class="control-label" style="width:100%;text-align:left;">Note : Images will be displayed in website in the descending order of sort order </label><br><br></div>'));
            
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
        
		$username = $_SESSION['username'];
		   
		$updqry = ets_db_query("update storyupdate set 
		name = '".ets_db_real_escape_string($_POST['name'])."',
		month = '".ets_db_real_escape_string($_POST['month'])."',		
		year = '".ets_db_real_escape_string($_POST['year'])."',		
		description = '".ets_db_real_escape_string($_POST['description'])."',
		username = '".$username."',	
		sortorder='".$_POST['sortorder']."',
		status = '".$_POST['status']."',
		modifieddate = now(),
		remote_ip ='".$_SERVER['REMOTE_ADDR']."'
		where storyupdate_Id='" .$_POST['storyupdate_Id']."'") or die ("Updating storyupdate records query failed: ".ets_db_error());	
		return true;
        
	}
	function listData()
	{
?>
<script>
$(document).ready(function() {
	var listURL = 'helperfunc/storyupdateList.php';
	$('#storyupdatelist').dataTable({
		"ajax": listURL
	});
});
</script>	
<?php
		$subvar = 'onclick="return confirmSubmit();"';	
		echo '<div id="no-more-tables"><table cellpadding="1" cellspacing="2" border="0" class="table table-striped table-bordered dataTable" id="storyupdatelist" width="100%">
		<thead>
		<tr>
			<th align="left">ID</th>
			<th align="left">Title</th>
			<th align="left">Month</th>
			<th align="left">Year</th>
			<th align="left">Status</th>
			<th align="left">Sortorder</th>
			<th>Action</th>
		</tr>
		</thead>
		<tbody></tbody>	
		<tfoot>
				<tr>
					<th align="left">ID</th>
					<th align="left">Title</th>
					<th align="left">Month</th>
			        <th align="left">Year</th>
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
		params:{"tblName":"storyupdate"},
		value: 1,
		source: [{value: 'E', text: 'Active'},{value: 'D', text: 'Disabled'}]
	});
</script>
<?php		
	}		
function delete()
	{
		$delsql = "Delete from storyupdate where storyupdate_Id='".$_GET['storyupdate_Id']."'";
		$delqry = ets_db_query($delsql) or die(ets_db_error().$delsql);
		return true;		
	}
	
	
	}
?>
