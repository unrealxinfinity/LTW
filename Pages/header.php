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
                <?php
                    if($_SESSION['role'] == "Client"){
                        echo '<li><a href = "#profile" class = "active">Home</a></li>
                              <li><a href = "#info">Account</a></li>
                              <li><a href = "#send">Submit</a></li>
                              <li><a href = "#view">View</a></li>
                              <li><a href = "#FAQs"> FAQs</a></li>
                              ';
                    }
                    else if($_SESSION['role'] == "Agent"){
                        echo '<li><a href = "#profile" class = "active">Home</a></li>
                              <li><a href = "#info">Account</a></li>
                              <li><a href = "#view">View</a></li>
                              <li><a href = "#browse">Browse</a></li>
                              <li><a href = "#FAQs">FAQs</a></li>
                            ';
                    }
                    else if($_SESSION['role'] == "Admin"){
                        echo '<li><a href = "#profile" class = "active">Home</a></li>
                              <li><a href = "#info">Account</a></li>
                              <li><a href = "#promote">Promote</a></li>
                              <li><a href = "#AgentDepartments">Agent Departments</a></li>
                              <li><a href = "#add">Add</a></li>
                              <li><a href = "#view">View</a></li>
                              <li><a href = "#browse">Browse</a></li>
                              ';
                    }

                ?>
                
            </ul>
        </nav>
    </header>


