<section id = "view" class = "padding">
            <p class = "sub_title">view</p>
            <h2 class = "title">Assigned Client Tickets</h2>
            <input id = "show_assigned_tickets" type = "submit" value = "Hide">
            <div class = "ticket_history">
                <?php include_once("../Actions/get_all_assigned_tickets.php"); ?>
            </div>
        </section>