<section id = "FAQs" class = "padding">
        <p class = "sub_title"> FAQs </p>
        <h2 class ="title"> Frequently asked questions </h2>
            <?php 
                if($_SESSION['role'] == "Client")include_once("../Actions/get_faqs.php");
                else{
                    echo '<div class  ="FAQForms">
                                <div id = "FAQBlock">';
                                include_once("../Actions/get_faqs.php");
                     echo       '</div>
                                <div class= "formFlex">
                                <form action="#" method="post">
                                    <input name="question" id="question" type="text" placeholder="Write a question" class = "inputBox">
                                    <input name="answer" id="answer" type="text" placeholder="Write an answer" class = "inputBox">
                                    <input name = "csrf" value = "'.$_SESSION['csrf'].'" hidden>
                                    <div id="popMessage"> </div>
                                    <button type="submit" value = "Register" id="FAQsubmit" > Add </button>
                                </form>
                                </div>
                                
                                <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
                           </div>
                           ';
                }
            ?>
        </section>
