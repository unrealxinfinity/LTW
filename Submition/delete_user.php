<?php
include_once("../database/startup.php");
include_once("../database/user.php");
if(($username = $_SESSION['username']) != null){
        if(deleteUser($_SESSION['username'])){
            unset($_SESSION['username']);
            unset($_SESSION['email']);
            unset($_SESSION['password']);
            unset($_SESSION['name']);
            unset($_SESSION['role']);
            header("Location:../Boot/login.php");
    }
    else{
        $_SESSION['ERROR'] = "Error deleting your user account!";
        header("Location:".$_SERVER['HTTP_REFERER']."");
    }

}

?>