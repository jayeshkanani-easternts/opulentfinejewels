<?php 



$dimensions = array('source');
$metrics    = array('bounces', 'users','newUsers', 'percentNewSessions','sessionDuration','avgSessionDuration','hits','pageviews','pageviewsPerSession','visits');
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

$gaResults = $ga->getResults();

$bounce_rate = round(($ga->getBounces() / $ga->getVisits()) * 100,2) . "%";
$visits = $ga->getVisits();
$users = $ga->getUsers();
$newUsers = $ga->getnewUsers();
$newSessions = round($ga->getpercentNewSessions() * 1,2) . "%";

$avgSessionDuration = round(($ga->getavgsessionDuration())/60,2);
$pageviewsPerSession = round($ga->getpageviewsPerSession() * 1,2);
$pageViews = $ga->getpageviews();

//echo $pageViews;

?>

<!--<div class="container">
<br>-->
<div class="row">
<div class="col-sm-12">
	
	<div class="col-sm-3">
	
				<div class="row" id="gap">
					<div class="col-sm-3 terques">
						<i class="fa fa-user fa-5x"></i>
					</div>
					
					<div class="col-sm-9 white">
						<h2 class="count"><?php echo $users; ?></h2>
						<h4>Users</h4>
					</div>
					
				</div>
	
	</div>
	
	<div class="col-sm-3">
	<div class="row" id="gap">
	
				
					<div class="col-sm-3 red">
						<i class="fa fa-file fa-5x"></i>
					</div>
					
				
			
		
				
					<div class="col-sm-9 white">
						<h2 class="count"><?php echo $pageViews; ?></h2>
						<h4>Page Views</h4>
					</div>
					
				
	
	</div>
	</div>
	
	<div class="col-sm-3">
		
				<div class="row" id="gap">
					<div class="col-sm-3 yellow">
						<i class="fa fa-server fa-5x"></i>
					</div>
					<div class="col-sm-9 white">
						<h2 class="count"><?php echo $pageviewsPerSession; ?></h2>
						<h4>Pages/Session</h4>
					</div>
				</div>
			
	</div>
	
	<div class="col-sm-3">
		
				<div class="row" id="gap">
					<div class="col-sm-3 blue">
						<i class="fa fa-clock-o fa-5x"></i>
					</div>
					<div class="col-sm-9 white">
						<h2 class="count"><?php echo $avgSessionDuration; ?></h2>
						<h4>Avg Session duration</h4>
					</div>
				</div>
			
	</div>
	
	
	
</div>
</div>


<div class="row">
<div class="col-sm-12">
	
	<div class="col-sm-3">
		
				<div class="row" id="gap">
					<div class="col-sm-3 five">
						<i class="fa fa-check-square-o fa-5x"></i>
					</div>
					<div class="col-sm-9 white">
						<h2 class="count"><?php echo $visits; ?></h2>
						<h4>Sessions</h4>
					</div>
				</div>
			
			
	</div>
	
	<div class="col-sm-3">
		
				<div class="row" id="gap">
					<div class="col-sm-3 six">
						<i class="fa fa-line-chart fa-4x"></i>
					</div>
					<div class="col-sm-9 white">
						<h2 class="count"><?php echo $bounce_rate; ?></h2>
						<h4>Bounce Rate</h4>
					</div>
				</div>
			
	</div>
	
	<div class="col-sm-3">
		
				<div class="row" id="gap">
					<div class="col-sm-3 seven">
						<i class="fa fa-user-plus fa-4x"></i>
					</div>
					<div class="col-sm-9 white">
						<h2 class="count"><?php echo $newUsers; ?></h2>
						<h4>New visitors</h4>
					</div>
				</div>
			
	</div>
	
	<div class="col-sm-3">
		
				<div class="row" id="gap">
					<div class="col-sm-3 eight">
						<i class="fa fa-bookmark fa-5x"></i>
					</div>
					<div class="col-sm-9 white">
						<h2 class="count"><?php echo $newSessions; ?></h2>
						<h4>New Sessions</h4>
					</div>
				</div>
			
	</div>
	
	
	
</div>
</div>
<!--</div>-->


