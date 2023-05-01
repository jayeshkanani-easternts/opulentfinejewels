<?php

require 'gapi.class.php';

define('user','455737873085-ci0a9el19g53rkntc617jo4o34c548gu@developer.gserviceaccount.com');
define('p12','analytics-d0a7b531abc0.p12');
//define('ga_view_id',60932193);
define('ga_view_id',74360916);

$ga = new gapi(user, p12);
/*
session_start();
if(isset($_SESSION['to']) && isset($_SESSION['from']))
{
	$month_end_date = $_SESSION['to'];
    $month_start_date = $_SESSION['from'];
	define('MONTH_START_DATE',$month_start_date);
	define('MONTH_END_DATE',$month_end_date);
	
	header('Location:http://localhost:85/google-analytics/dashboard.php');
}

else
{
	
	$month_end_date = date('Y-m-d');
    $month_start_date = date('Y-m-d',strtotime("-1 months"));
	
	define('MONTH_START_DATE',$month_start_date);
	define('MONTH_END_DATE',$month_end_date);

}

*/
$year_end_date = date('Y-m-d');
$year_start_date = date('Y-m-d',strtotime("-1 years"));


define('YEAR_START_DATE',$year_start_date);
define('YEAR_END_DATE',$year_end_date);




$heading_year_end_date = date('M d,Y');
$heading_year_start_date = date('M d,Y',strtotime("-1 years"));

/*$heading_month_end_date = date('M d,Y');
$heading_month_start_date = date('M d,Y',strtotime("-1 months"));

define('HEADING_MONTH_START_DATE',$heading_month_start_date);
define('HEADING_MONTH_END_DATE',$heading_month_end_date);
*/
define('HEADING_YEAR_START_DATE',$heading_year_start_date);
define('HEADING_YEAR_END_DATE',$heading_year_end_date);


?>