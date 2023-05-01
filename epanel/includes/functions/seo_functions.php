<?php
	function pro_SeoSlug($strToSlug){
		$seoSlug = strtolower($strToSlug);
		$seoSlug= trim($seoSlug);
		$seoSlug = preg_replace("`[.*]`U","",$seoSlug);
		$seoSlug = preg_replace('`&(amp;)?#?[a-z0-9]+;`i','-',$seoSlug);
		$seoSlug = htmlentities($seoSlug, ENT_COMPAT, 'utf-8');
		$seoSlug = preg_replace( "`&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);`i","\1", $seoSlug);
		$seoSlug = preg_replace( array("`[^a-z0-9]`i","`[-]+`") , "-", $seoSlug);
		return $seoSlug;
	}
	function insSeoLnk($eleID, $module, $seoSlug){
		$seo_link_sql = ets_db_query(" Insert into seo_link_master set module_name = '".$module."',seo_slug = '".$seoSlug."',module_id = '".$eleID."',user_id = '".$_SESSION['userID']."',createdate = now(),modifieddate = now(),remote_ip = '".$_SERVER['REMOTE_ADDR']."'") or die("Create SEO Link Query Failed: ".ets_db_error());
		return true;
	}
	function updSeoLnk($eleID, $module, $seoSlug){
		$chkseo = ets_db_query("Select * from seo_link_master where module_id = '".$eleID."' and module_name = '".$module."' ") or die(ets_db_error());
		if(ets_db_num_rows($chkseo) > 0){
			$seo_link_sql = ets_db_query("update seo_link_master set seo_slug = '".$seoSlug."',user_id='".$_SESSION['userID']."',modifieddate = now(),remote_ip='".$_SERVER['REMOTE_ADDR']."' where module_id = '".$eleID."' and module_name = '".$module."' ") or die("Update SEO Link Query Failed: ".ets_db_error());
			//echo "update seo_link_master set seo_slug = '".$seoSlug."',user_id='".$_SESSION['userID']."',modifieddate = now(),remote_ip='".$_SERVER['REMOTE_ADDR']."' where module_id = '".$eleID."' and module_name = '".$module."' ";die;
		}else{
			$seo_link_sql = ets_db_query(" Insert into seo_link_master set module_name = '".$module."',seo_slug = '".$seoSlug."',module_id = '".$eleID."',user_id = '".$_SESSION['userID']."',createdate = now(),modifieddate = now(),remote_ip = '".$_SERVER['REMOTE_ADDR']."'") or die("Create SEO Link Query Failed: ".ets_db_error());
			//echo " Insert into seo_link_master set module_name = '".$module."',seo_slug = '".$seoSlug."',module_id = '".$eleID."',user_id = '".$_SESSION['userID']."',createdate = now(),modifieddate = now(),remote_ip = '".$_SERVER['REMOTE_ADDR']."'";die;
		}
		return true;
	}
	function delSeoLnk($eleID, $module){
		$seo_link_sql = ets_db_query(" Delete from seo_link_master where module_id = '".$eleID."' and module_name = '".$module."' ") or die("Delete SEO Link Query Failed: ".ets_db_error());
		return true;
	}
?>