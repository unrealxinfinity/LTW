<?php
include_once("../database/startup.php");
include_once("../database/faqs.php");

if($_SESSION['role'] == "Agent" || $_SESSION['role'] == "Admin"){
    $question = $_POST['question'];

    if(AlreadyExistsQuestion($question)){
        delete_FAQ($question);
        include_once("../Actions/get_faqs.php");
    }
}
?>