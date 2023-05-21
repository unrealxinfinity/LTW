<?php

include_once("../database/startup.php");
include_once("../database/user.php");

if(!isset($_SESSION['id'])){
    header("Location:../Boot/main_page.php");
}

include_once("../Pages/header.php");
include_once("../Pages/profile.php");
include_once("../Pages/edit_profile.php");
include_once("../Pages/view_assigned_tickets.php");
include_once("../Pages/search_tickets.php");
include_once("../Pages/faq.php");
include_once("../Pages/footer.php");
?>

