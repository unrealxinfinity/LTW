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
                <li><a href = "#send">Submit</a></li>
                <li><a href = "#view">View</a></li>
                <li><a href = "#FAQs"> FAQs</a></li>
                
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
                        </ul>
                </div>
            </div>
        </section>

        <section id = "send" class = "padding">
            <p class = "sub_title">submit</p>
            <h2 class = "title">Send Ticket</h2>
            <div class = "ticket_container">
                <form action = "#" method = "post">
                    <div class = "ticket_control">
                        <label for = "department">Department</label>
                        <select name = "department" class = "department_selector">
                            <option value = ""></option>
                            <option value = "Accounting">Accounting</option>
                            <option value = "Sales">Sales</option>
                        </select>
                    </div>
                    <div class = "ticket_control">
                        <label for = "msg">Message</label>
                        <textarea name = "msg" id = "msg" rows = "6" placeholder = "Message"></textarea>
                    </div>
                    <div class = "ticket_control">
                        <input id = "send_ticket_button" type = "submit" value = "Send">
                    </div>
                </form>
            </div>
        </section>

        <section id = "view" class = "padding">
            <p class = "sub_title">view</p>
            <h2 class = "title">Ticket History</h2>
            <input id = show_tickets type = "submit" value = "Hide">
            <div class = "ticket_history">
                <?php include_once("../Submition/get_ticket.php"); ?>
            </div>
        </section>

        <section id = "FAQs" class = "padding">
        <p class = "sub_title"> FAQs </p>
        <h2 class ="title"> Frequently asked questions </h2>
            <?php 
                include_once("../Submition/get_faqs.php");
            ?>
        </section>
                    
    </main>

    <script src = "../java_script/main_page.js"></script>
</body>
</html>
