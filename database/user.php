<?php


  function isLoginCorrect($username, $password) {
    global $db;
    try {
      $stmt = $db->prepare('SELECT * FROM Clients WHERE username = ? AND password = ?');
      $stmt->execute(array($username, $password));
      if($stmt->fetch() !== false) {
        return getUser($username);
      }
      else return -1;

    } catch(PDOException $e) {
      return -1;
    }
  }

  function createUser($username, $password, $email) {
    global $db;
    try {
  	  $stmt = $db->prepare('INSERT INTO users(Username, Password, Email) VALUES (:username,:password,:email)');
  	  $stmt->bindParam(':username', $username);
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

  function getUser($username) {
    global $db;
    try {
      $stmt = $db->prepare('SELECT username, email FROM Clients WHERE username = ?');
      $stmt->execute(array($username));
      return $stmt->fetch();
    
    }catch(PDOException $e) {
      return null;
    }
  }
  function AlreadyRegisteredUsername($username) {
    global $db;
    try {
      $stmt = $db->prepare('SELECT username FROM Clients WHERE username = ?');
      $stmt->execute(array($username));
      return $stmt->fetch()  !== false;
    
    }catch(PDOException $e) {
      return true;
    }
  }
  function AlreadyRegisteredEmail($email) {
    global $db;
    try {
      $stmt = $db->prepare('SELECT email FROM Clients WHERE email = ?');
      $stmt->execute(array($email));
      return $stmt->fetch()  !== false;
    
    }catch(PDOException $e) {
      return true;
    }
  }

  function deleteUser($username) {
    global $db;
    try {
      $stmt = $db->prepare('DELETE FROM Clients WHERE username = ?');
      $stmt->execute(array($username));
      return true;
    }
    catch(PDOException $e) {
      return false;
    }
  }
?>