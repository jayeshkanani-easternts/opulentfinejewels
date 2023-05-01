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
<style>
    th{
        text-align: center;
    }
    td{
        text-align: center;
    }
    .form-horizontal .controls {
    margin-left: 0px !important;
  
}
    .permission-table > tbody > tr > td{
        height : 60px !important;
    }
</style>
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
//		foreach($modules_arr as $key => $value){
//			$form->addElement(new Element_Checkbox("$key:", "chkpermission[$key][]", $permission_arr));
//		}
        $form->addElement(new Element_HTML('<table class="main table table-striped permission-table table-bordered" cellspacing="0" cellpadding="0" width="100%">'));   
        $form->addElement(new Element_HTML('<thead><tr><th></th><th>Add</th><th>Edit</th><th>Delete</th><th>View</th></tr></thead>')); 
        $form->addElement(new Element_HTML('<tbody>')); 
        foreach($modules_arr as $key => $value){
            $form->addElement(new Element_HTML('<tr>'));
            $form->addElement(new Element_HTML('<td style = "width : 20%;text-align:left">'.$value.'</td>'));
            foreach($permission_arr as $key1 => $value1){
                $form->addElement(new Element_HTML('<td>'));
                //$form->addElement(new Element_Checkbox("$key:", "chkpermission[$key][]", $permission_arr));
                $form->addElement(new Element_Checkbox("", "chkpermission[$key][]", array(
                $key1 => ""
                )));
                $form->addElement(new Element_HTML('</td>'));
            }
			
            $form->addElement(new Element_HTML('</tr>'));
		}
        $form->addElement(new Element_HTML('</tbody>'));   
        $form->addElement(new Element_HTML('</table>')); 
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
        foreach($_POST['chkpermission'] as $module => $parr){
			$permissions = implode(",",$parr);
		}
		
		
			
		$group_id = $_POST['group_id'];
        
        
		foreach($_POST['chkpermission'] as $module => $parr){
			$permissions = implode(",",$parr);
			$select_sql = "Select * from permission_master where group_id='".$group_id."' AND module='".$module."';";
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
				group_id = '".$group_id."',
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
		
	    $query = "select * from module_master where module_id not in(select module_id from permission_master where group_id = ".$group_id.")";
		//echo $query;
		$result = ets_db_query($query);
		$p = "";
		while($arr = ets_db_fetch_array($result))
		{
			$sql = "INSERT INTO permission_master set
				username = '".$username."',
				createdate = '".$createdate."',
				modifieddate = '".$createdate."',
				group_id = '".$group_id."',
				module = '".$arr['module_file']."',
				module_id = '".$arr['module_id']."',
				permissions = '".$p."'";
			$res = ets_db_query($sql);
			
			echo '<br>';
		}
		
			return true;
	
	}
		
	function editForm()
	{
		
		
	$sql1 = "select * from group_master where group_id = '".$_REQUEST['id']."'";
		$qry1 = ets_db_query($sql1) or die(ets_db_error().$sql1);
		if(ets_db_num_rows($qry1) > 0){
			$rs1=ets_db_fetch_array($qry1);
			$form = new Form("frmadd");
			$form->configure(array(
				"prevent" => array("bootstrap","jQuery"),
				"view" => new View_SideBySide
			));
			$form->addElement(new Element_HTML("<legend>Edit Permission</legend>"));
			$form->addElement(new Element_Hidden("controller", "permission"));
			$form->addElement(new Element_Hidden("action", "permission"));
			$form->addElement(new Element_Hidden("subaction", "edit"));
			$form->addElement(new Element_Hidden("id", $_REQUEST['id']));
			/* Actual Form Fields Started */
			$status = array("E"=>"Enabled","D" => "Disabled");
            $permission_arr = array('a'=>'Add','e'=>'Edit','d'=>'Delete','v'=>'View');
			
			
			
			$form->addElement(new Element_HTML('
					<div class="control-group"><label class="control-label">&nbsp;</label><input type="button" id = "checkall" onclick="checkAll();" value="Check All" class="btn">
					<input type="button" name="UnCheckAll" value="Uncheck All"
					onClick="uncheckAll()" id = "uncheckall" class="btn"></div>
					'));
            $sql = "select * from permission_master where group_id ='".$_GET['id']."' order by module_id asc";
		    $form->addElement(new Element_HTML('<input type="hidden" id="group_id" name="group_id" value="'.$_GET['id'].'">'));
		    
            $form->addElement(new Element_HTML('<table class="main table permission-table table-striped table-bordered" cellspacing="0" cellpadding="0" width="100%">'));   
            $form->addElement(new Element_HTML('<thead><tr><th></th><th>Add</th><th>Edit</th><th>Delete</th><th>View</th></tr></thead>')); 
            $form->addElement(new Element_HTML('<tbody>'));
            
		    $qry = ets_db_query($sql) or die(ets_db_error().$sql);
            if(ets_db_num_rows($qry) > 0){
			while($rs=ets_db_fetch_array($qry))
			{
			
		$mid = $rs['module_id'];
                $mod_title = getfldValue('module_master','module_file',$rs['module'],'module_title');
		$form->addElement(new Element_HTML('<tr><td style = "width : 20%;text-align:left">'.$mod_title.'</td>'));
				
				$servicesarr = explode(",",$rs['permissions']);		
				foreach($permission_arr as $pkey => $pvalue){
                    $form->addElement(new Element_HTML('<td>'));
					$found = 0;
					foreach($servicesarr as $key => $value){
						if($value == $pkey){
                            $found = $found+1;
						}

					}
					if($found > 0){
						$form->addElement(new Element_HTML('<input type="checkbox" name="chkpermission['.$mid.'][]" id="chkpermission" value="'.$pkey.'" checked />'));
					}else{
                        
						$form->addElement(new Element_HTML('<input type="checkbox" name="chkpermission['.$mid.'][]" id="chkpermission" value="'.$pkey.'" />'));
                                          }
                    $form->addElement(new Element_HTML('</td>'));
					
			}
			//$edit .= $permission_edit;
			
		
            $form->addElement(new Element_HTML('</tr>'));
                $form->addElement(new Element_HTML($edit));
		
			}
		}
            $form->addElement(new Element_HTML('</tbody>'));   
            $form->addElement(new Element_HTML('</table>'));
			


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
        $username = $_SESSION['username'];
		$createdate = date('Y-m-d');
		
		if(!$error){
			
            $sql = "select * from permission_master where group_id ='".$_POST['id']."'";
            $query = ets_db_query($sql) or die(ets_db_error().$sql);
            while($result = ets_db_fetch_assoc($query)){
                $permissions = implode(",",$_POST['chkpermission'][$result['module_id']]);
                $updsql = "UPDATE permission_master set
                    username = '".$username."',
                    createdate = '".$createdate."',
                    modifieddate = '".$createdate."',
                    permissions = '".$permissions."' 
                    WHERE permission_id = '".$result['permission_id']."' and module_id='".$result['module_id']."'";
                    echo $updsql;
                    echo '<br>';
                    if(ets_db_query($updsql)){
                        $Error = 0;
                    }else{
                        die(ets_db_error().$updsql);
                        $Error = 1;
                    }
            }
			
			return true;
		}else{
			echo "Error in updating data..";
			return false;
		}
        
		
		
			
	
	}
	
	function delete()
	{
		$sql = "delete from permission_master where group_id='".$_GET['id']."'";
		$qry = ets_db_query($sql) or die(ets_db_error().$sql);
		return true;
	}
	
	function listData()
	{
		echo "work";
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
