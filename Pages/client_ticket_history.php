<section id = "view" class = "padding">
            <p class = "sub_title">view</p>
            <h2 class = "title">Ticket History</h2>
            <input id = show_tickets type = "submit" value = "Hide">
            <div class = "ticket_history">
                <?php include_once("../Actions/get_ticket.php"); ?>
            </div>
        </section>