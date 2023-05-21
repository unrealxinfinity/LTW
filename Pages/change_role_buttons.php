<li><a href = "../Actions/logout.php" class = "btn">Logout</a></li>


<?php
if($_SESSION['role'] == "Client"){
    if(isAgent($_SESSION['id'])){
        echo '<li><a href = "../Boot/main_page_agent.php" class = "btn">Change to Agent</a></li>';
    }
    if(isAdmin($_SESSION['id'])){
        echo '<li><a href = "../Boot/main_page_admin.php" class = "btn">Change to Admin</a></li>';
    }
}
else if($_SESSION['role'] == "Agent"){
    echo '<li><a href = "../Boot/change_to_client.php" class = "btn">Change to Client</a></li>';
    if(isAdmin($_SESSION['id'])){
        echo '<li><a href = "../Boot/main_page_admin.php" class = "btn">Change to Admin</a></li>';
    }
}
else if($_SESSION['role'] == "Admin"){
    echo '<li><a href = "../Boot/main_page_agent.php" class = "btn">Change to Agent</a></li>';
    echo '<li><a href = "../Boot/change_to_client.php" class = "btn">Change to Client</a></li>';
}



?>
                    