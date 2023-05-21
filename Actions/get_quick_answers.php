<?php
include_once("../database/startup.php");
include_once("../database/faqs.php");

$faqs_db=get_faqs();
$html_elem= '';

if($_SESSION['role']=='Agent' || $_SESSION['role']=='Admin'){
    while($row = $faqs_db->fetch()){
        $html_elem .='<button type = "button" class ="QuickAnswers">' . $row['question'] .'</button>
        '.'<div class ="AnswerContainer"><p>'.$row['answer'].'</p></div>';
    } 
}
echo $html_elem;

?>