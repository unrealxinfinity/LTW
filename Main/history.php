<?php
include_once("../database/startup.php");
include_once("../database/tickets.php");
include_once("../database/user.php");

$ticket = get_ticket($_GET['ticket_id']);
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
        <div class = "back_arrow">
            &#x25c0;
        </div>
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
            <div class = "history_box">
                <?php include_once("../History/get_ticket_history.php");?>
            </div>
            
        </section>
        <script src = "../java_script/history.js"></script>
    </div>
</body>
</html>

