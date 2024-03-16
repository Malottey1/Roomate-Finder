<?php

    include("../settings/connection.php");

    if($_GET['uid']){
        $uid = $_GET['uid'];
        
        // Get receiver address for email
        $sql = "SELECT * FROM users WHERE user_id = $uid";
        $result = mysqli_query($conn, $sql);

        if(!$result){
            die("Unsuccessful query: ".mysqli_error($conn));
        }
        else{
            if(mysqli_num_rows($result) > 0){
                $user = mysqli_fetch_all($result, MYSQLI_ASSOC);
            }
        }

        $to = $user[0]['email'];


    }

?>