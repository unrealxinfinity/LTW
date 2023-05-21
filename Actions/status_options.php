<?php
include_once("../database/startup.php");
include_once("../database/tickets.php");
include_once("../database/user.php");


$statuses = get_statuses();
$statuses_count = get_statuses_count();

$status_options_info = '';

for($i = 0; $i < $statuses_count[0]['res']; $i++){
    $status_options_info .= '<option value = "'.$statuses[$i]['statusName'].'">'.$statuses[$i]['statusName'].'</option>';
}

echo $status_options_info;
?>

