<?php

    include '../settings/connection.php';

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

    // Get the hostel details of a particular user
    function get_user_hostel($id){
        global $conn;

        $sql = "SELECT * FROM room_listings WHERE listing_id = ?";

        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);

        $result = mysqli_stmt_execute($stmt);

        if (!$result){
            die("Unsuccessful query: ".mysqli_error($conn));
        }
        else {
            $result_set = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result_set) > 0){
                $hostel = mysqli_fetch_all($result_set, MYSQLI_ASSOC);
                return $hostel;
            }
        }
    }

    function display_each_user($users){

        foreach ($users as $user){

            $hostel = get_user_hostel($user['listing_id']);

            echo "<div class='card'>";
            echo "<div><img src='../assets/images/Rectangle 38.jpg' alt='card image'></div>";
            echo '<div class="lower">';
            echo '<div><p class="name">'.$user["first_name"].' '.$user["last_name"].'</p></div>';
            echo '<div class="icons">';
            echo '<div style="margin-right: 10px;" class="material-symbols-outlined send-btn">send</div>';
            echo '<div class="material-symbols-outlined">thumb_down</div>';
            echo '</div></div>';
            
            // display hostel details
            echo "<div>";
            foreach ($hostel as $h) {
                echo "<p class='location'>".$h['hostel_name'].", GHS".$h['hostel_cost']."</p>";
            }
            echo "</div>";
            echo '</div>';
            }
    }
?>