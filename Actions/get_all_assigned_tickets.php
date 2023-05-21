<?php
include_once("../database/startup.php");
include_once("../database/tickets.php");
include_once("../database/user.php");



$tickets = get_tickets_by_status($_SESSION['id'], "assigned");

if($_SESSION['role'] == "Admin" ||  $_SESSION['role'] == "Agent"){

    $ticket_count = get_tickets_by_status_count($_SESSION['id'], "assigned");

    $ticket_info = '';

    $ticket_info_assigned_unotified = '';

    for($i = 0; $i < $ticket_count[0]['res']; $i++){
        if($tickets[0]['assignedAgentID'] != $_SESSION['id'] && $_SESSION['role'] == "Agent")header("Location:../start.php");
        $user_info = get_user_by_id($tickets[$i]['clientID']);
        if($tickets[$i]['notification'] == "agent"){
            $ticket_info .='<div class = "ticket-box">
                                <div class = "ticket_basic_info">
                                    <a class = "notified"></a>
                                    <a class = "date">'. $tickets[$i]['date'] .'</a>
                                    <a class = "status">'. $tickets[$i]['status'].'</a>
                                    <a class = "priority">'. $tickets[$i]['priority'].'</a>
                                    <a class = "department">'. $tickets[$i]['departmentName'].'</a>
                                </div>
                                <h2>@'. $user_info[0]['username'] .'</h2>
                                <p class = "ticket-problem">'. $tickets[$i]['title'] .'</p>
                                <a href = "../Main/message.php?ticket_id='.$tickets[$i]['ID'].'">Respond</a>
                                <a href = "../Main/edit.php?ticket_id='.$tickets[$i]['ID'].'">Edit</a>
                                <a href = "../Main/history.php?ticket_id='.$tickets[$i]['ID'].'">History</a>
                            </div>

                            ';
        }
        else{
            $ticket_info_assigned_unotified .= '<div class = "ticket-box">
                                                    <div class = "ticket_basic_info">
                                                        <a class = "date">'. $tickets[$i]['date'] .'</a>
                                                        <a class = "status">'. $tickets[$i]['status'].'</a>
                                                        <a class = "priority">'. $tickets[$i]['priority'].'</a>
                                                        <a class = "department">'. $tickets[$i]['departmentName'].'</a>
                                                        <a class = "unotified"></a>
                                                    </div>
                                                    <h2>@'. $user_info[0]['username'] .'</h2>
                                                    <p class = "ticket-problem">'. $tickets[$i]['title'] .'</p>
                                                    <a href = "../Main/message.php?ticket_id='.$tickets[$i]['ID'].'">Respond</a>
                                                    <a href = "../Main/edit.php?ticket_id='.$tickets[$i]['ID'].'">Edit</a>
                                                    <a href = "../Main/history.php?ticket_id='.$tickets[$i]['ID'].'">History</a>
                                                </div>

                                                ';
        }
    }
    $ticket_info .= $ticket_info_assigned_unotified;
    echo $ticket_info;
}

?>
