<?php
include_once("../database/startup.php");
include_once("../database/tickets.php");
include_once("../database/user.php");

$date = "november";
$client = $_SESSION['username'];
$assignedAgent = "";
$message = $_POST['msg'];
$status = "open";
$priority = "critical";
$department = $_POST['department'];
echo $department;
if(($ticket = createTicket($date, $client, $assignedAgent, $department, $message, $status, $priority)) != -1){
	header("Location:../Boot/main_page.php");

} 

?>