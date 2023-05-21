<?php
include_once("../database/startup.php");
include_once("../database/user.php");

    $valid = false;
    if(AlreadyRegisteredUsername($_POST['username'])){
        $_SESSION['ERROR'] = 'Duplicated Username';
        header("Location:".$_SERVER['HTTP_REFERER']."");
    }
    else if(AlreadyRegisteredEmail($_POST['email'])){
        $_SESSION['ERROR'] = 'Duplicated Email';
		header("Location:".$_SERVER['HTTP_REFERER']."");
    }
    else{
        if (($user = createUser($_POST['username'], $_POST['name'], $_POST['password'], $_POST['email'])) != -1) {
            setCurrentUser($user);
            $_SESSION['role'] = "Client";
            $valid = true;	
        }
        else{
            
            $_SESSION['ERROR'] = 'ERROR';
            header("Location:".$_SERVER['HTTP_REFERER']."");
        }
        if($_POST['role'] == "Agent"){
            createAgent($_POST['username']);
            $_SESSION['role'] = "Agent";
            
        }
        else if($_POST['role'] == "Admin"){
            createAgent($_POST['username']);
            createAdmin($_POST['username']);
            $_SESSION['role'] = "Admin";
            
        }
        if($valid){
            header("Location:../Boot/main_page.php");
        }
    }

 ?>