<?php

    include("../settings/connection.php");

    session_start();
    
    function get_profile_photo(){
        global $conn;

        $uid = $_SESSION['user-id'];

        $sql = "SELECT * profile WHERE user_id = $uid";
        $result = mysqli_query($conn, $sql);

        if(!$result){
            die("Unsuccessful query: ".mysqli_error($conn));
        }
        else{
            if(mysqli_num_rows($result) > 0){
                $profile = mysqli_fetch_all($result, MYSQLI_ASSOC);
                $photo = $profile[0]['photo_name'];
                return $photo;
            }
        }
    }
    



?>