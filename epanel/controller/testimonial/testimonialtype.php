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
class testimonialtype
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
		$form->addElement(new Element_HTML("<legend>Add Testimonial Type</legend>"));
		$form->addElement(new Element_Hidden("controller", "testimonial"));
		$form->addElement(new Element_Hidden("action", "testimonialtype"));
		$form->addElement(new Element_Hidden("subaction", "add"));
		$form->addElement(new Element_Hidden("createdate"));
		$form->addElement(new Element_Hidden("username"));
		
		/* Actual Form Fields Started */
		$form->addElement(new Element_Textbox("Testimonial Type:", "testimonial_type", array(
			"required" => 1, 
			"placeholder" => "Testimonial Type"
			)));
		$form->addElement(new Element_HTML('<label class="control-label">Last Sort Order : '.get_last_sortorder('testimonial_master').'</label><br><br>'));				
		$form->addElement(new Element_Textbox("Sortorder:", "sortorder", array(
			"required" => 1, 
			"placeholder" => "Sortorder",
			"value" => get_last_sortorder('testimonial_master')
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
		$testimonial_slug = pro_SeoSlug(stripslashes($_POST['testimonial_type']));
		$sql = "Insert into testimonial_master set 
		testimonial_type = '".ets_db_real_escape_string($_POST['testimonial_type'])."',	
		createdate = '".$createdate."',
		username = '".$username."',
		sortorder = '".$_POST['sortorder']."',
		status = '".$_POST['status']."',
		remote_ip ='".$_SERVER['REMOTE_ADDR']."'
		";
		$qry = ets_db_query($sql) or die(ets_db_error().$sql);
		$testimonial_id = ets_db_insert_id();
		insSeoLnk($testimonial_id,"Testimonial",$testimonial_slug);
		return true;
	}
	function editForm()
	{		
		$sql = "select * from testimonial_master where testimonial_master_id = '".$_REQUEST['testimonial_master_id']."'";
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
			$form->addElement(new Element_HTML("<legend>Edit Testimonial Type</legend>"));
			$form->addElement(new Element_Hidden("controller", "testimonial"));
			$form->addElement(new Element_Hidden("action", "testimonialtype"));
			$form->addElement(new Element_Hidden("subaction", "edit"));
			$form->addElement(new Element_Hidden("testimonial_master_id", $_REQUEST['testimonial_master_id']));
			$form->addElement(new Element_Hidden("modifyDate"));
			$form->addElement(new Element_Hidden("username"));
			/* Actual Form Fields Started */
			$form->addElement(new Element_Textbox("Testimonial Type:", "testimonial_type", array(
			"value"=> $rs['testimonial_type'],
			"required" => 1, 
			"placeholder" => "Testimonial Type"
			)));
			$form->addElement(new Element_HTML('<label class="control-label">Last Sort Order : '.get_last_sortorder('testimonial_master').'</label><br><br>'));				
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
		$testimonial_slug = pro_SeoSlug(stripslashes($_POST['testimonial_type']));
		$updqry = ets_db_query("update testimonial_master set 
		testimonial_type = '".ets_db_real_escape_string($_POST['testimonial_type'])."', 
		modifieddate = '".$modifyDate."',
		username = '".$username."',
		sortorder = '".$_POST['sortorder']."',
		status = '".$_POST['status']."',
		remote_ip ='".$_SERVER['REMOTE_ADDR']."'
		where testimonial_master_id ='".$_POST['testimonial_master_id']."'") or die ("Updating testimonial_master records query failed: ".ets_db_error());
		updSeoLnk($_POST['testimonial_master_id'],"Testimonial",$testimonial_slug);
		return true;
	}
	function delete()
	{	
	$delsql = "Delete from testimonial_master where testimonial_master_id = '".$_GET['testimonial_master_id']."'";
	$delqry = ets_db_query($delsql) or die(ets_db_error().$delsql);
	delSeoLnk($_GET['testimonial_master_id'],"Testimonial");
	@unlink($img);	
	return true;		
	}
	function listData(){
?>
<script>
$(document).ready(function() {
	$('#testimonialtypelist').dataTable({

	});
	
	$('.esortorder').editable({params:{"tblName":"testimonial_master"}});
	$('.estatus').editable({
		params:{"tblName":"testimonial_master"},
		value: 1,
		source: [{value: 'E', text: 'Active'},{value: 'D', text: 'Disabled'}]
	});
});
</script>
<?php
		$subvar = 'onclick="return confirmSubmit();"';	
		$queryString =  ets_db_query("SELECT * from testimonial_master order by sortorder") or die(ets_db_error());	
		echo '<div id="no-more-tables"><table cellpadding="1" cellspacing="2" border="0" class="table table-striped table-bordered dataTable" id="testimonialtypelist" width="100%">
		<thead>
		<tr>
			<th align="left">Testimonial Type</th>
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
			$pk = "testimonial_master_id:".$res['testimonial_master_id'];
			echo '<tr class="'.$cssclass.'">
				<td>'.$res['testimonial_type'].'</td>
				
				<td><a href="#" class="estatus" data-type="select" data-name="status" data-pk="'.$pk.'" data-url="ajaxUpd.php" data-title="Change Status">'.$status.'</a></td>
				<td><a href="#" class="esortorder" data-type="text" data-name="sortorder" data-pk="'.$pk.'" data-url="ajaxUpd.php" data-title="Change Sort Order">'.$res['sortorder'].'</a></td>
				
				<td><a href="index.php?controller=testimonial&action=testimonialtype&subaction=editForm&testimonial_master_id='.$res['testimonial_master_id'].'" title="Edit" class="btn btn-success"><i class="fa fa-edit"></i></a> | 
				<a href="index.php?controller=testimonial&action=testimonialtype&subaction=delete&testimonial_master_id='.$res['testimonial_master_id'].'" title="Delete" class="btn btn-danger" onClick="return confirmSubmit();" ><i class="fa fa-times"></i></a>
			</td>
				</td>
			</tr>';
		}
		echo '</tbody>
			<tfoot>
			<tr>
				<th align="left">Testimonial Type</th>
				<th align="left">Status</th>
				<th align="left">Sort Order</th>
				<th>Action</th>
			</tr>
		</tfoot>
		 </table></div>';		
	}	
}
?>
