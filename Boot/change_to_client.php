<?php
include_once("../database/startup.php");
include_once("../database/user.php");

$_SESSION['role'] = "Client";

header("Location:../Main/mainpage.php");

?>
