</main>

<?php if($_SESSION['role'] == "Client")include_once("../Pages/Scripts/client_scripts.php");
        else if($_SESSION['role'] == "Agent")include_once("../Pages/Scripts/agent_scripts.php");
        else if($_SESSION['role'] == "Admin")include_once("../Pages/Scripts/admin_scripts.php");

?>
</body>
</html>
