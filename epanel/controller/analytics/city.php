<?php
class city
{
	
	function listData()
	{
		
	
$code = $_GET['country'];

$heading_month_end_date = date('M d,Y');
$heading_month_start_date = date('M d,Y',strtotime("-1 months"));
define('HEADING_MONTH_START_DATE',$heading_month_start_date);
define('HEADING_MONTH_END_DATE',$heading_month_end_date);
?>
<script>
$(document).ready(function() {
	var listURL = 'helperfunc/cityList.php?country=<?php echo $code; ?>';
	
	$('#citylist').dataTable( {
        "ajax": listURL ,
		
    } );
	
    //$(".marker").tooltip({placement: 'top'});
});
</script>
<a href="index.php?controller=analytics&action=dashboard&subaction=listData" class="btn btn-info">
<i class="fa fa-arrow-left">&nbsp;Back</i>
</a>
<br>

<div class="row" id="gap">
<div class="col-sm-12" id="gap">
<div style="background:white;" >
<div class="row" style="background: #ff6c60;margin-left:0px;margin-right:0px;">
<div class="col-sm-1" style="color:white;"><i class="fa fa-home fa-2x" style="color:white;padding-top:7px;"></i></div>
<div class="col-sm-4"><h4 class="pull-left" style="color:white;">City</h4></div>
<div class="col-sm-7"><h4 style="color:white;text-align:right;"><?php echo HEADING_MONTH_START_DATE; echo '-'; echo HEADING_MONTH_END_DATE;?></h4></div>
</div>

<style>

.row
{
	padding : 20px 20px 20px 20px;
}
</style>
<br>
<table class="table table-hover" id="citylist">
    <thead>
      <tr>
        <th>No.</th>
        <th>City</th>
        <th>Sessions</th>
		<th>% Sessions</th>
      </tr>
    </thead>
    <tbody>
     
    </tbody>
	<tfoot>
      <tr>
        <th>No.</th>
        <th>City</th>
        <th>Sessions</th>
		<th>% Sessions</th>
      </tr>
    </tfoot>
</table>
</div>
</div>
</div>


	
<?php			
	}		
	
	
	}
?>
