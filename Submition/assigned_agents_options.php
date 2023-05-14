<?php
include_once("../database/startup.php");
include_once("../database/tickets.php");
include_once("../database/user.php");
$agents = get_agents();
$agents_count  = get_agents_count();

$assigned_options_info = '';

for($i = 0; $i < $agents_count[0]['res']; $i++){
    $user = get_user_by_id($agents[$i]['agentID']);
    $assigned_options_info .= '<option value = "'.$user[0]['username'].'">'.$user[0]['username'].'</option>';
}

echo $assigned_options_info;
?>

