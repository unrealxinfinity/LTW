<?php
include_once("../database/startup.php");
include_once("../database/tickets.php");
include_once("../database/user.php");


$ticket_id = $_POST['ticket_id'];
$message_content = preg_replace("/[^a-zA-Z0-9#()=!?\s]/", '', $_POST['message_value']);
$user_id = $_SESSION['id'];
$role = $_SESSION['role'];

if($role == "Agent" || $role == "Admin"){
    $ticket = get_ticket($ticket_id);
    if($ticket[0]['status'] == "open"){
        change_ticket_status($ticket_id, "assigned");
        change_ticket_assigned_agent($ticket_id, $_SESSION['id']);
    }
    if(create_message($ticket_id, $message_content, $ticket[0]['clientID'], $_SESSION['id'])==0){;}
    $notification_role = "client";
    change_notification($ticket_id, $notification_role);
}
if($role == "Client"){
    $ticket = get_ticket($ticket_id);
    if(create_message($ticket_id, $message_content, $ticket[0]['agentID'], $_SESSION['id'])== 0){;}
    $notification_role = "agent";
    change_notification($ticket_id, $notification_role);
}



?>
