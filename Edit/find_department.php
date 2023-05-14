<?php
include_once("../database/startup.php");
include_once("../database/tickets.php");
include_once("../database/user.php");


$departments = get_departments();

$departments_options_info = '';

for($i = 0; $i < count($departments); $i++){
    if($departments[$i]['departmentName'] == $ticket[0]['departmentName']){
        $departments_options_info .= '<option value = "'.$departments[$i]['departmentName'].'" selected>'.$departments[$i]['departmentName'].'</option>';
    }
    else{
        $departments_options_info .= '<option value = "'.$departments[$i]['departmentName'].'">'.$departments[$i]['departmentName'].'</option>';
    }
}




echo $departments_options_info;

?>

