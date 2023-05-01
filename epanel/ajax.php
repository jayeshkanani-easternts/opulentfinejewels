<?php 
$do = $_GET['do']; 
switch($do) { 
    case 'check_password_strength': 
        $password = $_GET['pass']; 
        $strength = 0; 
        // letters (lowercase) 
        if(preg_match("/([a-z]+)/", $password)) { 
            $strength++; 
        } 
        // letters (uppercase) 
        if(preg_match("/([A-Z]+)/", $password)) { 
            $strength++; 
        } 
        // numbers 
        if(preg_match("/([0-9]+)/", $password)) { 
            $strength++; 
        } 
        // non word characters 
        if(preg_match("/(W+)/", $password)) { 
            $strength++; 
        } 
        header('Content-Type: text/xml'); 
        header('Pragma: no-cache'); 
        echo '<?xml version="1.0" encoding="UTF-8"?>'; 
        echo '<result><![CDATA['; 
        switch($strength) { 
            case 1: 

                echo '<div style="width: 35%;height:17px;" id="password_bar">Very Weak</div>'; 
            break; 
            case 2: 
                echo '<div style="width: 50%;height:17px;" id="password_bar">Weak</div>'; 
            break; 
            case 3: 
                echo '<div style="width: 75%;height:17px;" id="password_bar">Strong</div>'; 
            break; 
            case 4: 
                echo '<div style="width: 100%;height:17px;" id="password_bar">Very Strong</div>'; 
            break; 
        } 
        echo ']]></result>'; 
    break; 
    default: 
        echo 'Error, invalid action'; 
    break; 
} 
?>