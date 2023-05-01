<?php

require 'gapi.class.php';
require 'configure.php';

define('user','455737873085-ci0a9el19g53rkntc617jo4o34c548gu@developer.gserviceaccount.com');
define('p12','analytics-d0a7b531abc0.p12');


define('ga_view_id',$epanel_arr['ga_view_id']);

$ga = new gapi(user, p12);

$year_end_date = date('Y-m-d');
$year_start_date = date('Y-m-d',strtotime("-1 years"));

define('YEAR_START_DATE',$year_start_date);
define('YEAR_END_DATE',$year_end_date);

$heading_year_end_date = date('M d,Y');
$heading_year_start_date = date('M d,Y',strtotime("-1 years"));

define('HEADING_YEAR_START_DATE',$heading_year_start_date);
define('HEADING_YEAR_END_DATE',$heading_year_end_date);


?>