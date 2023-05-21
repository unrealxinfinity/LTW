<?php
include_once("../database/startup.php");
include_once("../database/tickets.php");
include_once("../database/user.php");

if(!isset($_SESSION['id']) || $_SESSION['role'] == "Client"){
    header("Location:../start.php");
}



$ticket = get_ticket($_GET['ticket_id']);

if($ticket[0]['assignedAgentID'] != $_SESSION['id'] && $_SESSION['role'] == "Agent" && $ticket[0]['assignedAgentID'] != 1){
    header("Location:../Boot/main_page_agent.php");
}
$user;
if($_SESSION['role'] == "Agent" || $_SESSION['role'] == "Admin"){
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
            <div class = "back_arrow">
                &#x25c0;
            </div>
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
            <div class = "tag_list">
                <ul id = "deletable_list">
                    <?php include_once("../Edit_Actions/get_ticket_hashtags.php");?>
                </ul>
            </div>
            <div id = "add_form">
                <form action = "#" method = "post" class = "edit_typing_zone">
                    <div class = "ticket_control">
                        <label for = "hashtag">Hashtags</label>
                        <input type = "text" name = "hashtag" id = "hashtag_search_input" placeholder = "Type a hashtag...">
                        <ul>
                            
                        </ul>
                    </div>
                    <div class = "ticket_control">
                        <input name = "ticket_id" type = "text" id = "ticket_add_id" value = "none" hidden>
                        <input id = "add_hashtag_button" type = "submit" value = "Add" class = "edit_ticket_button">
                    </div>
                </form>
            </div>
            <form action = "../Edit_Actions/update_ticket_info.php" method = "post" class = "edit_typing_zone">
                <div class = "ticket_control">
                    <label for = "departmentName">Department</label>
                    <select name = "departmentName" class = "department_selector">
                        <?php include_once("../Edit_Actions/find_department.php"); ?>
                    </select>
                </div>
                <div class = "ticket_control">
                    <label for = "assignedAgent">Assigned Agent</label>
                    <select name = "assignedAgent" class = "department_selector">
                        <?php include_once("../Edit_Actions/find_assigned_agent.php"); ?>
                    </select>
                </div>
                <div class = "ticket_control">
                    <label for = "status">Status</label>
                    <select name = "status" class = "department_selector">
                        <option value = ""></option>
                        <?php include_once("../Edit_Actions/find_status.php"); ?>
                    </select>
                </div>
                <div class = "ticket_control">
                    <label for = "priority">Priority</label>
                    <select name = "priority" class = "department_selector">
                        <option value = ""></option>
                        <?php include_once("../Edit_Actions/find_priority.php"); ?>
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

