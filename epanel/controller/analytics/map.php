
<?php 
//include 'config.php';

$dimensions = array('countryIsoCode');
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

$total = $ga->getVisits();

$i = 1;
$per = 0.0;
$gdp =array();

foreach($gaResults as $result)
{
   
	$gdp[$result->getcountryIsoCode()] = $result->getVisits();
	
}



?>
<script>
	gdpData = { 
	<?php 
		foreach($gdp as $key=>$value)
		{
			echo '"' . $key . '": ' . $value . ',';
		}
	?> 
	};
</script>

<!--
<link href="css/jquery-jvectormap-2.0.2.css" rel="stylesheet">
-->

<div class="row">
<div class="col-sm-12" style="background:white;border-radius:5px;padding-left:0px;padding-right:0px">
<div id="map" style="height:250px;"></div>	
</div>
</div>
<!--
<script src="js/jquery-jvectormap-2.0.2.min.js"></script>
<script src="js/jquery-jvectormap-world-mill-en.js"></script>
-->
<script>

$(document).ready(function() {
	  $('#map').vectorMap({
		  
		  
		  series: {
    regions: [{
      values: gdpData,
      scale: ['#E2F8C4','#6FA22A' ],
      normalizeFunction: 'polynomial'
    }]
  },
  backgroundColor: '#a9d96c',
  onRegionTipShow: function(e, el, code){
	  if(gdpData[code] == null)
	  {
		  gdpData[code] = 0;
	  }
    el.html(el.html()+' (Sessions - '+gdpData[code]+')');
  }

	  });
	});

</script>

