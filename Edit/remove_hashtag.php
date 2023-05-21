<?php
include_once("../database/startup.php");
include_once("../database/tickets.php");
include_once("../database/user.php");


if(remove_hashtag_from_ticket($_POST['ticket_id'], $_POST['hashtagName'])){
}

$ticket = get_ticket($_POST['ticket_id']);
    $title = $ticket[0]['title'];
    $find = '';
    $count = 0;
    $new_title = '';
    $valid = false;
    for($i = 0; $i < strlen($title); $i++){
        if($valid){
            $new_title .= $title[$i];
        }
        else if($title[$i] == $_POST['hashtagName'][$count]){
            $find .= $title[$i];
            $count = $count + 1;
            
        }
        else{
            if($find != $_POST['hashtagName'] ){
                $new_title .= $find;
                
            }
            else if($title[$i] != ' ' && $title[$i] != '#'){
                $new_title .= $find;
            }
            else{
                $valid = true;
            }
            $find = '';
            $count = 0;
            if($title[$i] == '#'){
                $i = $i-1;
            }
            else $new_title .= $title[$i];

        }
    }

update_ticket_title($_POST['ticket_id'], $new_title);


echo $new_title;




?>

