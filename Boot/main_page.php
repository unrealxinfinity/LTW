<?php
include_once("../database/startup.php");
include_once("../database/user.php");
if(isset($_SESSION['id'])){
    if(isAdmin($_SESSION['id'])){
        $_SESSION['role'] = "Admin";
        include_once("../Main/mainpage_admin.php");
    }
    else if(isAgent($_SESSION['id'])){
        $_SESSION['role'] = "Agent";
        include_once("../Main/mainpage_agent.php");
    }
    else{
        $_SESSION['role'] = "Client";
        include_once("../Main/mainpage.php");
    }
}

?>