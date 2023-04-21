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
            <p>Welcome.
                <br>Thanks for joining us.</p>
        </div>
        <div class="register_content signup">
            <h1>Sign Up</h1>
            <form action="../Submition/sign_up.php" method="post" class="register_form">
                <input name="username" class="username" type="text" placeholder="Username" required="required">
                <input name="email" class="email" type="email" placeholder="Email" required="required">
                <input name="password" class="password" type="password" required = "required" placeholder="Password">
                <input name="Submit" class="submit" type="submit" value="Submit">
            </form>
            <p> <?php if(isset($_SESSION['ERROR'])) echo htmlentities($_SESSION['ERROR']); unset($_SESSION['ERROR'])?> </p>
            <a href="../Boot/login.php" class="register_button">Login</a>
        </div>

