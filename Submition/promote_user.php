<?php
include_once("../database/startup.php");
include_once("../database/tickets.php");
include_once("../database/user.php");

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
    include_once("../Submition/user_options.php");
}
else echo '!';



?>
