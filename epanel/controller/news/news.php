<script>
    $(document).ready(function () {
        flag = 0;
        $('input').on('blur', function () {
            if ($("#newsFrm").valid() && flag == 0) {
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

class news
{
    function addForm()
    {
        $form = new Form("newsFrm");
        $form->configure(array(
            "prevent" => array("bootstrap", "jQuery"),
            "view" => new View_SideBySide,
            "id" => "newsFrm"
        ));
        $status = array("E" => "Enabled", "D" => "Disabled");
        $position = array("H" => "Set As Home Page", "I" => "Not Set As Home Page");
        $form->addElement(new Element_HTML("<legend>Add News </legend>"));
        $form->addElement(new Element_Hidden("controller", "news"));
        $form->addElement(new Element_Hidden("action", "news"));
        $form->addElement(new Element_Hidden("subaction", "add"));
        /* Actual Form Fields Started */
        $news = getnewslist();
        /*	$form->addElement(new Element_Select("News/Event Type:", "news_type",$news, array(
                "placeholder" => "News Type"
                )));*/
        $form->addElement(new Element_Textbox("News Title:", "news_title", array(
            "required" => 1,
            "placeholder" => "News Title"
        )));

        $form->addElement(new Element_TinyMCE("News Description:", "news_desc", array(
                "placeholder" => "News Description  ")
        ));

        $form->addElement(new Element_File("News Image:", "image", array(
            "placeholder" => "Photo"
        )));


        $form->addElement(new Element_Textbox("Date:", "news_date", array(
//			"jqueryOptions" => array("pickTime" => "false"),
            "required" => 1,
//			"data-date-format" => "yyyy-mm-dd",
            "placeholder" => "Date"
        )));

        $form->addElement(new Element_Textbox("Sortorder:", "sortorder", array(
            "required" => 1,
            "placeholder" => "Sortorder"
        )));

        $form->addElement(new Element_HTML('<div><label class="control-label" style="width:100%;text-align:left;">Note : News will be displayed in website in the descending order of date </label><br><br></div>'));

        $form->addElement(new Element_Select("Status:", "status", $status, array(
            "required" => 1,
            "placeholder" => "Status"
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
        $news_slug = pro_SeoSlug(stripslashes($_POST['news_title']));
        $username = $_SESSION['username'];
        $createdate = date("Y-m-d");

//		$my_date = date('Y-m-d', strtotime($_POST['news_date']));

        $sql = "Insert into news set 
		username = '" . $username . "',
		createdate = '" . $createdate . "',
		news_type = '1',
		news_title = '" . ets_db_real_escape_string($_POST['news_title']) . "',
		news_date = '" . ets_db_real_escape_string($_POST['news_date']) . "',
		news_desc = '" . ets_db_real_escape_string($_POST['news_desc']) . "',
	
		sortorder = '" . $_POST['sortorder'] . "',
		status = '" . $_POST['status'] . "',
		remote_ip ='" . $_SERVER['REMOTE_ADDR'] . "'
		";


        if (ets_db_query($sql)) {
            $news_id = ets_db_insert_id();

        } else {
            die(ets_db_error());

        }

        $target_path = DIR_FS_NEWS_PATH . $news_id . '-' . $_FILES["image"]["name"];

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_path)) {

            $updqry = "Update news set image = '" . $news_id . '-' . $_FILES["image"]["name"] . "' where news_id = '" . $news_id . "'";
            $updres = ets_db_query($updqry) or die(ets_db_error());
            return true;

        } else {

            echo "Error in uploading Image..";
            return false;
        }

    }

    function editForm()
    {
        $sql = "select * from news where news_id ='" . $_REQUEST['news_id'] . "'";
        $qry = ets_db_query($sql) or die(ets_db_error() . $sql);

        if (ets_db_num_rows($qry) > 0) {
            $rs = ets_db_fetch_array($qry);
            $form = new Form("newsFrm");
            $form->configure(array(
                "prevent" => array("bootstrap", "jQuery"),
                "view" => new View_SideBySide,
                "id" => "newsFrm"
            ));
            $status = array("E" => "Enabled", "D" => "Disabled");
            $position = array("H" => "Set As Home Page", "I" => "Not Set As Home Page");
            $form->addElement(new Element_HTML("<legend>Edit News</legend>"));
            $form->addElement(new Element_Hidden("controller", "news"));
            $form->addElement(new Element_Hidden("action", "news"));
            $form->addElement(new Element_Hidden("subaction", "edit"));
            $form->addElement(new Element_Hidden("news_id", $_REQUEST['news_id']));
            $form->addElement(new Element_Hidden("prevImage", $rs['image']));

            /* Actual Form Fields Started */
            /*	$news = getnewslist();
                $form->addElement(new Element_Select("News/Event Type:", "news_type",$news, array(
                "required" => 1,
                "value"=> $rs['news_type']
                )));
            */
            $form->addElement(new Element_Textbox("News Title:", "news_title", array(
                "required" => 1,
                "placeholder" => "News Title",
                "value" => $rs['news_title']
            )));

            $form->addElement(new Element_TinyMCE("News Description:", "news_desc", array(
                    "value" => stripslashes($rs['news_desc']))
            ));

            $form->addElement(new Element_File("News Image:", "image", array(
                "placeholder" => "Photo"
            )));


            $form->addElement(new Element_Textbox("Date:", "news_date", array(
//			"jqueryOptions" => array("pickTime" => "false"),
                "required" => 1,
//			"data-date-format" => "yyyy-mm-dd",
                "placeholder" => "Date",
                "value" => $rs['news_date']
            )));


            $form->addElement(new Element_Textbox("Sortorder:", "sortorder", array(
                "required" => 1,
                "value" => $rs['sortorder']
            )));

            $form->addElement(new Element_HTML('<div><label class="control-label" style="width:100%;text-align:left;">Note : News will be displayed in website in the descending order of date </label><br><br></div>'));

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
            echo "No Data Exists...";
        }

    }

    /**
     * @return bool
     */
    function edit()
    {
        $username = $_SESSION['username'];
        $modifieddate = date("Y-m-d");

        $my_date = date('Y-m-d', strtotime($_POST['news_date']));

        $updqry = ets_db_query("update news set 
			username = '" . $username . "',
			modifieddate = '" . $modifieddate . "',
			news_type = '1',
			news_title = '" . ets_db_real_escape_string($_POST['news_title']) . "',
			news_date = '" . ets_db_real_escape_string($_POST['news_date']) . "',
			news_desc = '" . ets_db_real_escape_string($_POST['news_desc']) . "',
			
			sortorder = '" . $_POST['sortorder'] . "',
			status = '" . $_POST['status'] . "',
			remote_ip ='" . $_SERVER['REMOTE_ADDR'] . "'
			where news_id='" . $_POST['news_id'] . "'") or die ("Updating news records query failed: " . ets_db_error());


//        echo '123'.$updqry;
//        exit();


        /*if (ets_db_query($updqry)) {
            $news_id = ets_db_insert_id();


        } else {
            die(ets_db_error());

        }*/
        $news_id = $_POST['news_id'];

        $target_path = DIR_FS_NEWS_PATH . $news_id . '-' . $_FILES["image"]["name"];

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_path)) {

            $updqry = "Update news set image = '" . $news_id . '-' . $_FILES["image"]["name"] . "' where news_id = '" . $news_id . "'";
            $updres = ets_db_query($updqry) or die(ets_db_error());
            return true;

        } else {

            echo "Error in uploading Image..";
            return true;
        }


    }

    function listData()
    {
        ?>
        <script>
            $(document).ready(function () {
                var listURL = 'helperfunc/newsList.php';
                var oTable = $('#newslist').dataTable({
                    "ajax": listURL
                });

                $(".marker").tooltip({placement: 'top'});
                $('.esortorder').editable({params: {"tblName": "news"}});
            });
        </script>
        <?php
        $subvar = 'onclick="return confirmSubmit();"';
        echo '<div id="no-more-tables"><table cellpadding="1" cellspacing="2" border="0" class="table table-striped table-bordered dataTable" id="newslist" width="100%">
		<thead>
		<tr>
			
			<th>Date</th>
			<th>News Title</th>
			<th>Status</th>
			<th>Sort-Order</th>
			<th>Action</th>
		</tr>
		</thead>
		<tbody></tbody>	
		<tfoot>
				<tr>
					
					<th>Date</th>
					<th>News Title</th>
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
                params: {"tblName": "news"},
                value: 1,
                source: [{value: 'E', text: 'Active'}, {value: 'D', text: 'Disabled'}]
            });
        </script>
        <?php

    }

    function delete()
    {
        $delsql = "Delete from news where news_id='" . $_GET['news_id'] . "'";
        $delqry = ets_db_query($delsql) or die(ets_db_error() . $delsql);
        delSeoLnk($_GET['news_id'], "News");
        return true;
    }

    function ajaxPost()
    {
        print_r($_POST);
        return true;
    }

}

?>
