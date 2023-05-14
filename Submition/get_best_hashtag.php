<?php
include_once("../database/startup.php");
include_once("../database/tickets.php");
include_once("../database/user.php");

$hashtag_text = $_POST['hashtag'];

$hashtags = get_hashtags($hashtag_text);

if($hashtags == null){
    echo $hashtag_text;
}
else{
    echo $hashtags[0]['hashtagName'];
}



?>
