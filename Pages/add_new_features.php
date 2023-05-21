<section id = "add" class = "padding">
                <p class = "sub_title">Add</p>
                <h2 class = "title">Implement</h2>
                <form action = "#" method = "post">
                    <div class = "ticket_control">
                        <label for = "feature">Feature</label>
                        <select name = "feature" class = "department_selector">
                            <option>Department</option>
                            <option>Status</option>
                            <option>Priority</option>
                        </select>
                    </div>
                    <div class = "control">
                        <label for = "new_feature"></label>
                        <input name="new_feature" id = "new_feature" type="text" placeholder="add">
                        <div class = "error"></div>
                    </div>
                    <input name = "csrf" value = "<?=$_SESSION['csrf']?>" hidden>
                    <div class = "control">
                        <input type="submit" name="Submit" value="Add" id = "add_feature_button">
                    </div>
                </form>
        </section>