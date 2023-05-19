<?php
include_once("../database/startup.php");
include_once("../database/tickets.php");
include_once("../database/user.php");

$feature = $_POST['feature'];

$new_feature = $_POST['new_feature'];

if(insert_new_feature($feature, $new_feature) == -1){
    
}



?>

