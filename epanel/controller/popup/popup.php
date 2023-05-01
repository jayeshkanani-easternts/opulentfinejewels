<script>
    $(document).ready(function(){
        
        var c = $('#type').val();
       
            if(c == 'V')
            {
                $('#image').hide();
                $('#image_div').hide();
                $('#url').show();
            }
            else
            {
                $('#image').show();
                $('#image_div').show();
                $('#url').hide();
            }
        $('#type').change(function(){
            var c = $(this).val();
            if(c == 'V')
            {
                $('#image').hide();
                $('#image_div').hide();
                $('#url').show();
            }
            else
            {
                $('#image').show();
                $('#image_div').show();
                $('#url').hide();
            }
        }); 
    });

</script>
<link href="css/select2.css" rel="stylesheet"/>
<script src="js/select2.js"></script>
<script>
    $(document).ready(function() { $("#image_sel").select2(); });
</script>
<?php
include WS_PFBC_ROOT."Form.php";
class popup
{
	function addForm()
	{
		$eqry = "Select * from content_master where type = 'popup'";
		$eres = ets_db_query($eqry);
		$arr = ets_db_fetch_array($eres);
		$earr = unserialize($arr['description']);
        
        $form = new Form("addFrm");
		$form->configure(array(
			"prevent" => array("bootstrap","jQuery"),
			"view" => new View_SideBySide,
			"id" => "websiteFrm"
		));
		
		
		
		$type = array("V" => "Video", "I" => "Image");
		$status = array("E" => "Enabled", "D" => "Disabled");
        $form->addElement(new Element_HTML("<legend>Home Page Popup</legend>"));
		$form->addElement(new Element_Hidden("controller", "popup"));
		$form->addElement(new Element_Hidden("action", "popup"));
		$form->addElement(new Element_Hidden("subaction", "add"));
		$form->addElement(new Element_Hidden("old_image", $earr['image']));
		
		/* Actual Form Fields Started */
        $form->addElement(new Element_Select("Type:", "type",$type, array(
			"placeholder" => "Type",
            "id" => "type",
			"value" => $earr['type']
			)));
        
        $form->addElement(new Element_HTML('<div id = "image">'));
        
        $sel_qry = "Select * from gallery_master";
        $sel_res = ets_db_query($sel_qry) or die(ets_db_error());
        
        $gallery_arr = array();
        while($gal_arr = ets_db_fetch_array($sel_res))
        {
            $image = DIR_WS_GALLERY_PATH.$rs['a_id']."/".$gal_arr['gallery_image'];
            $title = $gal_arr['image_title'];
            $gallery_id = $gal_arr['image_id'];
            $gallery_arr[$gallery_id] = $gal_arr['image_id'].'. '.$gal_arr['image_title'];
        }
        
        $form->addElement(new Element_Select("Image:", "image",$gallery_arr, array(
			"placeholder" => "Select Image",
            "id" => "image_sel",
			"value" => $arr['image_id']
        )));
        
        
        $form->addElement(new Element_HTML('</div>'));
		$form->addElement(new Element_HTML('<div id = "image_div">'));
		$form->addElement(new Element_Textbox("Caption:", "caption", array(
			"placeholder" => "Caption",
            "id" => "caption",
			"value" => $earr['caption']
			)));
        $form->addElement(new Element_Textbox("Redirect URL:", "redirect_url", array(
			"placeholder" => "Redirect URL",
            "id" => "redirect_url",
			"value" => $earr['redirect_url']
			)));
        $form->addElement(new Element_Textarea("Description:", "description", array(
			"placeholder" => "Description",
            "id" => "description",
			"value" => $earr['description']
			)));
        $form->addElement(new Element_HTML('</div>'));
        $form->addElement(new Element_HTML('<div id = "url">')); 
        $form->addElement(new Element_Textarea("URL:", "url", array(
			"placeholder" => "URL",
			"value" => $earr['url']
			)));
		$form->addElement(new Element_HTML('</div>')); 	
        
        $form->addElement(new Element_Select("Status:", "status",$status, array(
			"placeholder" => "Select Image",
            "value" => $arr['status']
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
		$err = false;
        
        $selqry = 'select * from content_master where type = "popup"';
		$selres = ets_db_query($selqry);
		$selarr = ets_db_fetch_array($selres);
		$num = ets_db_num_rows($selres);
		
        $description =array();
        $description['type'] = $_POST['type'];
        $description['url'] = $_POST['url'];
        $description['caption'] = $_POST['caption'];
        $description['description'] = $_POST['description'];
        $description['redirect_url'] = $_POST['redirect_url'];
        
        $gal_sel = "Select * from gallery_master where image_id = '".$_POST['image']."'";
        $gal_res = ets_db_query($gal_sel) or die(ets_db_error());
        $gal_arr = ets_db_fetch_array($gal_res);
        $image = $gal_arr['a_id'].'/'.$gal_arr['gallery_image'];
        
		if($num > 0)
		{
			$sql = "Update content_master set
					description = '".ets_db_real_escape_string(serialize($description))."',
					username = '".$username."',
					remote_ip ='".$_SERVER['REMOTE_ADDR']."',
                    image_id = '".$_POST['image']."',
                    status = '".$_POST['status']."',
                    image = '".$image."',
					modifieddate = now()
					where type = 'popup'";
		}
		else
		{
			$sql = "Insert into content_master set
					description = '".ets_db_real_escape_string(serialize($description))."',
                    username = '".$username."',
					remote_ip ='".$_SERVER['REMOTE_ADDR']."',
					modifieddate = now(),
                    image_id = '".$_POST['image']."',
                    status = '".$_POST['status']."',
                    image = '".$image."',
                    type = 'popup',
					createdate = now()";
		}
		ets_db_query($sql) or die(ets_db_error());
        return true;
//        if(ets_db_query($sql))
//		{
//			$err = true;
//			$image = $_FILES['image']['name'];
//			if($image != "")
//			{
//				if($_POST['old_image'] != "")
//				{
//					@unlink(DIR_FS_LOGO_PATH.$_POST['old_image']);
//				}
//				if(move_uploaded_file($_FILES['image']['tmp_name'],DIR_FS_LOGO_PATH.$image))
//				{
//					$lqry = "Update content_master set 
//							image = '".$image."'
//							where type = 'popup'";
//					$lres = ets_db_query($lqry);
//					$err = true;
//				}
//				else
//				{
//					$err = false;
//					echo $_FILES['image']['error'];
//				}
//			}
//            
//			return $err;
//		}
//		else
//		{
//			die(ets_db_error());
//		}
		
	}
	
}
?>
