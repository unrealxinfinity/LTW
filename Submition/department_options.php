<?php
include_once("../database/startup.php");
include_once("../database/tickets.php");
include_once("../database/user.php");


$departments = get_agent_departments($_SESSION['id']);

$departments_count = get_agent_departments_count($_SESSION['id']);

$departments_options_info = '';

for($i = 0; $i < $departments_count[0]['res']; $i++){
    $departments_options_info .= '<option value = "'.$departments[$i]['departmentName'].'">'.$departments[$i]['departmentName'].'</option>';
}


echo $departments_options_info;

?>

