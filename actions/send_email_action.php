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

        // define email details
        $to = $user[0]['email'];
        $subject = "Discussion+on+rooming+together";
        $body = "Hi, My name is".$user[0]['first_name'].". I am interested in rooming with your and would like to discuss more with you. Kindly reach out if you're interested too.";

        // to prevent unnecessary spaces in mail
        $body = str_replace(' ', '+', $body);

        // Create mailto and open mail to contact user
        $mail_to_link = "mailto:$to?subject=".urlencode($subject)."&body=".urlencode($body);
        header("Location: $mail_to_link");
        exit;


    }

?>