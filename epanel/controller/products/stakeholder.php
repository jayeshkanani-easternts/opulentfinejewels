<?php
include WS_PFBC_ROOT."Form.php";
class stakeholder
{
	
	
	function addForm()
	{
		$form = new Form("addFrm");
		$form->configure(array(
			"prevent" => array("bootstrap","jQuery"),
			"view" => new View_SideBySide
		));
		
		$form->addElement(new Element_HTML("<legend>Add Stakeholder</legend>"));
		$form->addElement(new Element_Hidden("controller", "products"));
		$form->addElement(new Element_Hidden("action", "stakeholder"));
		$form->addElement(new Element_Hidden("subaction", "add"));
		$form->addElement(new Element_Hidden("pid", $_REQUEST['pid']));
		$form->addElement(new Element_Hidden("createdate"));
		$form->addElement(new Element_Hidden("username"));
		
		$q = "select * from industry_type where status = 'E'";
		$r = ets_db_query($q);
		
		while($arr = ets_db_fetch_array($r))
		{
			$industry[$arr['id']] = $arr['type'];
		}
		
	
		/* Actual Form Fields Started */
		
		
		$form->addElement(new Element_Select("Industry : ", "industry",$industry, array(
			"required" => 1, 
			"placeholder" => "Industry"
			)));
		
		$form->addElement(new Element_Textbox("Shop No : ", "shop", array(
			"required" => 1, 
			"placeholder" => "Shop No"
			)));
		
		$form->addElement(new Element_Textbox("Name : ", "name", array(
			"required" => 1, 
			"placeholder" => "Name"
			)));
			
		$form->addElement(new Element_Textbox("Email : ", "email", array(
			"required" => 1, 
			"placeholder" => "Email"
			)));
			
		$form->addElement(new Element_Textbox("Phone No : ", "phone", array(
			"required" => 1, 
			"placeholder" => "Phone No"
			)));

        $form->addElement(new Element_Textbox("Website : ", "website", array(
			"required" => 1, 
			"placeholder" => "Website"
			)));

        $form->addElement(new Element_Textarea("Description : ", "desc", array(
			"required" => 1, 
			"placeholder" => "Description"
			)));
        $status = array("E" => "Enabled", "D" => "Disabled");		$form->addElement(new Element_HTML('<label class="control-label">Last Sort Order : '.get_last_sortorder('stakeholder').'</label><br><br>'));													
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
	
			$sql = "Insert into stakeholder set 
			industry_type = '".$_POST['industry']."',
			sortorder = '".$_POST['sortorder']."',
			status = '".$_POST['status']."',
			shop_no = '".$_POST['shop']."',
			name = '".$_POST['name']."',
			email = '".$_POST['email']."',
			phone = '".$_POST['phone']."',
			website = '".$_POST['website']."',
			description = '".$_POST['desc']."',
			project_id = '".$_POST['pid']."'
			";
		$flag = chkentry($_POST['shop'],$_POST['pid']);
		if($flag == 1)
		{
			echo "Stakeholder with same shop number and project already exist";
			return false;	
		}
		
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
		$sql = "select * from stakeholder where id = '".$_REQUEST['id']."'";
		$qry = ets_db_query($sql) or die(ets_db_error().$sql);
		if(ets_db_num_rows($qry) > 0){
			$rs=ets_db_fetch_array($qry);
			$form = new Form("html5");
			$form->configure(array(
				"prevent" => array("bootstrap","jQuery"),
				"view" => new View_SideBySide
			));
			$form->addElement(new Element_HTML("<legend>Edit Stakeholder</legend>"));
			$form->addElement(new Element_Hidden("controller", "products"));
			$form->addElement(new Element_Hidden("action", "stakeholder"));
			$form->addElement(new Element_Hidden("pid", $_REQUEST['pid']));
			$form->addElement(new Element_Hidden("subaction", "edit"));
			
			$form->addElement(new Element_Hidden("id", $_REQUEST['id']));
			/* Actual Form Fields Started */
			
			$q = "select * from industry_type  where status = 'E'";
		$r = ets_db_query($q);
		
		while($arr = ets_db_fetch_array($r))
		{
			$industry[$arr['id']] = $arr['type'];
		}
	
		/* Actual Form Fields Started */
		
		$form->addElement(new Element_Select("Industry : ", "industry",$industry, array(
			"required" => 1, 
			"placeholder" => "Industry",
			"value" => $rs['type']
			)));
		
		$form->addElement(new Element_Textbox("Shop No : ", "shop", array(
			"required" => 1, 
			"placeholder" => "Shop No",
			"value" => $rs['shop_no']
			)));
		
		$form->addElement(new Element_Textbox("Name : ", "name", array(
			"required" => 1, 
			"placeholder" => "Name",
			"value" => $rs['name']
			)));
			
		$form->addElement(new Element_Textbox("Email : ", "email", array(
			"required" => 1, 
			"placeholder" => "Email",
			"value" => $rs['email']
			)));
			
		$form->addElement(new Element_Textbox("Phone No : ", "phone", array(
			"required" => 1, 
			"placeholder" => "Phone No",
			"value" => $rs['phone']
			)));

        $form->addElement(new Element_Textbox("Website : ", "website", array(
			"required" => 1, 
			"placeholder" => "Website",
			"value" => $rs['website']
			)));

        $form->addElement(new Element_Textarea("Description : ", "desc", array(
			"required" => 1, 
			"placeholder" => "Description",
			"value" => $rs['description']
			)));
		$status = array("E" => "Enabled", "D" => "Disabled");			$form->addElement(new Element_HTML('<label class="control-label">Last Sort Order : '.get_last_sortorder('stakeholder').'</label><br><br>'));													
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
			
			$u = "update stakeholder set 
		    industry_type = '".$_POST['industry']."',
			sortorder = '".$_POST['sortorder']."',
			status = '".$_POST['status']."',
			name = '".$_POST['name']."',
			shop_no = '".$_POST['shop']."',
			email = '".$_POST['email']."',
			phone = '".$_POST['phone']."',
			website = '".$_POST['website']."',
			description = '".$_POST['desc']."'
			
			where id='" .$_POST['id']."' and project_id = '" .$_POST['pid']."'";
			/*$flag = chkentry($_POST['shop'],$_REQUEST['pid']);
			if($flag == 1)
			{
				echo "Stakeholder with same shop number and project already exist";
				return false;	
			}*/
			
			$updqry = ets_db_query($u) or die ("Updating news records query failed: ".ets_db_error());	
			
			return true;
		}else{
			echo "Error in updating data..";
			return false;
		}
		
		
		
	}
	function delete()
	{	
	$delsql = "Delete from stakeholder where id = '".$_GET['id']."' and project_id = '".$_GET['pid']."'";
	$delqry = ets_db_query($delsql) or die(ets_db_error().$delsql);
	
	@unlink($img);	
	return true;		
	}
	function listData(){
		
		echo '<a href="'.$_SERVER['HTTP_REFERER'].'" class="btn btn-info">
		<i class="fa fa-arrow-left">&nbsp;Back</i>
		</a><br><br>';
		
		session_start();
		$_SESSION['pid'] = $_REQUEST['pid'];
		$_SESSION['i'] = $_REQUEST['i'];
		
?>

<script>
$(document).ready(function() {
	var listURL = 'helperfunc/stakeholderList.php?pid=<?php echo $_REQUEST['pid']; ?>';
	
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
});
</script>
<?php
		$subvar = 'onclick="return confirmSubmit();"';	
		echo '<div id="no-more-tables"><table cellpadding="1" cellspacing="2" border="0" class="table table-striped table-bordered dataTable" id="answerlist" width="100%">
		<thead>
		<tr>
		    <th>Id</th>
			<th>Industry Type</th>
			<th>Shop No</th>
			<th>Name</th>
			<th>Email</th>
			<th>Phone No</th>
			<th>Website</th>
			<th>Description</th>
			<th>Status</th>
			<th>Sortorder</th>
			<th>Action</th>
		</tr>
		</thead>
		<tbody></tbody>	
		<tfoot>
				<tr>
		    <th>Id</th>
			<th>Industry Type</th>
			<th>Shop No</th>
			<th>Name</th>
			<th>Email</th>
			<th>Phone No</th>
			<th>Website</th>
			<th>Description</th>
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
		params:{"tblName":"stakeholder"},
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
