<script>
$(document).ready(function(){
	          $('input').on('blur', function() {      
				if ($("#testitypeFrm").valid()) {
					$('input[type=submit]').prop('disabled', false);  
				} else {
					$('input[type=submit]').prop('disabled', 'disabled');
				}
			  });
});
</script>
<?php
include WS_PFBC_ROOT."Form.php";
class faqtype
{
	function addForm()
	{
		$form = new Form("addFrm");
		$form->configure(array(
			"prevent" => array("bootstrap","jQuery"),
			"view" => new View_SideBySide,
			"id" => "testitypeFrm"
		));
		$status = array("E" => "Enabled", "D" => "Disabled");
		$form->addElement(new Element_HTML("<legend>Add FAQ Type</legend>"));
		$form->addElement(new Element_Hidden("controller", "faq"));
		$form->addElement(new Element_Hidden("action", "faqtype"));
		$form->addElement(new Element_Hidden("subaction", "add"));
		$form->addElement(new Element_Hidden("createdate"));
		$form->addElement(new Element_Hidden("username"));
		
		/* Actual Form Fields Started */
		$form->addElement(new Element_Textbox("FAQ Type:", "faq_type", array(
			"required" => 1, 
			"placeholder" => "FAQ Type"
			)));
		$form->addElement(new Element_HTML('<label class="control-label">Last Sort Order : '.get_last_sortorder('faq_master').'</label><br><br>'));				
		$form->addElement(new Element_Textbox("Sortorder:", "sortorder", array(
			"required" => 1, 
			"placeholder" => "Sortorder",
			"value" => get_last_sortorder('faq_master')
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
		$createdate = date("Y-m-d");
		$faq_slug = pro_SeoSlug(stripslashes($_POST['faq_type']));
		$sql = "Insert into faq_master set 
		faq_type = '".ets_db_real_escape_string($_POST['faq_type'])."',	
		createdate = '".$createdate."',
		username = '".$username."',
		sortorder = '".$_POST['sortorder']."',
		status = '".$_POST['status']."',
		remote_ip ='".$_SERVER['REMOTE_ADDR']."'
		";
		$qry = ets_db_query($sql) or die(ets_db_error().$sql);
		$faq_id = ets_db_insert_id();
		insSeoLnk($faq_id,"faq",$faq_slug);
		return true;
	}
	function editForm()
	{		
		$sql = "select * from faq_master where faq_master_id = '".$_REQUEST['faq_master_id']."'";
		$qry = ets_db_query($sql) or die(ets_db_error().$sql);
		if(ets_db_num_rows($qry) > 0){
			$rs=ets_db_fetch_array($qry);
			$form = new Form("html5");
			$form->configure(array(
				"prevent" => array("bootstrap","jQuery"),
				"view" => new View_SideBySide,
				"id" => "testitypeFrm"
			));
			$status = array("Enabled" => "Enabled", "Disabled" => "Disabled");
			$form->addElement(new Element_HTML("<legend>Edit FAQ Type</legend>"));
			$form->addElement(new Element_Hidden("controller", "faq"));
			$form->addElement(new Element_Hidden("action", "faqtype"));
			$form->addElement(new Element_Hidden("subaction", "edit"));
			$form->addElement(new Element_Hidden("faq_master_id", $_REQUEST['faq_master_id']));
			$form->addElement(new Element_Hidden("modifyDate"));
			$form->addElement(new Element_Hidden("username"));
			/* Actual Form Fields Started */
			$form->addElement(new Element_Textbox("FAQ Type:", "faq_type", array(
			"value"=> $rs['faq_type'],
			"required" => 1, 
			"placeholder" => "FAQ Type"
			)));
			$form->addElement(new Element_HTML('<label class="control-label">Last Sort Order : '.get_last_sortorder('faq_master').'</label><br><br>'));				
			$form->addElement(new Element_Textbox("Sortorder:", "sortorder", array(
			"required" => 1, 
			"value"=> $rs['sortorder']
			)));			
			$form->addElement(new Element_Select("Status:", "status", $status, array(
			"value"=> $rs['status'],
			"required" => 1
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
		$modifyDate = date("Y-m-d");
	    $username=$_SESSION['username'];
		$faq_slug = pro_SeoSlug(stripslashes($_POST['faq_type']));
		$updqry = ets_db_query("update faq_master set 
		faq_type = '".ets_db_real_escape_string($_POST['faq_type'])."', 
		modifieddate = '".$modifyDate."',
		username = '".$username."',
		sortorder = '".$_POST['sortorder']."',
		status = '".$_POST['status']."',
		remote_ip ='".$_SERVER['REMOTE_ADDR']."'
		where faq_master_id ='".$_POST['faq_master_id']."'") or die ("Updating faq_master records query failed: ".ets_db_error());
		updSeoLnk($_POST['faq_master_id'],"FAQ",$faq_slug);
		return true;
	}
	function delete()
	{	
	$delsql = "Delete from faq_master where faq_master_id = '".$_GET['faq_master_id']."'";
	$delqry = ets_db_query($delsql) or die(ets_db_error().$delsql);
	delSeoLnk($_GET['faq_master_id'],"FAQ");
	@unlink($img);	
	return true;		
	}
	function listData(){
?>
<script>
$(document).ready(function() {
	$('#faqtypelist').dataTable({

	});
	
	$('.esortorder').editable({params:{"tblName":"faq_master"}});
	$('.estatus').editable({
		params:{"tblName":"faq_master"},
		value: 1,
		source: [{value: 'E', text: 'Active'},{value: 'D', text: 'Disabled'}]
	});
});
</script>
<?php
		$subvar = 'onclick="return confirmSubmit();"';	
		$queryString =  ets_db_query("SELECT * from faq_master order by sortorder") or die(ets_db_error());	
		echo '<div id="no-more-tables"><table cellpadding="1" cellspacing="2" border="0" class="table table-striped table-bordered dataTable" id="faqtypelist" width="100%">
		<thead>
		<tr>
			<th align="left">FAQ Type</th>
			<th align="left">Status</th>
			<th align="left">Sort Order</th>
			<th>Action</th>
		</tr>
		</thead>
		<tbody>';
		$rows = 0;
		while($res = ets_db_fetch_array($queryString)){
			$str = '';
			$rows ++;
			if (($rows/2) == floor($rows/2)) {
				$cssclass =  'even';
			} else {
				$cssclass =  'odd';
			} 
			if($res['status']=='E'){
				$status = "Active";
			}else{
				$status = "Disabled";
			}
			$pk = "faq_master_id:".$res['faq_master_id'];
			echo '<tr class="'.$cssclass.'">
				<td>'.$res['faq_type'].'</td>
				
				<td><a href="#" class="estatus" data-type="select" data-name="status" data-pk="'.$pk.'" data-url="ajaxUpd.php" data-title="Change Status">'.$status.'</a></td>
				<td><a href="#" class="esortorder" data-type="text" data-name="sortorder" data-pk="'.$pk.'" data-url="ajaxUpd.php" data-title="Change Sort Order">'.$res['sortorder'].'</a></td>
				
				<td><a href="index.php?controller=faq&action=faqtype&subaction=editForm&faq_master_id='.$res['faq_master_id'].'" title="Edit" class="btn btn-success"><i class="fa fa-edit"></i></a> | 
				<a href="index.php?controller=faq&action=faqtype&subaction=delete&faq_master_id='.$res['faq_master_id'].'" title="Delete" class="btn btn-danger" onClick="return confirmSubmit();" ><i class="fa fa-times"></i></a>
			</td>
				</td>
			</tr>';
		}
		echo '</tbody>
			<tfoot>
			<tr>
				<th align="left">FAQ Type</th>
				<th align="left">Status</th>
				<th align="left">Sort Order</th>
				<th>Action</th>
			</tr>
		</tfoot>
		 </table></div>';		
	}	
}
?>
