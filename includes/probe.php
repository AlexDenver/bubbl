<?php
    if(!isset($_SESSION))
        session_start();
    if(!isset($_SESSION['user']))
        $_SESSION['user'] = '';
    if(($_SESSION['user'] == '')  && basename($_SERVER['PHP_SELF']) == "index.php"){
        header("Location: home.php");
        die();
    }else{
        
    }
?>