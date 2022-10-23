<?php
session_start();
unset($_SESSION["user"]);
unset($_SESSION["role"]);
session_destroy();
session_unset();
header("location:login.php");
?>

<?php
    unset($_SESSION["success"]);
    unset($_SESSION["error"]);
    unset($_SESSION["info"]);
?>