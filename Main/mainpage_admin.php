<?php

include_once("../database/startup.php");
include_once("../database/user.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href = "../css/mainpage.css">
    <script defer src = "../java_script/edit_profile_validation.js"></script>
    <title>Main Page</title>
</head>
<body>
    <input type="checkbox" id="menu"> 
    <label class="bar" for="menu"></label>
    <header>
        <div class = "profile">
            <h2><?php echo htmlentities($_SESSION['username']); ?></h2>
            <p><?php echo htmlentities($_SESSION['name']); ?></p>
            <p><?php echo htmlentities($_SESSION['email']); ?></p>
        </div>
        <nav>
            <ul>
                <li><a href = "#profile" class = "active">Home</a></li>
                <li><a href = "#info">Account</a></li>
                <li><a href = "#promote">Promote</a></li>
                <li><a href = "#AgentDepartments">Agent Departments</a></li>
                <li><a href = "#add">Add</a></li>
                <li><a href = "#view">View</a></li>
                <li><a href = "#browse">Browse</a></li>
                
            </ul>
        </nav>
    </header>

    <main>
        <section id="profile" class = "padding">
            <div class = "profile_intro">
                <h1><?php echo htmlentities($_SESSION['username']); ?></h1>
                <p><?php echo htmlentities($_SESSION['role']); ?></p>

            </div>
        </section>
        
        <section id = "info" class = "padding">
            <p class = "sub_title">Account</p>
            <h2 class = "title">Edit Profile</h2>
            <div class = "account_info">
                <div class = "edit_info">
                    <form action="../Submition/edit_profile.php" method="post" class="register_form" id = "register_form">
                        <div class = "control">
                            <label for = "username"></label>
                            <input name="username" id = "username" type="text" placeholder="Username">
                            <div class = "error"></div>
                        </div>
                        <div class = "control">
                            <label for = "name"></label>
                            <input name="name" id = "name" type="text" placeholder="Name">
                            <div class = "error"></div>
                        </div>
                        <div class = "control">
                            <label for = "email"></label>
                            <input name="email" id = "email" type="text" placeholder="E-mail">
                            <div class = "error"></div>
                        </div>
                        <div class = "control">
                            <label for = "password"></label>
                            <input name="password" id = "password" type="password" placeholder="Password">
                            <div class = "error"></div>
                        </div>
                        <div class = "control">
                            <label for = "confirm_password"></label>
                            <input name="confirm_password" id = "confirm_password" type="password" placeholder="Confirm Password">
                            <div class = "error"></div>
                        </div>
                        <div class = "control">
                            <input type="submit" name="Submit" value="Change">
                        </div>
                        
                    </form>
                </div>
                <div class = "curr_info">
                        <ul>
                            <li><a href = "../Boot/login.php" class = "btn">Logout</a></li>
                            <li><a href = "../Boot/main_page_agent.php" class = "btn">Change to agent</a></li>
                            <li><a href = "../Boot/change_to_client.php" class = "btn">Change to client</a></li>
                        </ul>
                </div>
            </div>
        </section>

        <section id = "promote" class = "padding">
                <p class = "sub_title">promote</p>
                <h2 class = "title">Upgrade Users</h2>
                <form action = "#" method = "post">
                    <div class = "ticket_control">
                        <label for = "user">User</label>
                        <select name = "user" class = "department_selector">
                            <?php include_once("../Submition/user_options.php"); ?>
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
                    <div class = "control">
                        <input type="submit" name="Submit" value="Upgrade">
                    </div>
                </form>
        </section>

        <section id = "AgentDepartments" class = "padding">
                <p class = "sub_title">Agent Departments</p>
                <h2 class = "title">Add Agent Departments</h2>
                <form action = "#" method = "post">
                    <div class = "ticket_control">
                        <label for = "agent">Agent</label>
                        <select name = "agent" class = "department_selector">
                            <?php include_once("../Submition/get_agents.php"); ?>
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
                            <?php include_once("../Submition/department_options.php");?>
                        </select>
                    </div>
                    <div class = "control">
                        <input type="submit" name="Submit" value="Add">
                    </div>
                </form>
        </section>

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
                    <div class = "control">
                        <input type="submit" name="Submit" value="Add" id = "add_feature_button">>
                    </div>
                </form>
        </section>

        <section id = "view" class = "padding">
            <p class = "sub_title">view</p>
            <h2 class = "title">Assigned Client Tickets</h2>
            <input id = "show_assigned_tickets" type = "submit" value = "Hide">
            <div class = "ticket_history">
                <?php include_once("../Submition/get_all_assigned_tickets.php"); ?>
            </div>
        </section>

        <section id = "browse" class = "padding">
            <p class = "sub_title">search</p>
            <h2 class = "title">Find Tickets</h2>
            <form action = "../Submition/assigned_agents_options.php" method = "post">
                <div class = "ticket_control">
                    <label for = "departmentName">Department</label>
                    <select name = "departmentName" class = "department_selector">
                        <option value = ""></option>
                        <?php include_once("../Submition/department_options.php"); ?>
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
                        <option value = "/">/</option>
                        <?php include_once("../Submition/assigned_agents_options.php"); ?>
                    </select>
                </div>
                <div class = "ticket_control">
                    <label for = "status">Status</label>
                    <select name = "status" class = "department_selector">
                        <option value = ""></option>
                        <?php include_once("../Submition/status_options.php"); ?>
                    </select>
                </div>
                <div class = "ticket_control">
                    <label for = "priority">Priority</label>
                    <select name = "priority" class = "department_selector">
                        <option value = ""></option>
                        <?php include_once("../Submition/priority_options.php"); ?>
                    </select>
                </div>
                <div class = "ticket_control">
                    <label for = "hashtag">Hashtags</label>
                    <input type = "text" name = "hashtag" id = "hashtag_search_input" placeholder = "Type a hashtag...">
                    <ul>
                        
                    </ul>
                </div>
                
            </form>
            <div class = "search_info"> 
                <div class = "ticket_history">
                </div>
            </div>
        </section>


                    
    </main>

    <script src = "../java_script/main_page_agent.js"></script>
    <script src = "../java_script/main_page_admin.js"></script>
</body>
</html>
