<?php
function get_albumtype_list()
{
	$q = "select * from album_type";
	$r = ets_db_query($q) or die("select error");
	$album_arr = array();
	
		while($arr = ets_db_fetch_array($r))
		{
			$album_arr[$arr['type_id']] = $arr['album_title'];
		}
	
	return $album_arr;
}
function delete_folder($path)
{
    if (is_dir($path) === true)
    {
        $files = array_diff(scandir($path), array('.', '..'));

        foreach ($files as $file)
        {
            delete_folder(realpath($path) . '/' . $file);
        }

        return rmdir($path);
    }

    else if (is_file($path) === true)
    {
        return unlink($path);
    }

    return false;
}
function get_last_sortorder($table_name){
	$qry = "Select max(sortorder) as total from ".$table_name;
	$res = ets_db_query($qry);
	$arr = ets_db_fetch_array($res);
	if($arr['total'] == '')
		return '0';
	else
		return $arr['total'];
}
function getprojectname($id)
{
	$q = "select * from products where productID =".$id;
	$r = ets_db_query($q) or die("select error");
	
		while($arr = ets_db_fetch_array($r))
		{
			$project = $arr['productTitle'];
		}
	
	return $project;
}
function getindustrytype($id)
{
	$q = "select * from industry_type where id =".$id;
	$r = ets_db_query($q) or die("select error");
	
		while($arr = ets_db_fetch_array($r))
		{
			$industry = $arr['type'];
		}
	
	return $industry;
}

function chkentry($shop,$project)
{
	$flag = 0;
	$q = "select * from stakeholder where project_id = '$project' and shop_no = '$shop'";
	$r = ets_db_query($q);
	$num = ets_db_num_rows($r);
	
	if($num > 0)
	{
		$flag = 1;
	}
	else
	{
		$flag = 0;
	}
	
	return $flag;
}

function getalbumtypeName($type_id){
		$albumname = ets_db_query("select * from album_type where type_id='".$type_id."' ") or die(ets_db_error());
		$rs = ets_db_fetch_array($albumname);
		return $rs['album_title'];
   } 

function update_data($table)
{
	$q = "update ".$table." set new = 1 where new = 0";
	$r = ets_db_query($q);
	
}

function get_count($table)
{
	$q = "select * from ".$table." where new = 0";
	$r = ets_db_query($q);
	$num = ets_db_num_rows($r);
	
	return $num;
}
//Date format

function tep_date($txtvalue) {
$dty=substr($txtvalue,6);
$dtd=substr($txtvalue,0,2);
$dtm=substr($txtvalue,3,2);
$dt=$dty."-".$dtm."-".$dtd;
return $dt;
}
//calendor format
function tep_date_calender($txtvalue) {
$dty=substr($txtvalue,0,4);
$dtd=substr($txtvalue,8);
$dtm=substr($txtvalue,5,2);
$dt=$dtm."/".$dtd."/".$dty;
return $dt;
}

function file_read_dir($dir) {
   $array = array();
   $d = dir($dir);
   while (false !== ($entry = $d->read())) {
       if($entry!='.' && $entry!='..') {
           //$entry = $dir."/".$entry; //we need / on some servers
           if(is_dir($entry) or $entry=='1') {
               // do nothing
           } else {
               $array[] = $entry;
           }
       }
   }
   $d->close();
   return $array;
}
function file_read_controller($dir) {
   $array = array();
   $d = dir($dir);
   while (false !== ($entry = $d->read())) {
       if($entry!='.' && $entry!='..') {
			$entry;
           //$entry = $dir."/".$entry; //we need / on some servers
			if(is_dir($entry) or $entry=='1') {
				$array[] = $entry;   
			} else {
               // do nothing  
           
			}
       }
   }
   $d->close();
   return $array;
}

/*************************
* Form security function *
*************************/



function dateFormat($input_date, $input_format, $output_format) {
   preg_match("/^([\w]*)/i", $input_date, $regs);
   $sep = substr($input_date, strlen($regs[0]), 1);
   $label = explode($sep, $input_format);
   $value = explode($sep, $input_date);
   $array_date = array_combine($label, $value);
   if (in_array('Y', $label)) {
       $year = $array_date['Y'];
   } elseif (in_array('y', $label)) {
       $year = $year = $array_date['y'];
   } else {
       return false;
   }
   
   $output_date = date($output_format, mktime(0,0,0,$array_date['m'], $array_date['d'], $year));
   return $output_date;
}
if (!function_exists('array_combine')) {
   function array_combine($a1, $a2) {
       if(count($a1) != count($a2))
           return false;
           if(count($a1) <= 0)
           return false;
       $a1 = array_values($a1);
       $a2 = array_values($a2);
       $output = array();
       for($i = 0; $i < count($a1); $i++) {
           $output[$a1[$i]] = $a2[$i];
       }
       return $output;
   }
}

function datediff($interval, $datefrom, $dateto, $using_timestamps = false) {
  /*
    $interval can be:
    yyyy - Number of full years
    q - Number of full quarters
    m - Number of full months
    y - Difference between day numbers
      (eg 1st Jan 2004 is "1", the first day. 2nd Feb 2003 is "33". The datediff is "-32".)
    d - Number of full days
    w - Number of full weekdays
    ww - Number of full weeks
    h - Number of full hours
    n - Number of full minutes
    s - Number of full seconds (default)
  */
  
  if (!$using_timestamps) {
    $datefrom = strtotime($datefrom, 0);
    $dateto = strtotime($dateto, 0);
  }
  $difference = $dateto - $datefrom; // Difference in seconds
   
  switch($interval) {
   
    case 'yyyy': // Number of full years

      $years_difference = floor($difference / 31536000);
      if (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom), date("j", $datefrom), date("Y", $datefrom)+$years_difference) > $dateto) {
        $years_difference--;
      }
      if (mktime(date("H", $dateto), date("i", $dateto), date("s", $dateto), date("n", $dateto), date("j", $dateto), date("Y", $dateto)-($years_difference+1)) > $datefrom) {
        $years_difference++;
      }
      $datediff = $years_difference;
      break;

    case "q": // Number of full quarters

      $quarters_difference = floor($difference / 8035200);
      while (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom)+($quarters_difference*3), date("j", $dateto), date("Y", $datefrom)) < $dateto) {
        $months_difference++;
      }
      $quarters_difference--;
      $datediff = $quarters_difference;
      break;

    case "m": // Number of full months

      $months_difference = floor($difference / 2678400);
      while (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom)+($months_difference), date("j", $dateto), date("Y", $datefrom)) < $dateto) {
        $months_difference++;
      }
      $months_difference--;
      $datediff = $months_difference;
      break;

    case 'y': // Difference between day numbers

      $datediff = date("z", $dateto) - date("z", $datefrom);
      break;

    case "d": // Number of full days

      $datediff = floor($difference / 86400);
      break;

    case "w": // Number of full weekdays

      $days_difference = floor($difference / 86400);
      $weeks_difference = floor($days_difference / 7); // Complete weeks
      $first_day = date("w", $datefrom);
      $days_remainder = floor($days_difference % 7);
      $odd_days = $first_day + $days_remainder; // Do we have a Saturday or Sunday in the remainder?
      if ($odd_days > 7) { // Sunday
        $days_remainder--;
      }
      if ($odd_days > 6) { // Saturday
        $days_remainder--;
      }
      $datediff = ($weeks_difference * 5) + $days_remainder;
      break;

    case "ww": // Number of full weeks

      $datediff = floor($difference / 604800);
      break;

    case "h": // Number of full hours

      $datediff = floor($difference / 3600);
      break;

    case "n": // Number of full minutes

      $datediff = floor($difference / 60);
      break;

    default: // Number of full seconds (default)

      $datediff = $difference;
      break;
  }    

  return $datediff;

}
function get_group_name($grpid){
	$chkqry = ets_db_query("select * from group_master where group_id = '".$grpid."'") or die("Getting Group Name : ".ets_db_error());
	if(ets_db_num_rows($chkqry)>0){
		$res = ets_db_fetch_array($chkqry);
	}
	return $res['group_name'];
}

function getControllerNames()
{
	$file_arr = array();
	$path = DIR_FS_CONTROLLER."/";
	$i = 0;
	if ($handle = opendir($path)) {
		while ($file = readdir($handle)) {
			$whole = $path.$file;
			if(is_dir($whole))
			{
				$file_arr[$i] = $file;
				$i++;
			}			
		}
	return $file_arr;
	}
}
// Generate Module List
function getModuleList()
{
	$modsel = "select * from module_master where status = 'E' ";
	$modqry = ets_db_query($modsel) or die(ets_db_error().$modsel);
	while($modrs=ets_db_fetch_array($modqry)){
		$mod_arr[$modrs['module_file']] = $modrs['module_title']; 
	}
	return $mod_arr;
}
function getPermission($group_id,$module)
{	
	//echo '<script>alert("inside get permision");</script>';
	$module = strtolower($module);
	
	$chkqry = ets_db_query("select permissions from permission_master where group_id='".$group_id."' AND module='".$module."'") or die("Checking User's  Permission  : ".ets_db_error());
	
	if(ets_db_num_rows($chkqry)>0){
		$res = ets_db_fetch_array($chkqry);
		return $res['permissions'];
	}
}

//Get Last Login Remote IP
function last_login_from(){
	$last_login_sql = ets_db_query("select max(session_log_id) as ss from session_log_master ");
	$res_login = ets_db_fetch_array($last_login_sql);
	$log_sql = ets_db_query("select remote_ip from session_log_master where session_log_id = '".$res_login['ss']."'");
	$res_log = ets_db_fetch_array($log_sql);
	return $res_log['remote_ip'];
}

function fill_country($country_id=""){
	if($country_id==""){
		$state_qry = ets_db_query("select * from state_master order by state_name") or die(ets_db_error());
	}else{
		$state_qry = ets_db_query("select * from state_master where countries_id = '".$country_id."' order by state_name") or die(ets_db_error());
	}
	while($s_rs = ets_db_fetch_array($state_qry)){
		$states[$s_rs['state_id']] = $s_rs['state_name'];
	}
	return $states;
}

// Combo For Sate
function fill_state($state=''){
$state_array = '';
$state_sql = ets_db_query("select * from state_master");
while($state_res = ets_db_fetch_array($state_sql)){
	if($state == $state_res['zone_name'] ){
		$selected = "selected";
	}else{
		$selected = "";
	}
	$state_array .= '<option value="'.$state_res['zone_name'].'" '.$selected.'>'.$state_res['zone_name'].'</option>';
}
return $state_array;
}

function groupname_fill_combo($group_id = ''){
	$grp_display = '';
	$grp_sql = ets_db_query("select * from newsletter_group");
	while($grp_res = ets_db_fetch_array($grp_sql)){
		if($group_id == $grp_res['newsletter_group_id']){
			$grp_select = "selected";
		}else{
			$grp_select = "";
		}
		$grp_display .= '<option value="'.$grp_res['newsletter_group_id'].'" '.$grp_select.'>'.$grp_res['newsletter_group_name'].'</option>';
	}
	return $grp_display;
}

function createSalt() {
    $length = mt_rand(64, 255);
    $salt = '';
    for ($i = 0; $i < $length; $i++) {
        $salt .= chr(mt_rand(33, 255));
    }
    return $salt;
}


function get_sortorder($table_name,$primary_id){
	$srt_sql = ets_db_query("select ".$primary_id." from ".$table_name." order by ".$primary_id." desc");
	$srt_res = ets_db_fetch_array($srt_sql);
	return $srt_res[$primary_id] + 1;
}
function fill_status($status = ''){
	$status_array =array("E"=>"Enable","D"=>"Disable");
	$display_status = '<select name="status">';
	foreach($status_array as $s_key => $s_value){
		if($s_key == $status){
			$s_selected = 'selected';
		} else {
			$s_selected = '';	
		}
		$display_status .= '<option value="'.$s_key.'" '.$s_selected.'>'.$s_value.'</option>';
	}
	$display_status .= '</select>';
	return $display_status; 
}	

	function fill_user_contacts($contact = ''){
		$contact_dis = '';
		$selected = '';	
		
		$contact_sql = ets_db_query("select * from user_master");
		
		while($contact_res = ets_db_fetch_array($contact_sql)){
			if($contact == $contact_res['userID']){
				$selected = 'selected';
			} else {
				$selected = '';
			}
			$contact_dis .= '<option value="'.$contact_res['userID'].'" '.$selected.'>'.$contact_res['firstname'].' '.$contact_res['lastname'].'</option>';	
		}
		return $contact_dis;	
	}
	
	
	function getalbumlist(){
		$groupqry4 = ets_db_query("Select * from album") or die(ets_db_error());
		while($groupres = ets_db_fetch_array($groupqry4)){
			$group_arry[$groupres['a_id']] = $groupres['a_title'];
		}  	
		return $group_arry;
	}

   function getcsralbumlist(){
		$groupqry4 = ets_db_query("Select * from csr_album") or die(ets_db_error());
		while($groupres = ets_db_fetch_array($groupqry4)){
			$group_arry[$groupres['a_id']] = $groupres['a_title'];
		}  	
		return $group_arry;
	}

	function getalbumName($a_id){
		$albumSql = "select * from album where a_id='".$a_id."' ";
		$albumQry = ets_db_query($albumSql) or die(ets_db_error());
		$rs = ets_db_fetch_array($albumQry);
		return $rs['a_title'];
	} 

function getcsralbumName($a_id){
		$albumSql = "select * from csr_album where a_id='".$a_id."' ";
		$albumQry = ets_db_query($albumSql) or die(ets_db_error());
		$rs = ets_db_fetch_array($albumQry);
		return $rs['a_title'];
	} 
	
	
		function loadModules(){

		$moduleList = DIR_FS_SITE_PATH."epanel/modules.xml";
		
		$fp = fopen($moduleList,"r"); 
		
		
		$theData = fread($fp, filesize("modules.xml"));
		fclose($fp);
		
		$response = simplexml_load_string($theData);
		
		$moduleses = $response->modules;
		//print_r($moduleses);
		$row = 0;
		
		
		foreach($moduleses as $modules)
		{
			$moduleId = $modules->moduleId[$row];
			$moduleTitle = $modules->moduleTitle[$row];
			$moduleName = $modules->moduleName[$row];
			$moduleFile = $modules->moduleFile[$row];
			$moduleController = $modules->moduleController[$row];
						
			$q = "select * from module_master where module_id = '".$moduleId."'";
			//echo $q;
			if(ets_db_num_rows(ets_db_query($q)) > 0)
			{
				ets_db_query("update module_master set
				module_title = '".$moduleTitle."',
				module_name = '".$moduleName."',
				module_file = '".$moduleFile."',
				module_controller = '".$moduleController."',
				status = 'E'
				where module_id = '".$moduleId."'
				") or die(ets_db_error());
				
			}
			else
			{
				ets_db_query("insert into  module_master set
				module_id = '".$moduleId."',
				module_title = '".$moduleTitle."',
				module_name = '".$moduleName."',
				module_file = '".$moduleFile."',
				module_controller = '".$moduleController."',
				status = 'E'							
				") or die(ets_db_error()); 
				if($_SESSION['group'] == 1)
				{
					ets_db_query("delete from permission_master where group_id = '1'");
					createPermission(1);
				}
				
			}
			
			
		}
		
	}
		function createPermission($grpid){
		$modSql = ets_db_query("select * from module_master") or die(ets_db_error());
		$username = $_SESSION['username'];
		$createdate = date('Y-m-d');
		while($rs = ets_db_fetch_array($modSql)) {
			
		$q = "select * from permission_master where module_id = '".$rs['module_id']."'";
		if(ets_db_num_rows(ets_db_query($q)) > 0)
		{
			$updsql = "UPDATE permission_master set
				username = '".$username."',
				createdate = '".$createdate."',
				modifieddate = '".$createdate."',
				group_id = '".$grpid."',
				module = '".$rs['module_file']."',
				permissions = 'a,d,e,v' 
				WHERE 
				module_id = '".$rs['module_id']."'";
			ets_db_query($updsql) or die(ets_db_error());
		}
		
		else
		{
			$insertsql = "INSERT INTO permission_master set
				username = '".$username."',
				createdate = '".$createdate."',
				modifieddate = '".$createdate."',
				group_id = '".$grpid."',
				module = '".$rs['module_file']."',
				module_id = '".$rs['module_id']."',
				permissions = 'a,d,e,v' ";
			ets_db_query($insertsql) or die(ets_db_error());
		}
		
			
		}
	}
	function chkModule($fldname, $fldvalue){
		$sqlmodule = ets_db_query("select * from module_master where ".$fldname." = '".$fldvalue."'") or die(ets_db_error());
		if(ets_db_num_rows($sqlmodule) > 0){
			return true;			
		}else{
			return false;
		}
	}

	function getModuleName($moduleID){
		$sqlmodule = ets_db_query("select * from module_master where module_id = '".$moduleID."'") or die(ets_db_error());
		$modulearr = ets_db_fetch_array($sqlmodule);
		return $modulearr['module_name'];
	}
	function display_parent_items( $item_array, $parentFld, $primaryFld, $titleFld, $selected_item = '', $parent_id = 0, $parent_depth = 0 ) { 
		foreach( $item_array as $item_id => $item_information ) { 

		    if ( $item_information[$parentFld] == $parent_id ) { 
			
				$link_text = "";
	            $sep = ""; 
	            for ($i = 0; ( $i < $parent_depth ); $i++ ) { 
	                $sep .= '-&nbsp;'; 
	            } 
	            if ( $item_information[$titleFld] != '' ) { 
		    if(isset($selected_item) && $selected_item == $item_information[$primaryFld])
		    {
                        
				$link_text .= '<option selected = "selected" value="'.$item_information[$primaryFld].'">'.$sep.$item_information[$titleFld]; 
				
		    }
		    else{
		        $link_text .= '<option value="'.$item_information[$primaryFld].'">'.$sep.$item_information[$titleFld]; }
	            } 
	            $link_text .= '</option>';
				$display .=   $link_text;   
				$display .= display_parent_items( $item_array, $parentFld, $primaryFld, $titleFld, $selected_item,$item_id,( $parent_depth + 1 ) );
	         $carry_rolegoal = $rolegoal;
			}
		$rolegoal = $carry_rolegoal;
		
	    } 
	return $display;
	}
	function getMasterArray($tblName,$keyfld,$valuefld){
		$arrSql = ets_db_query("select $keyfld, $valuefld from $tblName where status = 'E' order by $valuefld") or die(ets_db_error());
   		$masterArray = array();
   		if(ets_db_num_rows($arrSql) > 0){
			while($rs = ets_db_fetch_array($arrSql)){
				$masterArray[$rs[$keyfld]] = $rs[$valuefld];
			}
		}else{
			$masterArray[] = "No Value Defined..";					
		}
		return $masterArray;	
	}
	
	function getfldValue($tblName,$keyfld,$keyfldvalue,$getfld){
		$arrSql = ets_db_query("select $getfld from $tblName where $keyfld = '".$keyfldvalue."' ") or die(ets_db_error());
   		if(ets_db_num_rows($arrSql) > 0){
			$rs = ets_db_fetch_array($arrSql);
			return $rs[$getfld];
		}else{
			return "No Value Defined..";					
		}
	}  
	function getnewslist(){
		$groupqry = ets_db_query("Select * from news_type where Status ='E'") or die(ets_db_error());
		while($groupres = ets_db_fetch_array($groupqry)){
			$group_arr[$groupres['news_type_id']] = $groupres['news_type'];
		}
		return $group_arr;
	}
	function getproject_typelist(){
		$groupqry = ets_db_query("Select * from project_type where Status ='E'") or die(ets_db_error());
		while($groupres = ets_db_fetch_array($groupqry)){
			$group_arr[$groupres['pTypeID']] = $groupres['pTypeTitle'];
		}
		return $group_arr;
	}
	function getproject_typeParent($typeID){
		$groupqry = ets_db_query("Select * from project_type where pTypeID = '".$typeID."' ") or die(ets_db_error());
		$groupres = ets_db_fetch_array($groupqry);
		return $groupres['pTypeParent'];
	}
	function getproject_typeTitle($typeID){
		$groupqry = ets_db_query("Select * from project_type where pTypeID = '".$typeID."' ") or die(ets_db_error());
		$groupres = ets_db_fetch_array($groupqry);
		return $groupres['pTypeTitle'];
	}
	function getSeoModule($seoslug,$module_id){
		$seomodule = ets_db_query("Select * from seo_link_master where seo_slug = '".$seoslug."' and module_id = '".$module_id."' ") or die(ets_db_error());
		$sesmoduleres = ets_db_fetch_array($seomodule);
		return $sesmoduleres['module_name'];
	}
	function getNewsType($NewsID){
		$customer_qry = ets_db_query("select * from news_type where news_type_id = '".$NewsID."' ") or die(ets_db_error());
		$rs = ets_db_fetch_array($customer_qry);
		return $rs['news_type'];
    }
    function gettestimoniallist(){
		$testimonialqry = ets_db_query("Select * from testimonial_master where Status ='E'") or die(ets_db_error());
		while($testimonialres = ets_db_fetch_array($testimonialqry)){
			$testimonial_arr[$testimonialres['testimonial_master_id']] = $testimonialres['testimonial_type'];
		}
		return $testimonial_arr;
	}

	function getfaqlist(){
		$faqqry = ets_db_query("Select * from faq_master where Status ='E'") or die(ets_db_error());
		while($faqres = ets_db_fetch_array($faqqry)){
			$faq_arr[$faqres['faq_master_id']] = $faqres['faq_type'];
		}
		return $faq_arr;
	}


	
//	/* Product start */
	

	function getproducttypelist(){
		$groupqry = ets_db_query("Select * from producttype where Status ='E'") or die(ets_db_error());
		while($groupres = ets_db_fetch_array($groupqry)){
			$group_arr[$groupres['pTypeID']] = $groupres['pTypeTitle'];
		}
		return $group_arr;
	}
	function getproducttypeParent($typeID){
		$groupqry = ets_db_query("Select * from producttype where pTypeID = '".$typeID."' ") or die(ets_db_error());
		$groupres = ets_db_fetch_array($groupqry);
		return $groupres['pTypeParent'];
	}
	function getproducttypeTitle($typeID){
		$groupqry = ets_db_query("Select * from producttype where pTypeID = '".$typeID."' ") or die(ets_db_error());
		$groupres = ets_db_fetch_array($groupqry);
		return $groupres['pTypeTitle'];
	}
	function getproductlist(){
		$groupqry = ets_db_query("Select * from product_type where Status ='E'") or die(ets_db_error());
		while($groupres = ets_db_fetch_array($groupqry)){
			$group_arr[$groupres['product_type_id']] = $groupres['product_type'];
		}
		return $group_arr;
	}
	function getproductType($productID){ 
		$customer_qry = ets_db_query("select * from product_type where product_type_id = '".$productID."' ") or die(ets_db_error());
		$rs = ets_db_fetch_array($customer_qry);
		return $rs['product_type'];
    }
	
//	/* Product end */
?>
