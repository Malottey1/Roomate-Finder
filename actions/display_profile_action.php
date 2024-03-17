<?php 

    include("../settings/connection.php");

    // session_start();

    // $uid =  $_SESSION['user-id'];
    $uid = 28;

    $sql = "SELECT  users.user_id, first_name, last_name, photo_name, bio, preferences.comment, dislikes.COMMENT
    FROM users
    JOIN profile ON users.user_id = profile.user_id 
    JOIN dislikes ON users.user_id = dislikes.user_id 
    JOIN preferences ON users.user_id = preferences.user_id 
    WHERE users.user_id = $uid";

    $result = mysqli_query($conn, $sql);

    if(!$result){
        die("Unsuccessful query: ".mysqli_error($conn));
    }
    else{
        if(mysqli_num_rows($result) > 0){
            $profile = mysqli_fetch_all($result, MYSQLI_ASSOC);
            print_r($profile); 
        }
    }

    



?>