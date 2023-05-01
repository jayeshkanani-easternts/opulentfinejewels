
<script type="text/javascript">
            $(document).ready(function($){
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             	
                $("#dtBox").DateTimePicker({
                    isPopup: true
                });
                
            });
        </script>

<?php
include WS_PFBC_ROOT."Form.php";
class epanel
{
	function addForm()
	{
		$form = new Form("addFrm");
		$form->configure(array(
			"prevent" => array("bootstrap","jQuery"),
			"view" => new View_SideBySide,
			"id" => "epanelFrm"
		));
		$form->addElement(new Element_HTML("<legend>e-Panel Settings</legend>"));
		$form->addElement(new Element_Hidden("controller", "settings"));
		$form->addElement(new Element_Hidden("action", "epanel"));
		$form->addElement(new Element_Hidden("subaction", "add"));
		$eqry = "Select * from epanel_master where id = '1'";
		$eres = ets_db_query($eqry);
		$earr = ets_db_fetch_array($eres);
		
		$powered_by = unserialize($earr['powered_by']);
		
		/* Actual Form Fields Started */
		$form->addElement(new Element_HTML('<div id="dtBox"></div>'));	
		$form->addElement(new Element_TinyMCE("Dashboard Content:", "home_content", array(
			"placeholder" => "Dashboard Content",
			"value" => $earr['home_content']
			)));
		
		$form->addElement(new Element_Textbox("Copyright:", "copyright", array(
			"placeholder" => "Copyright",
			"value" => $earr['copyright']
			)));
		
		
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
		
		$form->addElement(new Element_Textbox("Google Analytics View ID:", "ga_view_id", array(
			"placeholder" => "Google Analytics View ID",
			"value" => $earr['ga_view_id']
			)));
		
		$form->addElement(new Element_jQueryDatePicker("Date:", "start_date", array(
                    "placeholder" => "Date"
                    
                )));
				
		$form->addElement(new Element_jQueryDateTimePicker("DateTime:", "start_date", array(
                    "placeholder" => "Date Time"
                    
                )));
				
		$form->addElement(new Element_jQueryTimePicker("Time:", "start_date", array(
                    "placeholder" => "Time"
                   
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
		$create_date = date('Y-m-d');
		$modified_date = date('Y-m-d');
		$username = $_SESSION['username'];
		$powered_by['title'] = addslashes($_POST['powered_title']);
		$powered_by['link'] = addslashes($_POST['powered_link']);
		$powered = ets_db_real_escape_string( serialize( $powered_by ) );
		
		$selqry = 'select count(*) as total from epanel_master';
		$selres = ets_db_query($selqry);
		$selarr = ets_db_fetch_array($selres);
		
		if($selarr['total'] > 0)
		{
			$sql = "Update epanel_master set
				
					home_content = '".ets_db_real_escape_string(trim($_POST['home_content']))."',
					copyright = '".$_POST['copyright']."',
					powered_by = '".$powered."',
					ga_view_id = ".$_POST['ga_view_id'].",
					username = '".$username."',
					remote_ip ='".$_SERVER['REMOTE_ADDR']."',
					modified_date = '".$modified_date."'
					where id = '1'";
		}
		else
		{
			$sql = "Insert into epanel_master set
					id = '1',
					home_content = '".ets_db_real_escape_string(trim($_POST['home_content']))."',
					copyright = '".$_POST['copyright']."',
					powered_by = '".$powered."',
					ga_view_id = '".$_POST['ga_view_id']."',
					username = '".$username."',
					remote_ip ='".$_SERVER['REMOTE_ADDR']."',
					create_date = '".$create_date."'";
		}
		//echo $sql;
		if(ets_db_query($sql))
		{
			return true;
		}
		
		else
		{
			die(ets_db_error());
		}
		
	}
	
}
?>
