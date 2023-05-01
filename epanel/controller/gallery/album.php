<script>
$(document).ready(function(){
	          $('input').on('blur', function() {
					$("#albumFrm").attr("novalidate");
					$("#albumFrm").validate();
				if ($("#albumFrm").valid()) {
					$('input[type=submit]').prop('disabled', false);  
				} else {
					$('input[type=submit]').prop('disabled', 'disabled');
				}
			  });
});
</script>
<?php
include WS_PFBC_ROOT."Form.php";
class album
{
	function addForm()
	{    
		$form = new Form("addFrm");
		$form->configure(array(
			"prevent" => array("bootstrap","jQuery"),
			"view" => new View_SideBySide,
			"id" => "albumFrm"
			
		));
		$status = array("E" => "Enabled", "D" => "Disabled");
		$album_type = get_albumtype_list();
		$form->addElement(new Element_HTML("<legend>Add New Album</legend>"));
		$form->addElement(new Element_Hidden("controller", "gallery"));
		$form->addElement(new Element_Hidden("action", "album"));
		$form->addElement(new Element_Hidden("subaction", "add"));
		$form->addElement(new Element_Hidden("createdate"));
		$form->addElement(new Element_Hidden("username"));
		$form->addElement(new Element_Select("Album Type:", "album_type", $album_type, array(
			"required" => 1, 
			"placeholder" => "Status"
			)));
		$form->addElement(new Element_Textbox("Album Title:", "a_title", array(
			"required" => 1, 
			"placeholder" => "Title"
			)));
		/*$form->addElement(new Element_Textarea("Description:", "a_description", array(
			"required" => 1, 
			"placeholder" => "Description"
			)));*/
		$form->addElement(new Element_HTML('<label class="control-label">Last Sort Order : '.get_last_sortorder('album').'</label><br><br>'));						
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
	
	function editForm()
	{		
	    $sql = "select * from album where a_id = '".$_REQUEST['a_id']."'";
		$qry = ets_db_query($sql) or die(ets_db_error().$sql);
		if(ets_db_num_rows($qry) > 0){
			$rs=ets_db_fetch_array($qry);
			$form = new Form("editFrm");
			$form->configure(array(
			"prevent" => array("bootstrap","jQuery"),
			"view" => new View_SideBySide,
			"id" => "albumFrm"
			));
			
			$form->addElement(new Element_HTML("<legend>Edit Album</legend>"));
			$form->addElement(new Element_Hidden("controller", "gallery"));
			$form->addElement(new Element_Hidden("action", "album"));
			$form->addElement(new Element_Hidden("subaction", "edit"));
			$form->addElement(new Element_Hidden("a_id", $_REQUEST['a_id']));
			
			$status = array("E" => "Enabled", "D" => "Disabled");
			$album_type = get_albumtype_list();
			$form->addElement(new Element_Select("Album Type:", "album_type", $album_type, array(
			"required" => 1, 
			"placeholder" => "Status"
			)));
			$form->addElement(new Element_Textbox("Album Title:", "a_title", array(
			"value"=> $rs['a_title'],
			"required" => 1, 
			"placeholder" => "Title"
			)));			
			/*$form->addElement(new Element_Textarea("Description:", "a_description", array(
			"value"=> $rs['a_description'],
			"required" => 1, 
			"placeholder" => "Description"
			)));*/
			$form->addElement(new Element_HTML('<label class="control-label">Last Sort Order : '.get_last_sortorder('album').'</label><br><br>'));					
			$form->addElement(new Element_Textbox("Sortorder:", "sortorder", array(	
			"value"=> $rs['sortorder'],
			"required" => 1
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
			echo "No Package Found...";
		}
		
	}
	function add()
	{   
		$username=$_SESSION['username'];
		$createdate = date("Y-m-d");
		$album_slug = pro_SeoSlug(stripslashes($_POST['a_title']));
		$sql = "Insert into album set 
		a_title = '".$_POST['a_title']."',
		album_type_id = '".$_POST['album_type']."',
		a_description = '".$_POST['a_description']."',	
		username = '".$username."',
		createdate = now(),
		sortorder = '".ets_db_real_escape_string($_POST['sortorder'])."',
		status = '".$_POST['status']."',
		remote_ip ='".$_SERVER['REMOTE_ADDR']."'	
		";
		$insql = ets_db_query($sql) or die(ets_db_error() . "<br>" . $sql );
		$album_id = ets_db_insert_id();
		$path = DIR_FS_GALLERY_PATH.$album_id.'/';
		if(!file_exists($path))	{
			mkdir($path);
			//exec("chown ".FILEUSER.FILEUSER." ".$path);
			//exec("chmod 0777 ".$path);
		}
		insSeoLnk($album_id,"gallery",$album_slug);
		return true;
	}
	function edit()
	{  
		$username=$_SESSION['username'];
		$album_slug = pro_SeoSlug(stripslashes($_POST['a_title']));
		echo $updqry = "update album set 
		a_title = '".$_POST['a_title']."',
		album_type_id = '".$_POST['album_type']."',
		a_description = '".$_POST['a_description']."',	
		username = '".$username."',
		modifieddate = now(),
		sortorder = '".ets_db_real_escape_string($_POST['sortorder'])."',
		status = '".$_POST['status']."',
		remote_ip ='".$_SERVER['REMOTE_ADDR']."'
		where a_id ='" .$_POST['a_id'] ."'";
		if(ets_db_query($updqry)){
			updSeoLnk($_POST['a_id'],"gallery",$album_slug);
			$album_id = $_POST['a_id'];
			$path = DIR_FS_GALLERY_PATH.$album_id.'/';
			if(!file_exists($path))	{
				mkdir($path);
				exec("chown ".FILEUSER.FILEUSER." ".$path);
				exec("chmod 0777 ".$path);
			}
			
		}else{
			die(ets_db_error() . "<br>" . $updqry);
			
		}
		return true;
	}
	function delete()
	{	
		$sqlAtype = ets_db_query("select * from album where a_id =  '".$_GET['a_id']."'") or die(ets_db_error());
		$albumarr = ets_db_fetch_array($sqlAtype);
		$seo_mod = str_replace(" ","-",getalbumtypeName($albumarr['album_type_id']));
		
		delSeoLnk($_GET['a_id'],'gallery');
		$delsql = "Delete from album where a_id= '".$_GET['a_id']."'";
		$delqry = ets_db_query($delsql) or die(ets_db_error().$delsql);
		
		delete_folder(DIR_FS_GALLERY_PATH.$_GET['a_id']);
		
		$qry = "Delete from gallery_master where a_id = '".$_GET['a_id']."'";
		$res = ets_db_query($qry);
		
		return true;
	}
	function listData()
	{  
	?>
<script>
	$(document).ready(function() {
	var listURL = 'helperfunc/albumList.php';
	$('#albumlist').dataTable({
		
	 "ajax" : listURL
		
	});	
    
    	$('.esorder').editable({params:{"tblName":"album"}});
		$('.estatus').editable({
			params:{"tblName":"album"},
			value: 1,
			source: [{value: 'E', text: 'Active'},{value: 'D', text: 'Disabled'}]
		});
	});
</script>	
<?php
	
		echo '<table cellpadding="1" cellspacing="2" border="0" class="table table-striped table-bordered dataTable" id="albumlist" width="100%">
		<thead>
		<tr>
		
			<th align="left">ID</th>
			<th align="left">Title</th>
			<th align="left">Status</th>
			<th align="left">Sort Order</th>
			<th>Action</th>
		</tr>
		</thead>
		<tbody>';

		echo '</tbody>	
			<tfoot>
			<tr>
				<th align="left">ID</th>	
				<th align="left">Title</th>
				<th align="left">Status</th>
				<th align="left">Sort Order</th>
				<th>Action</th>
			</tr>
		</tfoot>
		 </table>';		
			
	}	
}
?>
