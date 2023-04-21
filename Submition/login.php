<?php
include_once("../database/startup.php");
include_once("../database/.php");
if(($username = isLoginCorrect($_POST['username'], $_POST['password'])) != -1){
	setCurrentUser($username);
	header("Location:../Boot/main_page.php");

} else {
	$_SESSION['ERROR'] = 'Incorrect username or password';
	header("Location:".$_SERVER['HTTP_REFERER']."");
}

?>