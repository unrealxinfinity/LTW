<?php
include_once("../database/startup.php");
include_once("../database/tickets.php");
include_once("../database/user.php");
$users = get_users();

$users_options_info = '';

for($i = 0; $i < count($users); $i++){
    if(!isAdmin($users[$i]['id'])){
        $users_options_info .= '<option value = "'.$users[$i]['username'].'">'.$users[$i]['username'].'</option>';
    }
}

echo $users_options_info;
?>
