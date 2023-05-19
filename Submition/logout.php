<?php
include_once("../database/startup.php");
include_once("../database/user.php");

session_unset();
header('Location:../Boot/login.php');
?>
