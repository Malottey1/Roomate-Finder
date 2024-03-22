<?php

    include("../settings/connection.php");

    session_start();

    if(isset($_POST['submit-btn'])){

        $userId = $_SESSION['user-id'];
        $bio = $_POST['bio'];
        $preferences = array(
            $_POST['interest1'],
            $_POST['interest2'],
            $_POST['interest3'],
            $_POST['interest4']
        );

        $dislikes = array(
            $_POST['criteria1'],
            $_POST['criteria2'],
            $_POST['criteria3'],
            $_POST['criteria4'],
        );


    }

?>