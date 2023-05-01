<script>
$(document).ready(function(){
	          $('input').on('blur', function() {      
				if ($("#newsmasterFrm").valid()) {
					$('input[type=submit]').prop('disabled', false);  
				} else {
					$('input[type=submit]').prop('disabled', 'disabled');
				}
			  });
});
</script>
<?php
include WS_PFBC_ROOT."Form.php";
class newsmaster
{
	function addForm()
	{
		$form = new Form("addFrm");
		$form->configure(array(
			"prevent" => array("bootstrap","jQuery"),
			"view" => new View_SideBySide,
				"id" => "newsmasterFrm"
		));
		$status = array("E" => "Enabled", "D" => "Disabled");
		$form->addElement(new Element_HTML("<legend>Add News Type</legend>"));
		$form->addElement(new Element_Hidden("controller", "news"));
		$form->addElement(new Element_Hidden("action", "newsmaster"));
		$form->addElement(new Element_Hidden("subaction", "add"));
		$form->addElement(new Element_Hidden("createdate"));
		$form->addElement(new Element_Hidden("username"));
		
		/* Actual Form Fields Started */
		$form->addElement(new Element_Textbox("News/Event Type:", "news_type", array(
			"required" => 1, 
			"placeholder" => "News/Event Type"
			)));
		$form->addElement(new Element_HTML('<label class="control-label">Last Sort Order : '.get_last_sortorder('news_type').'</label><br><br>'));			
		$form->addElement(new Element_Textbox("Sortorder:", "sortorder", array(
			"required" => 1, 
			"placeholder" => "Sortorder"
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
		$news_slug = pro_SeoSlug(stripslashes($_POST['news_type']));
		$sql = "Insert into news_type set 
		news_type = '".ets_db_real_escape_string($_POST['news_type'])."',	
		createdate = '".$createdate."',
		username = '".$username."',
		sortorder = '".$_POST['sortorder']."',
		status = '".$_POST['status']."',
		remote_ip ='".$_SERVER['REMOTE_ADDR']."'
		";
		$qry = ets_db_query($sql) or die(ets_db_error().$sql);
		$news_id = ets_db_insert_id();
		insSeoLnk($news_id,"News",$news_slug);
		return true;
	}
	function editForm()
	{		
		$sql = "select * from news_type where news_type_id = '".$_REQUEST['news_type_id']."'";
		$qry = ets_db_query($sql) or die(ets_db_error().$sql);
		if(ets_db_num_rows($qry) > 0){
			$rs=ets_db_fetch_array($qry);
			$form = new Form("html5");
			$form->configure(array(
				"prevent" => array("bootstrap","jQuery"),
				"view" => new View_SideBySide,
				"id" => "newsmasterFrm"
			));
			$status = array("Enabled" => "Enabled", "Disabled" => "Disabled");
			$form->addElement(new Element_HTML("<legend>Edit News Type</legend>"));
			$form->addElement(new Element_Hidden("controller", "news"));
			$form->addElement(new Element_Hidden("action", "newsmaster"));
			$form->addElement(new Element_Hidden("subaction", "edit"));
			$form->addElement(new Element_Hidden("news_type_id", $_REQUEST['news_type_id']));
			$form->addElement(new Element_Hidden("modifyDate"));
			$form->addElement(new Element_Hidden("username"));
			/* Actual Form Fields Started */
			$form->addElement(new Element_Textbox("News/Event Type:", "news_type", array(
			"value"=> $rs['news_type'],
			"required" => 1, 
			"placeholder" => "News/Event Type"
			)));
			$form->addElement(new Element_HTML('<label class="control-label">Last Sort Order : '.get_last_sortorder('news_type').'</label><br><br>'));			
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
		$news_slug = pro_SeoSlug(stripslashes($_POST['news_type']));
		$updqry = ets_db_query("update news_type set 
		news_type = '".ets_db_real_escape_string($_POST['news_type'])."', 
		modifieddate = '".$modifyDate."',
		username = '".$username."',
		sortorder = '".$_POST['sortorder']."',
		status = '".$_POST['status']."',
		remote_ip ='".$_SERVER['REMOTE_ADDR']."'
		where news_type_id ='".$_POST['news_type_id']."'") or die ("Updating news_master records query failed: ".ets_db_error());
		updSeoLnk($_POST['news_type_id'],"News",$news_slug);
		return true;
	}
	function delete()
	{	
	$delsql = "Delete from news_type where news_type_id = '".$_GET['news_type_id']."'";
	$delqry = ets_db_query($delsql) or die(ets_db_error().$delsql);
	delSeoLnk($_GET['news_type_id'],"News");
	@unlink($img);	
	return true;		
	}
	function listData(){
?>
<script>
$(document).ready(function() {
	var listURL = "helperfunc/newsmasterList.php";
	var oTable = $('#newsmasterlist').dataTable({
			"ajax": listURL
	});
	$('.esortorder').editable({params:{"tblName":"news_type"}});
	
});
</script>
<?php
		echo '<div id="no-more-tables"><table cellpadding="1" cellspacing="2" border="0" class="table table-striped table-bordered dataTable" id="newsmasterlist" width="100%">
		<thead>
		<tr>
			<th align="left">News/Event Type</th>
			<th align="left">Status</th>
			<th align="left">Sort Order</th>
			<th>Action</th>
		</tr>
		</thead>
		<tbody>';
		
		
		echo '</tbody>
			<tfoot>
			<tr>
				<th align="left">News/Event Type</th>
				<th align="left">Status</th>
				<th align="left">Sort Order</th>
				<th>Action</th>
			</tr>
		</tfoot>
		 </table></div>';		
		 ?>
<script>
	$('.table').editable({
		selector: 'a.estatus,a.esortorder',
		params:{"tblName":"news_type"},
		value: 1,
		source: [{value: 'E', text: 'Active'},{value: 'D', text: 'Disabled'}]
	});
</script>		 
<?php			
	}	
}
?>
