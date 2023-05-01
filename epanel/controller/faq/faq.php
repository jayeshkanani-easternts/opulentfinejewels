<script>
$(document).ready(function(){
	          $('input').on('blur', function() {      
				if ($("#testiFrm").valid()) {
					$('input[type=submit]').prop('disabled', false);  
				} else {
					$('input[type=submit]').prop('disabled', 'disabled');
				}
			  });
	
	
		$(document).on("click",".loadModal" ,function(){
       
			var fID = $(this).attr('data-fid');
			$('.modal-body').load('viewfaq.php?fid='+fID);
			
		}); 
});
</script>
<?php
include WS_PFBC_ROOT."Form.php";
class faq
{
	function addForm()
	{
		
		$form = new Form("addFrm");
		
		$form->configure(array(
			"prevent" => array("bootstrap","jQuery"),
			"view" => new View_SideBySide,
			"id" => "faqFrm"
		));
		
		$status = array("E" => "Enabled", "D" => "Disabled");
		
		$form->addElement(new Element_HTML("<legend>New Faq</legend>"));
		
		
		$form->addElement(new Element_Hidden("controller", "faq"));
		$form->addElement(new Element_Hidden("action", "faq"));
		$form->addElement(new Element_Hidden("subaction", "add"));
		
		
		
		/* Actual Form Fields Started */
		$faq = getfaqlist();
		
		$form->addElement(new Element_Select("FAQ Type:", "faq_type",$faq, array(
			"placeholder" => "FAQ Type"
			)));
		
		$form->addElement(new Element_Textbox("Question:", "name", array(
			"required" => 1, 
			"placeholder" => "Name"
			)));
		
		$form->addElement(new Element_TinyMCE("FAQ Description:", "review", array(
			"required" => 1,
			"placeholder" => "FAQ Description"
			)));
		
//        $form->addElement(new Element_File("Photo:", "image", array(
//			"required" => 1, 
//			"placeholder" => "Photo"
//			)));
		$form->addElement(new Element_HTML('<label class="control-label">Last Sort Order : '.get_last_sortorder('faq').'</label><br><br>'));			
		$form->addElement(new Element_Textbox("Sort Order:", "sortorder", array(
			"required" => 1, 
			"placeholder" => "SortOrder"
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
        $target_path = $_FILES["image"]["name"];
		$sql = "Insert into faq set 
		faq_type = '".$_POST['faq_type']."',
		name = '".ets_db_real_escape_string($_POST['name'])."',
		review = '".ets_db_real_escape_string($_POST['review'])."',
		username = '".$username."',
		createdate= now(),
		sortorder='".$_POST['sortorder']."',
		status = '".$_POST['status']."',
		remote_ip ='".$_SERVER['REMOTE_ADDR']."'
		";
		
		
		$qry = ets_db_query($sql) or die(ets_db_error().$sql);
		
//		$id = ets_db_insert_id();
		return true;
        	
	}
	
	function editForm()
	{		
		$sql = "select * from faq where faq_Id ='".$_REQUEST['faq_Id']."'";
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
			$form->addElement(new Element_HTML("<legend>Edit FAQ</legend>"));
			$form->addElement(new Element_Hidden("controller", "faq"));
			$form->addElement(new Element_Hidden("action", "faq"));
			$form->addElement(new Element_Hidden("subaction", "edit"));
            $form->addElement(new Element_Hidden("prevImage", $rs['image']));
			$form->addElement(new Element_Hidden("faq_Id", $_REQUEST['faq_Id']));
			/* Actual Form Fields Started */
			$faq = getfaqlist();
			$form->addElement(new Element_Select("faq Type:", "faq_type",$faq, array(
			"value"=> $rs['faq_type'],
			"placeholder" => "FAQ Type"
			)));
			$form->addElement(new Element_Textbox("Question:", "name", array(
			"value"=> $rs['name'],
			"required" => 1, 
			"placeholder" => "Name"
			)));
			$form->addElement(new Element_TinyMCE("FAQ Description:", "review", array(
			"required" => 1,
			"value" => stripcslashes($rs['review'])
			)));
			
			$form->addElement(new Element_HTML('<label class="control-label">Last Sort Order : '.get_last_sortorder('faq').'</label><br><br>'));			
			$form->addElement(new Element_Textbox("Sort Order:", "sortorder", array(
			"value"=> $rs['sortorder'],
			"required" => 1, 
			"placeholder" => "Sort Order"
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
			echo "No Tax Found...";
		}
		
	}
	function edit()
	{
        $updimg = true;		
		$error = false;
		$username = $_SESSION['username'];
		
		$username = $_SESSION['username'];
		$updqry = ets_db_query("update faq set 
		faq_type = '".$_POST['faq_type']."',
		name = '".ets_db_real_escape_string($_POST['name'])."',		
        review = '".ets_db_real_escape_string($_POST['review'])."',
		username = '".$username."',	
		sortorder='".$_POST['sortorder']."',
		status = '".$_POST['status']."',
		modifieddate = now(),
		remote_ip ='".$_SERVER['REMOTE_ADDR']."'
		where faq_Id='" .$_POST['faq_Id']."'") or die ("Updating FAQ records query failed: ".ets_db_error());	
		return true;
	}
	function listData()
	{
?>
<script>
$(document).ready(function() {
	var listURL = 'helperfunc/faqList.php';
	$('#faqlist').dataTable({
		"ajax": listURL
	});
});
</script>	
<?php
		$subvar = 'onclick="return confirmSubmit();"';	
		echo '<div id="no-more-tables"><table cellpadding="1" cellspacing="2" border="0" class="table table-striped table-bordered dataTable" id="faqlist" width="100%">
		<thead>
		<tr>
			<th align="left">ID</th>
			<th align="left">Name</th>
			<th align="left">Description</th>
			<th align="left">Status</th>
			<th align="left">Sortorder</th>
			<th>Action</th>
		</tr>
		</thead>
		<tbody></tbody>	
		<tfoot>
				<tr>
					<th align="left">ID</th>
					<th align="left">Name</th>
					<th align="left">Description</th>
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
		params:{"tblName":"faq"},
		value: 1,
		source: [{value: 'E', text: 'Active'},{value: 'D', text: 'Disabled'}]
	});
</script>
<?php		
	}		
function delete()
	{
        $selqry = "Select * from faq where faq_Id='".$_GET['faq_Id']."'";
		$selres = ets_db_query($selqry);
		$arr = ets_db_fetch_array($selres);
		@unlink(DIR_FS_FAQ_PATH.$arr['image']);
		$delsql = "Delete from faq where faq_Id='".$_GET['faq_Id']."'";
		$delqry = ets_db_query($delsql) or die(ets_db_error().$delsql);
		return true;		
	}
	
	
	}
?>


<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 id="myModalLabel">FAQ Detail</h3>
        </div>
        <div class="modal-body">
          &nbsp;
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>