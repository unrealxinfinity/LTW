<?php
include_once("../database/startup.php");
include_once("../database/tickets.php");
include_once("../database/user.php");

$date = $_POST['date'];
$assignedAgent = $_POST['assignedAgent'];
$status = $_POST['status'];
$priority = $_POST['priority'];
$department = $_POST['departmentName'];
$hashtag = $_POST['hashtag'];


if($assignedAgent != '/'){
    $user = getUser($assignedAgent);
}

$tickets = '';
$tickets_count = '';

if($assignedAgent != '/'){
    $tickets = get_all_filtered_tickets($date, $user['id'], $status, $priority, $department);
    $tickets_count = get_all__filtered_tickets_number($date, $user['id'], $status, $priority, $department);
}
else {
    $tickets = get_all_filtered_tickets($date, 0, $status, $priority, $department);
    $tickets_count = get_all__filtered_tickets_number($date, 0, $status, $priority, $department);

}

$ticket_info = '';

for($i = 0; $i < $tickets_count[0]['res']; $i++){
    $user_info = get_user_by_id($tickets[$i]['clientID']);
    if($hashtag != ''){
        if(!does_ticket_hashtag_exist_already($tickets[$i]['ID'], $hashtag))continue;
    }
    if($tickets[$i]['status'] == 'open'){
        $ticket_info .='<div class = "ticket-box">
                            <div class = "ticket_basic_info">
                                <a class = "date">'. htmlentities($tickets[$i]['date']) .'</a>
                                <a class = "status">'. htmlentities($tickets[$i]['status']).'</a>
                                <a class = "priority">'. htmlentities($tickets[$i]['priority']).'</a>
                                <a class = "department">'. htmlentities($tickets[$i]['departmentName']).'</a>
                                <a class = "priority">'. htmlentities($tickets[$i]['priority']).'</a>
                            </div>
                            <h2>@'. htmlentities($user_info[0]['username']) .'</h2>
                            <p class = "ticket-problem">'. htmlentities($tickets[$i]['title']) .'</p>
                            <a href = "../Main/edit.php?ticket_id='.htmlentities($tickets[$i]['ID']).'">Edit</a>
                            <a href = "../Main/message.php?ticket_id='.htmlentities($tickets[$i]['ID']).'">Respond</a>
                            <a href = "../Main/history.php?ticket_id='.htmlentities($tickets[$i]['ID']).'">History</a>
                        </div>

                        ';
    }
    else if($_SESSION['role'] == "Admin"){
        $ticket_info .='<div class = "ticket-box">
                            <div class = "ticket_basic_info">
                                <a class = "date">'. htmlentities($tickets[$i]['date']) .'</a>
                                <a class = "status">'. htmlentities($tickets[$i]['status']).'</a>
                                <a class = "priority">'. htmlentities($tickets[$i]['priority']).'</a>
                                <a class = "department">'. htmlentities($tickets[$i]['departmentName']).'</a>
                            </div>
                            <h2>@'. htmlentities($user_info[0]['username']) .'</h2>
                            <p class = "ticket-problem">'. htmlentities($tickets[$i]['title']) .'</p>
                            <a href = "../Main/edit.php?ticket_id='.htmlentities($tickets[$i]['ID']).'">Edit</a>
                            <a href = "../Main/history.php?ticket_id='.htmlentities($tickets[$i]['ID']).'">History</a>
                        </div>

                        ';
    }
    else{
        $ticket_info .='<div class = "ticket-box">
                            <div class = "ticket_basic_info">
                                <a class = "date">'. $tickets[$i]['date'] .'</a>
                                <a class = "status">'. $tickets[$i]['status'].'</a>
                                <a class = "priority">'. $tickets[$i]['priority'].'</a>
                                <a class = "department">'. $tickets[$i]['departmentName'].'</a>
                            </div>
                            <h2>@'. $user_info[0]['username'] .'</h2>
                            <p class = "ticket-problem">'. $tickets[$i]['title'] .'</p>
                        </div>

                        ';
    }
}
echo $ticket_info;




?>