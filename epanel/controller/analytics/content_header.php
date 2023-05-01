<?php

//include "console/includes/configure.php";		
//include "console/includes/functions/general.php";
//include 'includes/config.php';
//include 'includes/set_date.php';
?>

<head>

<style>

.table>tbody>tr>td {
	padding :20px;
	
}

table.dataTable {
	background : white;
	
}
 .terques {
  width : 40%;
  height : 100px;
  background: #6ccac9;
  text-align : center;
}

.white {
  width : 60%;
  height : 100px;
  background: white;
  text-align : center;
}

 .value {
  float : left;
  text-align: left;
}

 .red {
  width : 40%;
  height : 100px;
  text-align : center;
  background: #ff6c60;
}

 .yellow {
  width : 40%;
  height : 100px;
  text-align : center;
  background: #f8d347;
}

 .blue {
  width : 40%;
  height : 100px;
  text-align : center;
  background: #57c8f2;
}

.fa-5x , .fa-4x {
	margin-top:15px;
	color : white;
	text-align : center;
}
#gap
{
 border: 5px solid white;
 
}

#round
{
 border-radius: 5px; 	
}
.header{
	background: white;
}
body{
	background: #EBEBE0;
}
table{
	background: white;
}

.progress-bar-red{
	background: #ff6c60 ;
}



.progress-bar-yellow{
	background: #f8d347;
}
 
 
.five {
  width : 40%;
  height : 100px;
  text-align : center;
  background: #99b433;
}

.six {
  width : 40%;
  height : 100px;
  text-align : center;
  background: #7e3878;
}

.seven {
  width : 40%;
  height : 100px;
  text-align : center;
  background: #b8532c;
}

.eight {
  width : 40%;
  height : 100px;
  text-align : center;
  background: #265797;
}

canvas{
	background:white;
	padding: 2px 2px 2px 5px;
}

td{
	font-size : 14px;
}


</style>

</head>
<body>
<style>
.row{
	margin-right: 0px;
  margin-left: 0px;
}

</style>


<!--<header class="header">-->
<div class="row">



<a class="dropdown-toggle pull-left" title="Contacts Froms" href="index.php?controller=contact&action=contact&subaction=listcontact">
<i class="fa fa-tasks fa-2x" style="margin-top:15px;margin-left:50px;color:black"></i>
<span class="badge badge-red">
<?php
echo get_count('contact_master');
?>
</span>
</a>


<a class="dropdown-toggle pull-left" title="Career Froms" href="index.php?controller=job&action=job&subaction=listjob">
<i class="fa fa-envelope-o fa-2x" style="margin-top:15px;margin-left:30px;color:black"></i>
<span class="badge badge-blue">
<?php
echo get_count('job_master');
?>

</span>
</a>

<a class="dropdown-toggle pull-left" title="Subscriptions" href="index.php?controller=services&action=subscriptionlist&subaction=listData">
<i class="fa fa-bell-o fa-2x" style="margin-top:15px;margin-left:30px;color:black"></i>
<span class="badge badge-yellow">
<?php
echo get_count('subscription_master');
?>
</span>
</a>

<form action="submit.php" method="post">
<input type="hidden" name="flag" value="f">
<div class="col-sm-8 pull-right" >
<input type="text" style="margin-top:15px;" name="from" id="jdate" placeholder="From date"
value="
<?php 
	echo MONTH_START_DATE;
?>
">
<input type="text" style="margin-top:15px;" name="to" id="jdate1" placeholder="To date"
value="
<?php 
	echo MONTH_END_DATE;
?>
"
>
<input type="submit" style="margin-top:0px;" class="btn btn-info" value="Submit">
</div>






</form>
</div>
<br>
<br>

<!--</header>-->
  
   
<script>
$(function() {
$( "#jdate" ).datepicker(
{dateFormat: 'yy-mm-dd' }
);
$( "#jdate1" ).datepicker(
{dateFormat: 'yy-mm-dd' }
);
});
</script>


