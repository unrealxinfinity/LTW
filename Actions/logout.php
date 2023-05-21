<?php
include_once("../database/startup.php");
include_once("../database/user.php");

session_destroy();
header('Location:../Boot/login.php');
?>
