<?php
include_once("../database/startup.php");
include_once("../database/tickets.php");
include_once("../database/user.php");

if($_SESSION['role'] == "Agent" || $_SESSION['role'] == "Admin"){

    $tickets = get_all_tickets();
    $tickets_count = get_all_tickets_number();
    $ticket_info = '';

    for($i = 0; $i < $tickets_count[0]['res']; $i++){
        $user_info = get_user_by_id($tickets[$i]['clientID']);
        if($tickets[$i]['status'] == 'open'){
            $ticket_info .='<div class = "ticket-box">
                                <div class = "ticket_basic_info">
                                    <a class = "date">'. htmlentities($tickets[$i]['date']) .'</a>
                                    <a class = "status">'. htmlentities($tickets[$i]['status']).'</a>
                                    <a class = "department">'. htmlentities($tickets[$i]['departmentName']).'</a>
                                    <a class = "priority">'. htmlentities($tickets[$i]['priority']).'</a>
                                </div>
                                <h2>@'. htmlentities($user_info[0]['username']) .'</h2>
                                <p class = "ticket-problem">'. htmlentities($tickets[$i]['title']) .'</p>
                                <a href = "../Main/message.php?ticket_id='.htmlentities($tickets[$i]['ID']).'">Respond</a>
                            </div>

                            ';
        }
        else{
            $ticket_info .='<div class = "ticket-box">
                                <div class = "ticket_basic_info">
                                    <a class = "date">'. htmlentities($tickets[$i]['date']) .'</a>
                                    <a class = "status">'. htmlentities($tickets[$i]['status']).'</a>
                                    <a class = "department">'. htmlentities($tickets[$i]['departmentName']).'</a>
                                </div>
                                <h2>@'. htmlentities($user_info[0]['username']) .'</h2>
                                <p class = "ticket-problem">'. htmlentities($tickets[$i]['title']) .'</p>
                            </div>

                            ';
        }
    }

    echo $ticket_info;
}


?>