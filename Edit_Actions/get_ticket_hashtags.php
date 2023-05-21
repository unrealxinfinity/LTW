<?php
include_once("../database/startup.php");
include_once("../database/tickets.php");
include_once("../database/user.php");


$ticket_id = $ticket[0]['ID'];

$ticket_hashtags = getTicketHashtags($ticket_id);


$ticket_hashtags_info = '';



for($i = 0; $i < count($ticket_hashtags); $i++){
    $ticket_hashtags_info .= '<li><input type = "submit" value = "'.$ticket_hashtags[$i]['hashtagName'].'"></li>';
}

echo $ticket_hashtags_info;





?>
