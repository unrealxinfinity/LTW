<?php
   session_start();

   function setCurrentUser($username) {
        $_SESSION['id'] = $username['id'];
    	$_SESSION['username'] = $username['username'];
        $_SESSION['email'] = $username['email'];
        $_SESSION['password'] = $username['password'];
        $_SESSION['name'] = $username['name'];
        $_SESSION['csrf'] = generate_random_token();
   }

   function getUsername() {
    if(isset($_SESSION['username'])) {
         return $_SESSION['username'];
    } else {
        return null;
    }

}
?>
