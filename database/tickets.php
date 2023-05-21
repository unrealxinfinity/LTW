<?php
   function createTicket($client, $assignedAgent, $message, $departmentName, $status, $priority, $notification){
        global $db;
        try {
            $date_format = '%d/%m/%Y';
            $date_time = 'now';
            $stmt = $db->prepare('SELECT strftime(?, ?) as date');
            $stmt->execute(array($date_format, $date_time));
            $date = $stmt->fetchAll();
            $stmt = $db->prepare('INSERT INTO tickets(date, clientID, assignedAgentID, title, departmentName, status, priority, notification) VALUES (:dt,:client,:assignedAgent,:title,:departmentName,:st,:priority,:notification)');
            $stmt->bindParam(':dt', $date[0]['date']);
            $stmt->bindParam(':client', $client);
            $stmt->bindParam(':assignedAgent', $assignedAgent);
            $stmt->bindParam(':title', $message);
            $stmt->bindParam(':departmentName', $departmentName);
            $stmt->bindParam(':st', $status);
            $stmt->bindParam(':priority', $priority);
            $stmt->bindParam(':notification', $notification);
            if($stmt->execute()){
                return 0;
            }
            else
                return -1;
        } catch(PDOException $e) {
            return -1;
        }
    }   

    function get_last_inserted_ticket_id(){
        global $db;
		try {

			$stmt = $db->prepare('SELECT MAX(ID) AS res FROM tickets');
			$stmt->execute();
			return $stmt->fetchAll();

		}catch(PDOExecption $e) {
			return null;
		}
    }

    function getTickets($id) {
		global $db;
		try {

			$stmt = $db->prepare('SELECT * FROM tickets WHERE clientID = ? ORDER BY ID desc');
			$stmt->execute(array($id));
			return $stmt->fetchAll();

		}catch(PDOExecption $e) {
			return null;
		}
	}
    function get_ticket_id($id) {
		global $db;
		try {

        
			$stmt = $db->prepare('SELECT ID FROM tickets WHERE clientID = ?');
			$stmt->execute(array($id));
			return $stmt->fetchAll();

		}catch(PDOExecption $e) {
			return null;
		}
	}
    function getTicketHashtags($ticket_id){
        global $db;
		try {

			$stmt = $db->prepare('SELECT * FROM ticketHashtags WHERE ticketID = ?');
			$stmt->execute(array($ticket_id));
			return $stmt->fetchAll();

		}catch(PDOExecption $e) {
			return null;
		}
    }
    function remove_hashtag_from_ticket($ticket_id, $hashtagName){
        global $db;
        try {
        $stmt = $db->prepare('DELETE FROM ticketHashtags WHERE ticketID = ? AND hashtagName = ?');
        $stmt->execute(array($ticket_id, $hashtagName));
        return true;
        }
        catch(PDOException $e) {
        return false;
        }
    }
    function get_client_tickets_number($username) {
		global $db;
		try {

			$stmt = $db->prepare('SELECT COUNT(*) AS res FROM tickets WHERE clientID = ?');
			$stmt->execute(array($username));
			return $stmt->fetchAll();

		}catch(PDOExecption $e) {
			return null;
		}
	}
    function get_all_tickets(){
        global $db;
        try {
			$stmt = $db->prepare('SELECT * FROM tickets WHERE assignedAgentID = ? ORDER BY ID desc');
			$stmt->execute(array(1));
			return $stmt->fetchAll();

		}catch(PDOExecption $e) {
			return null;
		}
    }
    function get_all_tickets_number() {
		global $db;
		try {
			$stmt = $db->prepare('SELECT COUNT(*) AS res FROM tickets WHERE assignedAgentID = ?');
			$stmt->execute(array(1));
			return $stmt->fetchAll();

		}catch(PDOExecption $e) {
			return null;
		}
	}
    function get_ticket($ticket_id){
        global $db;
		try {
			$stmt = $db->prepare('SELECT * FROM tickets WHERE ID = ?');
			$stmt->execute(array($ticket_id));
			return $stmt->fetchAll();

		}catch(PDOExecption $e) {
			return null;
		}
    }
    function update_ticket_title($ticket_id, $title){
        global $db;
        try{
            $stmt = $db->prepare('UPDATE tickets SET title = ? WHERE ID = ?');
            $stmt->execute(array($title, $ticket_id));
            return 0;
        } catch(PDOException $e) {
            return -1;
        }
    }
    function change_ticket_status($ticket_id, $status){
        global $db;
        try{
            $stmt = $db->prepare('UPDATE tickets SET status = ? WHERE ID = ?');
            $stmt->execute(array($status, $ticket_id));
            return 0;
        } catch(PDOException $e) {
            return -1;
        }
    }
    function change_ticket_assigned_agent($ticket_id, $agentID){
        global $db;
        try{
            $stmt = $db->prepare('UPDATE tickets SET assignedAgentID = ? WHERE ID = ?');
            $stmt->execute(array($agentID, $ticket_id));
            return 0;
        } catch(PDOException $e) {
            return -1;
        }
    }
    function get_tickets_by_status($agentID, $status){
        global $db;
        try {
			$stmt = $db->prepare('SELECT * FROM tickets WHERE assignedAgentID = ? AND status = ? ORDER BY ID desc');
			$stmt->execute(array($agentID, $status));
			return $stmt->fetchAll();

		}catch(PDOExecption $e) {
			return null;
		}
    }
    function get_tickets_by_status_count($agentID, $status){
        global $db;
		try {
			$stmt = $db->prepare('SELECT COUNT(*) AS res FROM tickets WHERE assignedAgentID = ? AND status = ?');
			$stmt->execute(array($agentID, $status));
			return $stmt->fetchAll();

		}catch(PDOExecption $e) {
			return null;
		}
    }
    function create_message($ticket_id, $message, $receiver_id, $sender_id){
        global $db;
        try {
            $stmt = $db->prepare('INSERT INTO messages(text, ticketID, receiverID, senderID) VALUES (:text,:ticketID,:receiverID,:senderID)');
            $stmt->bindParam(':text', $message);
            $stmt->bindParam(':ticketID', $ticket_id);
            $stmt->bindParam(':receiverID', $receiver_id);
            $stmt->bindParam(':senderID', $sender_id);
            if($stmt->execute()){
                return 0;
            }
            else
                return -1;
        } catch(PDOException $e) {
            return -1;
        }
    }
    function get_all_messages($ticket_id){
        global $db;
		try {
			$stmt = $db->prepare('SELECT * FROM messages WHERE ticketID = ? ORDER BY ID asc');
			$stmt->execute(array($ticket_id));
			return $stmt->fetchAll();

		}catch(PDOExecption $e) {
			return null;
		}
    }
    function get_all_messages_count($ticket_id){
        global $db;
		try {
			$stmt = $db->prepare('SELECT COUNT(*) AS res FROM messages WHERE ticketID = ?');
			$stmt->execute(array($ticket_id));
			return $stmt->fetchAll();

		}catch(PDOExecption $e) {
			return null;
		}
    }
    function change_notification($ticket_id, $notification){
        global $db;
        try{
            $stmt = $db->prepare('UPDATE tickets SET notification = ? WHERE ID = ?');
            $stmt->execute(array($notification, $ticket_id));
            return 0;
        } catch(PDOException $e) {
            return -1;
        }
    }
    function get_notification($ticket_id){
        global $db;
		try {
			$stmt = $db->prepare('SELECT notification FROM tickets WHERE ID = ?');
			$stmt->execute(array($ticket_id));
			return $stmt->fetchAll();

		}catch(PDOExecption $e) {
			return null;
		}
    }
    function get_statuses(){
        global $db;
		try {
			$stmt = $db->prepare('SELECT * FROM statuses');
			$stmt->execute();
			return $stmt->fetchAll();

		}catch(PDOExecption $e) {
			return null;
		}
    }
    function get_statuses_count(){
        global $db;
		try {
			$stmt = $db->prepare('SELECT COUNT(*) AS res FROM statuses');
			$stmt->execute();
			return $stmt->fetchAll();

		}catch(PDOExecption $e) {
			return null;
		}
    }
    function get_priorities(){
        global $db;
		try {
			$stmt = $db->prepare('SELECT * FROM priorities');
			$stmt->execute();
			return $stmt->fetchAll();

		}catch(PDOExecption $e) {
			return null;
		}
    }
    function get_priorities_count(){
        global $db;
		try {
			$stmt = $db->prepare('SELECT COUNT(*) AS res FROM priorities');
			$stmt->execute();
			return $stmt->fetchAll();

		}catch(PDOExecption $e) {
			return null;
		}
    }
    function get_all_filtered_tickets($date, $assignedAgentID, $status, $priority, $department){
        global $db;
        try {

            $filtered_result = '';
            if($assignedAgentID == 0){
                $filtered_result = 'SELECT * FROM tickets WHERE departmentName = ?';
            }
            else{
                $filtered_result = 'SELECT * FROM tickets WHERE assignedAgentID = ? AND departmentName = ?';
            }
            if($status != ''){
                $filtered_result .= ' AND status = ?';
            }
            if($priority != ''){
                $filtered_result .= ' AND priority = ?';
            }
            if($date != ''){
                if($date == 'Recent'){
                    $filtered_result .= ' ORDER BY ID desc';
                }
                else{
                    $filtered_result .= ' ORDER BY ID asc';
                }
            }
            $stmt = $db->prepare($filtered_result);
            if($status == '' && $priority == ''){
                if($assignedAgentID != 0)$stmt->execute(array($assignedAgentID, $department));
                else $stmt->execute(array($department));
            }
            else if($status == ''){
                if($assignedAgentID != 0)$stmt->execute(array($assignedAgentID, $department, $priority));
                else $stmt->execute(array($department, $priority));
            }
            else if($priority == ''){
                if($assignedAgentID != 0)$stmt->execute(array($assignedAgentID, $department, $status));
                else $stmt->execute(array($department, $status));
            }
            else{
                if($assignedAgentID != 0)$stmt->execute(array($assignedAgentID, $department, $status, $priority));
                else $stmt->execute(array($department, $status, $priority));
            }
            
			return $stmt->fetchAll();

		}catch(PDOExecption $e) {
			return null;
		}
    }
    function get_all__filtered_tickets_number($date, $assignedAgentID, $status, $priority, $department){
        global $db;
        try {
            $filtered_result = '';
            if($assignedAgentID == 0){
                $filtered_result = 'SELECT COUNT(*) AS res FROM tickets WHERE departmentName = ?';
            }
            else{
                $filtered_result = 'SELECT COUNT(*) AS res FROM tickets WHERE assignedAgentID = ? AND departmentName = ?';
            }
            if($status != ''){
                $filtered_result .= ' AND status = ?';
            }
            if($priority != ''){
                $filtered_result .= ' AND priority = ?';
            }
            if($date != ''){
                if($date == 'Recent'){
                    $filtered_result .= ' ORDER BY ID desc';
                }
                else{
                    $filtered_result .= ' ORDER BY ID asc';
                }
            }
            $stmt = $db->prepare($filtered_result);
            if($status == '' && $priority == ''){
                if($assignedAgentID != 0)$stmt->execute(array($assignedAgentID, $department));
                else $stmt->execute(array($department));
            }
            else if($status == ''){
                if($assignedAgentID != 0)$stmt->execute(array($assignedAgentID, $department, $priority));
                else $stmt->execute(array($department, $priority));
            }
            else if($priority == ''){
                if($assignedAgentID != 0)$stmt->execute(array($assignedAgentID, $department, $status));
                else $stmt->execute(array($department, $status));
            }
            else{
                if($assignedAgentID != 0)$stmt->execute(array($assignedAgentID, $department, $status, $priority));
                else $stmt->execute(array($department, $status, $priority));
            }
            
			return $stmt->fetchAll();

		}catch(PDOExecption $e) {
			return null;
		}
    }
    function isAlreadyAgentDepartment($agentID, $new_department){
        global $db;
        try {
          $stmt = $db->prepare('SELECT * FROM agentDepartments WHERE agentID = ? AND departmentName = ?');
          $stmt->execute(array($agentID, $new_department));
          return($stmt->fetch());
    
        } catch(PDOException $e) {
          return -1;
        }
    
    }
    function insert_agent_department($agentID, $new_department){
        global $db;
        try {
            $stmt = $db->prepare('INSERT INTO agentDepartments(agentID, departmentName) VALUES (:agentID, :departmentName)');
            $stmt->bindParam(':agentID', $agentID);
            $stmt->bindParam(':departmentName', $new_department);
            if($stmt->execute()){
                return 0;
            }
            else
                return -1;
        } catch(PDOException $e) {
            return -1;
        }
    }
    function get_agent_departments($agentID){
        global $db;
		try {
			$stmt = $db->prepare('SELECT * FROM agentDepartments WHERE agentID = ?');
            $stmt->execute(array($agentID));
			return $stmt->fetchAll();

		}catch(PDOExecption $e) {
			return null;
		}
    }
    function get_agent_departments_count($agentID){
        global $db;
		try {
			$stmt = $db->prepare('SELECT COUNT(*) AS res FROM agentDepartments WHERE agentID = ?');
            $stmt->execute(array($agentID));
			return $stmt->fetchAll();

		}catch(PDOExecption $e) {
			return null;
		}
    }
    function doesFeatureAlreadyExist($feature, $new_feature){
        global $db;
		try {
            $query_string = '';
            if($feature == "Department"){
                $query_string = 'SELECT * FROM departments WHERE departmentName = ?';
            }
            else if($feature == "Status"){
                $query_string = 'SELECT * FROM statuses WHERE statusName = ?';
            }
            else{
                $query_string = 'SELECT * FROM priorities WHERE priorityName = ?';
            }
            $stmt = $db->prepare($query_string);
            $stmt->execute(array($new_feature));
		    if($stmt->fetch() !== false) return true;
            else return false;

		}catch(PDOExecption $e) {
			return null;
		}
    }
    function insert_new_feature($feature, $new_feature){
        global $db;
        try {
            $query_string = '';
            if($feature == "Department"){
                if(doesFeatureAlreadyExist($feature , $new_feature)) return -1;
                $query_string = 'INSERT INTO departments(departmentName) VALUES (:featureName)';
            }
            else if($feature == "Status"){
                if(doesFeatureAlreadyExist($feature , $new_feature)) return -1;
                $query_string = 'INSERT INTO statuses(statusName) VALUES (:featureName)';
            }
            else{
                if(doesFeatureAlreadyExist($feature , $new_feature))return -1;
                $query_string = 'INSERT INTO priorities(priorityName) VALUES (:featureName)';
            }
            $stmt = $db->prepare($query_string);
            $stmt->bindParam(':featureName', $new_feature);
            if($stmt->execute()){
                return 0;
            }
            else
                return -1;
        } catch(PDOException $e) {
            return -1;
        }
    }
    function get_departments(){
        global $db;
		try {
			$stmt = $db->prepare('SELECT * FROM departments');
            $stmt->execute();
			return $stmt->fetchAll();

		}catch(PDOExecption $e) {
			return null;
		}
    }
    function does_hashtag_exist_already($hashtag){
        global $db;
        try {
        $stmt = $db->prepare('SELECT hashtagName FROM hashtags WHERE hashtagName = ?');
        $stmt->execute(array($hashtag));
        return $stmt->fetch()  !== false;
        
        }catch(PDOException $e) {
        return true;
        }
    }
    function create_hashtag($hashtag){
        global $db;
        try {
            $stmt = $db->prepare('INSERT INTO hashtags(hashtagName) VALUES (:hashtagName)');
            $stmt->bindParam(':hashtagName', $hashtag);
            if($stmt->execute()){
                return 0;
            }
            else
                return -1;
        } catch(PDOException $e) {
            return -1;
        }
    }
    function does_ticket_hashtag_exist_already($ticket_id, $hashtag){
        global $db;
        try {
        $stmt = $db->prepare('SELECT hashtagName FROM ticketHashtags WHERE ticketID = ? AND hashtagName = ?');
        $stmt->execute(array($ticket_id, $hashtag));
        return $stmt->fetch()  !== false;
        
        }catch(PDOException $e) {
        return true;
        }
    }
    function create_ticket_hashtag($ticket_id, $hashtag){
        global $db;
        try {
            $stmt = $db->prepare('INSERT INTO ticketHashtags(ticketID, hashtagName) VALUES (:ticketID, :hashtagName)');
            $stmt->bindParam(':ticketID', $ticket_id);
            $stmt->bindParam(':hashtagName', $hashtag);
            if($stmt->execute()){
                return 0;
            }
            else
                return -1;
        } catch(PDOException $e) {
            return -1;
        }
    }
    function get_hashtags($hashtag_text){
        global $db;
		try {
            $hashtag_text .= '%';
			$stmt = $db->prepare('SELECT * FROM hashtags WHERE hashtagName LIKE ? ORDER BY hashtagName asc');
            $stmt->execute(array($hashtag_text));
			return $stmt->fetchAll();

		}catch(PDOExecption $e) {
			return null;
        }
    }
    function get_hashtags_count($hashtag_text){
        global $db;
		try {
            $hashtag_text .= '%';
			$stmt = $db->prepare('SELECT COUNT(*) AS res FROM hashtags WHERE hashtagName LIKE ?');
            $stmt->execute(array($hashtag_text));
			return $stmt->fetchAll();

		}catch(PDOExecption $e) {
			return null;
        }
    }
    function update_ticket($ticket_id, $departmentName, $agent_id, $status, $priority){
        global $db;
        try{
            $stmt = $db->prepare('UPDATE tickets SET departmentName = ?, assignedAgentID = ?, status = ?, priority = ? WHERE ID = ?');
            $stmt->execute(array($departmentName, $agent_id, $status, $priority, $ticket_id));
            return 0;
        } catch(PDOException $e) {
            return -1;
        }
    }
    function add_ticket_hashtag($ticket_id, $hashtag){
        global $db;
        try{
            $stmt = $db->prepare('SELECT title FROM tickets WHERE ID = ?');
            $stmt->execute(array($ticket_id));
            $title = $stmt->fetch();

            $title['title'] .= " ";
            $title['title'] .= $hashtag;

            $stmt = $db->prepare('UPDATE tickets SET title = ? WHERE ID = ?');
            $stmt->execute(array($title['title'], $ticket_id));
            return 0;
        } catch(PDOException $e) {
            return -1;
        }
    }
    function add_to_history($ticket_id, $data, $previous_data, $type){
        global $db;
        try {
            $message = '';
            if($previous_data == ''){
                $message = ''.$type.' changed to '.$data.'';
            }
            else if($data == ''){
                $message = ''.$type.' was removed';
            }
            else $message = ''.$type.' changed from '.$previous_data.' to '.$data.'';
            $stmt = $db->prepare('INSERT INTO ticketHistory(ticketID, message) VALUES (:ticketID, :message)');
            $stmt->bindParam(':ticketID', $ticket_id);
            $stmt->bindParam(':message', $message);
            if($stmt->execute()){
                return 0;
            }
            else
                return -1;
        } catch(PDOException $e) {
            return -1;
        }
    }

    function get_ticket_history($ticket_id){
        global $db;
        try{
            $stmt = $db->prepare('SELECT * FROM ticketHistory WHERE ticketID = ?');
            $stmt->execute(array($ticket_id));
            return $stmt->fetchAll();
        } catch(PDOException $e) {
            return null;
        }
    }
?>