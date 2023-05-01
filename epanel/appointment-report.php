<?php
header ("Content-type: application/x-msexcel");
header("Content-disposition:  attachment; filename=AppointmentReport.xls");
require('includes/configure.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv=Content-Type content="text/html; charset=UTF-8" />
</head>
<body>
<table class="main" cellspacing="3" cellpadding="3" border="1">
    <tr>
        <th>ID</th>
        <th>Date</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone No</th>
        <th>Subject</th>
        <th>Message</th>
    </tr>
    <?php
    $disQry =  "SELECT * from appointment_master order by cid desc";
    $ressql = ets_db_query($disQry) or die('Query failed : ' . ets_db_error());
    if(ets_db_num_rows($ressql) > 0) {
        while($res = ets_db_fetch_array($ressql)){
            echo '<tr>';
            echo '<td>'.$res['cid'].'</td>';
            echo '<td>'.date("d-m-Y H:i a",strtotime($res['cdate'])).'</td>';
            echo '<td>'.$res['cname'].'</td>';
            echo '<td>'.$res['cemail'].'</td>';
            echo '<td>'.$res['ccontact'].'</td>';
            echo '<td>'.$res['csubject'].'</td>';
            echo '<td>'.$res['cmessage'].'</td>';
            echo '</tr>';
        }
    }
    ?>
</table>



