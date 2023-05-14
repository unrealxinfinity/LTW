var ticket_id = new URLSearchParams(window.location.search).get("ticket_id");


const hidden_ticket_id = document.getElementById("id_ticket");



hidden_ticket_id.value = ticket_id;
