<?php 

    include("../settings/connection.php");

    session_start();

    $uid =  $_SESSION['user-id'];
    $profile = null;

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
        }
    }

    if($profile != null){
        $dislike_comments = json_decode($profile[0]['COMMENT']);
        $preference_comments = json_decode($profile[0]['comment']);
    
        $picture = $profile[0]['photo_name'] == null ? 'no_image.jpg' : $profile[0]['photo_name'];
    }
    



?>