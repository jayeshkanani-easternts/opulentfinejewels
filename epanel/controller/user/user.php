<script> 
$(document).ready(function(){
    $('#mainpages').select2({
		placeholder: "Select a Main Page"
	});

$("#selectall").click(function(){
    $('.case').not(this).prop('checked', this.checked);
}); 

 $(document).on("click",".case" ,function(){
        if($(".case").length == $(".case:checked").length) {
            $("#selectall").prop("checked", "checked");
        } else {
            $("#selectall").removeAttr("checked");
        }
 
    }); 
	
jQuery('#cpass').on('input', function() {
	cpass = $('#cpass').val();
    pass = $('#pass').val();
	if(cpass != pass)
	{
		$('#password_match').html('passwords dont match');
		$('#submit').attr('disabled','disabled');
	}
	else if(cpass == pass)
	{
		$('#password_match').html('');
		$('#submit').removeAttr('disabled');
	}

});

$("#deleteMultiple").click(function(){
	
	  var result = confirm("Are You Sure you want to delete the subscription ? ");
		if (result == true) 
		{	
			var delIDarray = [];
			  $('.case').each(function(){
					var ar = this.id;
					var selectval = $('#'+ar).is(':checked');
					if(selectval){
						delIDarray.push(ar);
					}
			  });
			var finalDelArray = delIDarray.join(',');
			var loc = 'index.php?controller=user&action=user&subaction=delete&sid='+finalDelArray;
			window.location.assign(loc);
		}
		else 
		{
			
		}	  
	  //location.href="index.php?controller=products&action=subscriptionlist&subaction=delete&sid="+finalDelArray;
});     
});     
 

</script>

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
class users
{
	function addForm(){
	$add='<form name="frmadd" id="frmadd" action="index.php?controller=user&action=user&subaction=add" method="post" onsubmit="return Validations();">
	<table cellpadding="2" cellspacing="3" border="0" width="100%">
	<tr>
		<td class="admin_inner" valign="top" align="right">* User Group:</td>
		<td valign="top">
				<select name="group_id" id="group_id">
				<option value="">Select Group</option> ';
			
					$gsql = "select * from group_master";
					$gqry = ets_db_query($gsql) or die(ets_db_error().$gsql);
					if(ets_db_num_rows($gqry) > 0){
						while($grs = ets_db_fetch_array($gqry)){
							$add.='<option value="'.$grs['group_id'].'">'.$grs['group_name'].'</option>';
						}
					}
				
				$add.='</select>
		  </td>
		</tr>	
		<tr>
			<td class="admin_inner" valign="top" align="right">* User Email:</td>
			<td valign="top" class="must"><input type="text" name="email" id="email" value="'.$_POST['email'].'" class="select"><br />
			<div id="usermsg" name="usermsg" style="color:#000;"></div>
		  </td>
		</tr>		
		<tr>
			<td class="admin_inner" valign="top" align="right">* User Password:</td>
			<td class="must" valign="top"><input type="password" name="pwd" id="pass" value="'.$_POST['pwd'].'" class="select left" onkeyup="toggle_pass(\'pass\')">
		  <div id="password_strength"> </div></td>
		</tr>
		<tr>
			<td class="admin_inner" valign="top" align="right">* User LoginId:</td>
			<td class="must" valign="top"><input type="text" name="loginID" id="loginID" value="'.$_POST['loginID'].'" class="select left" ><div class="left"> &nbsp;&nbsp; </div><input value="Check LoginID " name="checklogin" type="button" onclick="checkIfloginExist();" class="left" /></td>
		</tr>		
		<tr>
			<td>&nbsp;</td>
			<td><div id="loginusermsg" name="loginusermsg" style="color:#000;"></div></td>
		</tr>				
		<tr>
			<td class="admin_inner" valign="top" align="right">* User First Name:</td>
			<td class="must" valign="top"><input type="text" name="fname" id="fname" value="'.$_POST['fname'].'" class="select"></td>
		</tr>
		<tr>
			<td class="admin_inner" valign="top" align="right">* User Last Name:</td>
			<td valign="top"><input type="text" name="lname" id="lname" value="'.$_POST['lname'].'" class="select" ></td>
		</tr>
		<tr>
			<td class="admin_inner" valign="top" align="right">User Address:</td>
			<td class="must" valign="top"><textarea name="address" id="address" class="textarea">'.$_POST['address'].'</textarea>Full Address</td>
		</tr>
		<tr>
			<td class="admin_inner" valign="top" align="right">User Contacts:</td>
			<td class="must" valign="top"><textarea name="contacts" id="contacts" class="textarea">'.$_POST['contacts'].'</textarea> like phone, fax, Yahoo IM, MSN IM or AOL IM</td>
		</tr>
		<tr>
			<td class="admin_inner" valign="top">&nbsp;</td>
			<td valign="top">
			<input type="submit" name="save" id="save" value="Submit" class="btn btn-primary" disabled> &nbsp; <a href="index.php?controller=user&action=user&subaction=listuser" class="btn"> Cancel </a></td>
		</tr>
  </table>
</form>';
	echo $add;
}
	function editForm(){
	$sql = "select * from user_master where userID ='".$_GET['userID']."'";
	$qry = ets_db_query($sql) or die(ets_db_error().$sql);
	if(ets_db_num_rows($qry) > 0){
		$rs=ets_db_fetch_array($qry);
$edit='<form name="frmadd" action="index.php?controller=user&action=user&subaction=edit" method="post" onsubmit="return Validations();">
	<input type="hidden" name="user_id" value="'.$_GET['userID'].'" class="select">
	<table cellpadding="2" cellspacing="3" border="0" width="100%">
		<tr>
			<td class="admin_inner" valign="top" align="right">* User Group:</td>
			<td valign="top">
				<select name="group_id">
				<option value="">Select Group</option> ';
					$gsql = "select * from group_master";
					$gqry = ets_db_query($gsql) or die(ets_db_error().$gsql);
					if(ets_db_num_rows($gqry) > 0){
						while($grs = ets_db_fetch_array($gqry)){
						if($rs['group_id'] == $grs['group_id']){
							$selected = " Selected ";
						}else{
							$selected = " ";
						}
							$edit.= '<option value="'.$grs['group_id'].'"'.$selected.'>'.$grs['group_name'].'</option>';
						}
					}
			$edit.='</select>
		  </td>
		</tr>
		<tr>
			<td class="admin_inner" valign="top" align="right">* User LoginId:</td>
			<td valign="top"><input type="text" name="loginID" id="loginID" value="'.$rs['loginID'].'" class="select"></td>
		</tr>
		<tr>
			<td class="admin_inner" valign="top" align="right">* User Email:</td>
			<td valign="top"><input type="text" name="email" id="email" value="'.$rs['email'].'" class="select" ><br /><div id="usermsg" name="usermsg" style="color:#000;"></div></td>
		</tr>	
		<tr>
			<td class="admin_inner" valign="top" align="right">* User First Name:</td>
			<td valign="top"><input type="text" name="fname" id="fname" value="'.$rs['firstname'].'" class="select" ></td>
		</tr>
		<tr>
			<td class="admin_inner" valign="top" align="right">* User Last Name:</td>
		  <td valign="top"><input type="text" name="lname" id="lname" value="'.$rs['lastname'].'" class="select" ></td>
		</tr>
		<tr>
			<td class="admin_inner" valign="top" align="right">User Address:</td>
			<td valign="top" class="must"><textarea name=address id="address" class="textarea">'.$rs['address'].'</textarea>Full Address</td>
		</tr>
		<tr>
			<td class="admin_inner" valign="top" align="right">User Contacts:</td>
			<td valign="top" class="must"><textarea name=contacts id="contacts" class="textarea">'.$rs['contacts'].'</textarea>like phone, fax, Yahoo IM, MSN IM or AOL IM</td>
		</tr>
		<tr>
			<td class="admin_inner" valign="top">&nbsp;</td>
			<td valign="top">
			<button class="btn btn-primary" type="submit">Save</button>
			 &nbsp; <a href="index.php?controller=user&action=user&subaction=listData" class="btn"> Cancel </a></td>
		</tr>
  </table>
</form>';
 }
	echo $edit;
}
	
	function add()
	{
		$pass =  ets_db_real_escape_string($_POST['pwd']);
		$login = ets_db_real_escape_string($_POST['loginID']);
		$hash = hash('sha256', $login . $pass);
		
		$sql = "Insert into user_master values(null,'".$_POST['group_id']."','".$login."','".$_POST['email']."','".$hash."','".$_POST['fname']."','".$_POST['lname']."','".$_POST['address']."','".$_POST['contacts']."')";
		$qry = ets_db_query($sql) or die(ets_db_error().$sql);
		return true;
	}
	function edit()
	{
		$login = ets_db_real_escape_string($_POST['loginID']);
		$updqry = ets_db_query("update user_master set group_id = '".$_POST['group_id']."',loginID='".$login ."',email = '".$_POST['email']."', firstname = '".$_POST['fname']."', lastname = '".$_POST['lname']."', address = '".$_POST['address']."', contacts = '".$_POST['contacts']."' where userID= '".$_POST['user_id']."'") or die ("Updating file module records query failed: ".ets_db_error());
		return true;
	}

	function delete()
	{
	    
        $values = explode(",", $_GET["sid"]);
		if(count($values) >= 1){
			foreach($values as $key => $val){
				$delsql = "Delete from user_master where userID = '".$val."'";
				$delqry = ets_db_query($delsql) or die(ets_db_error().$delsql);
			}
		}else{
			$deletesql = "Delete from user_master where userID = '".$_GET['userID']."'";
			$deleteqry = ets_db_query($deletesql) or die(ets_db_error().$deletesql);
		
		}
		return true;	
		
	
	}
	
	function pwdForm(){
	$pwd = '
		<form action="index.php?controller=user&action=user&subaction=editpwd" method="post" onsubmit="return Validations();">
		<input type="hidden" name="user_id" value="'.$_GET['userID'].'" class="select">
		<input type="hidden" name="login_id" value="'.$_GET['loginID'].'" class="select">
	<table cellpadding="2" cellspacing="3" border="0" width="100%">
		<tr>
			<td class="admin_inner" valign="top" align="right">* New Password:</td>
			<td class="must" valign="top"><input type="password" name="pwd" id="pass" value="" class="select left" onkeyup="toggle_pass(\'pass\')">
		  <div id="password_strength"> </div></td>
		</tr>
		<tr>
			<td class="admin_inner" valign="top" align="right">* Confirm Password:</td>
			<td class="must" valign="top"><input type="password" name="cpwd" id="cpass" value="" class="select left">
			<div id="password_match"> </div></td>
		</tr>
		<tr>
			<td class="admin_inner" valign="top">&nbsp;</td>
			<td valign="top">
			<button class="btn btn-primary" type="submit" id="submit">Save</button>
			 &nbsp; <a href="index.php?controller=user&action=user&subaction=listData" class="btn"> Cancel </a></td>
		</tr>
  </table>
</form>';
 
	echo $pwd;
   }
	
	function editpwd()
	{
		$pass =  ets_db_real_escape_string($_POST['pwd']);
		
		$login = ets_db_real_escape_string($_POST['login_id']);
		
		$id = ets_db_real_escape_string($_POST['user_id']);
		$hash = hash('sha256', $login . $pass);
		$sql = "update user_master set password = '".$hash."' where userID= '".$_POST['user_id']."'";
		
		//$qry = ets_db_query($sql) or die(ets_db_error().$sql);
		
		if(ets_db_query($sql))
		{
			return true;
		}
		else{
			return false;
		}
		
		
	}

	function listData()
	{
		$form = new Form("addFrm");
		$form->configure(array(
		"prevent" => array("bootstrap","jQuery"),
		"view" => new View_Inline
	));
	
	$q = "select * from group_master";
	$r = ets_db_query($q);
	$group[''] = 'Select User Group';
	
	while($arr = ets_db_fetch_array($r))
	{
		$group[$arr['group_id']] = $arr['group_name'];
	}
	
	
	
	$form->addElement(new Element_Hidden("controller", "user"));
	$form->addElement(new Element_Hidden("action", "user"));
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
		
		$form->addElement(new Element_Select("User Group:", "group", $group, array(
			"id" => "group",
			"value" => $grp
			)));	
		
	
		$form->addElement(new Element_HTML('</span>'));
		$form->addElement(new Element_Button);
		$form->render();
	
		$whr = "";
		$disQry =  "SELECT * from user_master where 1=1 ";
		
		if(!empty($_REQUEST['group'])) 
			{
				$grp = $_REQUEST['group'];	
				$whr .= ' AND group_id = "'.$grp.'"';
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
		//echo $disQry;
		$_SESSION['listSQL'] = $disQry;
		
	?>
		<script>
		$(document).ready(function() {
			var listURL = 'helperfunc/userList.php';
			$('#userslist').dataTable( {
				"ajax": listURL
			});
			
			/*$('#userslist').dataTable({
				"sDom": "<'row-fluid'<'span8'l><'span4'f>r>t<'row-fluid'<'span8'i><'span4'p>>",
				"sPaginationType": "bootstrap",
				"oLanguage": {"sLengthMenu": "_MENU_ records per page"} 
			});*/
		});
		</script>
	<?php
		$subvar = 'onclick="return confirmSubmit();"';
		//print_r($_GET);
		
		echo '<div id="no-more-tables">
		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered dataTable" id="userslist" width="100%">
		<thead>
		<tr>
			<th colspan="9"><input type="checkbox" id="selectall" value="false">&nbsp; &nbsp;Select All</input>&nbsp; &nbsp;
			<button class="btn btn-danger" id="deleteMultiple">Delete Selected</th>	
		</tr>
		<tr>
			<th><center>Select</center></th>
			<th>User ID</th>
			<th>LoginID</th>
			<th>Email</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Address</th>
			<th>Contact</th>
			<th>Action</th>
		</tr>
 		</thead>
		<tbody>';
		
		 echo '</tbody>
		<tfoot class="hidden-xs">
		<tr>
			<th><center>Select</center></th>
			<th>User ID</th>
			<th>LoginID</th>
			<th>Email</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Address</th>
			<th>Contact</th>
			<th>Action</th>
		</tr>
		</tr>
	</tfoot>
		 </table>
		 </div>';		

		
	}
}
?>