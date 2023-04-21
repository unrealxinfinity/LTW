<?php
   session_start();

   function setCurrentUser($username) {
    	$_SESSION['username'] = $username['username'];
        $_SESSION['email'] = $username['email'];
   }

   function getUsername() {
    if(isset($_SESSION['username'])) {
         return $_SESSION['username'];
    } else {
        return null;
    }

}
?>
