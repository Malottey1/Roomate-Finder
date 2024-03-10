<?php

    include("../settings/connection.php");

    function get_all_users(){

        global $conn;

        $sql = "SELECT * FROM users";

        $result = mysqli_query($conn, $sql);

        if (!$result){
            die("Unsuccessful query: ".mysqli_error($conn));
        }
        else{
            if (mysqli_num_rows($result) > 0){
                $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
                return $users;
            }
        }
    }

    function display_each_user($users){
        foreach ($users as $user){
            echo "<div class='card'>";
            echo "<div><img src='../assets/images/Rectangle 38.jpg' alt='card image'></div>";
            echo '<div class="lower">';
            echo '<div><p class="name">'.$user["first_name"].' '.$user["last_name"].'</p></div>';
            echo '<div class="icons">';
            echo '<div style="margin-right: 10px;" class="material-symbols-outlined send-btn">send</div>';
            echo '<div class="material-symbols-outlined">thumb_down</div>';
            echo '</div></div>';
            echo '<div><p class="location">Dufiex Annex, GHS 7000</p></div>';
            echo '</div>';
        }
    }

    $users = get_all_users();
?>