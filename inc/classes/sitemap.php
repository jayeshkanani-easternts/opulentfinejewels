<?php
class sitemap{
function sitemap_display(){
$display ='';
$toppages = ets_db_query("Select p.*,pd.* from page_master p,page_description pd where p.page_parent=0 and p.page_id = pd.page_id") or die(ets_db_error());
while($toprs = ets_db_fetch_array($toppages)){
	$display .='<li class="mainli"><a href="index.php?page='.$toprs['page_id'].'" title="'.$toprs['page_name'].'">'.$toprs['page_name'].'</a>';
	if($this->has_sub_pages($toprs['page_id']) == 1){
	$display .= $this->get_pages($toprs['page_id']);
	
	}//2nd Level
	
	else{
	$display .= '</li>';
	}
}//1st Level

return $display;
}
function has_sub_pages($pageid){
$qrypage = ets_db_query("Select p.*,pd.* from page_master p,page_description pd where p.page_parent= '".$pageid."' and p.page_id = pd.page_id") or die(ets_db_error());
		if(ets_db_num_rows($qrypage)>0){
			return 1;
		}
		else{
			return 0;
		}
}
function get_pages($pageid){
$qrypage = ets_db_query("Select p.*,pd.* from page_master p,page_description pd where p.page_parent = '".$pageid."' and p.page_id = pd.page_id") or die(ets_db_error());
	$string .='<ul>';
	while($secondlev = ets_db_fetch_array($qrypage)){
	$string .=  '<li class="subli"><a href="index.php?page='.$secondlev['page_id'].'" title="'.$secondlev['page_name'].'">'.$secondlev['page_name'].'</a></li>';
	if($this->has_sub_pages($secondlev['page_id']) == 1){
	$string .= $this->get_pages($secondlev['page_id']);
	}
	}
	$string .='</ul>';
		
return 	$string;
}
function get_text_file(){
$myFile = "inc/sitemap.txt";
$fh = fopen($myFile, 'r');
 while (!feof ($fh)) {
$theData .= fgets($fh);
}
fclose($fh);
return $theData;
}
}?>