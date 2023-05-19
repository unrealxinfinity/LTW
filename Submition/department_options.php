<?php
include_once("../database/startup.php");
include_once("../database/tickets.php");
include_once("../database/user.php");


$departments_options_info = '';

if(!isAdmin($_SESSION['id']) && $_SESSION['role'] == "Agent"){
    $departments = get_agent_departments($_SESSION['id']);

    $departments_count = get_agent_departments_count($_SESSION['id']);


    for($i = 0; $i < $departments_count[0]['res']; $i++){
        $departments_options_info .= '<option value = "'.$departments[$i]['departmentName'].'">'.$departments[$i]['departmentName'].'</option>';
    }
}
else{
    $departments = get_departments();

    for($i = 0; $i < count($departments); $i++){
        if($departments[$i]['departmentName'] == '')continue;
        $departments_options_info .= '<option value = "'.$departments[$i]['departmentName'].'">'.$departments[$i]['departmentName'].'</option>';
    }
    
}


echo $departments_options_info;

?>

