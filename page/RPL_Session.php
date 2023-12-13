<?php
    session_start();
    if ($_SESSION['login']==false){
        header ('location: PHP_LogIn.php');
    }
    
?>