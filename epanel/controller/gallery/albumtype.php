<script>
$(document).ready(function(){
	          $('input').on('blur', function() {      
				if ($("#atypeFrm").valid()) {
					$('input[type=submit]').prop('disabled', false);  
				} else {
					$('input[type=submit]').prop('disabled', 'disabled');
				}
			  });
});
</script>
<?php
include WS_PFBC_ROOT."Form.php";
class albumtype
{
	function addForm()
	{
		$form = new Form("addFrm");
		$form->configure(array(
			"prevent" => array("bootstrap","jQuery"),
			"view" => new View_SideBySide,
			"id" => "atypeFrm"
		));
		$status = array("E" => "Enabled", "D" => "Disabled");
		$form->addElement(new Element_HTML("<legend>Add New AlbumType</legend>"));
		$form->addElement(new Element_Hidden("controller", "gallery"));
		$form->addElement(new Element_Hidden("action", "albumtype"));
		$form->addElement(new Element_Hidden("subaction", "add"));
		$form->addElement(new Element_Hidden("createdate"));
		$form->addElement(new Element_Hidden("username"));
		/* Actual Form Fields Started */
		$form->addElement(new Element_Textbox("Album Type Title:", "album_title", array(
			"required" => 1, 
			"placeholder" => "Album Type Title"
			)));
		$form->addElement(new Element_HTML('<label class="control-label">Last Sort Order : '.get_last_sortorder('album_type').'</label><br><br>'));					
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
		$username=$_SESSION['username'];
		$createdate = date("Y-m-d");
		$albumtype_slug = pro_SeoSlug(stripslashes($_POST['album_title']));
		$sql = "Insert into album_type set 
		album_title = '".$_POST['album_title']."',	
		username = '".$username."',
		createdate = now(),
		sortorder = '".ets_db_real_escape_string($_POST['sortorder'])."',
		status = '".$_POST['status']."',
		remote_ip ='".$_SERVER['REMOTE_ADDR']."'	
		";
		$insql = ets_db_query($sql) or die(ets_db_error() . "<br>" . $sql );
		$albumtype_id = ets_db_insert_id();
		insSeoLnk($albumtype_id,"gallery",$albumtype_slug);
		return true;
	}
	function editForm()
	{		
	    $sql = "select * from album_type where type_id = '".$_REQUEST['type_id']."'";
		$qry = ets_db_query($sql) or die(ets_db_error().$sql);
		if(ets_db_num_rows($qry) > 0){
			$rs=ets_db_fetch_array($qry);
			$form = new Form("html5");
			$form->configure(array(
				"prevent" => array("bootstrap","jQuery"),
				"view" => new View_SideBySide
			));
			$status = array("E" => "Enabled", "D" => "Disabled");
			$form->addElement(new Element_HTML("<legend>Edit AlbumType</legend>"));
			$form->addElement(new Element_Hidden("controller", "gallery"));
			$form->addElement(new Element_Hidden("action", "albumtype"));
			$form->addElement(new Element_Hidden("subaction", "edit"));
			$form->addElement(new Element_Hidden("type_id", $_REQUEST['type_id']));
			$form->addElement(new Element_Hidden("modifieddate"));
			$form->addElement(new Element_Hidden("username"));	
			/* Actual Form Fields Started */
			$form->addElement(new Element_Textbox("Album Type Title:", "album_title", array(
			"value"=> $rs['album_title'],
			"required" => 1, 
			"placeholder" => "Album Type Title"
			)));
		$form->addElement(new Element_HTML('<label class="control-label">Last Sort Order : '.get_last_sortorder('album_type').'</label><br><br>'));						
		$form->addElement(new Element_Textbox("Sortorder:", "sortorder", array(	
			"value"=> $rs['sortorder'],
			"required" => 1,
			"placeholder" => "Sortorder"	
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
			$form->addElement(new Element_HTML('<hr>'));
			$form->render();
			
		}
		else
		{
			echo "No Album Type Found...";
		}
	}
	function edit()
	{   
		$username=$_SESSION['username'];
		$modifieddate = date("Y-m-d");
		$albumtype_slug = pro_SeoSlug(stripslashes($_POST['album_title']));
		$updqry = "update album_type set 
		album_title = '".$_POST['album_title']."',	
		username = '".$username."',
		modifieddate = now(),
		sortorder = '".ets_db_real_escape_string($_POST['sortorder'])."',
		status = '".$_POST['status']."',
		remote_ip ='".$_SERVER['REMOTE_ADDR']."'	
		where type_id ='".$_POST['type_id']."'";
		$updexec = ets_db_query($updqry) or die(ets_db_error() . "<br>" . $updqry );
		updSeoLnk($_POST['type_id'],"Media",$albumtype_slug);
		return true;
	}
	function delete()
	{
	
	$qry = "Select * from gallery_master where a_id in (Select a_id from album where album_type_id = '".$_GET['type_id']."')";
	$res = ets_db_query($qry);
	echo $qry;
	
	while($arr = ets_db_fetch_array($res))
	{
		delete_folder(DIR_FS_GALLERY_PATH.$arr['a_id']);
		delSeoLnk($arr['a_id'],'gallery');
	}
	
	$qry = "Delete from gallery_master where a_id in (Select a_id from album where album_type_id = '".$_GET['type_id']."')";
	$res = ets_db_query($qry);
	
	$qry = "Delete from album where album_type_id = '".$_GET['type_id']."'";
	$res = ets_db_query($qry);
	
	$delsql = "Delete from album_type where type_id= '".$_GET['type_id']."'";
	$delqry = ets_db_query($delsql) or die(ets_db_error().$delsql);
	delSeoLnk($_GET['type_id'],"gallery");
	
	
	
	return true;
	}
	function listData()
	{
	?>
	<script>
	$(document).ready(function() {
		var listURL = 'helperfunc/albumtypeList.php';
		$('#albumtypelist').dataTable({
			"ajax" : listURL
		});
		$('.esorder').editable({params:{"tblName":"album_type"}});
		$('.estatus').editable({
			params:{"tblName":"album_type"},
			value: 1,
			source: [{value: 'E', text: 'Active'},{value: 'D', text: 'Disabled'}]
		});
	});
	</script>
	<?php
		$subvar = 'onclick="return confirmSubmit();"';	
		$queryString =  ets_db_query("SELECT * from album_type order by sortorder");	
		echo '<table cellpadding="1" cellspacing="2" border="0" class="table table-striped table-bordered dataTable" id="albumtypelist" width="100%">
		<thead>
		<tr>
			<th align="left">ID</th>
			<th align="left">Title</th>
			<th align="left">Status</th>
			<th align="left">Sort-Order</th>
			<th>Action</th>
		</tr>
		</thead>
		<tbody>';
		
		
		echo '</tbody>	
			<tfoot>
			<tr>
				<th>Id</th>
				<th>Title</th>
				<th>Status</th>
				<th align="left">Sort-Order</th>
				<th>Action</th>
			</tr>
		</tfoot>
		 </table>';		
	}	
}
?>