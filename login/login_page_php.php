<?php

  $username = $_GET['username']; //gets the username that acts as an id

  $db = new PDO('sqlite:database/user_db.db'); //put database on variable db

  

  output_main_page(); //Go to main page
?>