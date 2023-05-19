<?php
  include_once('database/startup.php');
  
  if(!isset($_SESSION['username'])){
    header("Location:Boot/login.php");
  }
?>