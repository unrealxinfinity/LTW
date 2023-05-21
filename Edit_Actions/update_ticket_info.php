<?php
include_once("../database/startup.php");
include_once("../database/tickets.php");
include_once("../database/user.php");



if($_SESSION['role'] == "Agent" || $_SESSION['role'] == "Admin"){
    $user = getUser($_POST['assignedAgent']);


    $ticket_id = $_POST['ticket_id'];

    $ticket = get_ticket($ticket_id);

    $previous_agent = get_user_by_id($ticket[0]['assignedAgentID']);


    $status = $_POST['status'];

    if($status == ''){
        $status = $ticket[0]['status'];
    }


    if($status == "assigned" && $_POST['assignedAgent'] == ''){
        $user = getUser($_SESSION['username']);
    }
    if($status != "assigned" && $_POST['assignedAgent'] != ''){
        $user = getUser('');
    }

    if($ticket[0]['status'] != $status){
        add_to_history($ticket_id, $status, $ticket[0]['status'], "status");
    }
    if($ticket[0]['priority'] != $_POST['priority']){
        add_to_history($ticket_id, $_POST['priority'], $ticket[0]['priority'], "priority");
    }
    if($previous_agent[0]['username'] != $user['username']){
        add_to_history($ticket_id, $user['username'], $previous_agent[0]['username'], "assigned agent");
    }
    if($ticket[0]['departmentName'] != $_POST['departmentName']){
        add_to_history($ticket_id, $ticket[0]['departmentName'], $_POST['departmentName'], "department");
    }


    update_ticket($_POST['ticket_id'], $_POST['departmentName'], $user['id'], $status, $_POST['priority']);





    $head = "Location:../Main/edit.php?ticket_id=";

    $head .= $ticket_id;

    header($head);

}

?>

