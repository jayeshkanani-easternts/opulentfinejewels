<?php

echo "hello";
date_default_timezone_set('Asia/Calcutta');
include "inc/mainapp.php";
require("inc/class.phpmailer.php");

if($_REQUEST['email'] != ""){
    $email = $_REQUEST['email'];
    $sql = "insert into subscription_master set
			s_email = '".$email."'";

    echo $sql;
    $sqlqry = ets_db_query($sql) or die(ets_db_error());

    $id = ets_db_insert_id();


    $email_message = '

    <table width="80%" class="tbl" cellpadding="3">
   

        <tr>

            <td><strong>&nbsp; Email Address</strong></td>

            <td>:</td>

            <td>' . $email . '</td>

        </tr>
        
       
    </table>';




    $client_message = 'Your Subscription has been done successfully. We will get back to you soon.';

    $client_body = get_default_template($client_message, $company_name .' - Subscription');

    $company_name ='Opulent Fine Jewels';
    $client_array = array();
    /*echo $email;
    exit();*/
    $client_array[] = $email;
    $attachment='';

    send_email($client_array,$_POST['cremail'],$company_name .' - Subscription',$client_body ,$attachment);

    echo "true";
}
else{
    echo 'Insufficient Arguments';
}

?>
