<?php
include WS_PFBC_ROOT."Form.php";
class productoptions
{
	function addForm()
	{
		$form = new Form("addFrm");
		$form->configure(array(
			"prevent" => array("bootstrap","jQuery"),
			"view" => new View_SideBySide
		));
		$status = array("E" => "Enabled", "D" => "Disabled");
		$productID = getMasterArray("products","productID","productTitle");
		$form->addElement(new Element_HTML("<legend>New Project Option</legend>"));
		$form->addElement(new Element_Hidden("controller", "products"));
		$form->addElement(new Element_Hidden("action", "productoptions"));
		$form->addElement(new Element_Hidden("subaction", "add"));
		$form->addElement(new Element_Hidden("createdate"));
		$form->addElement(new Element_Hidden("sortorder","1"));
		$form->addElement(new Element_Hidden("status","E"));
		/* Actual Form Fields Started */
		$form->addElement(new Element_Select("Project Name:", "productID", $productID, array(
			"required" => 1
			)));	
		$form->addElement(new Element_Textbox("Option Title:", "productOptionTitle", array(
			"required" => 1,
			"placeholder" => "Project Options"
			)));
		$form->addElement(new Element_Textbox("Option Value:", "productOptionValue", array(
			"required" => 1,
			"placeholder" => "Project Options Value"
			)));			
		$form->addElement(new Element_Textbox("Sortorder:", "sortorder", array(
			"required" => 1,
			"placeholder" => "Sortorder"	
			)));	
		$form->addElement(new Element_Select("Status:", "status", $status, array(
			"required" => 1
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
		$sql = "Insert into productOptions set 
		username = '".$username."',
		createdate = now(),
		productOptionTitle = '".ets_db_real_escape_string($_POST['productOptionTitle'])."',
		productOptionValue = '".ets_db_real_escape_string($_POST['productOptionValue'])."',
		productID = '".$_POST['productID']."',
		sortorder = '".$_POST['sortorder']."',
		status = '".$_POST['status']."',
		remote_ip ='".$_SERVER['REMOTE_ADDR']."'
		";
		$qry = ets_db_query($sql) or die(ets_db_error().$sql);
		return true;
	}
	function editForm()
	{		
		$sql = "select * from  productOptions where productoptionID ='".$_REQUEST['productoptionID']."'";
		$qry = ets_db_query($sql) or die(ets_db_error().$sql);
		if(ets_db_num_rows($qry) > 0){
			$rs=ets_db_fetch_array($qry);
			$form = new Form("html5");
			$form->configure(array(
				"prevent" => array("bootstrap","jQuery"),
				"view" => new View_SideBySide
			));
			$status = array("E" => "Enabled", "D" => "Disabled");
			$productID = getMasterArray("products","productID","productTitle");
			$form->addElement(new Element_HTML("<legend>Edit Product Options</legend>"));
			$form->addElement(new Element_Hidden("controller", "products"));
			$form->addElement(new Element_Hidden("action", "productoptions"));
			$form->addElement(new Element_Hidden("subaction", "edit"));
			$form->addElement(new Element_Hidden("productoptionID", $_REQUEST['productoptionID']));
	

			/* Actual Form Fields Started */
		$form->addElement(new Element_Select("Project Name:", "productID", $productID, array(
			"required" => 1,
			"value"=> stripslashes($rs['productID'])
			)));	
		$form->addElement(new Element_Textbox("Option Title:", "productOptionTitle", array(
			"required" => 1, 
			"value"=> stripslashes($rs['productOptionTitle'])
			)));
		$form->addElement(new Element_Textbox("Option Value:", "productOptionValue", array(
			"required" => 1, 
			"value"=> stripslashes($rs['productOptionValue'])
			)));				
		$form->addElement(new Element_Textbox("Sortorder:", "sortorder", array(
			"required" => 1,
			"value"=> $rs['sortorder']
			)));	
		$form->addElement(new Element_Select("Status:", "status", $status, array(
			"required" => 1,
			"value"=> $rs['status']
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
		$updqry = ets_db_query("update productOptions set 
			username = '".$username."',
			createdate = '".$createdate."',
			productOptionTitle = '".ets_db_real_escape_string($_POST['productOptionTitle'])."',
			productOptionValue = '".ets_db_real_escape_string($_POST['productOptionValue'])."',
			productID = '".$_POST['productID']."',
			sortorder = '".$_POST['sortorder']."',
			status = '".$_POST['status']."',
			remote_ip ='".$_SERVER['REMOTE_ADDR']."'
			where productoptionID = '".$_POST['productoptionID']."'") or die ("Updating  Product Options records query failed: ".ets_db_error());
			return true;
	}	
	function listData(){
		
		$form = new Form("addFrm");
		$form->configure(array(
		"prevent" => array("bootstrap","jQuery"),
		"view" => new View_Inline
	));
	
	$q = "select * from products where status = 'E'";
	$r = ets_db_query($q);
	$group[''] = 'Select Project';
	
	while($arr = ets_db_fetch_array($r))
	{
		$group[$arr['productID']] = $arr['productTitle'];
	}
	
	
	
	$form->addElement(new Element_Hidden("controller", "products"));
	$form->addElement(new Element_Hidden("action", "productoptions"));
	$form->addElement(new Element_Hidden("subaction", "listData"));
		
	$form->addElement(new Element_HTML('<span id = "group">'));
		if(isset($_POST['group']) && $_POST['group'] != "" ) 
		{
			$grp = $_POST['group'];
		}	
		else
		{
			$grp = '';
		}
		/*if(isset($_REQUEST['group']) && $_REQUEST['group'] != "" ) 
		{
			$grp = $_REQUEST['group'];
		}	
		else
		{
			$grp = '';
		}*/
		
		$form->addElement(new Element_Select("Project :", "group", $group, array(
			"id" => "group",
			"value" => $grp
			)));	
		
	
		$form->addElement(new Element_HTML('</span>'));
		$form->addElement(new Element_Button);
		$form->render();
	
		$whr = "";
		$disQry =  "SELECT * from productOptions where 1=1 ";
		
		if(!empty($_REQUEST['group'])) 
			{
				$grp = $_REQUEST['group'];	
				$whr .= ' AND productID = "'.$grp.'"';
			}
		$disQry .= $whr;
		
		/*if(!empty($_POST['group'])) 
			{
				$grp = $_POST['group'];	
				$whr .= ' AND group_id = "'.$grp.'"';
			}
		$disQry .= $whr;*/
		
		echo '<br>';
		
		if(isset($_SESSION['listSQL']))
		{
			unset($_SESSION['listSQL']); 
		}
		
		$_SESSION['listSQL'] = $disQry;
?>
	<script>
	$(document).ready(function() {
		var listURL = 'helperfunc/productoptionsList.php';
		$('#productoptionslist').dataTable({
        "ajax": listURL
		});
		/*
		$('#productoptionslist').dataTable({
			"bProcessing": true,
			"sAjaxSource": listURL,
			"sDom": "<'row-fluid'<'span8'l><'span4'f>r>t<'row-fluid'<'span8'i><'span4'p>>",
			"sPaginationType": "bootstrap",
			"iDisplayLength": 50,
			"oLanguage": {"sLengthMenu": "_MENU_ records per page"} 
		});
		*/
		$('.esortorder').editable({params:{"tblName":"productOptions"}});
	});
	</script>
<?php
	$subvar = 'onclick="return confirmSubmit();"';
	echo '<div id="no-more-tables">
	<table cellpadding="1" cellspacing="2" border="0" class="table table-striped table-bordered dataTable" id="productoptionslist" width="100%">
		<thead>
		<tr>
			<th>Id</th>
			<th>Project Name</th>
			<th>Option Title</th>
			<th>Option Value</th>
			<th>Status</th>
			<th>Sort-Order</th>
			<th>Action</th>
		</tr>
		</thead>
		<tbody></tbody>	
		<tfoot>	
		<tr>
			<th>Id</th>
			<th>Project Name</th>
			<th>Option Title</th>
			<th>Option Value</th>
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
		params:{"tblName":"productOptions"},
		value: 1,
		source: [{value: 'E', text: 'Active'},{value: 'D', text: 'Disabled'}]
	});
</script>
<?php	
	}
	function delete()
	{
		$delsql = "Delete from productOptions where productoptionID = '".$_GET['productoptionID']."'";
		$delqry = ets_db_query($delsql) or die(ets_db_error().$delsql);
		return true;		
	}	
}
?>
