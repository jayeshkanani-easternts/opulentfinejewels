<?php
	function download_display1(){
		$download_display = '';	
		
		$selcategory = "select * from download_master order by sortorder";
		
		$catequery = ets_db_query($selcategory);
		
		while($download_master = ets_db_fetch_array($catequery)){
		
	    $download_display.='<h4>&nbsp;&nbsp;<i class="icon-circle-arrow-right"></i>&nbsp;'.$download_master['download_type'].'</h4>';
		
		$master_download_qry = "select * from download where download_type = '".$download_master['download_type_id']."' ";

		$download_sql = ets_db_query($master_download_qry);	
		
		if(ets_db_num_rows($download_sql)> 0 ){
		
			$download_display .= '<ul style="list-style:none;">';
			
			while($download_res = ets_db_fetch_array($download_sql)){		  	
			$download_display .= '<li class="down"><h4 class="download"><i class="fa fa-download"></i>&nbsp;&nbsp;&nbsp;<a class="download-icon" title="Download '.$download_res['download_title'].'" href="download_file.php?download='.$download_res['download_id'].'" target="_blank">'.$download_res['download_title'].'</a></h4></li>';
			}
			$download_display .= '</ul><hr>';
		}else{
			$download_display .= '<center><h4>There is no downloadlist available..</h4></center>';
		}
		}		
		return $download_display;
	}
		function download_display2(){
		$download_display = '';	
		
		$selcategory = "select * from download_master order by sortorder";
		
		$catequery = ets_db_query($selcategory);
		
		while($download_master = ets_db_fetch_array($catequery)){
		
	    $download_display.='';
		
		$master_download_qry = "select * from download where download_type = '".$download_master['download_type_id']."' ";

		$download_sql = ets_db_query($master_download_qry);	
		
		if(ets_db_num_rows($download_sql)> 0 ){
		
			$download_display .= '<ul class="side-links">';
			
			while($download_res = ets_db_fetch_array($download_sql)){		  	
			$download_display .= '<li><a title="Download '.$download_res['download_title'].'" href="download_file.php?download='.$download_res['download_id'].'" target="_blank">'.$download_res['download_title'].'</a></li>';
			}
			$download_display .= '</ul>';
		}else{
			$download_display .= '<center><h4>There is no downloadlist available..</h4></center>';
		}
		}		
		return $download_display;
	}
	function download_display(){
		$download_display = '';
		$master_download_qry = "select * from download order by sortorder";
		$download_qry_count = $master_download_qry;
		$download_qry = ets_db_query($download_qry_count);
		$tot = ets_db_num_rows($download_qry);
		$tpg=ceil($tot/10);
		if(isset($_GET['page_id']))
			$pagelimit=($_GET['page_id']-1)*10 ;
		else
		{
			$_GET['page_id']=1;
			$pagelimit=0;
		}
		$master_download_qry .= " limit $pagelimit,50";
		$download_sql = ets_db_query($master_download_qry);
		if(ets_db_num_rows($download_sql) > 0 ){
			$download_display .= '<ul class="none">';
			while($download_res = ets_db_fetch_array($download_sql)){
				$download_display .= '<li class="down"><h4 class="download"><i class="icon-download-alt"></i>&nbsp;&nbsp;<a class="download-icon" title="Download '.$download_res['download_title'].'" href="download_file.php?download='.$download_res['download_id'].'" target="_blank">'.$download_res['download_title'].'</a></h4></li>';
			}
			$download_display .= '</ul>';
			$download_display .= '<div class="clear"></div><div style="border-bottom:1px dashed #ccc; padding-bottom:10px; margin-bottom:10px;"></div>';
			global $webpage;
			$webpage = 'download.php?download_type='.$download_type;
			$download_display .= pagination($webpage,$tpg,$_GET['page_id']);
		}else {
		
			$download_display .= '<center><h4>There is no downlodlist available..</h4></center>';
		}
		
		return $download_display;
	}
	function page_display(){
		$page_qry = ets_db_query("select * from pages");
		$page_display = '<ul>';
		while($page_res = ets_db_fetch_array($page_qry)){
			$page_display .= 'here';
		}
		$page_display .= '<ul>';
	}
	function list_news($rows,$type){
		$newssql = "select * from news where news_type = '".$type."' order by eve_date desc limit 0,".$rows;
		$newqry = ets_db_query($newssql) or die('Query failed : ' . ets_db_error());
		$disp_news = '<ul class="list_1">';
		while($newslist_res = ets_db_fetch_array($newqry)){
			$disp_news .= '
				<li><i class="fa fa-arrow-circle-o-right"></i> '.date('F j, Y',strtotime($newslist_res['eve_date'])).' - <strong>"'.stripslashes($newslist_res['news_title']).'"</strong></li>
					
					';
		}
		$disp_news .= '</ul>';
		return $disp_news;
	}
	function list_testimonials($rows,$type){
		$testisql = "select * from testimonial where testimonial_type = '".$type."' order by createdate desc limit 0,".$rows;
		$testiqry = ets_db_query($testisql) or die('Query failed : ' . ets_db_error());
		$disp_testi = '<ul class="list_1">';
		while($testilist_res = ets_db_fetch_array($testiqry)){
			$disp_testi .= '
				<li><i class="fa fa-arrow-circle-o-right"></i> '.stripslashes($testilist_res['name']).'"</li>
					
					';
		}
		$disp_testi .= '</ul>';
		return $disp_testi;
	}
	
?>
