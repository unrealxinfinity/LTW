<?php
include_once("../database/startup.php");
include_once("../database/tickets.php");
include_once("../database/user.php");

$client = $_SESSION['id'];
$assignedAgent = 1;
$status = "open";
$priority = "";
$department = $_POST['department'];
$message = $_POST['msg'];
if(($ticket = createTicket($client, $assignedAgent, $message, $department, $status, $priority, "no")) != -1){
	include_once("../Submition/get_ticket.php");
}
$hashtag = '';
$valid = false;
for($i = 0; $i < strlen($message); $i++){
	if($message[$i] == '#' && $valid == false){
		$valid = true;
	}
	else if($message[$i] == ' ' || ($message[$i] == '#' && $valid == true)){
		if($valid == true){
			if(!does_hashtag_exist_already($hashtag)){
				create_hashtag($hashtag);
			}
			$ticket_id = get_last_inserted_ticket_id();
			if(!does_ticket_hashtag_exist_already($ticket_id[0]['res'], $hashtag)){
				create_ticket_hashtag($ticket_id[0]['res'], $hashtag);
			}
			$hashtag = '';
		}
		$valid = false;
	}
	if($valid){
		$hashtag .= $message[$i];
	}
}
if($hashtag != '' && $hashtag != '#'){
	if(!does_hashtag_exist_already($hashtag)){
		create_hashtag($hashtag);
	}
	$ticket_id = get_last_inserted_ticket_id();
	if(!does_ticket_hashtag_exist_already($ticket_id[0]['res'], $hashtag)){
		create_ticket_hashtag($ticket_id[0]['res'], $hashtag);
	}
}

?>