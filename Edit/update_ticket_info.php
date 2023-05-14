<?php
include_once("../database/startup.php");
include_once("../database/tickets.php");
include_once("../database/user.php");


$user = getUser($_POST['assignedAgent']);


update_ticket($_POST['ticket_id'], $_POST['departmentName'], $user['id'], $_POST['status'], $_POST['priority']);

$ticket_id = $_POST['ticket_id'];

print_r($ticket_id);

//header("Location:../Main/edit.php?ticket_id='.$ticket_id.'");
$head = "Location:../Main/edit.php?ticket_id=";

$head .= $ticket_id;

header($head);

?>

