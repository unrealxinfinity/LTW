<?php
include_once("../database/startup.php");
include_once("../database/tickets.php");


$ticket_info = '';
$ticket_info_unotified = '';
$ticket_info_assigned_unotified = '';
$tickets = getTickets($_SESSION['id']);

$ticket_count = get_client_tickets_number($_SESSION['id']);


$button = '<a href = "../Main/message.php?ticket_id=\'.$tickets[$i][\'ID\'].\'">Respond</a>';

for($i = 0; $i < $ticket_count[0]['res']; $i++){
    if($tickets[$i]['status'] == "assigned"){
        $button = '<a href = "../Main/message.php?ticket_id='.$tickets[$i]['ID'].'">Respond</a>';
    }
    else $button = '';
    if($tickets[$i]['notification'] == "client"){
        $ticket_info .='<div class = "ticket-box">
                            <div class = "ticket_basic_info">
                                <a class = "notified"></a>
                                <a class = "date">'. $tickets[$i]['date'] .'</a>
                                <a class = "status">'. $tickets[$i]['status'].'</a>
                                <a class = "department">'. $tickets[$i]['departmentName'].'</a>
                            </div>
                            <h2>@'. $_SESSION['username'] .'</h2>
                            <p class = "ticket-problem">'. $tickets[$i]['title'] .'</p>
                            '.$button.'
                        </div>

                        ';
    }
    else{
        if($button == ''){
            $ticket_info_unotified .='<div class = "ticket-box">
                                        <div class = "ticket_basic_info">
                                            <a class = "date">'. $tickets[$i]['date'] .'</a>
                                            <a class = "status">'. $tickets[$i]['status'].'</a>
                                            <a class = "department">'. $tickets[$i]['departmentName'].'</a>
                                            <a class = "unotified"></a>
                                        </div>
                                        <h2>@'. $_SESSION['username'] .'</h2>
                                        <p class = "ticket-problem">'. $tickets[$i]['title'] .'</p>
                                        '.$button.'
                                    </div>

                                    ';
        }
        else{
            $ticket_info_assigned_unotified .= '<div class = "ticket-box">
                                                <div class = "ticket_basic_info">
                                                    <a class = "date">'. $tickets[$i]['date'] .'</a>
                                                    <a class = "status">'. $tickets[$i]['status'].'</a>
                                                    <a class = "department">'. $tickets[$i]['departmentName'].'</a>
                                                    <a class = "unotified"></a>
                                                </div>
                                                <h2>@'. $_SESSION['username'] .'</h2>
                                                <p class = "ticket-problem">'. $tickets[$i]['title'] .'</p>
                                                '.$button.'
                                            </div>

        ';
        }
    }
}
$ticket_info .= $ticket_info_assigned_unotified;
$ticket_info .= $ticket_info_unotified;
echo $ticket_info;



?>
