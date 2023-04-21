<?php
include_once("../database/startup.php");
include_once("../database/user.php");

    if(AlreadyRegisteredUsername($_POST['username'])){
        $_SESSION['ERROR'] = 'Duplicated Username';
        header("Location:".$_SERVER['HTTP_REFERER']."");
    }
    else if(AlreadyRegisteredEmail($_POST['email'])){
        $_SESSION['ERROR'] = 'Duplicated Email';
		header("Location:".$_SERVER['HTTP_REFERER']."");
    }
 	else if (($user = createUser($_POST['username'], $_POST['password'], $_POST['email'])) != -1) {

 		header("Location:../Boot/login.php");	
 	}


    else{
        $_SESSION['ERROR'] = 'ERROR';
        header("Location:".$_SERVER['HTTP_REFERER']."");
    }
 ?>