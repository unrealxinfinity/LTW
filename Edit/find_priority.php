<?php
include_once("../database/startup.php");
include_once("../database/tickets.php");
include_once("../database/user.php");


$priorities = get_priorities();

$priorities_options_info = '';

for($i = 0; $i < count($priorities); $i++){
    if($priorities[$i]['priorityName'] == $ticket[0]['priority']){
        $priorities_options_info .= '<option value = "'.$priorities[$i]['priorityName'].'" selected>'.$priorities[$i]['priorityName'].'</option>';
    }
    else $priorities_options_info .= '<option value = "'.$priorities[$i]['priorityName'].'">'.$priorities[$i]['priorityName'].'</option>';
}

echo $priorities_options_info;
?>

