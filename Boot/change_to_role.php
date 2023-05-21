<?php

include_once("../database/startup.php");
include_once("../database/user.php");

if($_SESSION['role'] == "Client"){
    header("Location:../Main/mainpage.php");
}
else if($_SESSION['role'] == "Agent"){
    if(isAgent($_SESSION['id']))header("Location:../Main/mainpage_agent.php");
}
else{
    if(isAdmin($_SESSION['id']))header("Location:../Main/mainpage_admin.php");
}



?>


