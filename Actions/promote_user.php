<?php
include_once("../database/startup.php");
include_once("../database/tickets.php");
include_once("../database/user.php");

if($_SESSION['csrf'] != $_POST['csrf'])header("Location:../start.php");

$username = $_POST['user'];

$new_role = $_POST['new_role'];

$role = get_role($username);

if($role != $new_role && $username != ''){
    if($new_role == "Agent"){
        createAgent($username);
    }
    else{
        if($role == "Client"){
            createAgent($username);
        }
        createAdmin($username);
    }
    include_once("../Actions/user_options.php");
}
else echo '!';



?>
