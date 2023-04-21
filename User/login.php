<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div id="register_container">
        <div class="register_header">
            <h1>Ticket Project</h1>
        </div>
        <div class="register_content">
            <h1>Login</h1>
            <form action="../Submition/login.php" method="post" class="register_form">
                <input name="username" class ="username" type="text" placeholder="Username" required="required">
                <input name="password" class ="password" type="password" placeholder="Password" required="required">
                <input type="submit" name="Submit" class = "submit" value="Submit">
            </form>
            <p id="error_messages" style="color: black">
                <?php if(isset($_SESSION['ERROR'])) echo htmlentities($_SESSION['ERROR']); unset($_SESSION['ERROR'])?>
            </p>
            <a href="../Boot/signup.php" class="register_link">Sign Up</a>
        </div>
    