<?php

  function generate_random_token() {
    return bin2hex(openssl_random_pseudo_bytes(32));
  }
  function isLoginCorrect($username, $password) {
    global $db;
    try {
      $stmt = $db->prepare('SELECT * FROM users WHERE username = ?');
      $stmt->execute(array($username));
      if($stmt->fetch() !== false) {
        $user = getUser($username);
        if(password_verify($password, $user['password'])){
          return $user;
        }
      }
      return -1;

    } catch(PDOException $e) {
      return -1;
    }
  }

  function get_users(){
    global $db;
    try {
      $stmt = $db->prepare('SELECT * FROM users');
      $stmt->execute();
      return $stmt->fetchAll();
    
    }catch(PDOException $e) {
      return null;
    }
  }


  function createUser($username, $name, $password, $email) {
    global $db;
    try {
      $options = ['cost' => 12];
  	  $stmt = $db->prepare('INSERT INTO users(Username, Name, Password, Email) VALUES (:username,:name,:password,:email)');
  	  $stmt->bindParam(':username', $username);
      $stmt->bindParam(':name', $name);
  	  $stmt->bindParam(':password', password_hash($password, PASSWORD_DEFAULT, $options));
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
      $stmt = $db->prepare('SELECT id FROM users WHERE username = ?');
      $stmt->execute(array($username));
      $id = $stmt->fetch();
  	  $stmt = $db->prepare('INSERT INTO agents(agentID) VALUES (:id)');
  	  $stmt->bindParam(':id', $id['id']);
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
  	  $stmt = $db->prepare('SELECT id FROM users WHERE username = ?');
      $stmt->execute(array($username));
      $id = $stmt->fetch();
  	  $stmt = $db->prepare('INSERT INTO admins(adminID) VALUES (:id)');
  	  $stmt->bindParam(':id', $id['id']);
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
      $stmt = $db->prepare('SELECT id, username, name, email, password FROM users WHERE username = ?');
      $stmt->execute(array($username));
      return $stmt->fetch();
    
    }catch(PDOException $e) {
      return null;
    }
  }
  function get_user_by_id($id) {
    global $db;
    try {
      $stmt = $db->prepare('SELECT * FROM users WHERE id = ?');
      $stmt->execute(array($id));
      return $stmt->fetchAll();
    
    }catch(PDOException $e) {
      return null;
    }
  }
  function get_role($username){
    global $db;
    try {
      $stmt = $db->prepare('SELECT id FROM users WHERE username = ?');
      $stmt->execute(array($username));
      $id = $stmt->fetch();
      $stmt = $db->prepare('SELECT adminID FROM admins WHERE adminID = ?');
      $stmt->execute(array($id['id']));
      if($stmt->fetch() !== false){
        $role = "Admin";
        return $role;
      }
      else{
        $stmt = $db->prepare('SELECT agentID FROM agents WHERE agentID = ?');
        $stmt->execute(array($id['id']));
        if($stmt->fetch() !== false){
          $role = "Agent";
          return $role;
        }
        else{
          $role = "Client";
          return $role;
        }
      }
      return $stmt->fetch();
    
    }catch(PDOException $e) {
      return null;
    }
  }
  function isAdmin($id){
    global $db;
    try {
      $stmt = $db->prepare('SELECT * FROM admins WHERE adminID = ?');
      $stmt->execute(array($id));
      return $stmt->fetch() !== false;

    } catch(PDOException $e) {
      return -1;
    }
  }
  function isAgent($id){
    global $db;
    try {
      $stmt = $db->prepare('SELECT * FROM agents WHERE agentID = ?');
      $stmt->execute(array($id));
      return $stmt->fetch() !== false;

    } catch(PDOException $e) {
      return -1;
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
      $options = ['cost' => 12];
      $stmt = $db->prepare('UPDATE users SET name = ? WHERE username = ?');
      $stmt->execute(array($name, $previous_username));
      $stmt = $db->prepare('UPDATE users SET email = ? WHERE username = ?');
      $stmt->execute(array($email, $previous_username));
      $stmt = $db->prepare('UPDATE users SET password = ? WHERE username = ?');
      $stmt->execute(array(password_hash($password, PASSWORD_DEFAULT, $options) , $previous_username));
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
  function get_agents(){
    global $db;
    try {
      $stmt = $db->prepare('SELECT * FROM agents');
      $stmt->execute();
      return $stmt->fetchAll();
    
    }catch(PDOException $e) {
      return null;
    }
  }
  function get_agents_count(){
    global $db;
		try {
			$stmt = $db->prepare('SELECT COUNT(*) AS res FROM agents');
      $stmt->execute();
			return $stmt->fetchAll();

		}catch(PDOExecption $e) {
			return null;
		}
  }
?>