<?php
include_once("../database/startup.php");
include_once("../database/tickets.php");
include_once("../database/user.php");


$agents = get_agents();

$agents_options_info = '';

for($i = 0; $i < count($agents); $i++){
    if(isAdmin($agents[$i]['agentID']))continue;
    $user = get_user_by_id($agents[$i]['agentID']);
    $agents_options_info .= '<option>'.$user[0]['username'].'</option>';
}
echo $agents_options_info;



?>

