<?php
include_once("../database/startup.php");
include_once("../database/tickets.php");
include_once("../database/user.php");

$ticket = get_ticket($_GET['ticket_id']);
$user;
if($_SESSION['role'] == "Agent"){
    $user = get_user_by_id($ticket[0]['clientID']);
}
else if($_SESSION['role']=="Client"){
    $user = get_user_by_id($ticket[0]['assignedAgentID']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href = "../css/message.css">
</head>
<body>
    <div class = "wrapper" id = "edit_wrapper">
        <section class = "message-area">
            <header>
                <div class = "ticket-box">
                    <a class = "date"><?php echo $ticket[0]['date']; ?></a>
                    <a class = "status"><?php echo $ticket[0]['status']; ?></a>
                    <a class = "department"><?php echo $ticket[0]['departmentName']?></a>
                    <a class = "priority"><?php echo $ticket[0]['priority']?></a>
                    <h2>@<?php echo $user[0]['username']; ?></h2>
                    <p class = "ticket-problem"><?php echo $ticket[0]['title'];?></p>
                </div>
                
                
            </header>
            <form action = "../Edit/update_ticket_info.php" method = "post" class = "edit_typing_zone">
                <div class = "ticket_control">
                    <label for = "departmentName">Department</label>
                    <select name = "departmentName" class = "department_selector">
                        <?php include_once("../Edit/find_department.php"); ?>
                    </select>
                </div>
                <div class = "ticket_control">
                    <label for = "assignedAgent">Assigned Agent</label>
                    <select name = "assignedAgent" class = "department_selector">
                        <?php include_once("../Edit/find_assigned_agent.php"); ?>
                    </select>
                </div>
                <div class = "ticket_control">
                    <label for = "status">Status</label>
                    <select name = "status" class = "department_selector">
                        <option value = ""></option>
                        <?php include_once("../Edit/find_status.php"); ?>
                    </select>
                </div>
                <div class = "ticket_control">
                    <label for = "priority">Priority</label>
                    <select name = "priority" class = "department_selector">
                        <option value = ""></option>
                        <?php include_once("../Edit/find_priority.php"); ?>
                    </select>
                </div>
                <div class = "ticket_control">
                    <input name = "ticket_id" type = "text" id = "id_ticket" value = "none" hidden>
                    <input id = "send_message_button" type = "submit" value = "Edit" class = "edit_ticket_button">
                </div>
                
                
            </form>
        </section>
        <script src = "../java_script/edit.js"></script>
    </div>
</body>
</html>

