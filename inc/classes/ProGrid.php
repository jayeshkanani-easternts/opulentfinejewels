<script> 
	function changepg(pgurl,pgid){ 
		location.href=pgurl+pgid; 
	}
</script>
<?php
// Class Datagrid V 1.0
// Created by DejiTaru
// 20 september 2005
// email: dejitaru@gmail.com
// Email me please!!
// Update: 3/jan/2006

class ProGrid
{
	var $DG_query;
	var $DG_primary_key;
	var $DG_page_size;
	var $DG_totalFields;
	var $dataGrid;
	var $DG_tools;
	var $DG_total_tools;
	var $DG_pager;
	var $DG_custom_col_name;
	var $DG_custom_col_sort;
	var $DG_custom_col_type;
	var $DG_col_class;
	var $DG_title;
	var $DG_checkbox=FALSE;

	function ProGrid()
	{
	       $this->dataGrid="";
	       $this->DG_page_size=1000;
		   $this->DG_total_tools=0;
	}
	function set_query($pSQLquery,$pPrimaryKey)
	{
		$this->DG_query = $pSQLquery;
		$this->DG_primary_key=$pPrimaryKey;
	}
	function set_title($ptitle)
	{
	        $this->DG_title=$ptitle;
	}
	function show_checkbox($pShow)
	{
	        $this->DG_checkbox=$pShow;
	}
	function set_tool($pType,$pShow,$pLink,$pOptional)
	{
		$this->tools[$this->DG_total_tools]['type']=$pType;
		$this->tools[$this->DG_total_tools]['show']=$pShow;
		$this->tools[$this->DG_total_tools]['link']=$pLink;
		$this->tools[$this->DG_total_tools]['optionalText']=$pOptional;
		$this->DG_total_tools++;		
	}
	function set_col_name($dbField,$colName)
	{
        $this->DG_custom_col_name[$dbField]=$colName;
    }
        
	function set_col_type($dbField,$colType,$p1="",$p2="")
	{
		$this->DG_custom_col_type[$dbField]["fieldName"]=$dbField;
		$this->DG_custom_col_type[$dbField]["type"]=$colType;
		switch ($colType){
			case "LNK":
					   if($p1!=""){
							$this->DG_custom_col_type[$dbField]["link"]=$p1;
					   }
					   if($p2!=""){
							$this->DG_custom_col_type[$dbField]["optionalText"]=$p2;
					   }
					   break;
			case "DATE":
					   $this->DG_custom_col_type[$dbField]["format"]=$p1;
					   break;
			case "IMG":
					   break;
	
		}
	}
	function set_col_class($colClass){
		$this->DG_col_class = $colClass;
	}
	function set_tools($pTools)
	{
	
	}
	function set_page_size($pPageSize)
	{
		$this->DG_page_size=$pPageSize;
		$this->build_pager();
	}
	
	function build_pager()
	{
		if (isset($_GET['pg'])) { // Get pn from URL vars if it is present
			$curpage = preg_replace('#[^0-9]#i', '', $_GET['pn']); // filter everything but numbers for security(new)
		} else { // If the pn URL variable is not present force it to be value of page number 1
			$curpage = 1;
		}
		if (isset($_GET['pg'])){
			$curpage = $_GET['pg'];
		}else{
			$curpage = '1';
		}
	    $totalRows=ets_db_num_rows(ets_db_query($this->DG_query));
		$totalPages=ceil($totalRows/$this->DG_page_size);
		$this->DG_pager="[ Total Records: ".$totalRows." ]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		$pos = strpos($_SERVER['REQUEST_URI'],'&pg=');
		if($pos > 0){
			$pgurl = substr($_SERVER['REQUEST_URI'],0,$pos).'&pg=';
		}else{
			$pgurl = $_SERVER['REQUEST_URI'].'&pg=';
		}
		// Be sure URL variable $pn(page number) is no lower than page 1 and no higher than $lastpage
		if ($curpage < 1) { // If it is less than 1
			$curpage = 1; // force if to be 1
		} else if ($curpage > $totalPages) { // if it is greater than $totalPages
			$curpage = $totalPages; // force it to be $totalPages's value
		}
		// Create Page Dropdown
		$pagedd = "";
		$pagedd .= '<select name="pg" onchange="javascript:changepg(\''.$pgurl.'\',this.value)" >';
			for($i=1;$i<=$totalPages;$i++){
				$selected = "";
				if(isset($_GET['pg']) && $_GET['pg'] == $i){
					$selected = ' selected';
				}
				$pagedd .= '<option value="'.$i.'" '.$selected.'>'.$i.'</option>';
			}
		$pagedd .= '</select>';
		// This section is explained well in the video that accompanies this script
		$centerPages = "";
		$sub1 = $curpage - 1;
		$sub2 = $curpage - 2;
		$add1 = $curpage + 1;
		$add2 = $curpage + 2;
		if ($curpage == 1) {
			$centerPages .= '&nbsp; <span class="pagNumActive">' . $curpage . '</span> &nbsp;';
			$centerPages .= '&nbsp; <a href="' . $pgurl . $add1 . '">' . $add1 . '</a> &nbsp;';
		} else if ($curpage == $totalPages) {
			$centerPages .= '&nbsp; <a href="' . $pgurl . $sub1 . '">' . $sub1 . '</a> &nbsp;';
			$centerPages .= '&nbsp; <span class="pagNumActive">' . $curpage . '</span> &nbsp;';
		} else if ($curpage > 2 && $curpage < ($totalPages - 1)) {
			$centerPages .= '&nbsp; <a href="' . $pgurl . $sub2 . '">' . $sub2 . '</a> &nbsp;';
			$centerPages .= '&nbsp; <a href="' . $pgurl . $sub1 . '">' . $sub1 . '</a> &nbsp;';
			$centerPages .= '&nbsp; <span class="pagNumActive">' . $curpage . '</span> &nbsp;';
			$centerPages .= '&nbsp; <a href="' . $pgurl . $add1 . '">' . $add1 . '</a> &nbsp;';
			$centerPages .= '&nbsp; <a href="' . $pgurl . $add2 . '">' . $add2 . '</a> &nbsp;';
		} else if ($curpage > 1 && $curpage < $totalPages) {
			$centerPages .= '&nbsp; <a href="' . $pgurl . $sub1 . '">' . $sub1 . '</a> &nbsp;';
			$centerPages .= '&nbsp; <span class="pagNumActive">' . $curpage . '</span> &nbsp;';
			$centerPages .= '&nbsp; <a href="' . $pgurl . $add1 . '">' . $add1 . '</a> &nbsp;';
		}

		$paginationDisplay = "";
		if ($totalPages != "1"){
			
			$paginationDisplay .= 'Page <strong>' . $curpage . '</strong> of ' . $totalPages. '&nbsp;  &nbsp;  &nbsp; '.$pagedd;
			
			if ($curpage != 1) {
				$previous = $curpage - 1;
				$paginationDisplay .=  '&nbsp;  <a href="' . $pgurl . $previous . '"> Back</a> ';
			}
			// Lay in the clickable numbers display here between the Back and Next links
			$paginationDisplay .= '<span class="paginationNumbers">' . $centerPages . '</span>';
			// If we are not on the very last page we can place the Next button
			if ($curpage != $totalPages) {
				$nextPage = $curpage + 1;
				$paginationDisplay .=  '&nbsp;  <a href="' . $pgurl . $nextPage . '"> Next</a> ';
			}
		}	
		
		$this->DG_pager.=$paginationDisplay;
	       
	}
	function set_col_sort($dbField,$issort){
		$this->DG_custom_col_sort[$dbField]=$issort;
	}
	function display()
	{
	        if(isset($_GET['sortord'])){
			$ordqry = " order by ".$_GET['fld']." ".$_GET['sortord'];
	        }else{
			$ordqry = "";
	        }
		
		if (!isset($_GET['pg']))
	        	$SQLresult=ets_db_query($this->DG_query.$ordqry." LIMIT 0,".$this->DG_page_size);
		else{
			$a=($_GET['pg']-1)*$this->DG_page_size;
			$b=$this->DG_page_size;
			$SQLresult=ets_db_query($this->DG_query.$ordqry." LIMIT $a,$b") or die(ets_db_error());
		}
		//title
		//$this->dataGrid.='<table width="100%" cellpadding="0" cellspacing="0" border="0" class="dgTable"> ';
		//$this->dataGrid.='<tr><td class="dgFooter" align="right">'.$this->DG_pager.'</td></tr></table>';
		if ($this->DG_title!='')
            $this->dataGrid.="<span class='dgTitle'>".$this->DG_title."<span>\n";
			$this->dataGrid.="<table class='dgTable'><tr class='dgHeader'>\n";
			if($this->DG_checkbox==TRUE)
				//$this->dataGrid.="<td class='dgHeadertd'><input name='checkall' type='checkbox' onClick='checkAll()' class='dgCheckbox'></td>";
				$this->dataGrid.="<td class='dgHeadertd'>&nbsp;</td>";
	        // Header
	        $this->DG_totalFields=ets_db_num_fields($SQLresult);
	        for ($i=0;$i<$this->DG_totalFields;$i++)
                {
			if($this->DG_custom_col_sort[ets_db_field_name($SQLresult,$i)] == 'y'){
				$sortasclnk = '<a href="'. $_SERVER['REQUEST_URI'].'&sortord=asc&fld='.ets_db_field_name($SQLresult,$i).'" class="dgPager" title="Short Ascending Order"><img src="images/asc.gif" border="0"></a>&nbsp;&nbsp;';
				$sortdesclnk = '&nbsp;&nbsp;<a href="'. $_SERVER['REQUEST_URI'].'&sortord=desc&fld='.ets_db_field_name($SQLresult,$i).'" class="dgPager" title="Short Descending Order"><img src="images/desc.gif" border="0"></a>';
                        }else{
				$sortasclnk = '';
				$sortdesclnk = '';
                        }
                        if (!isset($this->DG_custom_col_name[ets_db_field_name($SQLresult,$i)]))
                        {
                                
				$this->dataGrid.="<td class='dgHeadertd'>".$sortasclnk.ets_db_field_name($SQLresult,$i).$sortdesclnk."</td>";
                        }
                        else
                        {
                                $this->dataGrid.="<td class='dgHeadertd'>".$sortasclnk.$this->DG_custom_col_name[ets_db_field_name($SQLresult,$i)].$sortdesclnk."</td>";
                        }
                }
            if ($this->DG_total_tools>0)
		$this->dataGrid.="<td></td>";	
		$this->dataGrid.="</tr>";
	        $rowCount=0;
		$colCss = $this->DG_col_class;
	    // Data
		if(ets_db_num_rows($SQLresult) > 0){
		while($row=ets_db_fetch_array($SQLresult))
		{
		        $rowClass=($rowCount % 2) ? "dgEvenRow" : "dgOddRow";$rowCount++;
			
			 
		      	$this->dataGrid.="<tr class='$rowClass'>";
				if($this->DG_checkbox==TRUE)
				$this->dataGrid.="<td><input name='pgcheckbox[]' type='checkbox' class='dgCheckbox' value='".$row[$this->DG_primary_key]."'></td>";
    			for ($i=0;$i<ets_db_num_fields($SQLresult);$i++)
    			{
                                if (!isset($this->DG_custom_col_type[ets_db_field_name($SQLresult,$i)]))
                                {
                                        $this->dataGrid.="<td $colCss>".$row[$i]."</td>";
 				}
 				else
 				{
                                        switch ($this->DG_custom_col_type[ets_db_field_name($SQLresult,$i)]["type"])
                                        {
                                                case "IMG":
                                                        $this->dataGrid.="<td $colCss><img src='".$row[$i]."'></td>";
                                                        break;
						case "LNK":														
                                                        if(isset($this->DG_custom_col_type[ets_db_field_name($SQLresult,$i)]["optionalText"])){
                                                       	        $this->dataGrid.="<td $colCss><a href='".$this->DG_custom_col_type[ets_db_field_name($SQLresult,$i)]["link"]."?".$this->DG_primary_key."=".$row[$this->DG_primary_key]."'>".$this->DG_custom_col_type[ets_db_field_name($SQLresult,$i)]["optionalText"]."</a></td>";
                                                        }
							else{
                                                                if(isset($this->DG_custom_col_type[ets_db_field_name($SQLresult,$i)]["link"])){
                                                                        $this->dataGrid.="<td $colCss><a href='".$this->DG_custom_col_type[ets_db_field_name($SQLresult,$i)]["link"].$row[$i]."'>".$row[$i]."</a></td>";
                                                                }
                                                                else{
                                                                        $this->dataGrid.="<td $colCss><a href='".$row[$i]."'>".$row[$i]."</a></td>";
                                                                }
                                                                
							}
                                                        break;
                                                case "DATE":
							$this->dataGrid.="<td $colCss>".date($this->DG_custom_col_type[ets_db_field_name($SQLresult,$i)]["format"],$row[$i])."</td>";
							break;

                                                default:
                                                        $this->dataGrid.="<td $colCss>IMAGEN".$row[$i]."</td>";
                                                        break;
                                        }

 				}
                        }
						 
       			if ($this->DG_total_tools>0){
					$this->dataGrid.="<td $colCss>";
					for($i=0;$i<$this->DG_total_tools;$i++){
						
						if(strpos($this->tools[$i]['link'],'?')){
							$this->dataGrid.="<a href='".$this->tools[$i]['link']."&".$this->DG_primary_key."=".$row[$this->DG_primary_key]."' ".$this->tools[$i]['optionalText'].">";
						}else{
							if($this->tools[$i]['type'] == "BOX"){
								$lnkclass = 'class="thickbox"';
								$this->dataGrid.="<a href='".$this->tools[$i]['link']."?".$this->DG_primary_key."=".$row[$this->DG_primary_key]."&".$this->tools[$i]['optionalText']."' ".$lnkclass.">";
							}
							else{
								$lnkclass = ' ';
								$this->dataGrid.="<a href='".$this->tools[$i]['link']."?".$this->DG_primary_key."=".$row[$this->DG_primary_key]."' ".$this->tools[$i]['optionalText'].">";
							}

						}
						
						if ($this->tools[$i]['type']=="TXT"){
							$this->dataGrid.=$this->tools[$i]['show'];
						}
						else{
							$this->dataGrid.="<img src='".$this->tools[$i]['show']."' border='0'>";
						}
						$this->dataGrid.="</a>&nbsp;&nbsp;";
					}
					$this->dataGrid.="</td>";
				}
				$this->dataGrid.="</tr>";
		}
		}else{
			echo "<tr><td>No record found..</td></tr>";
		}
		$this->dataGrid.="</table>";
		$this->dataGrid.='<table width="100%" cellpadding="0" cellspacing="0" border="0" class="dgTable"> ';
		$this->dataGrid.='<tr><td class="dgFooter" align="center">'.$this->DG_pager.'</td><td class="dgFooter" width="150" align="right">ProGrid&nbsp;&nbsp;</td></tr></table>';		
		echo $this->dataGrid;
		
	}
}
       
?>