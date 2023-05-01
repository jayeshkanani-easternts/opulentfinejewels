<script>
    $(document).ready(function(){
        flag = 0;
        $('input').on('blur', function() {
            if ($("#sliderFrm").valid() && flag == 0) {
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
<?php
include WS_PFBC_ROOT."Form.php";
class banner
{
    function addForm()
    {
        $form = new Form("addFrm");
        $form->configure(array(
            "prevent" => array("bootstrap","jQuery"),
            "view" => new View_SideBySide,
            "id" => "sliderFrm"
        ));
        $status = array("E" => "Enabled", "D" => "Disabled");
        $position = array("H" => "Home Page", "I" => "Inner Pages");
        $form->addElement(new Element_HTML("<legend>New Banner</legend>"));
        $form->addElement(new Element_Hidden("controller", "banner"));
        $form->addElement(new Element_Hidden("action", "banner"));
        $form->addElement(new Element_Hidden("subaction", "add"));
        $form->addElement(new Element_Hidden("createdate"));
        $form->addElement(new Element_Hidden("username"));
        /* Actual Form Fields Started */
        $form->addElement(new Element_Textbox("Banner Title:", "bannerTitle", array(
            "placeholder" => "Title"
        )));
        $form->addElement(new Element_File("Banner Image: <br>(2000 × 550 pixels)", "image", array(
            "required" => 1,
            "placeholder" => "Photo"
        )));

        $form->addElement(new Element_File("Mobile Banner Image: <br>(1000 × 550 pixels)", "mobile_image", array(
            "required" => 1,
            "placeholder" => "Photo"
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
        $upload = $_FILES["image"]["name"];
        $mobile_upload = $_FILES["mobile_image"]["name"];
        $username=$_SESSION['username'];
        $target_path = $_FILES["image"]["name"];
        $sql = "Insert into banner_image set 
		bannerTitle = '".$_POST['bannerTitle']."',
		username = '".$username."',
		createdate= now(),
		remote_ip ='".$_SERVER['REMOTE_ADDR']."'
		";
        $qry = ets_db_query($sql) or die(ets_db_error().$sql);
        $id = ets_db_insert_id();

        if(move_uploaded_file($_FILES["image"]["tmp_name"],DIR_FS_BANNER_PATH.$id.'-'.$target_path)){

            move_uploaded_file($_FILES["mobile_image"]["tmp_name"],DIR_FS_BANNER_PATH.$id.'-'.$mobile_upload);

            $updqry = "update banner_image set 
			image = '".$id.'-'.$upload."',
			mobile_image = '".$id.'-'.$mobile_upload."'
			where bannerID = '".$id."'
			";
            $updres = ets_db_query($updqry) or die(ets_db_error());

            return true;
        }else{

            echo "Error in uploading Image..";
        }
    }
    function editForm()
    {
        $sql = "select * from banner_image where bannerID ='".$_REQUEST['bannerID']."'";
        $qry = ets_db_query($sql) or die(ets_db_error().$sql);
        if(ets_db_num_rows($qry) > 0){
            $rs=ets_db_fetch_array($qry);
            $form = new Form("frmEdit");
            $form->configure(array(
                "prevent" => array("bootstrap","jQuery"),
                "view" => new View_SideBySide,
                "id" => "sliderFrm"
            ));
            $status = array("E" => "Enabled", "D" => "Disabled");
            $position = array("H" => "Home Page", "I" => "Inner Pages");
            $form->addElement(new Element_HTML("<legend>Edit Banner</legend>"));
            $form->addElement(new Element_Hidden("controller", "banner"));
            $form->addElement(new Element_Hidden("action", "banner"));
            $form->addElement(new Element_Hidden("subaction", "edit"));
            $form->addElement(new Element_Hidden("bannerID", $_REQUEST['bannerID']));
            $form->addElement(new Element_Hidden("prevImage", $rs['image']));
            $form->addElement(new Element_Hidden("prevMobileImage", $rs['mobile_image']));
            $form->addElement(new Element_Hidden("createdate"));
            $form->addElement(new Element_Hidden("username"));
            /* Actual Form Fields Started */
            $form->addElement(new Element_Textbox("Banner Title:", "bannerTitle", array(
                "placeholder" => "Title",
                "value" => $rs['bannerTitle']
            )));


            $form->addElement(new Element_HTML('<img src="'.DIR_WS_BANNER_PATH.$rs['image'].'" width="10%" height="10%" ">'));

            $form->addElement(new Element_File("Banner Image: <br>(2000 * 550 pixels)", "image", array(
                "placeholder" => "Banner Image"
            )));

            $form->addElement(new Element_HTML('<img src="'.DIR_WS_BANNER_PATH.$rs['mobile_image'].'" width="10%" height="10%" ">'));

            $form->addElement(new Element_File("Mobile Banner Image: <br>(1000 × 550 pixels)", "mobile_image", array(
                "placeholder" => "Photo"
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
            echo "No Such Entry Found";
        }

    }
    function edit()
    {
        $updimg = true;
        $updimg1 = true;
        $error = false;
        $mobile_error = false;
        $username = $_SESSION['username'];

        if($_FILES["image"]['size'] == 0 ||  $_FILES["image"] == $_POST['prevImage']){
            $updimg = false;
            $upload = $_POST['prevImage'];
        }

        if($_FILES["mobile_image"]['size'] == 0 ||  $_FILES["mobile_image"] == $_POST['prevMobileImage']){
            $updimg1 = false;
            $mobile_upload = $_POST['prevMobileImage'];
        }

        if($updimg){
            @unlink(DIR_FS_BANNER_PATH.$_POST['prevImage']);
            $upload = $_POST['bannerID'].'-'.$_FILES["image"]["name"];
            $target_path = DIR_FS_BANNER_PATH.$_POST['bannerID'].'-'.$_FILES["image"]["name"];
            if(!move_uploaded_file($_FILES["image"]["tmp_name"],$target_path)){
                $error = true;
                echo "Error in updating member image..";
            }
        }

        if($updimg1){
            @unlink(DIR_FS_BANNER_PATH.$_POST['prevMobileImage']);
            $mobile_upload = $_POST['bannerID'].'-'.$_FILES["mobile_image"]["name"];
            $target_mobile_path = DIR_FS_BANNER_PATH.$_POST['bannerID'].'-'.$_FILES["mobile_image"]["name"];
            if(!move_uploaded_file($_FILES["mobile_image"]["tmp_name"],$target_mobile_path)){
                $mobile_error = true;
                echo "Error in updating member image..";
            }
        }


        $updqry = ets_db_query("update banner_image set 
        image = '".$upload."',			
        mobile_image = '".$mobile_upload."',			
        bannerTitle = '".$_POST['bannerTitle']."',
        username = '".$username."',	
        modifieddate = now(),
        remote_ip ='".$_SERVER['REMOTE_ADDR']."'		
        where bannerID='" .$_POST['bannerID']."'") or die ("Updating image records query failed: ".ets_db_error());

        return true;


    }
    function listData()
    {
        ?>
        <script>
            $(document).ready(function() {
                var listURL = 'helperfunc/bannerList.php';
                $('#bannerlist').dataTable({
                    "ajax": listURL

                });
            });

        </script>
        <?php
        $subvar = 'onclick="return confirmSubmit();"';

        echo '<table cellpadding="1" cellspacing="2" border="0" class="table table-striped table-bordered dataTable" id="bannerlist" width="100%">
		<thead>
		<tr>
			<th align="left">Id</th>			
			<th align="left">Title</th>			
			<th align="left">Image</th>			
			<th>Action</th>
		</tr>
		</thead>
		<tbody></tbody>	
		<tfoot>
				<tr>
					<th align="left">Id</th>	
                    <th align="left">Title</th>		
                    <th align="left">Image</th>			
                    <th>Action</th>
				</tr>
		</tfoot>		
		 </table>';
        ?>

        <?php
    }
    function delete()
    {
        $selqry = "Select * from banner_image where banner_id='".$_GET['banner_id']."'";
        $selres = ets_db_query($selqry);
        $arr = ets_db_fetch_array($selres);
        @unlink(DIR_FS_BANNER_PATH.$arr['image']);
        $delsql = "Delete from banner_image where banner_id='".$_GET['banner_id']."'";
        $delqry = ets_db_query($delsql) or die(ets_db_error().$delsql);

        return true;
    }
}
?>
