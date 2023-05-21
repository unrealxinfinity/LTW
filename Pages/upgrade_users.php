<section id = "promote" class = "padding">
                <p class = "sub_title">promote</p>
                <h2 class = "title">Upgrade Users</h2>
                <form action = "#" method = "post">
                    <div class = "ticket_control">
                        <label for = "user">User</label>
                        <select name = "user" class = "department_selector">
                            <?php include_once("../Actions/user_options.php"); ?>
                        </select>
                    </div>
                    <div class = "ticket_control">
                        <label for = "role">Current Role</label>
                        <p>

                        </p>
                    </div>
                    <div class = "ticket_control">
                        <label for = "new_role">New Role</label>
                        <select name = "new_role" class = "department_selector" id = "new_role">
                            <option></option>
                        </select>
                    </div>
                    <input name = "csrf" value = "<?=$_SESSION['csrf']?>" hidden>
                    <div class = "control">
                        <input type="submit" name="Submit" value="Upgrade">
                    </div>
                </form>
        </section>