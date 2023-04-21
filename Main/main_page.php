<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/main_menu_style.css">
    <link rel="stylesheet" href="../css/profile_page.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <header class = "header">
        <h2 class = "logo">Ticket Project</h2>
        <nav class = "navigation">
            <a href = "#">Reply Inquiries</a>
            <a href = "../Boot/profile.php">View Tickets</a>
            <input type = "submit" class = "btn_login" onClick = "change_page()" value = "Send Ticket"></input>
        </nav>  
    </header>
    <script>
    function change_page() {
        window.location.href="../Submition/logout.php";
    } dsa
    </script>
    <input type="checkbox" id="menu"> 
    <label class="bar" for="menu"></label>
    <header class = "profile">
            <div class = "user">
                <h3 class = "name"><?php echo htmlentities($_SESSION['username']); ?></h3>
                <p class = "post">Client</p>
                <p class = "info"><?php echo htmlentities($_SESSION['email']); ?></p>
            </div>
            <nav class = "navbar">
                <ul>
                    <li> <a href = "../Boot/main_page.php">Home</a></li>
                    <li> <a href = "#">Ticket History</a></li>
                    <li> <a href = "#">Edit Profile</a></li>
                    <li> <a href = "../Submition/delete_user.php">Delete account</a></li>
                    <li> <a href = "../Submition/logout.php">Logout</a></li>
                </ul>
            </nav>
    </header>
</body>
</html>