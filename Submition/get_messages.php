<?php
include_once("../database/startup.php");
include_once("../database/tickets.php");
include_once("../database/user.php");

$ticket_id = $_POST['ticket_id'];

$messages = get_all_messages($ticket_id);

$message_count = get_all_messages_count($ticket_id);

$message_info = '';

$notification = get_notification($ticket_id);

if(!(($notification[0]['notification'] == "client" && $_SESSION['role'] == "Agent") || ($notification[0]['notification'] == "agent" && $_SESSION['role'] == "Client"))){
    change_notification($ticket_id, "none");
}



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
