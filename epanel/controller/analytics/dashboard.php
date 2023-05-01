<?php 
class dashboard {
function listData()
{
include 'includes/config.php';
include 'includes/set_date.php';
include 'content_header.php';
?>
<link href="css/dashboard/jquery-jvectormap-2.0.2.css" rel="stylesheet">
<script src="js/dashboard/jquery-jvectormap-2.0.2.min.js"></script>
<script src="js/dashboard/jquery-jvectormap-world-mill-en.js"></script>
<script src="js/dashboard/Chart.js"></script>
<script src="js/dashboard/jquery-ui.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" /> 
<?php 
include 'count.php';
?>
<br>
<!--<div class="container">-->
<div class="row">

<div class="col-sm-8" id="gap">
<div class="row" style="background: #ff6c60;">
<div class="col-sm-1" style="color:white;"><i class="fa fa-bar-chart fa-2x" style="color:white;padding-top:7px;"></i></div>
<div class="col-sm-4"><h4 class="pull-left" style="color:white;font-size:14px;">Monthly Report</h4></div>
<div class="col-sm-7"><h4 style="color:white;text-align:right;font-size:14px;"><?php echo HEADING_YEAR_START_DATE; echo '-'; echo HEADING_YEAR_END_DATE;?></h4></div>
</div>


<?php 

include 'month.php';

?>
</div>



<?php 

include 'chart.php';

?>
<br>
<div class="row" style="background: #6FA22A;">
<div class="col-sm-2" style="color:white;"><i class="fa fa-map-marker fa-2x" style="color:white;padding-top:7px;"></i></div>
<div class="col-sm-3"><h5 class="pull-left" style="color:white;">Globe</h5></div>
<div class="col-sm-7"><h5 style="color:white;text-align:right;"><?php echo HEADING_MONTH_START_DATE; echo '-'; echo HEADING_MONTH_END_DATE;?></h5></div>
</div>
<?php 

include 'map.php';

?>
</div>

</div>
<!--</div>-->


<!--<div class="container">
<div class="row" >

<div class="col-sm-6" id="gap" style="background:white;">
<div class="row" style="background: #ff6c60;margin-right: -15px;margin-left: -15px;">
<div class="col-sm-1" style="color:white;"><i class="fa fa-language fa-2x" style="color:white;padding-top:7px;"></i></div>
<div class="col-sm-4"><h4 class="pull-left" style="color:white;">Language</h4></div>
<div class="col-sm-7"><h4 style="color:white;text-align:right;"><?php echo HEADING_MONTH_START_DATE; echo '-'; echo HEADING_MONTH_END_DATE;?></h4></div>
</div>
<br>
<?php 

//include 'dashboard/language.php';

?>
</div>


<div class="col-sm-6" id="gap" style="background:white;">
<div class="row" style="background: #57c8f2;margin-right: -15px;margin-left: -15px;">
<div class="col-sm-1" style="color:white;"><i class="fa fa-globe fa-2x" style="color:white;padding-top:7px;"></i></div>
<div class="col-sm-4"><h4 class="pull-left" style="color:white;">Country</h4></div>
<div class="col-sm-7"><h4 style="color:white;text-align:right;"><?php echo HEADING_MONTH_START_DATE; echo '-'; echo HEADING_MONTH_END_DATE;?></h4></div>
</div>
<br>
<?php 

//include 'dashboard/country.php';

?>
</div>
</div>
<!--</div>-->

<!--<div class="container">-->
<div class="row" >

<div class="col-sm-6" id="gap" style="background:white;">
<div class="row" style="background: #57c8f2;margin-right: -15px;margin-left: -15px;">
<div class="col-sm-1" style="color:white;"><i class="fa fa-globe fa-2x" style="color:white;padding-top:7px;"></i></div>
<div class="col-sm-4"><h4 class="pull-left" style="color:white;">Country</h4></div>
<div class="col-sm-7"><h4 style="color:white;text-align:right;"><?php echo HEADING_MONTH_START_DATE; echo '-'; echo HEADING_MONTH_END_DATE;?></h4></div>
</div>
<br>
<?php 

include 'country.php';

?>
</div>

<div class="col-sm-6" id="gap" style="background:white;">
<div class="row" style="background: #ff6c60;margin-right: -15px;margin-left: -15px;">
<div class="col-sm-1" style="color:white;"><i class="fa fa-language fa-2x" style="color:white;padding-top:7px;"></i></div>
<div class="col-sm-4"><h4 class="pull-left" style="color:white;">Language</h4></div>
<div class="col-sm-7"><h4 style="color:white;text-align:right;"><?php echo HEADING_MONTH_START_DATE; echo '-'; echo HEADING_MONTH_END_DATE;?></h4></div>
</div>
<br>
<?php 

include 'language.php';

?>
</div>
</div>
<!--</div>-->


</body>

<?php

}
}
?>


