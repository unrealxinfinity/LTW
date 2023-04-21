<?php
include_once("../database/startup.php");
if(getUsername() == null){
    $_SESSION['ERROR'] = "Error logging out!";
    header("Location:".$_SERVER['HTTP_REFERER']."");
}
else{
    unset($_SESSION['username']);
    unset($_SESSION['email']);
    header('Location:../Boot/login.php');
}
?>