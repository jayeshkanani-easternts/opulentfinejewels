<?php
include WS_PFBC_ROOT."Form.php";
class industry_type
{
	function addForm()
	{
		$form = new Form("addFrm");
		$form->configure(array(
			"prevent" => array("bootstrap","jQuery"),
			"view" => new View_SideBySide
		));
		$status = array("E" => "Enabled", "D" => "Disabled");
		$form->addElement(new Element_HTML("<legend>Add Industry Type</legend>"));
		$form->addElement(new Element_Hidden("controller", "products"));
		$form->addElement(new Element_Hidden("action", "industry_type"));
		$form->addElement(new Element_Hidden("subaction", "add"));
		$form->addElement(new Element_Hidden("createdate"));
		$form->addElement(new Element_Hidden("username"));
		
		/* Actual Form Fields Started */
		
		
		$form->addElement(new Element_Textbox("Industry : ", "industry", array(
			"required" => 1, 
			"placeholder" => "Industry"
			)));
			
		$form->addElement(new Element_Textbox("Sortorder:", "sortorder", array(
			"required" => 1, 
			"placeholder" => "Sortorder"
			)));
        $form->addElement(new Element_Select("Status:", "status", $status, array(
			"required" => 1, 
			"placeholder" => "Status"
			)));	
		$form->addElement(new Element_Button);
		$form->render();

	}
	function add()
	{   
	    
			$sql = "Insert into industry_type set 
			sortorder = '".$_POST['sortorder']."',
			status = '".$_POST['status']."',
			type = '".$_POST['industry']."'
			
			";
		
		
		if(ets_db_query($sql)){			
			return true;
			}
		else{
			echo "Error in Inserting Data";
			return false;			
		}
		
		return true;
	}
	function editForm()
	{		
		$sql = "select * from industry_type where id = '".$_REQUEST['id']."'";
		$qry = ets_db_query($sql) or die(ets_db_error().$sql);
		$status = array("E" => "Enabled", "D" => "Disabled");
		if(ets_db_num_rows($qry) > 0){
			$rs=ets_db_fetch_array($qry);
			$form = new Form("html5");
			$form->configure(array(
				"prevent" => array("bootstrap","jQuery"),
				"view" => new View_SideBySide
			));
			$form->addElement(new Element_HTML("<legend>Edit Industry Type</legend>"));
			$form->addElement(new Element_Hidden("controller", "products"));
			$form->addElement(new Element_Hidden("action", "industry_type"));
			$form->addElement(new Element_Hidden("subaction", "edit"));
			$form->addElement(new Element_Hidden("id", $_REQUEST['id']));
			/* Actual Form Fields Started */
			
			$form->addElement(new Element_Textbox("Industry : ", "industry", array(
			"required" => 1, 
			"placeholder" => "Industry",
			"value" => $rs['type']
			)));			
			
		    $form->addElement(new Element_Textbox("Sortorder:", "sortorder", array(
			"required" => 1, 
			"value"=> $rs['sortorder']
			)));
			
			$form->addElement(new Element_Select("Status:", "status", $status, array(
			"required" => 1, 
			"value"=> $rs['status']
			)));

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
		$error = false;
		
		if(!$error){
			$updqry = ets_db_query("update industry_type set 
			sortorder = '".$_POST['sortorder']."',
			status = '".$_POST['status']."',
		
			type = '".$_POST['industry']."'
		   
			where id='" .$_POST['id']."'") or die ("Updating news records query failed: ".ets_db_error());	
			
			return true;
		}else{
			echo "Error in updating data..";
			return false;
		}
		
		
		
	}
	function delete()
	{	
	$delsql = "Delete from industry_type where id = '".$_GET['id']."'";
	$delqry = ets_db_query($delsql) or die(ets_db_error().$delsql);
	
	@unlink($img);	
	return true;		
	}
	function listData(){
?>

<script>
$(document).ready(function() {
	var listURL = 'helperfunc/industrytypeList.php';
	
	$('#answerlist').dataTable( {
        "ajax": listURL
    } );
	/*$('#answerlist').dataTable({
		"bProcessing": true,
		"sAjaxSource": listURL,
		"sDom": "<'row-fluid'<'span8'l><'span4'f>r>t<'row-fluid'<'span8'i><'span4'p>>",
		"sPaginationType": "bootstrap",
		"oLanguage": {"sLengthMenu": "_MENU_ records per page"} 
	});	*/
    $(".marker").tooltip({placement: 'top'});
	$('.esortorder').editable({params:{"tblName":"industry_type"}});
});
</script>
<?php
		$subvar = 'onclick="return confirmSubmit();"';	
		echo '<div id="no-more-tables"><table cellpadding="1" cellspacing="2" border="0" class="table table-striped table-bordered dataTable" id="answerlist" width="100%">
		<thead>
		<tr>
		    <th>Id</th>
			<th>Industry</th>
			<th>Status</th>
			<th>Sortorder</th>
			<th>Action</th>
		</tr>
		</thead>
		<tbody></tbody>	
		<tfoot>
				<tr>
		            <th>Id</th>
					<th>Industry</th>
					<th>Status</th>
					<th>Sortorder</th>
					<th>Action</th>
				</tr>
		</tfoot>
		
		 </table></div>';		
		 ?>
<script>
	$('.table').editable({
		selector: 'a.estatus,a.esortorder',
		params:{"tblName":"industry_type"},
		value: 1,
		source: [{value: 'E', text: 'Active'},{value: 'D', text: 'Disabled'}]
	});
</script>
<?php
	}		
	function ajaxPost()
	{
		print_r($_POST);
		return true;
	}
	
	}
?>
