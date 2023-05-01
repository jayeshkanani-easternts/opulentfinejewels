<?php
function get_page_name($pageID){
	$pageqry = ets_db_query("select * from page_master where page_id = '".$pageID."'") or die ("Get Page Name Query Failed: ".ets_db_error());
	$pageresult = ets_db_fetch_array($pageqry);
	return $pageresult['page_title'];
}
function get_latest_pages($limit='5'){
	$latestpages = ets_db_query("select * from page_master limit 0,$limit") or die(ets_db_error()); 
	while($latestpagesrs = ets_db_fetch_array($latestpages)){
		$pre_page = "index.php?pgid=".$latestpagesrs['page_id'];
		$latestpages_string .= '
			
			<strong><a href='.HTTP_SERVER.WS_ROOT.$pre_page.' target="_blank" class="main">'.$latestpagesrs['page_title'].'</a></strong><br />
			';
	}
	return $latestpages_string;
}
/*BOF SEO function for page*/
	function get_pageseo_url($pageid){
	$seoqry = "Select page_slug from page_master where page_id = '".$pageid."'";
	$seoexecute = ets_db_query($seoqry) or die(ets_db_error());
		if(ets_db_num_rows($seoexecute) > 0){
			$seorow = ets_db_fetch_array($seoexecute);
			$seourl = $seorow['page_name'].".html";
			//$seourl = 'onlineassignment/'.$seorow['page_slug'].'/';
			return $seourl;
		}
		else{
			return false;
		}
	}
/*EOF SEO function for page*/
function has_sub_pages($pageid){
		$qrypage = ets_db_query("select page_id from page_master where parent_id = '".$pageid."'") or die(ets_db_error());
		if(ets_db_num_rows($qrypage)>0){
			return 1;
		}
		else{
			return 0;
		}
	}
function find_page_id($pagename) {
		$pqry = ets_db_query("select * from page_master where page_title = '" .$pagename. "' ");
		if (ets_db_num_rows($pqry)>0) {
		$pres = ets_db_fetch_array($pqry);
		return $pres['page_id'];
		} else
		{
		return 0;
		}
	}
	
	function fill_main_page(){
		$toppages = ets_db_query("Select page_id,page_title,parent_id from page_master where parent_id=0") or die(ets_db_error());
		while($toprs = ets_db_fetch_array($toppages)){
		$pagechqry = ets_db_query("select parent_id from page_master where page_id='".$_GET['pgID']."'") or die(ets_db_error());
		while($pagech = ets_db_fetch_array($pagechqry)){
			if($pagech['parent_id'] == $toprs['page_id']){
				$selected = "selected";
			}
			else{
				$selected = "";
			}
			if(has_sub_pages($toprs['page_id'])){
				$pagedropdown .= '<option value="'.$toprs['page_id'].'" '.$selected.'>&nbsp;&nbsp;'.$toprs['page_title'].'</option>';
				$secondlevel = ets_db_query("Select * from page_master where parent_id='".$toprs['page_id']."'") or die(ets_db_error());
				while($level2rs = ets_db_fetch_array($secondlevel)){
					if($pagech['parent_id'] == $level2rs['page_id']){
						$selected = "selected";
					}
					else{
						$selected = "";
					}
					if(has_sub_pages($level2rs['page_id']) == 1){
						$pagedropdown .= '<option value="'.$level2rs['page_id'].'" '.$selected.'>&nbsp;&nbsp;&nbsp;&nbsp;|__'.$level2rs['page_title'].'</option>';
						$thirdlevel = ets_db_query("Select * from page_master where parent_id='".$level2rs['page_id']."'") or die(ets_db_error());
						while($level3rs = ets_db_fetch_array($thirdlevel)){
							if($pagech['parent_id'] == $level3rs['page_id']){
							$selected = "selected";
							}
							else{
								$selected = "";
							}
							if(has_sub_pages($level3rs['page_id']) == 1){
							$pagedropdown .= '<option value="'.$level3rs['page_id'].'" '.$selected.'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|__'.$level3rs['page_title'].'</option>';
							$fourthlevel = ets_db_query("Select * from page_master where parent_id='".$level3rs['page_id']."'") or die(ets_db_error());
								while($level4rs = ets_db_fetch_array($fourthlevel)){
									if($pagech['parent_id'] == $level4rs['page_id']){
									$selected = "selected";
									}
									else{
										$selected = "";
									}	
									if(has_sub_pages($level4rs['page_id']) == 1){
									$pagedropdown .= '<option value="'.$level4rs['page_id'].'" '.$selected.'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|__'.$level4rs['page_title'].'</option>';
									}
								}// 4th level loop over
							}
						} // 3rd level loop over
					}
				} // 2nd level loop over
			}
			else{
				$pagedropdown .= '<option value="'.$toprs['page_id'].'" '.$selected.'>&nbsp;&nbsp;'.$toprs['page_title'].'</option>';
			}
		}	
	} // Top Level Loop
	return $pagedropdown;
	}
	function fill_template_array(){
		$temp_arr = '';
		$tempqry = ets_db_query("Select * from template_master");
		while($tempres = ets_db_fetch_array($tempqry)){
			$temp_arr[$tempres['template_name']] = $tempres['template_title']; 
		}
		return $temp_arr;
	}
	function display_menu_items( $item_array,$selected_item = '', $parent_id = 0, $parent_depth = 0 ) { 
		foreach( $item_array as $item_id => $item_information ) { 
		    if ( $item_information['parent_id'] == $parent_id ) { 
				$link_text = "";
	            $sep = ""; 
	            for ($i = 0; ( $i < $parent_depth ); $i++ ) { 
	                $sep .= '-&nbsp;'; 
	            } 
	            if ( $item_information['page_title'] != '' ) { 
		    if(isset($selected_item) && $selected_item == $item_information['page_id'])
		    {
                        
				//$rolegoal = $item_information['rolegoal'];			  
				$link_text .= '<option selected = "selected" value="'.$item_information['page_id'].'">'.$sep.$item_information['page_title']; 
				
		    }
		    else{
		        $link_text .= '<option value="'.$item_information['page_id'].'">'.$sep.$item_information['page_title']; }
	            } 
	            $link_text .= '</option>';
				$display .=   $link_text;   
				$display .= display_menu_items( $item_array,$selected_item,$item_id,( $parent_depth + 1 ) );
	         $carry_rolegoal = $rolegoal;
			}
		$rolegoal = $carry_rolegoal;
		
	    } 
	return $display;
	}
	
	
	
?>