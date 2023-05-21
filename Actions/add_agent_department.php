<?php
include_once("../database/startup.php");
include_once("../database/tickets.php");
include_once("../database/user.php");

if($_SESSION['csrf'] != $_POST['csrf'])header("Location:../start.php");

$agent = $_POST['agent'];

$user = getUser($agent);

$new_department = $_POST['new_department'];

if(!isAlreadyAgentDepartment($user['id'], $new_department)){
    if(insert_agent_department($user['id'], $new_department)){

    }
}

include_once("../Actions/get_agent_departments.php");


?>


