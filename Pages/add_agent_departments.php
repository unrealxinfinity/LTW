<section id = "AgentDepartments" class = "padding">
                <p class = "sub_title">Agent Departments</p>
                <h2 class = "title">Add Agent Departments</h2>
                <form action = "#" method = "post">
                    <div class = "ticket_control">
                        <label for = "agent">Agent</label>
                        <select name = "agent" class = "department_selector">
                            <?php include_once("../Actions/get_agents.php"); ?>
                        </select>
                    </div>
                    <div class = "ticket_control">
                        <label for = "current_departments">Current Departments</label>
                        <select name = "current_departments" class = "department_selector" id = "current_departments">

                        </select>
                    </div>
                    <div class = "ticket_control">
                        <label for = "new_department">New Department</label>
                        <select name = "new_department" class = "department_selector" id = "new_department">
                            <?php include_once("../Actions/department_options.php");?>
                        </select>
                    </div>
                    <input name = "csrf" value = "<?=$_SESSION['csrf']?>" hidden>
                    <div class = "control">
                        <input type="submit" name="Submit" value="Add">
                    </div>
                </form>
        </section>