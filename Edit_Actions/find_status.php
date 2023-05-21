<?php
include_once("../database/startup.php");
include_once("../database/tickets.php");
include_once("../database/user.php");


$statuses = get_statuses();

$status_options_info = '';

for($i = 0; $i < count($statuses); $i++){
    if($statuses[$i]['statusName'] == $ticket[0]['status']){
        $status_options_info .= '<option value = "'.$statuses[$i]['statusName'].'" selected>'.$statuses[$i]['statusName'].'</option>';
    }
    else $status_options_info .= '<option value = "'.$statuses[$i]['statusName'].'">'.$statuses[$i]['statusName'].'</option>';
}

echo $status_options_info;
?>
