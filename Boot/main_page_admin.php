<?php
include_once("../database/startup.php");
include_once("../database/user.php");


if(isAdmin($_SESSION['id'])){
    $_SESSION['role'] = "Admin";
    header("Location:../Main/mainpage_admin.php");
}
else header("Location:../Boot/main_page.php");

?>