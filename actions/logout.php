<?php
<<<<<<< HEAD

    session_start();

    $_SESSION = array();

    session_destroy();

    header("Location: ../login/login.php");
    exit;
?>
=======
// Start session
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the login page or any other page after logout
header("Location: ../login/login.php");
exit;
?>
>>>>>>> ded29b8f2712665a30aacee27958a97d58c495f4
