<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href = "../css/mainpage.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
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
                <li><a href = "#view">View</a></li>
                <li><a href = "#browse">Browse</a></li>
                <li><a href = "#FAQs">FAQs</a></li>
                
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
                            <input type="submit" name="Submit" value="Change">
                        </div>
                    </form>
                </div>
                <div class = "curr_info">
                        <ul>
                            <li><a href = "../Boot/login.php" class = "btn">Logout</a></li>
                            <li><a href = "../Submition/change_to_client.php" class = "btn">Change to client</a></li>
                        </ul>
                </div>
            </div>
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

        <section id = "FAQs" class = "padding">
        <p class = "sub_title"> FAQs </p>
        <h2 class ="title"> FAQs Control </h2>
        <div class  ="FAQForms">
            <div id = "FAQBlock">
             <?php 
                include_once("../Submition/get_faqs.php");
                ?>
            </div>
            <div class= "formFlex">
            <form action="#" method="post">
                <input name='question' id='question' type='text' placeholder='Write a question' class = 'inputBox'>
                <input name='answer' id='answer' type='text' placeholder='Write an answer' class = 'inputBox'>
                <div id='popMessage'> </div>
                <button type='submit' value = 'Register' id='FAQsubmit' > Register </button>
            </form>
            </div>
            
            <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        </div>
        </section>
                    
    </main>

    <script src = "../java_script/main_page_agent.js"></script>
</body>
</html>