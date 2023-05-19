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
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>
    <div class = "wrapper">
        <section class = "message-area">
            <header>
                <div class = "ticket-box">
                    <a class = "status"><?php echo $ticket[0]['date']; ?></a>
                    <h2>@<?php echo $user[0]['username']; ?></h2>
                    <p class = "ticket-problem"><?php echo $ticket[0]['title'];?></p>
                </div>
            </header>
            <div class = "message-box">
                <?php 
                include_once("../database/startup.php");
                include_once("../database/tickets.php");
                include_once("../database/user.php");
                
                $ticket_id = $_GET['ticket_id'];
                
                $messages = get_all_messages($ticket_id);
                
                $message_count = get_all_messages_count($ticket_id);
                
                $message_info = '';
                
                
                for($i = 0; $i < $message_count[0]['res']; $i++){
                    if($messages[$i]['senderID'] == $_SESSION['id']){
                        $message_info .='<div class = "messages ongoing">
                                            <div class = "details">
                                                <p>'.$messages[$i]['text'].'</p>
                                            </div>
                                         </div>
                
                                         ';
                    }
                    else{
                        $message_info .='<div class = "messages incoming">
                                             <div class = "details">
                                                 <p>'.$messages[$i]['text'].'</p>
                                             </div>
                                         </div>
                
                                         ';
                    }
                }
                echo $message_info;
                ?>
            </div>
            <form action = "#" method = "post" class = "typing_zone" autocomplete = "off">
                <input name = "ticket_id" type = "text" id = "id_ticket" value = "none" hidden>
                <input name = "message_value" id = "message_val" type = "text" placeholder = "Type a message here...">
                <input id = "send_message_button" type = "submit" value = "Send">

                <div class = "FAQDropUp">
                    <button id= "FAQDropUpButton"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 8l-5 5 1.41 1.41L12 10.83l3.59 3.58L17 13z" /></svg>
                    </button>
                    <div id = "FAQDropUpContent"></div>
                </div>

            </form>
        </section>
    </div>
    <script src = "../java_script/message.js"></script>
</body>
</html>