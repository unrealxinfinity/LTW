<?php
include_once("../database/startup.php");
include_once("../database/tickets.php");
include_once("../database/user.php");


$priorities = get_priorities();
$priorities_count = get_priorities_count();

$priorities_options_info = '';

for($i = 0; $i < $priorities_count[0]['res']; $i++){
    $priorities_options_info .= '<option value = "'.$priorities[$i]['priorityName'].'">'.$priorities[$i]['priorityName'].'</option>';
}

echo $priorities_options_info;
?>

