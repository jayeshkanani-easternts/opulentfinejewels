<?php
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
function get_website_details()
{
	$qry = "Select * from website_master where id = 1";
	$res = ets_db_query($qry);
	$earr = ets_db_fetch_array($res);
	$web_arr = array();
	
	$powered_by = unserialize($earr['powered_by']);
	$social = unserialize($earr['social']);
	$sharing = unserialize($earr['sharing']);
	
	$web_arr['powered_by'] = $powered_by;
	$web_arr['social'] = $social;
	$web_arr['logo'] = DIR_WS_LOGO_PATH.$earr['logo'];
	$web_arr['footer_logo'] = DIR_WS_LOGO_PATH.$earr['footer_logo'];
	$web_arr['copyright'] = $earr['copyright'];
	$web_arr['about_us'] = $earr['about_us'];
	$web_arr['terms'] = $earr['terms'];
	$web_arr['sharing'] = $earr['sharing'];
	
	$web_arr['address1'] = $earr['address1'];
	$web_arr['timings'] = $earr['timings'];
	$web_arr['map_code'] = $earr['map_code'];
	$web_arr['email1'] = $earr['email1'];
	$web_arr['email2'] = $earr['email2'];
	$web_arr['tel1'] = $earr['tel1'];
	$web_arr['tel2'] = $earr['tel2'];
    $web_arr['homeimage'] = DIR_WS_LOGO_PATH.$earr['homeimage'];
	$web_arr['fax'] = $earr['fax'];
	$web_arr['address'] = stripslashes($earr['address']);
    
    $web_arr['diamonds_tel1'] = $earr['diamonds_tel1'];
    $web_arr['diamonds_tel2'] = $earr['diamonds_tel2'];
    $web_arr['re_tel1'] = $earr['re_tel1'];
    $web_arr['re_tel2'] = $earr['re_tel2'];
    $web_arr['re_tel3'] = $earr['re_tel3'];
    $web_arr['mi_tel1'] = $earr['mi_tel1'];
    $web_arr['mi_tel2'] = $earr['mi_tel2'];
    $web_arr['mi_tel3'] = $earr['mi_tel3'];
    $web_arr['ed_tel1'] = $earr['ed_tel1'];
    $web_arr['te_tel1'] = $earr['te_tel1'];
    $web_arr['te_tel2'] = $earr['te_tel2'];
    $web_arr['ho_tel1'] = $earr['ho_tel1'];
    
    $web_arr['diamonds_email1'] = $earr['diamonds_email1'];
    $web_arr['diamonds_email2'] = $earr['diamonds_email2'];
    $web_arr['re_email1'] = $earr['re_email1'];
    $web_arr['re_email2'] = $earr['re_email2'];
    $web_arr['re_email3'] = $earr['re_email3'];
    $web_arr['mi_email1'] = $earr['mi_email1'];
    $web_arr['mi_email2'] = $earr['mi_email2'];
    $web_arr['mi_email3'] = $earr['mi_email3'];
    $web_arr['ed_email1'] = $earr['ed_email1'];
    $web_arr['te_email1'] = $earr['te_email1'];
    $web_arr['te_email2'] = $earr['te_email2'];
    $web_arr['ho_email1'] = $earr['ho_email1'];
    
    
    $web_arr['diamonds_address1'] = stripslashes($earr['diamonds_address1']);
    $web_arr['diamonds_address2'] = stripslashes($earr['diamonds_address2']);
    $web_arr['re_address1'] = stripslashes($earr['re_address1']);
    $web_arr['re_address2'] = stripslashes($earr['re_address2']);
    $web_arr['re_address3'] = stripslashes($earr['re_address3']);
    $web_arr['mi_address1'] = stripslashes($earr['mi_address1']);
    $web_arr['mi_address2'] = stripslashes($earr['mi_address2']);
    $web_arr['mi_address3'] = stripslashes($earr['mi_address3']);
    $web_arr['ed_address1'] = stripslashes($earr['ed_address1']);
    $web_arr['te_address1'] = stripslashes($earr['te_address1']);
    $web_arr['te_address2'] = stripslashes($earr['te_address2']);
    $web_arr['ho_address1'] = stripslashes($earr['ho_address1']);
	
	return $web_arr;
}

function get_social_details(){
    $qry = "Select sharing from website_master where id = 1";
	$res = ets_db_query($qry);
	$earr = ets_db_fetch_array($res);
	$web_arr = array();
    $sharing = unserialize($earr['sharing']);
    $web_arr['sharing'] = $earr['sharing'];
    return $web_arr;
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
function tep_date_dmy($txtvalue) {
$dty=substr($txtvalue,0,4);
$dtd=substr($txtvalue,8,2);
$dtm=substr($txtvalue,5,2);
$dt=$dtd.".".$dtm.".".$dty;
return $dt;
}
function tep_date($txtvalue) {
$dty=substr($txtvalue,6);
$dtd=substr($txtvalue,3,2);
$dtm=substr($txtvalue,0,2);
$dt=$dty."-".$dtm."-".$dtd;
return $dt;
}
function clean($data) {
	$data = escapeshellcmd($data);
	$data = preg_replace("/\.\./", "", $data);
	$data = preg_replace("/^\//", "", $data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	$data = trim($data);
	return $data;
}

function tep_word_trim($string, $count, $ellipsis = FALSE){
  $words = explode(' ', strip_tags($string));
  if (count($words) > $count){
    array_splice($words, $count);
    $string = implode(' ', $words);
    if (is_string($ellipsis)){
      $string .= $ellipsis;
    }
    elseif ($ellipsis){
      $string .= '&hellip;';
    }
  }
  return $string;
}
function the_page($page){
	$pgqry = "select * from page_master where page_id = '".$page."'";
	$pgqry_exec = ets_db_query($pgqry) or die(ets_db_error());
	if(ets_db_num_rows($pgqry_exec) > 0){
		$pgarr = ets_db_fetch_array($pgqry_exec);
		return $pgarr['page_content'];
	}
	else{
		return "!!! Requesting Page Not Found...";
	}
	
	
}
	function pro_SeoSlug($strToSlug){
		$seoSlug = strtolower($strToSlug);
		$seoSlug= trim($seoSlug);
		$seoSlug = preg_replace("`[.*]`U","",$seoSlug);
		$seoSlug = preg_replace('`&(amp;)?#?[a-z0-9]+;`i','-',$seoSlug);
		$seoSlug = htmlentities($seoSlug, ENT_COMPAT, 'utf-8');
		$seoSlug = preg_replace( "`&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);`i","\1", $seoSlug);
		$seoSlug = preg_replace( array("`[^a-z0-9]`i","`[-]+`") , "-", $seoSlug);
		$seoSlug = str_replace( "---" , "-", $seoSlug);
		return $seoSlug;
	}
	function getSeoModule($seoslug,$module_id){
		
		$seomodule = ets_db_query("Select * from seo_link_master where seo_slug = '".$seoslug."' and module_id = '".$module_id."' ") or die(ets_db_error());
		$sesmoduleres = ets_db_fetch_array($seomodule);
		return $sesmoduleres['module_name'];
	}
function has_sub_pages($pageid){
	$qrypage = ets_db_query("select page_id from page_master where parent_id = '".$pageid."'") or die(ets_db_error());
	if(ets_db_num_rows($qrypage)>0){
		return 1;
	}
	else{
		return 0;
	}
}

function tep_get_username($userid){
	$userqry = ets_db_query("Select * from usermst where userID='".$userid."'");
	while($userres = ets_db_fetch_array($userqry)){
		$username = $userres['name'];
	}
	return $username;
}
function chkuser($emailid){
	$userqry = ets_db_query("Select * from usermst where email='".$emailid."'");
	if(ets_db_num_rows($userqry) > 0){
		return false;
	}
	else{
		return true;
	}
}

function subMenu($pgparent){
	$dept_display = '';
	$deptmain_sql = ets_db_query("select * from page_master where parent_id = '".$pgparent."' order by sortorder") or die(ets_db_error());
	if(ets_db_num_rows($deptmain_sql) > 0 ){
		while($deptmain_res = ets_db_fetch_array($deptmain_sql)) {
			if($module_id == $deptmain_res['page_id']){
				$page_class='class="active"';
			}
			else{
				$page_class='';
			}
		
			$dept_display .= '<li><a href="'.get_pageseo_url($deptmain_res['page_id'],'pages').'" title="'.$deptmain_res['page_title'].'" '.$page_class.'>'.$deptmain_res['page_title'].'</a>';
			$deptsub_sql = ets_db_query("select * from page_master where parent_id = '".$deptmain_res['page_id']."' order by sortorder");
			if(ets_db_num_rows($deptsub_sql) > 0 ){
				$dept_display .= '<ul class="dropdown-menu">';
				while($deptsub_res = ets_db_fetch_array($deptsub_sql)) {
					$dept_display .= '<li><a href="'.get_pageseo_url($deptsub_res['page_id'],'pages').'" title="'.$deptsub_res['page_title'].'">'.$deptsub_res['page_title'].'</a></li>';
				}
				$dept_display .= '</ul>';
			}
			
			$dept_display .= '</li>';
		}
		
	}
	return $dept_display;
}

function projectMenu(){
	$menuList = "";
	$proSql = ets_db_query("Select * from producttype where status = 'E' order by sortorder") or die(ets_db_error());
	while($lrs = ets_db_fetch_array($proSql)){
		if($module_id == $lrs['pTypeID']){
			$page_class='class="active"';
		}
		else{
			$page_class='';
		}
		$menuList .= '<li><a href="'.get_pageseo_url($lrs['pTypeID'],'projects').'" title="'.$lrs['pTypeTitle'].'" '.$page_class.'>'.$lrs['pTypeTitle'].'</a></li>';
	}
	return $menuList;

}
function projectfMenu($module_id){
	$menuList = "";
	$proSql = ets_db_query("Select * from producttype where status = 'E' order by sortorder") or die(ets_db_error());
	while($lrs = ets_db_fetch_array($proSql)){
		if($module_id == $lrs['pTypeID']){
			$page_class='data-class="active"';
		}
		else{
			$page_class='';
		}
		$menuList .= '<li class="prjfltr" data-filter="'.get_pageseo_url($lrs['pTypeID'],'projects').'" '.$page_class.'>'.$lrs['pTypeTitle'].'</li>';
	}
	return $menuList;

}

function breadcrumblist($currentpageid){
	
	$checkparent = getparentid($currentpageid);
	$pagelist[$checkparent['page_id']]=$checkparent['page_title'];
	
	if($checkparent['parent_id'] > 0){
		$check2nd =  getparentid($checkparent['parent_id']);
		$pagelist[$check2nd['page_id']] = $check2nd['page_title'];
		if($check2nd['parent_id'] > 0){
			$check3rd =  getparentid($check2nd['parent_id']);
			$pagelist[$check3rd['page_id']] = $check3rd['page_title'];
			if($check3rd['parent_id'] > 0){
				$check4th =  getparentid($check3rd['parent_id']);
				$pagelist[$check4th['page_id']] = $check4th['page_title'];
			}
		}
	}
	$pagelist = array_reverse($pagelist);
	return $pagelist;
}
function getparentid($togetid){
	$parentqry = ets_db_query("select * from page_master where page_id = '".$togetid."'") or die(ets_db_error());
	if(ets_db_num_rows($parentqry) > 0){
		$parentrs = ets_db_fetch_array($parentqry);
		return $parentrs;
	}
}


/* Get News Type Name */
function getNewsType($NewsID){
	$customer_qry = ets_db_query("select * from news_type where news_type_id = '".$NewsID."' ") or die(ets_db_error());
	$rs = ets_db_fetch_array($customer_qry);
	return $rs['news_type'];
}
/* List News Widget */
function widgetNews($listno,$type){
	$sqlnews = "select * from news where status = 'E' order by sortorder desc limit 0,".$listno; 
	$sql = ets_db_query($sqlnews) or die('Query failed : ' . ets_db_error());
	$newsList = "";
	while($rs = ets_db_fetch_array($sql)){
		$news_type = "News/".strtolower(str_replace(" ","-",getNewsType($rs['news_type'])));
		$newsList .= '
		<li class="testimonial">
			<a href="'.get_pageseo_url($rs['news_id'],$news_type).'"><strong>'.$rs['news_title'].'</strong></a><br>
			<i class="icon-calendar"></i> <i>'.$rs['eve_date'].'</i><br>
			
		</li>';
	}
	return $newsList;
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
/* Get Album Name */
function getAlbumName($albumID){
	$albumQry = ets_db_query("select * from album where a_id = '".$albumID."' ") or die(ets_db_error());
	$rs = ets_db_fetch_array($albumQry);
	return $rs['a_title'];
}
/* Get Branch List */
function getBranchList(){
	$branchQry = ets_db_query("select * from branch_master order by sortorder ") or die(ets_db_error());
	$branchlist = "";
	while($rs = ets_db_fetch_array($branchQry)){
		$branchlist .= '<option value="'.$rs['branch_name'].'">'.$rs['branch_name'].'</option><br>';
	}
	return $branchlist;
}
/* Get Designation Name */
function getDesgName($desgID){
	$desgQry = ets_db_query("select * from designation_master where design_id = '".$desgID."' ") or die(ets_db_error());
	$rs = ets_db_fetch_array($desgQry);
	return $rs['design_title'];
}
/* Get Module ID */
function getModuleID($moduleName){
	$modQry = ets_db_query("select * from seo_link_master where seo_slug = '".$moduleName."' ") or die(ets_db_error());
	$rs = ets_db_fetch_array($modQry);
	return $rs['module_id'];	
}
/* Get Post */
function get_post(){
$post_string = '';
$post_string .= '<option value="Clerk">Clerk</option>   
                            <option value="Officer">Officer</option>   
                            <option value="Executive">Executive</option>
                            <option value="Manager">Manager</option> 
<option value="Senior Manager">Senior Manager</option>';
return $post_string;
}

/* Get Product Type Name */
function getproducttype($pTypeID){
	$pType_qry = ets_db_query("select * from producttype where pTypeID = '".$pTypeID."' ") or die(ets_db_error());
	$rs = ets_db_fetch_array($pType_qry);
	return $rs['pTypeTitle'];
}
	
function getalbumtypeName($type_id){
    $albumname = ets_db_query("select * from album_type where type_id='".$type_id."' ") or die(ets_db_error());
    $rs = ets_db_fetch_array($albumname);
    return $rs['album_title'];
}
function getservicesname($servicesID){
		$packname = "select * from services where servicesID='".$servicesID."' ";
		$packQry = ets_db_query($packname) or die(ets_db_error());
		$pa = ets_db_fetch_array($packQry);
		return $pa['servicesTitle'];
}  
function geteventname($programs_id){
		$packname = "select * from event where programs_id='".$programs_id."' ";
		$packQry = ets_db_query($packname) or die(ets_db_error());
		$pa = ets_db_fetch_array($packQry);
		return $pa['programs_title'];
}  
   
function the_services($servicesID){
		$pgqry = "select * from services where servicesID='".$servicesID."' ";
		$pgqry_exec = ets_db_query($pgqry) or die(ets_db_error());
		if(ets_db_num_rows($pgqry_exec) > 0){
			$pgarr = ets_db_fetch_array($pgqry_exec);
			return $pgarr['description'];
		}
		else{
			return "!!! Requesting Testimonial Not Found...";
		}
	
}

function send_email($to_array,$reply_to,$subject,$message_body,$attachment)
{
    //return true;
    $Mail = new PHPMailer();
    try
    {
        $Mail->IsSendmail(); // Use SMTP
//			$Mail->IsSMTP(); // Use SMTP
        $Mail->Mailer = MAIL_MAILER;
        $Mail->Host        = MAIL_HOST; // Sets SMTP server
// 			$Mail->SMTPDebug   = 2; // 2 to enable SMTP debug information
        $Mail->SMTPAuth    = MAIL_SMTPAuth; // enable SMTP authentication
        $Mail->SMTPSecure  = MAIL_SMTPSecure; //Secure conection
        $Mail->Port        = MAIL_PORT; // set the SMTP port
        $Mail->Username    = MAIL_USERNAME; // SMTP account username
        $Mail->Password    = MAIL_PASSWORD; // SMTP account password
        $Mail->Priority    = MAIL_PRIORITY; // Highest priority - Email priority (1 = High, 3 = Normal, 5 = low)
        $Mail->XMailer     = MAIL_XMAILER;
        $Mail->CharSet     = MAIL_CHARSET;
        $Mail->Encoding    = MAIL_ENCODING;
        $Mail->Subject     = $subject;
        $Mail->ContentType = MAIL_CONTENTTYPE;
        $Mail->From        = MAIL_FROM;
        $Mail->FromName    = MAIL_FROMNAME;
        $Mail->WordWrap    = MAIL_WORDWRAP; // RFC 2822 Compliant for Max 998 characters per line
        $Mail->AddReplyTo($reply_to);
// 			$Mail->AddAddress($to);

        foreach($to_array as $to)
        {
            $Mail->AddAddress($to);
        }
        $Mail->isHTML( TRUE );
        foreach($attachment as $att)
        {
            $Mail->addAttachment($att);
        }
        $Mail->Body    = $message_body;
        if($Mail->Send())
        {
//               echo "send mail";
            $Mail->SmtpClose();
            return true;
        }
        else
        {
//            echo "not send mail";
            $Mail->SmtpClose();
            return false;
        }


    }

    catch (phpmailerException $e)
    {


    }
}

/* Dynamic Header Image */
function get_banner_image($bannerid){
    $bannersql = "select * from banner_image where bannerID='".$bannerid."' ";
    $bannerqry = ets_db_query($bannersql) or die(ets_db_error());
    if(ets_db_num_rows($bannerqry) > 0){
        $bannerarr = ets_db_fetch_array($bannerqry);
        return $bannerarr;
    }
    else{
        return "";
    }
}

/* Dynamic Header Image */


/* Sharable Links */
function get_facebook_share_link($url,$image,$title,$description)
{
    $link = "https://www.facebook.com/sharer/sharer.php?u=".$url."&picture=".urlencode($image)."&title=".urlencode($title)."&description=".urlencode($description);
    return $link;
}

function get_facebook_video_share_link($video,$image,$title,$description){
	$link = "https://www.facebook.com/sharer/sharer.php?u=".$video."&picture=".urlencode($image)."&title=".urlencode($title)."&description=".urlencode($description);
	return $link;
}

function get_twitter_share_link($url,$title)
{
    $link = "https://twitter.com/intent/tweet?text=".$title."&url=".$url;
    return $link;
}
function get_google_plus_share_link($url)
{
    $link = "https://plus.google.com/share?url=".$url;
    return $link;
}
function get_linkedin_share_link($url)
{
    $link = "https://www.linkedin.com/shareArticle?mini=true&url=".$url;
    return $link;
}
function get_pinterest_share_link($url,$image,$description)
{
    $link = "https://pinterest.com/pin/create/button/?url=".$url."&media=".urlencode($image)."&description=".urlencode($description);
    return $link;
}
/* Sharable Links */

function get_default_template($message,$title)
{
    $message = '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/1999/REC-html401-19991224/strict.dtd">
    <html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>
            '.$title.'
        </title>
    </head>

    <body style="font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #000000;">
        <div>
            <div style="font-size:1px;display:none!important"></div>
            <table border="0" cellpadding="0" cellspacing="0" width="100%" bgcolor="#ffffff" align="center">
                <tbody>
                    <tr>
                        <td>
                            <table width="800px" cellpadding="0" cellspacing="0" border="0" bgcolor="#ffffff" align="center">
                                <tbody>
                                    <tr valign="top">
                                        <td align="center" style="padding-top:30px">
                                            <a href="" target="_blank"><img src="'.MAIL_LOGO.'" height="100" width="auto" border="0" alt="'.LOGO_ALT.'" style="display:block;color:#4c9ac9" align="middle" class="CToWUd"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="color:#cccccc;padding-top:30px" valign="top">
                                            <hr color="cccccc" size="1">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="top" style="padding-top:30px;padding-bottom:30px;font-family:Helvetica neue,Helvetica,Arial,Verdana,sans-serif;color:#205081;font-size:20px;line-height:40px;text-align:center;font-weight:bold" align="middle">
                                            '.$message.'
                                        </td>
                                    </tr>
                                    <tr></tr>
                                </tbody>
                            </table>

                        </td>
                    </tr>
                    <tr>
                        <td>

                            <table width="800px" cellpadding="0" cellspacing="0" border="0" bgcolor="#ffffff" align="center">
                                <tbody>
                                    <tr>
                                        <td style="color:#cccccc" valign="top">
                                            <hr color="cccccc" size="1">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="top" style="padding-top:10px;font-family:Helvetica,Helvetica neue,Arial,Verdana,sans-serif;color:#707070;font-size:12px;line-height:18px;text-align:center;font-weight:none" align="center"> <b>Email</b> : <a href="mailto:info@opulentfinejewels.com" target="_blank">info@opulentfinejewels.com</a></td>
                                    </tr>
                                   
                                   
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>

                            <table width="800px" cellpadding="0" cellspacing="0" border="0" bgcolor="#ffffff" align="center">
                                <tbody>
                                    <tr>
                                        <td style="color:#cccccc" valign="top">
                                            <hr color="cccccc" size="1">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td valign="top" style="padding-top:10px;font-family:Helvetica,Helvetica neue,Arial,Verdana,sans-serif;color:#707070;font-size:12px;line-height:18px;text-align:center;font-weight:none" align="center">
                                            <?php echo date( "Y" ); ?>
                                            © Opulent Fine Jewels. All rights reserved. Designed by <a href="http://www.kavisashah.com/"  target="_blank">Kavisa Shah </a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>


                </tbody>
            </table>
        </div>
    </body>

    </html>';
    
    return $message;
}



?>