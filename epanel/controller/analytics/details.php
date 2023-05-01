<?php
class details
{

	
	function listData()
	{
			
include 'includes/config.php';
include 'includes/set_date.php';

$source = $_GET['source'];
$filter = $_GET['filter'];

$dimensions = array($source);
$metrics    = array('bounces', 'users','newUsers', 'percentNewSessions','sessionDuration','avgSessionDuration','hits','pageviews','pageviewsPerSession','visits');
$filter = $source.' == '.$filter;

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

$bounce_rate = round(($ga->getBounces() / $ga->getVisits()) * 100,2) . "%";
$visits = $ga->getVisits();
$users = $ga->getUsers();
$newUsers = $ga->getnewUsers();
$newSessions = round($ga->getpercentNewSessions() * 1,2) . "%";
$avgSessionDuration = round(($ga->getavgsessionDuration())/60,2);
$pageviewsPerSession = round($ga->getpageviewsPerSession() * 1,2);
$pageViews = $ga->getpageviews();
		

?>

<style>
td{
	text-align:center;
}
</style>
<a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="btn btn-info">
<i class="fa fa-arrow-left">&nbsp;Back</i>
</a>
<br>

<br>

<div class="row">
<div class=" col-sm-12" style="background: white;" >
<div class="row" style="background: #ff6c60;margin-right: 15px;margin-left: 15px;" >
<div class="col-sm-1" style="color:white;"><i class="fa fa-file fa-2x" style="color:white;padding-top:7px;"></i></div>
<div class="col-sm-5"><h4 class="pull-left" style="color:white;text-align:left;"><?php echo $_GET['filter']; ?></h4></div>
<div class="col-sm-6" ><h4 class="pull-right" style="color:white;text-align:right;"><?php echo HEADING_MONTH_START_DATE; echo '-'; echo HEADING_MONTH_END_DATE;?></h4></div>
</div>
<table class="table table-hover" style="margin-left:15px;">
    <thead>
      <tr>
        <th>Users</th>
        <th>Page Views</th>
        <th>Pages/Sessions</th>
		<th>Average Session Duration</th>
		<th>Sessions</th>
        <th>Bounce Rate</th>
        <th>New visitors</th>
		<th>New Sessions</th>
      </tr>
    </thead>
    <tbody>
     
    </tbody>
	<tfoot>
      <tr>
	  
        <td><?php echo $users; ?></td>
		<td><?php echo $pageViews; ?></td>
		<td><?php echo $pageviewsPerSession; ?></td>
		<td><?php echo $avgSessionDuration; ?></td>
		<td><?php echo $visits; ?></td>
		<td><?php echo $bounce_rate; ?></td>
		<td><?php echo $newUsers; ?></td>
		<td><?php echo $newSessions; ?></td>
      </tr>
    </tfoot>
</table>

</div>
</div>


<br>

	
<?php			
	}		
	
	
	}
?>
