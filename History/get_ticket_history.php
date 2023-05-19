<?php
include_once("../database/startup.php");
include_once("../database/tickets.php");
include_once("../database/user.php");

$history = get_ticket_history($ticket[0]['ID']);


$history_info = '';

for($i = 0; $i < count($history); $i++){
    $history_info .= '<p>' .$history[$i]['message']. '</p>';
}

echo $history_info;

?>

