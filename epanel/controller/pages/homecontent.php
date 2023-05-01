<?php 
include WS_PFBC_ROOT."Form.php";
class homecontent{
	
	function fillpage(){
		$pgqry = "select * from homecontent";
		$pgqry_exec = ets_db_query($pgqry) or die(ets_db_error());
		$pgarr = ets_db_fetch_array($pgqry_exec);
	    $x_contentvalue = stripslashes($pgarr['home_content']);
		return $x_contentvalue;
	}
	function edit_homepg($maincontent){
		$to_contentsave = stripslashes($maincontent);
		$select = ets_db_query("select * from homecontent");
		if(ets_db_num_rows($select) == 0){
			$pgqry = "insert into homecontent values(null,'".$_SESSION['username']."',now(),now(),'".addslashes($to_contentsave)."')";
			$pgqry_exec = ets_db_query($pgqry) or die(ets_db_error());
		}else {
			
			$pgqry = "update homecontent set username = '".$_SESSION['username']."',modifieddate = now(),home_content  = '".addslashes($to_contentsave)."'";
			$pgqry_exec = ets_db_query($pgqry) or die(ets_db_error());
		}
		
		return true;
	}

	function editpg_display(){
		$form = new Form("frmadd");
		$form->configure(array(
			"prevent" => array("bootstrap","jQuery"),
			"view" => new View_Inline
		));
		
		$form->addElement(new Element_Hidden("controller", "pages"));
		$form->addElement(new Element_Hidden("action", "homecontent"));
		$form->addElement(new Element_Hidden("subaction", "editmaincontent"));
	
		/* Actual Form Fields Started */
		$form->addElement(new Element_TinyMCE("", "page_content", array("value"=> stripslashes($this->fillpage()))
			));

		
		$form->addElement(new Element_HTML('<hr>'));
		$form->addElement(new Element_Button);
		$form->addElement(new Element_Button("Cancel", "button", array(
			"onclick" => "history.go(-1);"
		)));
		$form->render();
	}
}
?>