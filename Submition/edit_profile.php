<?php
include_once("../database/startup.php");
include_once("../database/user.php");

    $valid = false;
    $username = $_POST['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if($username == '')$username = $_SESSION['username'];
    if($name == '')$name = $_SESSION['name'];
    if($email == '')$email = $_SESSION['email'];
    if($password == '')$password = $_SESSION['password'];

    if($username == $_SESSION['username']){
        $user;
        if($email != $_SESSION['email']){
            if(AlreadyRegisteredEmail($email))$user = update_user($_SESSION['username'], $username, $name, $_SESSION['email'], $password);
            else $user = update_user($_SESSION['username'], $username, $name, $email, $password);
        }
        else{
            $user = update_user($_SESSION['username'], $username, $name, $email, $password);
        }
        setCurrentUser($user);
        $valid = true;
    }
    else{
        $user;
        if(AlreadyRegisteredUsername($username)){
            if($email != $_SESSION['email']){
                if(AlreadyRegisteredEmail($email)) $user = update_user($_SESSION['username'], $_SESSION['username'], $name, $_SESSION['email'], $password);
                else $user = update_user($_SESSION['username'], $_SESSION['username'], $name, $email, $password);
            }
            else{
                $user = update_user($_SESSION['username'], $_SESSION['username'], $name, $email, $password);
            }
        }
        else{
            if($email != $_SESSION['email']){
                if(AlreadyRegisteredEmail($email)) $user = update_user($_SESSION['username'], $username, $name, $_SESSION['email'], $password);
                else $user = update_user($_SESSION['username'], $username, $name, $email, $password);
            }
            else{
                $user = update_user($_SESSION['username'], $username, $name, $email, $password);
            }
        }
        setCurrentUser($user);
        $valid = true;
    }
    if($valid){
        if($_SESSION['role'] == "Agent")header("Location:../Boot/main_page_agent.php");
        else header("Location:../Boot/main_page.php");
    }

 ?>