<?php
include_once("../database/startup.php");
include_once("../database/user.php");


if(isAgent($_SESSION['id'])){
    $_SESSION['role'] = "Agent";
    header("Location:../Main/mainpage_agent.php");
}
else header("Location:../Boot/main_page.php");

?>

