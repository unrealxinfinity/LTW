<?php


  function isLoginCorrect($username, $password) {
    global $db;
    try {
      $stmt = $db->prepare('SELECT * FROM users WHERE username = ? AND password = ?');
      $stmt->execute(array($username, $password));
      if($stmt->fetch() !== false) {
        return getUser($username);
      }
      else return -1;

    } catch(PDOException $e) {
      return -1;
    }
  }

  function createUser($username, $name, $password, $email) {
    global $db;
    try {
  	  $stmt = $db->prepare('INSERT INTO users(Username, Name, Password, Email) VALUES (:username,:name,:password,:email)');
  	  $stmt->bindParam(':username', $username);
      $stmt->bindParam(':name', $name);
  	  $stmt->bindParam(':password', $password);
  	  $stmt->bindParam(':email', $email);
      if($stmt->execute()){
        $user = getUser($username);
        return $user;
      }
      else
        return -1;
    }catch(PDOException $e) {
      
      return -1;
    }
    
  }
  function createAgent($username){
    global $db;
    try {
  	  $stmt = $db->prepare('INSERT INTO agents(agentName) VALUES (:username)');
  	  $stmt->bindParam(':username', $username);
      if($stmt->execute()){
        return 0;
      }
      else
        return -1;
    }catch(PDOException $e) {
      
      return -1;
    }
  }
  function createAdmin($username){
    global $db;
    try {
  	  $stmt = $db->prepare('INSERT INTO admins(adminName) VALUES (:username)');
  	  $stmt->bindParam(':username', $username);
      if($stmt->execute()){
        return 0;
      }
      else
        return -1;
    }catch(PDOException $e) {
      
      return -1;
    }
  }

  function getUser($username) {
    global $db;
    try {
      $stmt = $db->prepare('SELECT username, name, email, password FROM users WHERE username = ?');
      $stmt->execute(array($username));
      return $stmt->fetch();
    
    }catch(PDOException $e) {
      return null;
    }
  }
  function AlreadyRegisteredUsername($username) {
    global $db;
    try {
      $stmt = $db->prepare('SELECT username FROM users WHERE username = ?');
      $stmt->execute(array($username));
      return $stmt->fetch()  !== false;
    
    }catch(PDOException $e) {
      return true;
    }
  }
  function AlreadyRegisteredEmail($email) {
    global $db;
    try {
      $stmt = $db->prepare('SELECT email FROM users WHERE email = ?');
      $stmt->execute(array($email));
      return $stmt->fetch()  !== false;
    
    }catch(PDOException $e) {
      return true;
    }
  }
  function update_user($previous_username, $username, $name, $email, $password){
    global $db;
    try{
      $stmt = $db->prepare('UPDATE users SET name = ? WHERE username = ?');
      $stmt->execute(array($name, $previous_username));
      $stmt = $db->prepare('UPDATE users SET email = ? WHERE username = ?');
      $stmt->execute(array($email, $previous_username));
      $stmt = $db->prepare('UPDATE users SET password = ? WHERE username = ?');
      $stmt->execute(array($password, $previous_username));
      $stmt = $db->prepare('UPDATE users SET username = ? WHERE username = ?');
      $stmt->execute(array($username, $previous_username));
      $user = getUser($username);
      return $user;
    } catch(PDOException $e) {
      return -1;
    }
  }

  function deleteUser($username) {
    global $db;
    try {
      $stmt = $db->prepare('DELETE FROM users WHERE username = ?');
      $stmt->execute(array($username));
      return true;
    }
    catch(PDOException $e) {
      return false;
    }
  }
?>