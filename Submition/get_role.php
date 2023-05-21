<?php
include_once("../database/startup.php");
include_once("../database/tickets.php");
include_once("../database/user.php");


$username = $_POST['userName'];

$role = get_role($username);

if($role != "Admin")echo $role;


?>
