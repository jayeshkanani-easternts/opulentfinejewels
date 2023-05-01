<script>
$(document).ready(function(){
	          $('input').on('blur', function() {      
				if ($("#pageFrm").valid()) {
					$('input[type=submit]').prop('disabled', false);  
				} else {
					$('input[type=submit]').prop('disabled', 'disabled');
				}
			  });
});
</script>
<script type="text/JavaScript" src="js/ajax.js"></script>
<script> 
$(document).ready(function(){
    $('#mainpages').select2({
		placeholder: "Select a Main Page"
	});
});
function update_seo_slug(){
  var pagename = $('input[name="page_title"]').val();
  if(pagename != ""){
	url = "includes/get_page_slug.php?pagename="+pagename
	callAjax("page_slug_div",url);
 }else{
	document.getElementById('page_slug_div').innerHTML = "Please Enter Page Title";
}
}
function listpages(parentID){
	location.href='index.php?controller=pages&action=pages&subaction=listpage&parent='+parentID;
}
</script>
<?php 
include WS_PFBC_ROOT."Form.php";

class pages{
	//Create Page BOF
	function addForm(){
		$form = new Form("frmadd");
		$form->configure(array(
			"prevent" => array("bootstrap","jQuery"),
			"view" => new View_SideBySide,
			"id" => "pageFrm"
		));
			$query = 'select page_id, page_title, parent_id from page_master ORDER BY page_id'; 
			$result = ets_db_query($query); 
			$menu_array = array(); 
			while($row=ets_db_fetch_array($result)){ 
				$menu_array[$row['page_id']] = $row; 
			}
			$parentid = $pgrs['parent_id'];

		$pages = '<select name="mainpages" id="mainpages"><option value="0">Main Page</option>'.display_menu_items($menu_array).'</select>';
		$templates = fill_template_array($template);
		
		$form->addElement(new Element_HTML("<legend>Create Page</legend>"));
		$form->addElement(new Element_Hidden("controller", "pages"));
		$form->addElement(new Element_Hidden("action", "pages"));
		$form->addElement(new Element_Hidden("subaction", "add"));
		$form->addElement(new Element_Hidden("page_content","Page under construction"));
		$form->addElement(new Element_Hidden("meta_title",""));
		$form->addElement(new Element_Hidden("meta_desc",""));
		$form->addElement(new Element_Hidden("meta_keyword",""));
		$form->addElement(new Element_Hidden("status","E"));
		
		/* Actual Form Fields Started */
		$form->addElement(new Element_Textbox("Page Title:", "page_title", array(
			"required" => 1,
			"onkeyup" => "update_seo_slug();"
		)));
		$form->addElement(new Element_HTML('
			<div class="control-group"><label class="control-label" for="frmedit-element-5">Page Slug:</label><div class="controls"><span id="page_slug_div"><input type="text" name="seo_slug" id="seo_slug" value="" class="select" /></span></div></div>
		'));
		
		$form->addElement(new Element_HTML('
			<div class="control-group"><label class="control-label" for="frmedit-element-5">Page Parent:</label><div class="controls">'.$pages.'</div></div>
		'));
		$form->addElement(new Element_Select("Page Template:", "page_template", $templates, array(
			"required" => 1
		)));
		$form->addElement(new Element_HTML('<label class="control-label">Last Sort Order : '.get_last_sortorder('page_master').'</label><br><br>'));
		$form->addElement(new Element_Textbox("Sort Order:", "sortorder", array(
			"required" => 1
		)));
		
		$form->addElement(new Element_HTML('<hr>'));
		$form->addElement(new Element_Button);
		$form->addElement(new Element_Button("Cancel", "button", array(
			"onclick" => "history.go(-1);"
		)));
		$form->render();
	}
	function add(){
		$pg_title = addslashes($_POST['meta_title']);
		$pgkeyword = addslashes($_POST['meta_keyword']);
		$pg_desc = addslashes($_POST['meta_desc']);
		$page_slug = $_POST['seo_slug'];
		$insertSql = "insert into page_master set 
		page_title = '".ets_db_real_escape_string($_POST['page_title'])."',
		page_slug='".$page_slug."',
		user_id='".$_SESSION['login']."',
		createdate=now(),
		remote_ip='".$_SERVER['REMOTE_ADDR']."',
		meta_title = '".$pg_title."', 
		page_content = '".addslashes($_POST['page_content'])."',
		meta_keyword = '".$pgkeyword."',
		meta_desc = '".$pg_desc."',
		parent_id = '".$_POST['mainpages']."',
		sortorder = '".$_POST['sortorder']."',
		status = '".$_POST['status']."',
		page_template = '".$_POST['page_template']."' ";
		$insertQry = ets_db_query($insertSql) or die(ets_db_error().$insertSql);
		$page_id = ets_db_insert_id();
		insSeoLnk($page_id,"pages",$page_slug);
		return true;
		
	}
	//Create Page EOF
	//Edit Page BOF
	function editForm(){
		$sql = "select * from page_master where page_id = '".$_REQUEST['page_id']."'";
		$qry = ets_db_query($sql) or die(ets_db_error().$sql);
		if(ets_db_num_rows($qry) > 0){
			$rs=ets_db_fetch_array($qry);
			$form = new Form("frmedit");
			$form->configure(array(
				"prevent" => array("bootstrap","jQuery"),
				"view" => new View_SideBySide,
				"id" => "pageFrm"
			));
				$query = 'select page_id, page_title, parent_id from page_master ORDER BY page_id'; 
				$result = ets_db_query($query); 
				$menu_array = array(); 
				while($row=ets_db_fetch_array($result)){ 
					$menu_array[$row['page_id']] = $row; 
				}
				$parentid = $rs['parent_id'];
			
			$template = $rs['page_template'];
			$pgTitle = stripslashes($rs['meta_title']);
			$pgKeyword = stripslashes($rs['meta_keyword']);
			$pgDescr = stripslashes($rs['meta_desc']);
			
			$status = array("E" => "Enabled", "D" => "Disabled");
			$pages = '<select name="mainpages" id="mainpages" class="col-sm-3"><option value="0">Main Page</option>'.display_menu_items($menu_array,$rs['parent_id']).'</select>';
			$templates = fill_template_array($template);
			
			$form->addElement(new Element_HTML("<legend>Edit Page <b>".$rs['page_title']."</b></legend>"));
			$form->addElement(new Element_Hidden("controller", "pages"));
			$form->addElement(new Element_Hidden("action", "pages"));
			$form->addElement(new Element_Hidden("subaction", "edit"));
			$form->addElement(new Element_Hidden("page_id", $_REQUEST['page_id']));
			
			/* Actual Form Fields Started */
			$form->addElement(new Element_Textbox("Page Title:", "page_title", array(
				"value"=> $rs['page_title'],
				"required" => 1,
				"onkeyup" => "update_seo_slug();"
			)));
			$form->addElement(new Element_HTML('
				<div class="control-group"><label class="control-label" for="frmedit-element-5">Page Slug:</label><div class="controls"><span id="page_slug_div"><input type="text" name="seo_slug" id="seo_slug" value="'.$rs['page_slug'].'" class="select" readonly/></span></div></div>
			'));
			$form->addElement(new Element_Select("Page Status:", "status", $status, array(
				"value"=> $rs['status'],
				"required" => 1
			)));
			$form->addElement(new Element_HTML('
				<div class="control-group"><label class="control-label" for="frmedit-element-5">Page Parent:</label><div class="controls">'.$pages.'</div></div>
			'));
			
			
			$form->addElement(new Element_Select("Page Template:", "page_template", $templates, array(
				"value"=> $rs['page_template']
			)));
			$form->addElement(new Element_TinyMCE("Page Content:", "page_content", array("value"=> stripslashes($rs['page_content']))
			));
			$form->addElement(new Element_Textbox("Meta Title:", "meta_title", array(
				"value"=> stripslashes($rs['meta_keyword']),
				"class" => "input-xxlarge"
				)
			));
			$form->addElement(new Element_Textbox("Meta Keyword:", "meta_keyword", array(
				"value"=> stripslashes($rs['meta_keyword']),
				"class" => "input-xxlarge"
			)
			));
			$form->addElement(new Element_Textbox("Meta Description:", "meta_desc", array(
				"value"=> stripslashes($rs['meta_keyword']),
				"class" => "input-xxlarge"
			)));
			$form->addElement(new Element_HTML('<label class="control-label">Last Sort Order : '.get_last_sortorder('page_master').'</label><br><br>'));
			$form->addElement(new Element_Textbox("Sortorder:", "sortorder", array(
				"value"=> stripslashes($rs['sortorder'])
			)));
			$form->addElement(new Element_HTML('<hr>'));
			$form->addElement(new Element_Button);
			$form->addElement(new Element_Button("Cancel", "button", array(
				"onclick" => "location.href = 'index.php?controller=pages&action=pages&subaction=listData';"
			)));
			$form->render();
		}else{
			echo "No Page Found...";
		}
	}
	function edit(){		
		$pg_title = addslashes($_POST['meta_title']);
		$pgkeyword = addslashes($_POST['meta_keyword']);
		$pg_desc = addslashes($_POST['meta_desc']);
		$page_slug = $_POST['seo_slug'];
		$qry = "update page_master set 
		page_title = '".ets_db_real_escape_string($_POST['page_title'])."',
		page_slug='".$page_slug."',
		user_id='".$_SESSION['login']."',
		modifieddate=now(),
		remote_ip='".$_SERVER['REMOTE_ADDR']."',
		meta_title = '".$pg_title."', 
		page_content = '".addslashes($_POST['page_content'])."',
		meta_keyword = '".$pgkeyword."',
		meta_desc = '".$pg_desc."',
		parent_id = '".$_POST['mainpages']."',
		sortorder = '".$_POST['sortorder']."',
		status = '".$_POST['status']."',
		page_template = '".$_POST['page_template']."' 
		where page_id = '".$_POST['page_id']."'";
		if(ets_db_query($qry)){
			updSeoLnk($_POST['page_id'],"pages",$page_slug);
			return true;
		}else{
			echo ets_db_error().$qry;
			return false;
		}
	}
	//Edit Page EOF
	//List Page BOF
	function listData(){
?>
<script>
$(document).ready(function() {
	var listURL = "helperfunc/pageList.php";
	$('#listpage').dataTable( {
        "ajax": listURL
    } );
	
	/*$('#listpage').dataTable({
		"sDom": "<'row-fluid'<'span8'l><'span4'f>r>t<'row-fluid'<'span8'i><'span4'p>>",
		"sPaginationType": "bootstrap",
		"iDisplayLength" : 100,
		"oLanguage": {"sLengthMenu": "_MENU_ records per page"} 
	});*/
	$('.esortorder').editable({params:{"tblName":"page_master"}});

});
</script>
<?php
		$mang = '';
		$mang.='
		<div id="no-more-tables">
		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered dataTable" id="listpage" width="100%">
			<thead>
				<tr>
					<th>Parent Page</th>
					<th>Name</th>
					<th>Status</th>
					<th>Order</th>
					<th>Page Action</th>
					<th>Preview</th>
				</tr>
			</thead>
		<tbody>';
		
		$mang.= '
			</tbody>
			<tfoot class="hidden-xs">
				<tr>
					<th>Page Id</th>
					<th>Parent Page</th>
					<th>Page Name</th>
					<th>Page Status</th>
					<th>Page Action</th>
					<th>Preview</th>
				</tr>
			</tfoot>
		  </table>
		  </div>
		';
		echo $mang;
?>
<script>
	$('.table').editable({
		selector: 'a.estatus,a.esortorder',
		params:{"tblName":"page_master"},
		value: 1,
		source: [{value: 'D', text: 'Draft'},{value: 'P', text: 'Published'}]
	});
</script>
<?php
	}
	//List Page EOF
	//Delete Page BOF
	function delete(){
		$pageID = $_REQUEST['id'];
		$del_qry = ets_db_query("delete from page_master where page_id = '".$pageID."'") or die("Delete page query fail ".ets_db_error());
		$del_seo_qry = ets_db_query("delete from seo_link_master where module_id = '".$pageID."' and module_name = 'pages'") or die("Delete page query fail ".ets_db_error());
		$qrypage = ets_db_query("select * from page_master where parent_id = '".$pageID."'") or die(ets_db_error());
		while($res = ets_db_fetch_array($qrypage)){
			$updsql = ets_db_query("update page_master set parent_id = 0 where page_id = '".$res['page_id']."'");
		}
		$path = DIR_FS_PAGE_IMAGE_PATH;
		$mask = $path.$pageID.'-*.*';
		array_map('unlink', glob($mask));
		return true;
	}
	//Delete Page EOF
}
?>