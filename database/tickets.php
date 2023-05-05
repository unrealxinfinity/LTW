<?php
   function createTicket($date, $client, $assignedAgent, $departmentName, $message, $status, $priority){
        global $db;
        try {
            $stmt = $db->prepare('INSERT INTO tickets(Date, Client, AssignedAgent, DepartmentName, Message, Status, Priority) VALUES (:dt,:client,:assignedAgent,:departmentName,:msg,:st,:priority)');
            $stmt->bindParam(':dt', $date);
            $stmt->bindParam(':client', $client);
            $stmt->bindParam(':assignedAgent', $assignedAgent);
            $stmt->bindParam(':departmentName', $departmentName);
            $stmt->bindParam(':msg', $message);
            $stmt->bindParam(':st', $status);
            $stmt->bindParam(':priority', $priority);
            if($stmt->execute()){
                echo $client;
                $ticket = getTicket($db->lastInsertId());
                return $ticket;
            }
            else
                return -1;
        } catch(PDOException $e) {
            return -1;
        }
    }   


    function getTicket($id) {
		global $db;
		try {

			$stmt = $db->prepare('SELECT date, client, assignedAgent, departmentName, message, status, priority FROM tickets WHERE ID = ?');
			$stmt->execute(array($id));
			return $stmt->fetch();

		}catch(PDOExecption $e) {
			return null;
		}
	}
    function get_client_ticket($username) {
		global $db;
		try {

			$stmt = $db->prepare('SELECT date, client, assignedAgent, departmentName, message, status, priority FROM tickets WHERE client = ?');
			$stmt->execute(array($username));
			return $stmt->fetchAll();

		}catch(PDOExecption $e) {
			return null;
		}
	}
?>