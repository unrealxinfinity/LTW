<?php
include_once("../database/startup.php");
include_once("../database/faqs.php");
$question = $_POST['question'];
$answer = $_POST['answer'];


if(AlreadyExistsQuestion($question)){
        echo'<div class="popup"><span class="popuptext" id="myPopup">Question already exists!</span></div>';
}
else{
    insert_faq($question,$answer);
    include_once("../Submition/get_faqs.php");
}
?>