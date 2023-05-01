<script>
    $(document).ready(function () {
        flag = 0;
        $('input').on('blur', function () {
            if ($("#galleryFrm").valid() && flag == 0) {
                $('input[type=submit]').prop('disabled', false);
            } else {
                $('input[type=submit]').prop('disabled', 'disabled');
            }
        });

        $('input[type=file]').bind('change', function () {

            //this.files[0].size gets the size of your file.
            var iSize = ($("input[type=file]")[0].files[0].size / 1024);
            iSize = (Math.round(iSize * 100) / 100)
            var max = '<?php echo (int)ini_get('upload_max_filesize'); ?>' * 1024;
            if (iSize > max) {
                $('input[type=submit]').prop('disabled', 'disabled');
                flag = 1;
                alert('Maximum file upload size is : ' + '<?php echo (int)ini_get('upload_max_filesize'); ?>' + ' MB');
            } else {
                $('input[type=submit]').prop('disabled', false);
                flag = 0;
            }


        });

    });
</script>
<?php
include WS_PFBC_ROOT . "Form.php";
include(DIR_WS_CLASSES . "resize-class.php");

class gallery
{
    function addForm()
    {
        $form = new Form("addFrm");
        $form->configure(array(
            "prevent" => array("bootstrap", "jQuery"),
            "view" => new View_SideBySide,
            "id" => "galleryFrm"
        ));
        $status = array("E" => "Enabled", "D" => "Disabled");
        $front = array("D" => "No", "E" => "Yes");
        $gallerytype = array("I" => "Image", "V" => "Video");
        $form->addElement(new Element_HTML("<legend>Add Gallery</legend>"));
        $form->addElement(new Element_Hidden("controller", "gallery"));
        $form->addElement(new Element_Hidden("action", "gallery"));
        $form->addElement(new Element_Hidden("subaction", "add"));

        /* Actual Form Fields Started */
        $album = getalbumlist();
        $form->addElement(new Element_Select("Select Album:", "a_id", $album, array(
            "required" => 1
        )));

        $form->addElement(new Element_Textbox("Title:", "image_title", array(
            "required" => 1,
            "placeholder" => "Image Title"
        )));

        $form->addElement(new Element_File("Browse Image:", "gallery_image", array(
            "placeholder" => "Browse Image"
        )));

         $form->addElement(new Element_Select("Gallery Type:", "gallery_type", $gallerytype, array(
             "required" => 1
         )));

         $form->addElement(new Element_Textbox("Video Link (Applicable if gallery type is Video):", "video_link", array(
             "placeholder" => "Video Link"
         )));

        $form->addElement(new Element_HTML('<label class="control-label">Last Sort Order : ' . get_last_sortorder('gallery_master') . '</label><br><br>'));
        $form->addElement(new Element_Textbox("Sortorder:", "sortorder", array(
            "required" => 1,
            "placeholder" => "Sortorder"
        )));

        $form->addElement(new Element_HTML('<div><label class="control-label" style="width:100%;text-align:left;">Note : Images will be displayed in website in the descending order of sort order </label><br><br></div>'));

        $form->addElement(new Element_Select("Status:", "status", $status, array(
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

    function add()
    {
        $sosql = "select sortorder from gallery_master where sortorder ='" . $_POST['sortorder'] . "'";
        $soqry = ets_db_query($sosql);

        if (ets_db_num_rows($soqry) > 0) {
            echo 'Sort Order -' . $_POST['sortorder'] . 'Already Exists';
            die;
        } else {
            $username = $_SESSION['username'];
            $createdate = date("Y-m-d");

            $gallery_slug = pro_SeoSlug(stripslashes($_POST['image_title']));


            $path = DIR_FS_GALLERY_PATH . $_POST['a_id'] . '/';
            if (!file_exists($path)) {
                mkdir($path);
                exec("chown " . FILEUSER . FILEUSER . " " . $path);
                exec("chmod 0777 " . $path);

            }

            if ($_POST['gallery_type'] == 'V') {
                $video_link = ets_db_real_escape_string($_POST['video_link']);
            } else {
                $video_link = '';
            }

            $sql = "Insert into  gallery_master set 
			username = '" . $username . "',
			 gallery_image = '',
			createdate = '" . $createdate . "',
			a_id = '" . $_POST['a_id'] . "',
			image_title = '" . ets_db_real_escape_string($_POST['image_title']) . "',
			gallery_type ='" . $_POST['gallery_type'] . "',
			video_link ='" . $video_link . "',
			sortorder ='" . $_POST['sortorder'] . "',
			isFront = 'D',
			status = '" . $_POST['status'] . "',
			remote_ip ='" . $_SERVER['REMOTE_ADDR'] . "'
			";
            $qry = ets_db_query($sql) or die(ets_db_error() . $sql);
            $id = ets_db_insert_id();

            $string = str_replace(' ', '-', $_FILES["gallery_image"]["name"]); // Replaces all spaces with hyphens.
            $str = preg_replace('/[^A-Za-z0-9\-\.]/', '-', $string); // Replaces all special characters with hyphens.
            $upload = $id . '-' . $str;
            $target_path = DIR_FS_GALLERY_PATH . $_POST['a_id'] . "/" . $upload;

            if (move_uploaded_file($_FILES["gallery_image"]["tmp_name"], $target_path)) {

                $resizeObj = new resize($target_path);
                $thumb_path = DIR_FS_GALLERY_PATH . $_POST['a_id'] . "/thumbnail/";
                if (!file_exists($thumb_path)) {
                    mkdir($thumb_path);
                    exec("chown " . FILEUSER . FILEUSER . " " . $thumb_path);
                    exec("chmod 0777 " . $thumb_path);

                }

                // *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
                $resizeObj->resizeImage(THUMB_WIDTH, THUMB_HEIGHT, 'exact');

                $resizeObj->saveImage($thumb_path . $upload, 100);


                $updqry = "update gallery_master set gallery_image = '" . $upload . "' where image_id = '" . $id . "'";
                $updres = ets_db_query($updqry) or die(ets_db_error());
            } else {
                echo "Error in uploading Image..";
            }


            return true;

        }
    }

    function editForm()
    {
        $sql = "select * from  gallery_master where image_id ='" . $_REQUEST['image_id'] . "'";
        $qry = ets_db_query($sql) or die(ets_db_error() . $sql);

        if (ets_db_num_rows($qry) > 0) {
            $rs = ets_db_fetch_array($qry);
            $form = new Form("html5");
            $form->configure(array(
                "prevent" => array("bootstrap", "jQuery"),
                "view" => new View_SideBySide,
                "id" => "galleryFrm"
            ));
            $status = array("E" => "Enabled", "D" => "Disabled");
            $front = array("D" => "No", "E" => "Yes");
            $gallerytype = array("I" => "Image", "V" => "Video");
            $form->addElement(new Element_HTML("<legend>Edit Gallary</legend>"));
            $form->addElement(new Element_Hidden("controller", "gallery"));
            $form->addElement(new Element_Hidden("action", "gallery"));
            $form->addElement(new Element_Hidden("subaction", "edit"));
            $form->addElement(new Element_Hidden("image_id", $_REQUEST['image_id']));
            $form->addElement(new Element_Hidden("old_a_id", $rs['a_id']));
            $form->addElement(new Element_Hidden("prevImage", $rs['gallery_image']));
            /* Actual Form Fields Started */
            $album = getalbumlist();
            $form->addElement(new Element_Select("Select Album:", "a_id", $album, array(
                "required" => 1,
                "value" => $rs['a_id']
            )));
            $form->addElement(new Element_Textbox("Image Title:", "image_title", array(
                "required" => 1,
                "placeholder" => "Image Title",
                "value" => $rs['image_title']
            )));
            $form->addElement(new Element_HTML('<img src="' . DIR_WS_GALLERY_PATH . $rs['a_id'] . "/" . $rs['gallery_image'] . '" width="10%" height="10%" style="margin-left:200px;">'));
            $form->addElement(new Element_File("Browse Image:", "gallery_image", array(
                "placeholder" => "Browse Image"
            )));

            $form->addElement(new Element_Select("Gallery Type:", "gallery_type", $gallerytype, array(
                "required" => 1,
                "value" => $rs['gallery_type']
            )));

            $form->addElement(new Element_Textbox("Video Link (Applicable if gallery type is Video):", "video_link", array(
                "placeholder" => "Video Link",
                "value" => $rs['video_link']
            )));

            $form->addElement(new Element_HTML('<label class="control-label">Last Sort Order : ' . get_last_sortorder('gallery_master') . '</label><br><br>'));


            $form->addElement(new Element_Textbox("Sortorder:", "sortorder", array(
                "required" => 1,
                "value" => $rs['sortorder']
            )));

            $form->addElement(new Element_HTML('<div><label class="control-label" style="width:100%;text-align:left;">Note : Images will be displayed in website in the descending order of sort order </label><br><br></div>'));

            $form->addElement(new Element_Select("Status:", "status", $status, array(
                "required" => 1,
                "value" => $rs['status']
            )));
            $form->addElement(new Element_HTML('<hr>'));
            $form->addElement(new Element_Button);
            $form->addElement(new Element_Button("Cancel", "button", array(
                "onclick" => "history.go(-1);"
            )));
            $form->addElement(new Element_HTML('<hr>'));
            $form->render();
        } else {
            echo "No Found...";
        }
    }


    function edit()
    {
        $username = $_SESSION['username'];
        $modifieddate = date("Y-m-d");
        $updimg = true;
        $error = false;
        if ($_FILES["gallery_image"]['size'] == 0 || $_FILES["gallery_image"] == $_POST['prevImage']) {
            $updimg = false;
            $upload = $_POST['prevImage'];
        }
        $path = DIR_FS_GALLERY_PATH . $_POST['a_id'] . '/';
        if (!file_exists($path)) {
            mkdir($path);
            exec("chown " . FILEUSER . FILEUSER . " " . $path);
            exec("chmod 0777 " . $path);

        }
        if ($_POST['a_id'] == $_POST['old_a_id']) {
            //echo 'if';
            if ($updimg) {
//                echo $updimg;

                $path = DIR_FS_GALLERY_PATH . $_POST['a_id'] . '/';
                $mask = $path . $_POST['image_id'] . '-*.*';
                array_map('unlink', glob($mask));

//                echo $mask;

                $string = str_replace(' ', '-', $_FILES["gallery_image"]["name"]); // Replaces all spaces with hyphens.
                $str = preg_replace('/[^A-Za-z0-9\-\.]/', '-', $string); // Replaces all special characters with hyphens.
                $upload = $_POST['image_id'] . '-' . $str;

                $target_path = DIR_FS_GALLERY_PATH . $_POST['a_id'] . "/" . $upload;
                if (!move_uploaded_file($_FILES["gallery_image"]["tmp_name"], $target_path)) {
                    $error = true;
                    echo "Error in Uploading File....";
                } else {
                    $resizeObj = new resize($target_path);
                    $thumb_path = DIR_FS_GALLERY_PATH . $_POST['a_id'] . "/thumbnail/";
                    if (!file_exists($thumb_path)) {
                        mkdir($thumb_path);
                        exec("chown " . FILEUSER . FILEUSER . " " . $thumb_path);
                        exec("chmod 0777 " . $thumb_path);

                    }

                    // *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
                    $resizeObj->resizeImage(THUMB_WIDTH, THUMB_HEIGHT, 'exact');

                    $resizeObj->saveImage($thumb_path . $upload, 100);
                }
            }
        } else {
            if ($updimg) {
                $path = DIR_FS_GALLERY_PATH . $_POST['old_a_id'] . '/';

                $mask = $path . $_POST['image_id'] . '-*.*';
                array_map('unlink', glob($mask));


                $string = str_replace(' ', '-', $_FILES["gallery_image"]["name"]); // Replaces all spaces with hyphens.
                $str = preg_replace('/[^A-Za-z0-9\-\.]/', '-', $string); // Replaces all special characters with hyphens.
                $upload = $_POST['image_id'] . '-' . $str;

                $target_path = DIR_FS_GALLERY_PATH . $_POST['a_id'] . "/" . $upload;

                if (!move_uploaded_file($_FILES["gallery_image"]["tmp_name"], $target_path)) {
                    $error = true;
                    echo "Error in Uploading File....";
                } else {
                    $resizeObj = new resize($target_path);
                    $thumb_path = DIR_FS_GALLERY_PATH . $_POST['a_id'] . "/thumbnail/";
                    if (!file_exists($thumb_path)) {
                        mkdir($thumb_path);
                        exec("chown " . FILEUSER . FILEUSER . " " . $thumb_path);
                        exec("chmod 0777 " . $thumb_path);

                    }

                    // *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
                    $resizeObj->resizeImage(THUMB_WIDTH, THUMB_HEIGHT, 'exact');

                    $resizeObj->saveImage($thumb_path . $upload, 100);
                }
            } else {

                copy(DIR_FS_GALLERY_PATH . $_POST['old_a_id'] . '/' . $_POST['prevImage'], DIR_FS_GALLERY_PATH . $_POST['a_id'] . '/' . $_POST['prevImage']);

                $thumb_path = DIR_FS_GALLERY_PATH . $_POST['a_id'] . "/thumbnail/";
                if (!file_exists($thumb_path)) {
                    mkdir($thumb_path);
                    exec("chown " . FILEUSER . FILEUSER . " " . $thumb_path);
                    exec("chmod 0777 " . $thumb_path);

                }
                copy(DIR_FS_GALLERY_PATH . $_POST['old_a_id'] . '/thumbnail/' . $_POST['prevImage'], DIR_FS_GALLERY_PATH . $_POST['a_id'] . '/thumbnail/' . $_POST['prevImage']);


                $path = DIR_FS_GALLERY_PATH . $_POST['old_a_id'] . '/';

                $mask = $path . $_POST['image_id'] . '-*.*';
                array_map('unlink', glob($mask));
                @unlink(DIR_FS_GALLERY_PATH . $_POST['old_a_id'] . '/thumbnail/' . $_POST['prevImage']);

            }
        }

        if (!$error) {
            if ($_POST['gallery_type'] == 'V') {
                $video_link = ets_db_real_escape_string($_POST['video_link']);
            } else {
                $video_link = '';
            }

            $updqry = ets_db_query("update gallery_master set 
			username = '" . $username . "',
			modifieddate = '" . $modifieddate . "',
			a_id = '" . ets_db_real_escape_string($_POST['a_id']) . "',
			image_title = '" . ets_db_real_escape_string($_POST['image_title']) . "',
            gallery_type ='" . $_POST['gallery_type'] . "',
			video_link ='" . $video_link . "',
			gallery_image = '" . $upload . "',
			sortorder = '" . $_POST['sortorder'] . "',
		    isFront = 'D',
			status = '" . $_POST['status'] . "',
			remote_ip ='" . $_SERVER['REMOTE_ADDR'] . "'
			where image_id= '" . $_POST['image_id'] . "'") or die ("Updating gallery_master records query failed: " . ets_db_error());
            return !$error;
        }

    }

    function listData()
    {
        ?>
        <script>
            $(document).ready(function () {
                var listURL = 'helperfunc/galleryList.php';

                $('#gallerylist').dataTable({
                    "ajax": listURL
                });

                $('.esortorder').editable({params: {"tblName": "gallery_master"}});
            });
        </script>
        <?php
        echo '<div id="no-more-tables"><table class="table table-striped table-bordered dataTable" id="gallerylist" width="100%">
		<thead>
		<tr>
			<th>Id</th>
			<th>Album Type</th>
			<th>Image Title</th>
			<th>Image</th>
			<th>Status</th>
			<th>Sort-Order</th>
			<th>Action</th>
		</tr>
		</thead>
		<tbody></tbody>	
		<tfoot>
			<tr>
				<th>Id</th>
				<th>Album Type</th>
				<th>Image Title</th>
				<th>Image</th>
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
                params: {"tblName": "gallery_master"},
                value: 1,
                source: [{value: 'E', text: 'Active'}, {value: 'D', text: 'Disabled'}]
            });
        </script>
        <?php

    }

    function delete()
    {
        $sql = "Select * from  gallery_master where image_id='" . $_GET['image_id'] . "'";
        $qry = ets_db_query($sql) or die(ets_db_error() . $sql);
        $arr = ets_db_fetch_array($qry);
        $a_id = $arr['a_id'];

        $delsql = "Delete from  gallery_master where image_id='" . $_GET['image_id'] . "'";
        $delqry = ets_db_query($delsql) or die(ets_db_error() . $delsql);

        $path = DIR_FS_GALLERY_PATH . $a_id . '/';
        $mask = $path . $_GET['image_id'] . '-*.*';
        array_map('unlink', glob($mask));

        return true;
    }
}

?>
