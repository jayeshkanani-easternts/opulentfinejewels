<script>
    $(document).ready(function () {

        var c = $('input[type=checkbox]').val();

        if ($('input[type=checkbox]').is(':checked')) {

            $('#file-upload').show();
        } else {
            $('#file-upload').hide();
        }
        $('input[type=checkbox]').change(function () {
            var c = this.checked ? 'yes' : 'no';
            if (c == 'yes') {
                $('#file-upload').show();
            } else {
                $('#file-upload').hide();
            }


        });
    });

</script>
<?php
include WS_PFBC_ROOT . "Form.php";

class website
{
    function addForm()
    {
        $form = new Form("addFrm");
        $form->configure(array(
            "prevent" => array("bootstrap", "jQuery"),
            "view" => new View_SideBySide,
            "id" => "websiteFrm"
        ));

        $eqry = "Select * from website_master where id = '1'";
        $eres = ets_db_query($eqry);
        $earr = ets_db_fetch_array($eres);

        $form->addElement(new Element_HTML("<legend>e-Panel Settings</legend>"));
        $form->addElement(new Element_Hidden("controller", "settings"));
        $form->addElement(new Element_Hidden("action", "website"));
        $form->addElement(new Element_Hidden("subaction", "add"));
        $form->addElement(new Element_Hidden("old_logo", $earr['logo']));
        $form->addElement(new Element_Hidden("old_homeimage", $earr['homeimage']));


        $powered_by = unserialize($earr['powered_by']);
        $social = unserialize($earr['social']);

        /* Actual Form Fields Started */
        if ($earr['logo'] != "") {
            $form->addElement(new Element_HTML('<label>Note : width= 150px , height= 60px require jpg file</label><br>'));
            $form->addElement(new Element_HTML('<img src="' . DIR_WS_LOGO_PATH . $earr['logo'] . '" height = "100px" width ="100px" style="left: 17%;
    position: relative;" <br>'));
        }

        $form->addElement(new Element_File("Logo:", "logo", array(
            "placeholder" => "Logo"
        )));
        if ($earr['homeimage'] != "") {
            $form->addElement(new Element_HTML('<a href="' . DIR_WS_LOGO_PATH . $earr['homeimage'].'" target="_blank" > View Old Brochure</a><br>'));
        }
//        $form->addElement(new Element_HTML('<label> require PDF file</label><br>'));
        $form->addElement(new Element_File("Brochure:", "homeimage", array(
            "placeholder" => "Brochure"
        )));

//		if($earr['check1'] == 'Y')
//        {
//            $checked = 'checked';
//        }
//        else
//        {
//            $checked = '';
//        }
        $form->addElement(new Element_HTML('<div class="control-group"><label class="control-label" for="websiteFrm-element-31">Home Page Popup:</label><div class="controls"><input id="Popup" name="Popup" value="Y" type="checkbox" ' . $checked . '></div></div>'));
//		$form->addElement(new Element_Textbox("Popup Image Caption:", "caption", array(
//			"placeholder" => "Popup Image Caption",
//			"value" => $earr['caption']
//			)));

        $form->addElement(new Element_Textbox("Copyright:", "copyright", array(
            "placeholder" => "Copyright",
            "value" => $earr['copyright']
        )));


        $form->addElement(new Element_HTML('<label class="control-label"> Social Media Links : </label><br>'));
        $form->addElement(new Element_HTML('<hr>'));
        $form->addElement(new Element_Textbox("Facebook:", "facebook", array(
            "placeholder" => "Facebook",
            "value" => $social['facebook']
        )));

        $form->addElement(new Element_Textbox("Twitter:", "twitter", array(
            "placeholder" => "Twitter",
            "value" => $social['twitter']
        )));
        $form->addElement(new Element_Textbox("Google+:", "google", array(
            "placeholder" => "Google+",
            "value" => $social['google']
        )));

        $form->addElement(new Element_Textbox("Instagram:", "instagram", array(
            "placeholder" => "Instagram",
            "value" => $social['instagram']
        )));
        $form->addElement(new Element_Textbox("Linkedin:", "linkedin", array(
            "placeholder" => "Linkedin",
            "value" => $social['linkedin']
        )));

        $form->addElement(new Element_Textbox("Youtube:", "pinterest", array(
            "placeholder" => "Youtube",
            "value" => $social['pinterest']
        )));

        $form->addElement(new Element_HTML('<hr>'));

        $form->addElement(new Element_HTML('<label class="control-label"> Powered By : </label><br>'));
        $form->addElement(new Element_HTML('<hr>'));
        $form->addElement(new Element_Textbox("Title:", "powered_title", array(
            "placeholder" => "Title",
            "value" => $powered_by['title']
        )));

        $form->addElement(new Element_Textbox("Link:", "powered_link", array(
            "placeholder" => "Link",
            "value" => $powered_by['link']
        )));

        $form->addElement(new Element_HTML('<hr>'));

        $form->addElement(new Element_HTML('<label class="control-label"> Contact Details : </label><br>'));
        $form->addElement(new Element_HTML('<hr>'));
        $form->addElement(new Element_Textbox("Email 1:", "email1", array(
            "placeholder" => "Email 1",
            "value" => $earr['email1']
        )));

        $form->addElement(new Element_Textbox("Email 2:", "email2", array(
            "placeholder" => "Email 2",
            "value" => $earr['email2']
        )));

        $form->addElement(new Element_Textbox("Telephone 1:", "tel1", array(
            "placeholder" => "Telephone 1",
            "value" => $earr['tel1']
        )));

        $form->addElement(new Element_Textbox("Telephone 2:", "tel2", array(
            "placeholder" => "Telephone 2",
            "value" => $earr['tel2']
        )));
        $form->addElement(new Element_Textbox("Fax:", "fax", array(
            "placeholder" => "Fax",
            "value" => $earr['fax']
        )));

        $form->addElement(new Element_TinyMCE("Registered Office:", "address", array(
            "placeholder" => "Address",
            "value" => $earr['address']
        )));

        $form->addElement(new Element_TinyMCE("Unit Office:", "address1", array(
            "placeholder" => "Address1",
            "value" => $earr['address1']
        )));

        $form->addElement(new Element_Textbox("Map Code:", "map_code", array(
            "placeholder" => "Map Code",
            "value" => $earr['map_code']
        )));


        if ($earr['coming_soon'] == 'Y') {
            $checked = 'checked';
        } else {
            $checked = '';
        }
        $form->addElement(new Element_HTML('<div class="control-group"><label class="control-label" for="websiteFrm-element-31">Coming Soon:</label><div class="controls"><input id="coming_soon" name="coming_soon" value="Y" type="checkbox" ' . $checked . '></div></div>'));

        $form->addElement(new Element_HTML('<div id = "file-upload">'));
        $form->addElement(new Element_File("Coming Soon Template:", "template", array(
            "placeholder" => "Coming Soon Template"
        )));

        if (file_exists(FS_INDEX_PATH . '/index.html')) {
            $form->addElement(new Element_HTML('<a href = "' . HTTP_SERVER . WS_ROOT . 'index.html" target = "_blank">View Template</a>'));
        }
        $form->addElement(new Element_HTML('</div>'));


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

        $create_date = date('Y-m-d');
        $modified_date = date('Y-m-d');
        $username = $_SESSION['username'];
        $powered_by['title'] = addslashes($_POST['powered_title']);
        $powered_by['link'] = addslashes($_POST['powered_link']);
        $powered = ets_db_real_escape_string(serialize($powered_by));

        $social['facebook'] = addslashes($_POST['facebook']);
        $social['twitter'] = addslashes($_POST['twitter']);
        $social['google'] = addslashes($_POST['google']);
        $social['instagram'] = addslashes($_POST['instagram']);
        $social['linkedin'] = addslashes($_POST['linkedin']);
        $social['pinterest'] = addslashes($_POST['pinterest']);
        $social_link = ets_db_real_escape_string(serialize($social));

        $selqry = 'select count(*) as total from website_master';
        $selres = ets_db_query($selqry);
        $selarr = ets_db_fetch_array($selres);

        if ($selarr['total'] > 0) {
            $sql = "Update website_master set
					email1 = '" . $_POST['email1'] . "',
					email2 = '" . $_POST['email2'] . "',
					tel1 = '" . $_POST['tel1'] . "',
					tel2 = '" . $_POST['tel2'] . "',
					fax = '" . $_POST['fax'] . "',
					coming_soon = '" . $_POST['coming_soon'] . "',
				
					address = '" . ets_db_real_escape_string(trim($_POST['address'])) . "',
					address1 = '" . ets_db_real_escape_string(trim($_POST['address1'])) . "',
					copyright = '" . $_POST['copyright'] . "',
					username = '" . $username . "',
					powered_by = '" . $powered . "',
					social = '" . $social_link . "',
					remote_ip ='" . $_SERVER['REMOTE_ADDR'] . "',
					map_code = '" . $_POST['map_code'] . "',
					modified_date = '" . $modified_date . "'
					where id = '1'";


        } else {
            $sql = "Insert into website_master set
					id = '1',
					email1 = '" . $_POST['email1'] . "',
					email2 = '" . $_POST['email2'] . "',
					tel1 = '" . $_POST['tel1'] . "',
					tel2 = '" . $_POST['tel2'] . "',
					fax = '" . $_POST['fax'] . "',
					address = '" . ets_db_real_escape_string(trim($_POST['address'])) . "',
					address1 = '" . ets_db_real_escape_string(trim($_POST['address1'])) . "',
					copyright = '" . $_POST['copyright'] . "',
					username = '" . $username . "',
					powered_by = '" . $powered . "',
					map_code = '" . $_POST['map_code'] . "',
					remote_ip ='" . $_SERVER['REMOTE_ADDR'] . "',
					social = '" . $social_link . "',
					create_date = '" . $create_date . "'";

        }

        //echo $sql;
        if (ets_db_query($sql)) {
            $err = true;
            $logo = $_FILES['logo']['name'];
            $logo1 = $_FILES['homeimage']['name'];
            if ($logo != "") {
                if ($_POST['old_logo'] != "") {
                    @unlink(DIR_FS_LOGO_PATH . $_POST['old_logo']);
                }
                if (move_uploaded_file($_FILES['logo']['tmp_name'], DIR_FS_LOGO_PATH . $logo)) {
                    $lqry = "Update website_master set 
							logo = '" . $logo . "'
							where id = '1'";
                    $lres = ets_db_query($lqry);
                    $err = true;
                } else {
                    $err = false;
                    echo $_FILES['logo']['error'];
                }
            }
            if ($logo1 != "") {
                if ($_POST['old_homeimage'] != "") {
                    @unlink(DIR_FS_LOGO_PATH . $_POST['old_homeimage']);
                }

                if (move_uploaded_file($_FILES['homeimage']['tmp_name'], DIR_FS_LOGO_PATH . $logo1)) {

                    $lqry = "Update website_master set 
							homeimage = '" . $logo1 . "'
							where id = '1'";
                    $lres = ets_db_query($lqry);
                    $err = true;
                }
//				else
//				{
//					$err = false;
//					echo $_FILES['homeimage']['error'];
//				}
            }
            if ($_POST['coming_soon'] == 'Y') {
                if ($_FILES['template']['name'] != '') {

                    @unlink(DIR_FS_PATH . '/index.html');
                    move_uploaded_file($_FILES['template']['name'], FS_INDEX_PATH . '/index.html');
                }
            } else {
                if (file_exists(FS_INDEX_PATH . '/index.html')) {
                    rename(FS_INDEX_PATH . '/index.html', FS_INDEX_PATH . '/coming_soon.html');
                }
            }

            return $err;
        } else {
            die(ets_db_error());
        }

    }

}

?>