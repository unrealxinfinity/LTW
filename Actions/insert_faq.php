<?php
include_once("../database/startup.php");
include_once("../database/faqs.php");

if($_SESSION['csrf'] != $_POST['csrf'])header("Location:../start.php");


$question = preg_replace("/[^a-zA-Z0-9#()=!?\s]/", '', $_POST['question']);
$answer = $_POST['answer'];


if(AlreadyExistsQuestion($question)){
        echo'<div class="popup"><span class="popuptext" id="myPopup">Question already exists!</span></div>';
}
else{
    insert_faq($question,$answer);
    include_once("../Actions/get_faqs.php");
}

?>