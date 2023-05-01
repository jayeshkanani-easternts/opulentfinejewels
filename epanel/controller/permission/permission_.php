<script type="text/javascript">
function checkAll()
{
	$('#frmadd').find( ':checkbox' ).prop('checked', true);
}

function uncheckAll()
{
	$('#frmadd').find( ':checkbox' ).prop('checked',false);
}

//  End -->
</script>
<?php
include WS_PFBC_ROOT."Form.php";
class permission
{
	//Create Page BOF
	function addForm()
	{
		$form = new Form("frmadd");
		$form->configure(array(
			"prevent" => array("bootstrap","jQuery"),
			"view" => new View_SideBySide
		));
		$modules_arr = getModuleList();
		$asql = "SELECT * from group_master where group_status = 'E' and group_id != 1 and group_id not in (select distinct group_id from permission_master)";
		$aqry = ets_db_query($asql) or die(ets_db_error().$asql);
		if(ets_db_num_rows($aqry))
		{
			$menu_array = array(); 
			while($row=ets_db_fetch_array($aqry)){ 
				$menu_array[$row['group_id']] = $row['group_name']; 
			}
		
		
		$permission_arr = array('a'=>'Add','e'=>'Edit','d'=>'Delete','v'=>'View');
		
		$form->addElement(new Element_HTML("<legend>Add Permission </legend>"));
		$form->addElement(new Element_Hidden("controller", "permission"));
		$form->addElement(new Element_Hidden("action", "permission"));
		$form->addElement(new Element_Hidden("subaction", "add"));
		
		/* Actual Form Fields Started */
		$form->addElement(new Element_Select("Group:", "group_id", $menu_array, array(
			"required" => 1, 
			"placeholder" => "Group"
			)));
		$form->addElement(new Element_HTML('
			<div class="control-group"><label class="control-label">&nbsp;</label><input type="button" onclick="checkAll();" value="Check All" class="btn">
<input type="button" name="UnCheckAll" value="Uncheck All"
onClick="uncheckAll()" class="btn"></div>
		'));
		foreach($modules_arr as $key => $value){
			$form->addElement(new Element_Checkbox("$key:", "chkpermission[$key][]", $permission_arr));
		}
		$form->addElement(new Element_HTML('<hr>'));
		$form->addElement(new Element_Button);
		$form->addElement(new Element_Button("Cancel", "button", array(
			"onclick" => "history.go(-1);"
		)));
		$form->render();
		}
		
		else
		{
			echo 'No New Groups Available';
		}
	}
	
	function add()
	{
		$username = $_SESSION['username'];
		$createdate = date('Y-m-d');
		$Error = 0;
		
		foreach($_POST['chkpermission'] as $module => $parr){
			$permissions = implode(",",$parr);
			$select_sql = "Select * from permission_master where group_id='".$_POST['group_id']."' AND module='".$module."';";
			$select_qry = ets_db_query($select_sql) or die(ets_db_error().$select_sql);
			if(ets_db_num_rows($select_qry) > 0){
				
			}
			else{
				
			$q = "select module_id from module_master where module_file='".$module."'";
			$ar = ets_db_fetch_assoc(ets_db_query($q));
				$insertsql = "INSERT INTO permission_master set
				username = '".$username."',
				createdate = '".$createdate."',
				modifieddate = '".$createdate."',
				group_id = '".$_POST['group_id']."',
				module = '".$module."',
				module_id = '".$ar['module_id']."',
				permissions = '".$permissions."' ";
				
				if(ets_db_query($insertsql)){
					$Error = 0;
				}else{
					die(ets_db_error().$insertsql);
					$Error = 1;
				}
			}
		}
		
	    $query = "select * from module_master where module_id not in(select module_id from permission_master where group_id = ".$_POST['group_id'].")";
		//echo $query;
		$result = ets_db_query($query);
		$p = "";
		while($arr = ets_db_fetch_array($result))
		{
			$sql = "INSERT INTO permission_master set
				username = '".$username."',
				createdate = '".$createdate."',
				modifieddate = '".$createdate."',
				group_id = '".$_POST['group_id']."',
				module = '".$arr['module_file']."',
				module_id = '".$arr['module_id']."',
				permissions = '".$p."'";
			$res = ets_db_query($sql);
			
			echo '<br>';
		}
		
		if($Error == 1){
			return false;
		}else{
			return true;
		}
		
	}
		
	function editForm()
	{
		
		
	$permission_arr = array('a'=>'Add','e'=>'Edit','d'=>'Delete','v'=>'View');
	$mod = getControllerNames();
	$modules_arr = $mod;
	
	
	//$modules_arr = array('Area','Package','Department','Ticket','Customer','Employee');
	$edit='<form name="frm_perm" id="frm_perm" action="index.php?controller=permission&action=permission&subaction=edit" method="post" onsubmit="return permissionvalidation();" > 
	
	';
	
		//$sql = "select * from permission_master";
		$sql = "select * from permission_master where group_id ='".$_GET['id']."'";
		//echo $sql;
		$edit.='<input type="hidden" id="group_id" name="group_id" value="'.$_GET['id'].'">';
		
		$qry = ets_db_query($sql) or die(ets_db_error().$sql);
		//print_r($qry);
		
		if(ets_db_num_rows($qry) > 0){
			while($rs=ets_db_fetch_array($qry))
			{
			
		$mid = $rs['module_id'];
		$edit .='<table width="100%" cellpadding="5" cellspacing="5" border="0"><tr>
				<td class="admin_inner" width ="15%">'.$rs['module'].'</td>
				<td class="admin_inner" width ="85%" align="left">';
				$permission_edit = "";
				$servicesarr = explode(",",$rs['permissions'] );		
				foreach($permission_arr as $pkey => $pvalue){
					$found = 0;
					foreach($servicesarr as $key => $value){
						if($value == $pkey){
							$found = $found+1;
						}
					}
					if($found > 0){
						$permission_edit.='<input type="checkbox" name="chkpermission['.$mid.'][]" id="chkpermission" value="'.$pkey.'" checked />'.$pvalue.'<br />';
					}else{
						$permission_edit.='<input type="checkbox" name="chkpermission['.$mid.'][]" id="chkpermission" value="'.$pkey.'" />'.$pvalue.'<br />';
					}
			}
			$edit .= $permission_edit;
			$edit .='</td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		</table>';
		
			}
		}
$edit .= '<table width="100%" cellpadding="5" cellspacing="5" border="0"><tr><td>&nbsp;</td></tr>
		<tr>
				<td class="admin_inner" align="right">&nbsp;</td>
		    	<td valign="top"><input type="submit" class="btn btn-primary" name="save" value="Edit Permission"></td>
		</tr>				
</table></form>';
	echo $edit;
	}
	
	function edit()
	{
		$username = $_SESSION['username'];
		$createdate = date('Y-m-d');
		/*if(isset($_POST['chkpermission'])){
		foreach($_POST['chkpermission'] as $permissionk => $permissionv){
		$permission .= $permissionv.",";
		}
		}*/
		//print_r($_POST['chkpermission']);
		
		foreach($_POST['chkpermission'] as $module => $parr){
			$permissions = implode(",",$parr);
			$select_sql = "Select * from permission_master where group_id='".$_POST['group_id']."' AND module_id='".$module."'";
			$select_qry = ets_db_query($select_sql) or die(ets_db_error().$select_sql);
			$arr = ets_db_fetch_assoc($select_qry);
			//echo $select_sql;
		    //echo '<br>';
				
				$updsql = "UPDATE permission_master set
				username = '".$username."',
				createdate = '".$createdate."',
				modifieddate = '".$createdate."',
				
				permissions = '".$permissions."' 
				WHERE permission_id = '".$arr['permission_id']."' and module_id='".$module."'";
				echo $updsql;
				echo '<br>';
				if(ets_db_query($updsql)){
					$Error = 0;
				}else{
					die(ets_db_error().$updsql);
					$Error = 1;
				}
			
		}
		//$edit_sql = "update permission_master set module='".$_POST['module']."',permissions ='".$permission."',username = '".$username."',modifieddate = '".$createdate."'  where group_id = '".$_POST['group_id']."'";
		//$edit_qry = ets_db_query($edit_sql) or die(ets_db_error().$edit_sql);
		return true;		
	
	}
	
	function delete()
	{
		$sql = "delete from permission_master where group_id='".$_GET['id']."'";
		$qry = ets_db_query($sql) or die(ets_db_error().$sql);
		return true;
	}
	
	function listData()
	{
?>
	<script>
	$(document).ready(function() {
		var listUrl = 'helperfunc/permissionList.php';
		$('#permissionlist').dataTable( {
        "ajax" : listUrl
    } );
		
		/*$('#permissionlist').dataTable({
			"sDom": "<'row-fluid'<'span8'l><'span4'f>r>t<'row-fluid'<'span8'i><'span4'p>>",
			"sPaginationType": "bootstrap",
			"oLanguage": {"sLengthMenu": "_MENU_ records per page"} 
		});*/
	});
	</script>
<?php
		$subvar = 'onclick="return confirmSubmit();"';
		echo '<div id="no-more-tables">
		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered dataTable" id="permissionlist" width="100%">
		<thead>
		<tr>
			<th>Group Id</th>
			<th>Group</th>
			<th>Action</th>
		</tr>
 		</thead>
		<tbody>';
		
		echo '</tbody>
		<tfoot class="hidden-xs">
		<tr>
			<th>Group Id</th>
			<th>Group</th>
			<th>Action</th>
		</tr>
	</tfoot>
		 </table>
		 </div>';		
		
	}
}	
?>
