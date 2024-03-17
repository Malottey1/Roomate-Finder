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

    // Get profile details of a particular user
    function get_user_profile($id){
        global $conn;

        $sql = "SELECT * FROM profile WHERE user_id = ?";

        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);

        $result = mysqli_stmt_execute($stmt);

        if (!$result){
            die("Unsuccessful query: ".mysqli_error($conn));
        }
        else {
            $result_set = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result_set) > 0){
                $profile = mysqli_fetch_all($result_set, MYSQLI_ASSOC);
                return $profile;
            }
        }
        
    }

    function display_each_user($users){

        if ($users == null){return;}

        foreach ($users as $user){

            $hostel = get_user_hostel($user['listing_id']);
            $profile = get_user_profile($user['user_id']);
            $photo = $profile[0]['photo_name'];

            echo "<div class='card'>";
            echo "<div><img src='../images/".$photo."' alt='card image'></div>";
            echo '<div class="lower">';
            echo '<div>';
            echo '<a style="text-decoration: none; color: inherit;" href="../actions/display_roommate_action.php?uid='.$user['user_id'].'" >';
            echo '<p class="name">'.$user["first_name"].' '.$user["last_name"].'</p>';
            echo '</a>';
            echo '</div>';
            echo '<div class="icons">';
            echo '<a href="../actions/send_email_action.php?uid='.$user['user_id'].'" >';
            echo '<div style="margin-right: 10px;" class="material-symbols-outlined send-btn">send</div>';
            echo '</a>';
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