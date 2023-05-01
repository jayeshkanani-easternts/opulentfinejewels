<?php
include "config.php";
if(isset($_GET['email']))
{
    $sql="select * from alumni_members where alumni_email='".$_GET['email']."'";
    $qry = ets_db_query($sql) or die(ets_db_error().$sql);
    $email=ets_db_num_rows($qry);
    if ($email>=1){
        $errmsg = "Sorry This Email Is Not Available.";
    }
    else
    {
        $errmsg = "Yes This Email Is Available.";
    }
}
echo $errmsg;
?>