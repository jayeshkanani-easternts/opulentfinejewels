<?php
date_default_timezone_set('Asia/Calcutta');
include "inc/mainapp.php";
require("inc/class.phpmailer.php");

$select_option = implode(",",$_POST['select_option']);
$username = ets_db_real_escape_string($_POST['crname']);
$email = ets_db_real_escape_string($_POST['cremail']);
$company = ets_db_real_escape_string($_POST['crcompany']);
$message = ets_db_real_escape_string($_POST['crmsg']);
$prd_itr="";
if(in_array("1",$_POST['select_option'])){
    if($prd_itr != ""){
        $prd_itr.=", Working together";
    }
    else{
        $prd_itr.="Working together";
    }
}
if(in_array("2",$_POST['select_option'])){
    if($prd_itr != ""){
        $prd_itr.=", Joing your team";
    }
    else{
        $prd_itr.="Joing your team";
    }
}
if(in_array("3",$_POST['select_option'])){
    if($prd_itr != ""){
        $prd_itr.=", Something else";
    }
    else{
        $prd_itr.="Something else";
    }
}
//echo "123";
$sql = "INSERT INTO  contact_master SET
			cname = '" . $username . "',
			cemail = '" . $email . "',
			select_option = '" . $prd_itr . "',
			ccompany = '" . $company . "',
			cmessage = '" . $message . "',
			cdate	= now()";
//echo "rajath";
$query = ets_db_query($sql) or die(ets_db_error());


$id = ets_db_insert_id();


$email_message = '

    <table width="80%" class="tbl" cellpadding="3">
    
        <tr>


            <td>' . $prd_itr . '</td>

        </tr>
    

        <tr>

            <td ><strong>&nbsp; Name</strong></td>

            <td>:</td>

            <td>' . $username . '</td>

        </tr>

        <tr>

            <td><strong>&nbsp; Email Address</strong></td>

            <td>:</td>

            <td>' . $email . '</td>

        </tr>
         <tr>

            <td><strong>&nbsp; Company</strong></td>

            <td>:</td>

            <td>' . $company . '</td>

        </tr>
		
         <tr>

            <td><strong>&nbsp; Message</strong></td>

            <td>:</td>

            <td>' . $message . '</td>

        </tr>
       
    </table>';
//echo"456";
//echo $emai_message;
$company_name ='Opulent Fine Jewels';
$message_body = get_default_template($email_message, $company_name . ' - Contact Us');
$client_body = 'Hello <strong> '.$username.'</strong> Your Inquiry has been submitted We will get back to you soon';
// $message_body = get_default_template($email_message,$company_name .' - Inquiry');
//echo $email_message;
$company_name = 'Opulent Fine Jewels';
$to_array = array();
$to_array[] = 'info@opulentfinejewels.com';
$attachment = '';
//echo"84978968";

send_email($to_array, 'info@opulentfinejewels.com', $company_name . ' - Contact Us', $message_body, $attachment);


$client_message = 'Your inquiry has been submitted. We will get back to you soon.';

$client_body = get_default_template($client_message, $company_name .' - Contact us');

$company_name ='Opulent Fine Jewels';
$client_array = array();
//   $client_array[] = 'priyanka.easternts@gmail.com';
$client_array[] = $email;
$attachment='';

send_email($client_array,$_POST['cremail'],$company_name .' - Contact Us',$client_body ,$attachment);



echo 'Thank You For Your Inquiry';
// exit();

?>