<?php

include_once("../database/startup.php");
include_once("../database/user.php");

if(!isset($_SESSION['id'])){
    header("Location:../Boot/main_page.php");
}

include_once("../Pages/header.php");
include_once("../Pages/profile.php");
include_once("../Pages/edit_profile.php");
include_once("../Pages/send_ticket.php");
include_once("../Pages/client_ticket_history.php");
include_once("../Pages/faq.php");
include_once("../Pages/footer.php");

?>
                    
