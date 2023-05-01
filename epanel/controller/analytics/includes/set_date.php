<?php

session_start();
error_reporting(0);
//php -d error_reporting="E_NOTICE"
if(isset($_SESSION['to']) && isset($_SESSION['from']))
{
	$month_end_date = $_SESSION['to'];
    $month_start_date = $_SESSION['from'];
	define('MONTH_START_DATE',$month_start_date);
	define('MONTH_END_DATE',$month_end_date);
	$heading_month_end_date = date('M d,Y',strtotime($_SESSION['to']));
    $heading_month_start_date = date('M d,Y',strtotime($_SESSION['from']));

    define('HEADING_MONTH_START_DATE',$heading_month_start_date);
    define('HEADING_MONTH_END_DATE',$heading_month_end_date);

	
}

else
{
	
	$month_end_date = date('Y-m-d');
    $month_start_date = date('Y-m-d',strtotime("-1 months"));
	
	define('MONTH_START_DATE',$month_start_date);
	define('MONTH_END_DATE',$month_end_date);
	
	$heading_month_end_date = date('M d,Y');
$heading_month_start_date = date('M d,Y',strtotime("-1 months"));

define('HEADING_MONTH_START_DATE',$heading_month_start_date);
define('HEADING_MONTH_END_DATE',$heading_month_end_date);


}


?>