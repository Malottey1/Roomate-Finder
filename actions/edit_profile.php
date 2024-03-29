<?php

    include("../settings/connection.php");
    include("../functions/update_dislikes.php");
    include("../functions/update_preferences.php");

    session_start();

    if(isset($_POST['submit-btn'])){

        $uid = $_SESSION['user-id'];
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

        $sql = "UPDATE profile SET bio = ? WHERE user_id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "si", $bio, $uid);
        $result = mysqli_stmt_execute($stmt);

        $result1 = update_preferences($preferences, $uid);
        $result2 = update_dislikes($dislikes, $uid);

        if ($result && $result1 && $result2){
            header("Location: ../view/User_profile.php?update=success");
            exit();
        }
        else{
            echo "<script>alert(Error: ".mysqli_error($conn).")</script>";
        }


    }

?>