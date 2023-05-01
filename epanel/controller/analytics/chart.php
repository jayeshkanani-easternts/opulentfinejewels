<?php 
$dimensions = array('dayOfWeek');
$metrics    = array('visits');
$filter = '';

$ga->requestReportData(ga_view_id,
                       $dimensions,
                       $metrics,
                       '-visits', // Sort by 'visits' in descending order
					   $filter,
                       MONTH_START_DATE, // Start Date
                       MONTH_END_DATE, // End Date
					   1,  // Start Index
                       500 // Max results
                       );

$gaResults = $ga->getResults();
$i = 1;
$visit = array();

foreach($gaResults as $result)
{
 	$visit[$result->getdayOfWeek()] = $result->getVisits();
	//echo $result->getdayOfWeek();
	//echo " : ";
	//echo $result->getVisits();
	//echo '<br>';
	$i++;
}


?>
<style>
h4{
	font-size:14px;
}

</style> 
<div class="col-sm-4" id="gap">
<div class="row" style="background: #f8d347;">
<div class="col-sm-2" style="color:white;"><i class="fa fa-line-chart fa-2x" style="color:white;padding-top:7px;"></i></div>
<div class="col-sm-6"><h4 class="pull-left" id="h4" style="color:white;">Weekly/Daily Report</h4></div>

<div class="col-sm-2 pull-right">
	<a class="btn pull-right" id="day" onclick="day()" style="color: white;" ><h4>Day</h4></a>
	</div>
	<div class="col-sm-2 pull-right">
	<a class="btn pull-right" id="week" onclick="week()" style="color: white;"><h4>Week</h4></a>
	</div>

</div>
	<!--<script src="js/Chart.js"></script>-->
	<div class="row">
	
	
	
	<canvas id="canvas" height="250" width="550"></canvas>
	<canvas id="canvas1" height="250" width="550"></canvas>
	</div>
	
	
	
	
	
	
			
			
			

		
<script>	
		
		var lineChartData = {
			labels : ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],
			datasets : [
				{
					label: "My First dataset",
					fillColor : "#41cac0",
					strokeColor : "rgba(220,220,220,1)",
					pointColor : "rgba(220,220,220,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "black",
					pointHighlightStroke : "rgba(220,220,220,1)",
					data : [
				<?php 
				for($i=0;$i<7;$i++)
				{
					echo $visit[$i];
				?>	
				,
				<?php 
				}
				?>
				
				]
				}
			]

		}
		
		
		</script>


	
<?php 



$dimensions = array('day');
$metrics    = array('visits');
$filter = '';

$ga->requestReportData(ga_view_id,
                       $dimensions,
                       $metrics,
                       '-visits', // Sort by 'visits' in descending order
					   $filter,
                       MONTH_START_DATE, // Start Date
                       MONTH_END_DATE, // End Date
                       1,  // Start Index
                       500 // Max results
                       );

$gaResults = $ga->getResults();
$j = 1;
$day = array();
$dat = array();

foreach($gaResults as $result)
{
 	$day[$result->getday()] = $result->getVisits();
	$dat[$result->getday()] = '"'.$result->getday().'"';
	
	$j++;
	
}

ksort($day);

?> 
<script>
	
	var barChartData1 = {
		labels : [
		
		"1",
		"2",
		"3",
		"4",
		"5",
		"6",
		"7",
		"8",
		"9",
		"10",
		"11",
		"12",
		"13",
		"14",
		"15",
		"16",
		"17",
		"18",
		"19",
		"20",
		"21",
		"22",
		"23",
		"24",
		"25",
		"26",
		"27",
		"28",
		"29",
		"30",
		"31"
		],
		datasets : [
			{
				label: "My First dataset",
					fillColor : "#41cac0",
					strokeColor : "rgba(220,220,220,1)",
					pointColor : "rgba(220,220,220,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "black",
					pointHighlightStroke : "rgba(220,220,220,1)",
				data : [
				<?php 
				foreach($day as $d)
				{
					echo $d;
				?>	
				,
				<?php 
				}
				?>
				
				]
			}
		]

	}
	
</script>

		<script>
		var ctx = document.getElementById("canvas").getContext("2d");
		var ctx1 = document.getElementById("canvas1").getContext("2d");
		window.myLine = new Chart(ctx).Line(lineChartData, {
			responsive: true
			});
		window.myBar1 = new Chart(ctx1).Line(barChartData1, {
			responsive : true
			});
		
		function week()
		{
			 
			 $('#week').attr('disabled',true);
			 $('#day').attr('disabled',false);
			
			$('#canvas').show();
			$('#canvas1').hide();
		}
	
		function day()
		{
			$('#week').attr('disabled',false);
			$('#day').attr('disabled',true);
			
			
			$('#canvas1').show();
			$('#canvas').hide();
			
		}
		


	</script>

	
