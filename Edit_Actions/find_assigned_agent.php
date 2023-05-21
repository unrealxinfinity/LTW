<?php
include_once("../database/startup.php");
include_once("../database/tickets.php");
include_once("../database/user.php");
$agents = get_agents();

$assigned_options_info = '';

for($i = 0; $i < count($agents); $i++){
    $user = get_user_by_id($agents[$i]['agentID']);

    if($agents[$i]['agentID'] == $ticket[0]['assignedAgentID']){
        $assigned_options_info .= '<option value = "'.$user[0]['username'].'" selected>'.$user[0]['username'].'</option>';
    }
    else{
        $assigned_options_info .= '<option value = "'.$user[0]['username'].'">'.$user[0]['username'].'</option>';
    }
}

echo $assigned_options_info;
?>

