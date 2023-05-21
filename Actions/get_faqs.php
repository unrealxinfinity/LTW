<?php
include_once("../database/startup.php");
include_once("../database/faqs.php");
$faqs_db=get_faqs();
$html_elem= '';

if($_SESSION['role']=='Agent' || $_SESSION['role']=='Admin'){
    while($row = $faqs_db->fetch()){
        $html_elem .= '<button type = "button" class = "collapsible">' . $row['question'] .'<i class="material-icons" style="fontsize-48px;">delete</i>'. '</button>'.
                        '<div class = "faqContent">'.'<p>'.$row['answer'].'</p>'.'</div> 
                        
                        ';
    }
}

else if($_SESSION['role']=='Client'){
    while($row = $faqs_db->fetch()){
        $html_elem .= '<button type = "button" class = "collapsible">' . $row['question'] . '</button>'.
                        '<div class = "faqContent">'.'<p>'.$row['answer'].'</p>'.'</div> 
                        
                        ';
    } 
}

echo $html_elem;
?>