<script>
$(document).ready(function(){
			  flag = 0;
	          $('input').on('blur', function() {      
				if ($("#ptypeFrm").valid() && flag == 0) {
					$('input[type=submit]').prop('disabled', false);  
				} else {
					$('input[type=submit]').prop('disabled', 'disabled');
				}
			  });
			  
			  $('input[type=file]').bind('change', function() {

				  //this.files[0].size gets the size of your file.
				  var iSize = ($("input[type=file]")[0].files[0].size / 1024); 
					iSize = (Math.round(iSize * 100) / 100)
				  var max = '<?php echo (int)ini_get('upload_max_filesize'); ?>' * 1024;	
				  if(iSize > max)
				  {
					  $('input[type=submit]').prop('disabled', 'disabled');
					  flag = 1;
					  alert('Maximum file upload size is : '+'<?php echo (int)ini_get('upload_max_filesize'); ?>'+' MB');
				  }
					  
				  else
				  {
					 $('input[type=submit]').prop('disabled', false); 
					 flag = 0;
				  }
					 

				});

});
</script>
<script> 
$(document).ready(function(){
    $('#mainpages').select2({
		placeholder: "Select a Main Page"
	});
});
</script>
<?php
include WS_PFBC_ROOT."Form.php";
class benefit
{
	function addForm()
	{
		$form = new Form("addFrm");
		$form->configure(array(
			"prevent" => array("bootstrap","jQuery"),
			"view" => new View_SideBySide,
			"id" => "ptypeFrm"
		));
		$status = array("E" => "Enabled", "D" => "Disabled");
		$proj_type = array("Y" => "Yes", "N" => "No");
		
		$form->addElement(new Element_HTML("<legend>New Benefit</legend>"));
		$form->addElement(new Element_Hidden("controller", "benefit"));
		$form->addElement(new Element_Hidden("action", "benefit"));
		$form->addElement(new Element_Hidden("subaction", "add"));
		$form->addElement(new Element_Hidden("createdate"));
		$form->addElement(new Element_Hidden("sortorder","1"));
		$form->addElement(new Element_Hidden("status","E"));
		/* Actual Form Fields Started */
		
		
		$form->addElement(new Element_Textbox("Benefit Name:", "benefit_title", array(
				"required" => 1,
				"placeholder" => "Benefit Name"
        )));
		
		$form->addElement(new Element_TinyMCE("Short Description:", "short_desc", array(
				"required" => 1,
				"placeholder" => "Short Description"
        )));
        
        $form->addElement(new Element_TinyMCE("Detail Description:", "detail_desc", array(
				"required" => 1,
				"placeholder" => "Detail Description"
        )));
        
        $form->addElement(new Element_File("Benefit Image:  <br>(360 × 389 pixels)", "home_image", array(
				"placeholder" => "Benefit Image"
        )));
        
        $form->addElement(new Element_File("Benefit Detail Image: <br>(2000 × 900 pixels)", "detail_image", array(
				"placeholder" => "Benefit Detail Image"
        )));
        					
		$form->addElement(new Element_Textbox("Sortorder:", "sortorder", array(
			"required" => 1,
			"placeholder" => "Sortorder"	
        )));
        
        $form->addElement(new Element_HTML('<div><label class="control-label" style="width:100%;text-align:left;">Note : Benefits will be displayed in website in the ascending order of sort order </label><br><br></div>'));
        
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
		$username = $_SESSION['fname'];
		$benefitslug = pro_SeoSlug(stripslashes($_POST['benefit_title']));
		$sql = "Insert into benefit set 
		username = '".$username."',
		createdate = now(),
		benefit_title = '".ets_db_real_escape_string($_POST['benefit_title'])."',
		short_desc = '".ets_db_real_escape_string($_POST['short_desc'])."',
		detail_desc = '".ets_db_real_escape_string($_POST['detail_desc'])."',
		sortorder = '".$_POST['sortorder']."',
		status = '".$_POST['status']."',
		remote_ip ='".$_SERVER['REMOTE_ADDR']."'
		";
		if(ets_db_query($sql)){
			$benefitID = ets_db_insert_id();
			
			$path = DIR_FS_BENEFIT_PATH.$benefitID.'/';
			
			if(!file_exists($path))
            {
					mkdir($path);
					exec("chown ".FILEUSER.FILEUSER." ".$path);
					exec("chmod 0777 ".$path);	
            }
            
            if(!empty($_FILES["home_image"]["name"])){
                $home_image = $benefitID.'-'.$_FILES["home_image"]["name"];
                 $targeth_path = DIR_FS_BENEFIT_PATH.$benefitID.'/'.$benefitID.'-'.$_FILES["home_image"]["name"]; 
				
				 if(move_uploaded_file($_FILES["home_image"]["tmp_name"],$targeth_path)){
                     
                 }else{
                    $home_image = ''; 
                 }
            }else{
                $home_image = '';
            }
            
            if(!empty($_FILES["detail_image"]["name"])){
                $detail_image = $benefitID.'-'.$_FILES["detail_image"]["name"];
				
				$targeth_path = DIR_FS_BENEFIT_PATH.$benefitID.'/'.$benefitID.'-'.$_FILES["detail_image"]["name"]; 
				
				
                if(move_uploaded_file($_FILES["detail_image"]["tmp_name"],$targeth_path)){
              
                }else{
                   $detail_image = ''; 
                }
            }else{
                $detail_image = '';
            }
			$updqry = "Update benefit set home_image = '".$home_image."' , detail_image = '".$detail_image."'
			where benefitID = '".$benefitID."'";
			$updres = ets_db_query($updqry) or die(ets_db_error());
			
		    $seoBase = "benefit";
            
			insSeoLnk($benefitID,$seoBase,$benefitslug);
            
			return true;
		}else{
            
			die(ets_db_error());
			echo "Error in Inserting Benefit..";
		}
		
		return true;
	}
	function editForm()
	{		
		$sql = "select * from  benefit where benefitID ='".$_REQUEST['benefitID']."'";
		$qry = ets_db_query($sql) or die(ets_db_error().$sql);
		if(ets_db_num_rows($qry) > 0){
			$rs=ets_db_fetch_array($qry);
			$form = new Form("html5");
			$form->configure(array(
				"prevent" => array("bootstrap","jQuery"),
				"view" => new View_SideBySide,
				"id" => "ptypeFrm"
			));
			$status = array("E" => "Enabled", "D" => "Disabled");
			
			$form->addElement(new Element_HTML("<legend>Edit Benefit</legend>"));
			$form->addElement(new Element_Hidden("controller", "benefit"));
			$form->addElement(new Element_Hidden("action", "benefit"));
			$form->addElement(new Element_Hidden("subaction", "edit"));
			$form->addElement(new Element_Hidden("benefitID", $_REQUEST['benefitID']));
            $form->addElement(new Element_Hidden("Oldhomeimage",$rs["home_image"]));
            $form->addElement(new Element_Hidden("Olddetailimage",$rs["detail_image"]));
			
			/* Actual Form Fields Started */
            $form->addElement(new Element_Textbox("Benefit Name:", "benefit_title", array(
				"required" => 1,
				"placeholder" => "Benefit Name",
                "value" => stripslashes($rs['benefit_title'])
            )));
            
			$form->addElement(new Element_TinyMCE("Short Description:", "short_desc", array(
				"required" => 1,
				"placeholder" => "Short Description",
                "value" => stripslashes($rs['short_desc'])
            )));

            $form->addElement(new Element_TinyMCE("Detail Description:", "detail_desc", array(
                "required" => 1,
                "placeholder" => "Detail Description",
                "value" => stripslashes($rs['detail_desc'])
            )));
            
            if($rs["home_image"] != ""){
				$home_image_path = DIR_WS_BENEFIT_PATH.$_REQUEST['benefitID'].'/'.$rs["home_image"];
				$form->addElement(new Element_HTML('<img src="'.$home_image_path.'" width="100px" height="100px" />'));
			}

             $form->addElement(new Element_File("Benefit Image: <br>(360 × 389 pixels)", "home_image", array(
                    "placeholder" => "Home Image"
            )));
            
            if($rs["detail_image"] != ""){
				$detail_image_path = DIR_WS_BENEFIT_PATH.$_REQUEST['benefitID'].'/'.$rs["detail_image"];
				$form->addElement(new Element_HTML('<img src="'.$detail_image_path.'" width="100px" height="100px" />'));
			}

            $form->addElement(new Element_File("Benefit Detail Image: <br>(2000 × 900 pixels)", "detail_image", array(
                    "placeholder" => "Benefit Detail Image"
            )));

            $form->addElement(new Element_Textbox("Sortorder:", "sortorder", array(
                "required" => 1,
                "placeholder" => "Sortorder",
                 "value" => stripslashes($rs['sortorder'])
            )));	
            
            $form->addElement(new Element_HTML('<div><label class="control-label" style="width:100%;text-align:left;">Note : Benefits will be displayed in website in the ascending order of sort order </label><br><br></div>'));
        
			
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
			echo "Not Found...";
		}
		
	}
	function edit()
	{
	    	$username=$_SESSION['username'];
	    	$modifieddate = date("Y-m-d");
			
            if($_FILES['home_image']['name']==''){
				$hfilename = $_POST['Oldhomeimage'];
			}else{
				$hfilename = $_POST['benefitID'].'-'.$_FILES['home_image']['name'];
			}
        
            if($_FILES['detail_image']['name']==''){
				$dfilename = $_POST['Olddetailimage'];
			}else{
				$dfilename = $_POST['benefitID'].'-'.$_FILES['detail_image']['name'];
			}
        
	    	 $pTypeslug = pro_SeoSlug(stripslashes($_POST['benefit_title']));
        
		      $sql = "update benefit set 
                username = '".$username."',
                benefit_title = '".ets_db_real_escape_string($_POST['benefit_title'])."',
                short_desc = '".ets_db_real_escape_string($_POST['short_desc'])."',
                detail_desc = '".ets_db_real_escape_string($_POST['detail_desc'])."',
                sortorder ='".$_POST['sortorder']."',
                status = '".$_POST['status']."',
                home_image = '".$hfilename."',
                detail_image = '".$dfilename."',
			    remote_ip ='".$_SERVER['REMOTE_ADDR']."'
			    where benefitID = '".$_POST['benefitID']."'";
        
		    if(ets_db_query($sql)){
                $benefitID = $_POST['benefitID'];
                $path = DIR_FS_BENEFIT_PATH.$_POST['benefitID'].'/';

                if(!file_exists($path))
                {
                        mkdir($path);
                        exec("chown ".FILEUSER.FILEUSER." ".$path);
                        exec("chmod 0777 ".$path);
                }

                
                
                if($_FILES['home_image']['name']!=''){
                    $htarget_path = DIR_FS_BENEFIT_PATH.$_POST['benefitID'].'/'.$_POST['benefitID'].'-'.$_FILES["home_image"]["name"]; 
                    move_uploaded_file($_FILES["home_image"]["tmp_name"],$htarget_path);
                }
                
                if($_FILES['detail_image']['name']!=''){
                    $dtarget_path = DIR_FS_BENEFIT_PATH.$_POST['benefitID'].'/'.$_POST['benefitID'].'-'.$_FILES["detail_image"]["name"]; 
                    move_uploaded_file($_FILES["detail_image"]["tmp_name"],$dtarget_path);
                }

                $seoBase = "benefit";

                updSeoLnk($benefitID,$seoBase,$pTypeslug);

                return true;
			
		}else{
			echo "Error in updating project type..";
		}
	}	
	function listData(){
?>
	<script>
	$(document).ready(function() {
		var listURL = 'helperfunc/benefitList.php';
		$('#benefitlist').dataTable({
			"ajax": listURL
		});
		
		$('.esortorder').editable({params:{"tblName":"benefit"}});
	});
	</script>
<?php
	$subvar = 'onclick="return confirmSubmit();"';
	echo '<div id="no-more-tables">
	<table cellpadding="1" cellspacing="2" border="0" class="table table-striped table-bordered dataTable" id="benefitlist" width="100%">
		<thead>
		<tr>
			<th width="5%">Id</th>
			<th width="25%">Benefit Name</th>
			<th width="10%">Status</th>
			<th width="10%">Sort-Order</th>
			<th width="25%">Action</th>
		</tr>
		</thead>
		<tbody></tbody>	
		<tfoot>	
		<tr>
			<th>Id</th>
			<th width="25%">Benefit Name</th>
			<th>Status</th>
			<th>Sort-Order</th>
			<th>Action</th>
		</tr>
		</tfoot>
	</table></div>';	
?>
<script>
	$('.table').editable({
		selector: 'a.estatus,a.esortorder',
		params:{"tblName":"benefit"},
		value: 1,
		source: [{value: 'E', text: 'Active'},{value: 'D', text: 'Disabled'}]
	});
</script>
<?php	
	}
	function delete()
	{
		$sql = "Select * from benefit where benefitID = '".$_GET['benefitID']."'";
		$res = ets_db_query($sql) or die(ets_db_error());
		
        $arr = ets_db_fetch_array($res);
        
        $path = DIR_FS_BENEFIT_PATH.$_GET['benefitID'];
        delete_folder($path);
		
		$delsql = "Delete from benefit where benefitID = '".$_GET['benefitID']."'";
		$delqry = ets_db_query($delsql) or die(ets_db_error().$delsql);
		
		delSeoLnk($_GET['benefitID'],"benefit");
		
		return true;		
	}	
}
?>
