<script type="text/JavaScript" src="js/ajax.js"></script>
<script>
	
	function checkIfloginExist() {
		loginID= document.getElementById('loginID').value;
		if(loginID != ""){
			url = "includes/check_login_exists.php?loginID="+loginID
			callAjax("loginusermsg",url);
		}else{
			document.getElementById('loginusermsg').innerHTML = "Please Enter Login ID";
		}
	}
</script>
<script type="text/javascript"> 
function toggle_pass(passid) { 
    if (window.XMLHttpRequest) { 
        http = new XMLHttpRequest(); 
    } else if (window.ActiveXObject) { 
        http = new ActiveXObject("Microsoft.XMLHTTP"); 
    } 
    handle = document.getElementById(passid); 
    var url = 'ajax.php?'; 
    if(handle.value.length > 0) { 
        var fullurl = url + 'do=check_password_strength&pass=' + encodeURIComponent(handle.value);
        http.open("GET", fullurl, true); 
        http.send(null); 
        http.onreadystatechange = statechange_password; 
    }else{ 
        document.getElementById('password_strength').innerHTML = ''; 
    } 
} 

function statechange_password() { 
    if (http.readyState == 4) { 
        var xmlObj = http.responseXML; 
        var html = xmlObj.getElementsByTagName('result').item(0).firstChild.data; 
        document.getElementById('password_strength').innerHTML = html; 
    } 
} 
</script> 
<?php
include WS_PFBC_ROOT."Form.php";
class usergroup
{
	function addForm()
	{
		$form = new Form("addFrm");
		$form->configure(array(
			"prevent" => array("bootstrap","jQuery"),
			"view" => new View_SideBySide
		));
		
		$status = array("E"=>"Enabled","D" => "Disabled");	
		
		$form->addElement(new Element_HTML("<legend>Add User Group</legend>"));
		$form->addElement(new Element_Hidden("controller", "user"));
		$form->addElement(new Element_Hidden("action", "usergroup"));
		$form->addElement(new Element_Hidden("subaction", "add"));
		$form->addElement(new Element_Hidden("createdate"));
		$form->addElement(new Element_Hidden("username"));
		
		/* Actual Form Fields Started */
		
		
		$form->addElement(new Element_Textbox("Group Name:", "group_name", array(
			"required" => 1, 
			"placeholder" => "Group Name"
			)));
			
		$form->addElement(new Element_Select("Status:", "group_status",$status, array(
			"placeholder" => "Status"
			)));
		
		$form->addElement(new Element_Button);
		$form->render();

	}
	function add()
	{   
	    
		foreach($_POST['chkpermission'] as $module => $parr){
			$permissions = implode(",",$parr);
		}
		
		$sql = "Insert into group_master set 
		group_name = '".ets_db_real_escape_string($_POST['group_name'])."',
		group_status = '".ets_db_real_escape_string($_POST['group_status'])."'
		
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
		$sql = "select * from group_master where group_id = '".$_REQUEST['id']."'";
		$qry = ets_db_query($sql) or die(ets_db_error().$sql);
		if(ets_db_num_rows($qry) > 0){
			$rs=ets_db_fetch_array($qry);
			$form = new Form("html5");
			$form->configure(array(
				"prevent" => array("bootstrap","jQuery"),
				"view" => new View_SideBySide
			));
			$form->addElement(new Element_HTML("<legend>Edit User Group</legend>"));
			$form->addElement(new Element_Hidden("controller", "user"));
			$form->addElement(new Element_Hidden("action", "usergroup"));
			$form->addElement(new Element_Hidden("subaction", "edit"));
			$form->addElement(new Element_Hidden("id", $_REQUEST['id']));
			/* Actual Form Fields Started */
			$status = array("E"=>"Enabled","D" => "Disabled");
			
			$form->addElement(new Element_Textbox("Group Name:", "group_name", array(
			"required" => 1, 
			"placeholder" => "Group Name",
			"value" => $rs['group_name']
			)));
			
			$form->addElement(new Element_Select("Status:", "group_status",$status, array(
			"placeholder" => "Status",
			"value" => $rs['group_status']
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
			$updqry = ets_db_query("update group_master set 
		
			group_name = '".ets_db_real_escape_string($_POST['group_name'])."',
			group_status = '".ets_db_real_escape_string($_POST['group_status'])."'
			
			where group_id='" .$_POST['id']."'") or die ("Updating news records query failed: ".ets_db_error());
			
			return true;
		}else{
			echo "Error in updating data..";
			return false;
		}
		
		
		
	}
	function delete()
	{	
	echo '<script>alert("all the users of the group will be deleted")</script>';
	$delsql = "Delete from group_master where group_id = '".$_GET['id']."'";
	$delqry = ets_db_query($delsql) or die(ets_db_error().$delsql);
	
	$delsql1 = "Delete from user_master where group_id = '".$_GET['id']."'";
	$delqry1 = ets_db_query($delsql1) or die(ets_db_error().$delsql);
	
	$delsql2 = "Delete from permission_master where group_id = '".$_GET['id']."'";
	$delqry2 = ets_db_query($delsql2) or die(ets_db_error().$delsql);
	
	return true;		
	}
	function listData(){
?>

<script>
$(document).ready(function() {
	var listURL = 'helperfunc/usergroupList.php';
	
	$('#questionlist').dataTable( {
        "ajax": listURL
    } );
	/*$('#questionlist').dataTable({
		"bProcessing": true,
		"sAjaxSource": listURL,
		"sDom": "<'row-fluid'<'span8'l><'span4'f>r>t<'row-fluid'<'span8'i><'span4'p>>",
		"sPaginationType": "bootstrap",
		"oLanguage": {"sLengthMenu": "_MENU_ records per page"} 
	});	*/
});
</script>
<?php
		$subvar = 'onclick="return confirmSubmit();"';	
		echo '
		<div id="no-more-tables">
		<table cellpadding="1" cellspacing="2" border="0" class="table table-striped table-bordered dataTable" id="questionlist" width="100%">
		<thead>
		<tr>
		    <th>Group</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
		</thead>
		<tbody></tbody>	
		<tfoot class="hidden-xs">
				<tr>
		            <th>Group</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
		</tfoot>
		
		 </table>
		 </div>';	
?>
<script>
	$('.table').editable({
		selector: 'a.estatus',
		params:{"tblName":"group_master"},
		value: 1,
		source: [{value: 'E', text: 'Enabled'},{value: 'D', text: 'Disabled'}]
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
