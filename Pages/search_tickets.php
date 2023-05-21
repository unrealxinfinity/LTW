<section id = "browse" class = "padding">
            <p class = "sub_title">search</p>
            <h2 class = "title">Find Tickets</h2>
            <form action = "../Actions/get_filtered_tickets.php">
                <div class = "ticket_control">
                    <label for = "departmentName">Department</label>
                    <select name = "departmentName" class = "department_selector">
                        <option value = ""></option>
                        <?php include("../Actions/department_options.php"); ?>
                    </select>
                </div>
                <div class = "ticket_control">
                    <label for = "date">Date</label>
                    <select name = "date" class = "department_selector">
                        <option value = ""></option>
                        <option value = "Recent">Most Recent</option>
                        <option value = "Non-Recent">Oldest</option>
                    </select>
                </div>
                <div class = "ticket_control">
                    <label for = "assignedAgent">Assigned Agent</label>
                    <select name = "assignedAgent" class = "department_selector">
                        <option value = "/show all">/show all</option>
                        <?php include_once("../Actions/assigned_agents_options.php"); ?>
                    </select>
                </div>
                <div class = "ticket_control">
                    <label for = "status">Status</label>
                    <select name = "status" class = "department_selector">
                        <option value = ""></option>
                        <?php include_once("../Actions/status_options.php"); ?>
                    </select>
                </div>
                <div class = "ticket_control">
                    <label for = "priority">Priority</label>
                    <select name = "priority" class = "department_selector">
                        <option value = ""></option>
                        <?php include_once("../Actions/priority_options.php"); ?>
                    </select>
                </div>
                <div class = "ticket_control">
                    <label for = "hashtag">Hashtags</label>
                    <input type = "text" name = "hashtag" id = "hashtag_search_input" placeholder = "Type a hashtag..." autocomplete = "off">
                    <ul>
                        
                    </ul>
                </div>
                <input name = "csrf" value = "<?=$_SESSION['csrf']?>" hidden>
                
            </form>
            <div class = "search_info"> 
                <div class = "ticket_history">
                </div>
            </div>
        </section>