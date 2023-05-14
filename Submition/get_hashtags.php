<?php
include_once("../database/startup.php");
include_once("../database/tickets.php");
include_once("../database/user.php");

$hashtag_text = $_POST['hashtag'];

$hashtags = get_hashtags($hashtag_text);

$hashtags_count = get_hashtags_count($hashtag_text);

$hashtag_info = '';

for($i = 0; $i < $hashtags_count[0]['res']; $i++){
    $hashtag_info .= '<li>'.$hashtags[$i]['hashtagName'].'</li>';
}

echo $hashtag_info;


?>

