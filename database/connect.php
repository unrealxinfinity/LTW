<?php
  $db = new PDO('sqlite:../database/user_db.db');
  $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $db->exec( 'PRAGMA foreign_keys = ON;' );
?>