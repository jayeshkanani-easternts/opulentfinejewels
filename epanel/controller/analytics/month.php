<?php 
$dimensions = array('month');
$metrics    = array('visits');
$filter = '';

$ga->requestReportData(ga_view_id,
                       $dimensions,
                       $metrics,
                       '-visits', // Sort by 'visits' in descending order
					   $filter,
                       YEAR_START_DATE, // Start Date
                       YEAR_END_DATE, // End Date
                       1,  // Start Index
                       500 // Max results
                       );

$gaResults = $ga->getResults();
$i = 1;
$visit = array();
$arr = explode("-",YEAR_START_DATE);
$s = $arr[1];

$num = array("01","02","03","04","05","06","07","08","09","10","11","12");
$month = array("January","February","March","April","May","June","July","August","September","October","November","December");

for($i = 0;$i <12;$i++)
{
	if($num[$i] == $s)
		$start = $i;
}


foreach($gaResults as $result)
{
 	$visit[$result->getmonth()] = $result->getVisits();
	$i++;
}
ksort($visit);

?> 
	
	<!--<script src="js/dashboard/Chart.js"></script>-->
	
	<div class="row">
<div class="col-sm-12" style="height:500px;background:white;padding-left:0px;padding-right:0px">
<canvas id="canvas2" height="390" width="600" ></canvas>
</div>
</div>
		
	
	<script>
	

	var barChartData = {
		labels : [
		<?php
				for($i = $start;$i < 12;$i++)
				{
					echo '"'.$month[$i].'"';
					echo ',';
				}
				for($i = 0;$i < $start-1;$i++)
				{
					echo '"'.$month[$i].'"';
					echo ',';
				}
				echo '"'.$month[$start-1].'"';
				?>
		],
		datasets : [
			{
				fillColor : "#bfc2cd",
				strokeColor : "#bfc2cd",
				highlightFill: '#ff6c60',
				highlightStroke: '#ff6c60',
				data : [
				<?php
				for($i = $start;$i < 12;$i++)
				{
					echo $visit[$num[$i]];
					echo ',';
				}
				for($i = 0;$i < $start-1;$i++)
				{
					echo $visit[$num[$i]];
					echo ',';
				}
				echo $visit[$num[$start-1]];
				?>
				]
			}
		]

	}
	function month(){
		var ctx = document.getElementById("canvas2").getContext("2d");
		window.myBar = new Chart(ctx).Bar(barChartData, {
			responsive : true
		});
	}
	
	window.onload = function(){
		month();
		week();
	}

	</script>
	