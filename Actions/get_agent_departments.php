<?php
include_once("../database/startup.php");
include_once("../database/tickets.php");
include_once("../database/user.php");


$departments_options_info = '';

if($_SESSION['role'] == "Agent" || $_SESSION['role'] == "Admin"){

    $user = getUser($_POST['agent']);
    $departments = get_agent_departments($user['id']);


    for($i = 0; $i < count($departments); $i++){
        $departments_options_info .= '<option value = "'.$departments[$i]['departmentName'].'">'.$departments[$i]['departmentName'].'</option>
        
        ';
    }

    if($departments_options_info == ''){
        $departments_options_info .= '<option></option>
        
        ';
    }
    echo $departments_options_info;
}
?>

