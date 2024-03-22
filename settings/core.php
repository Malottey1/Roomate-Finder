<?php

    // session management - starting and checking if user is logged in
    session_start();

    function check_login(){

        if (!isset($_SESSION['user-id'])){// redirect user to login page if no session exists with user
            header("Location: ../login/login.php");
            die();
        }
    }

    //Store the current user id in this session
    $_SESSION['user-id'] = $user_id;

?>