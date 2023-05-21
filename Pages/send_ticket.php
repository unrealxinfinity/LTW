<section id = "send" class = "padding">
            <p class = "sub_title">submit</p>
            <h2 class = "title">Send Ticket</h2>
            <div class = "ticket_container">
                <form action = "#" method = "post">
                    <div class = "ticket_control">
                        <label for = "department">Department</label>
                        <select name = "department" class = "department_selector">
                            <option></option>
                            <?php include_once("../Actions/department_options.php")?>
                        </select>
                    </div>
                    <div class = "ticket_control">
                        <label for = "msg">Message</label>
                        <textarea name = "msg" id = "msg" rows = "6" placeholder = "Message"></textarea>
                    </div>
                    <div class = "ticket_control">
                        <input id = "send_ticket_button" type = "submit" value = "Send">
                    </div>
                    <input name = "csrf" value = "<?=$_SESSION['csrf']?>" hidden>
                </form>
            </div>
        </section>