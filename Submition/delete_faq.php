<?php
include_once("../database/startup.php");
include_once("../database/faqs.php");

$question = $_POST['question'];

if(AlreadyExistsQuestion($question)){
    delete_FAQ($question);
    include_once("../Submition/get_faqs.php");
}
?>