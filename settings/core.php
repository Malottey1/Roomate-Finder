<?php

    // session management - starting and checking if user is logged in

    session_start();

    function check_login(){
        if (!isset($_SESSION['user_id'])){// redirect user to login page if no session exists with user
            header("Location: ../login/login.html");//TODO: Correct login.html to login to login.php
            die();
        }
    }

?>