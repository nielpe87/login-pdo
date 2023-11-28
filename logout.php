<?php 
session_start();

if($_SESSION['user']){
    unset($_SESSION['user']);
    session_destroy();
}

header('location: form-login.php');