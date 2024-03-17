<?php 

    include("../settings/connection.php");

    // session_start();

    // $uid =  $_SESSION['user-id'];
    $uid = 28;

    $sql = "SELECT * 
    FROM profile 
    JOIN dislikes ON profile.user_id = dislikes.user_id 
    JOIN preferences ON profile.user_id = preferences.user_id 
    WHERE profile.user_id = $uid";

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