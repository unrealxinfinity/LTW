<section id = "info" class = "padding">
            <p class = "sub_title">Account</p>
            <h2 class = "title">Edit Profile</h2>
            <div class = "account_info">
                <div class = "edit_info">
                    <form action="../Actions/edit_profile.php" method="post" class="register_form" id = "register_form">
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
                            <input name="confirm_password" id = "confirm_password" type="password" placeholder="Current Password">
                            <div class = "error"></div>
                        </div>
                        <div class = "control">
                            <input type="submit" name="Submit" value="Change">
                        </div>
                        <input name = "csrf" value = "<?=$_SESSION['csrf']?>" hidden>
                    </form>
                </div>
                <div class = "curr_info">
                        <ul>
                            <?php include_once("../Pages/change_role_buttons.php");?>
                        </ul>
                </div>
            </div>
        </section>