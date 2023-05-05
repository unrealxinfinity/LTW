<?php
include_once("../database/startup.php");
include_once("../database/user.php");
if(($username = isLoginCorrect($_POST['username'], $_POST['password'])) != -1){
	setCurrentUser($username);
	$_SESSION['role'] = "Client";
	header("Location:../Boot/main_page.php");

} else {
	$_SESSION['ERROR'] = 'Incorrect username or password';
	header("Location:".$_SERVER['HTTP_REFERER']."");
}

?>