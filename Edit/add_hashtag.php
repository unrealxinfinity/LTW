<?php
include_once("../database/startup.php");
include_once("../database/tickets.php");
include_once("../database/user.php");

$hashtag_text = $_POST['hashtag'];

$ticket_id = $_POST['ticket_id'];

$ticket = get_ticket($ticket_id);


$valid = true;

if($hashtag_text == ''){
    $valid = false;
}
else if($hashtag_text[0] != '#')$valid = false;
else if($hashtag_text == '#')$valid = false;
for($i = 0; $i < strlen($hashtag_text); $i++){
    if($hashtag_text[$i] == ' '){
        $valid = false;
        break;
    }
}

$hashtag = '';
if($valid){
    $valid = false;
    for($i = 0; $i < strlen($hashtag_text); $i++){
        if($hashtag_text[$i] == '#' && $valid == false){
            $valid = true;
        }
        else if($hashtag_text[$i] == ' ' || ($hashtag_text[$i] == '#' && $valid == true)){
            if($valid == true){
                if(!does_hashtag_exist_already($hashtag)){
                    create_hashtag($hashtag);
                }
                if(!does_ticket_hashtag_exist_already($ticket_id, $hashtag)){
                    create_ticket_hashtag($ticket_id, $hashtag);
                    add_ticket_hashtag($ticket_id, $hashtag);
                }
                $hashtag = '';
            }
            $valid = false;
        }
        if($valid){
            $hashtag .= $hashtag_text[$i];
        }
    }
    if($hashtag != '' && $hashtag != '#'){
        if(!does_hashtag_exist_already($hashtag)){
            create_hashtag($hashtag);
        }
        if(!does_ticket_hashtag_exist_already($ticket_id, $hashtag)){
            create_ticket_hashtag($ticket_id, $hashtag);
            add_ticket_hashtag($ticket_id, $hashtag);
        }
    }
    $ticket = get_ticket($ticket_id);

    echo $ticket[0]['title'];
}
else{
    echo $ticket[0]['title'];
}
?>

