<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/login.css">
    <script defer src = "../java_script/login_validation.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="container">
               <img class="back" src="../images/back4.jpg" alt="">
               <img class="girl" src="../images/girl-removebg-preview.png" alt="">
    </div>
    <section>
        <div class="register_content">
            <h1>Login</h1>
            <form action="../Submition/login.php" method="post" class="register_form" id = "register_form">
                <div class = "control">
                    <label for = "username">Username</label>
                    <input name="username" id = "username" type="text" placeholder="Username">
                    <div class = "error"></div>
                </div>
                <div class = "control">
                    <label for = "password">Password</label>
                    <input name="password" id = "password" type="password" placeholder="Password">
                    <div class = "error"></div>
                </div>
                <div class = "control">
                    <input type="submit" name="Submit" value="Submit">
                </div>
            </form>
            <div class = "link">
                <a href = "../Boot/signup.php"> Sign up </a>
            </div>
            <p id="error_messages" style="color: black">
                <?php if(isset($_SESSION['ERROR'])) echo htmlentities($_SESSION['ERROR']); unset($_SESSION['ERROR'])?>
            </p>
        </div>
    </section>
</body>
</html>
    