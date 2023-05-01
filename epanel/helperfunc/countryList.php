<?php 
include '../includes/config.php';
include '../includes/set_date.php';

$dimensions = array('country','countryIsoCode');
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

foreach($gaResults as $result)
{
   
	$no = '<td>'.$i.'<td>';
	$country = '<td><a href=index.php?controller=analytics&action=city&subaction=listData&country='.$result->getcountryIsoCode().'>'.$result->getcountry().'</a></td>';
	$session = '<td>'.$result->getVisits().'</td>';
	$v = $result->getVisits();
	$per = round(($v / $total),4) * 100 .'%';
	$per = '<div class="progress">
  <div class="progress-bar progress-bar-yellow" role="progressbar" aria-valuenow="50"
  aria-valuemin="0" aria-valuemax="100" style="width:'.$per.'">
   <font color=black>'.$per.'</font> 
  </div>
</div>';
	$i++;
	$res['aaData'][] = array( "$no","$country","$session","$per");
}
echo json_encode($res);
?>

