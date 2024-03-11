<?php

    include("../settings/connection.php");
    include("../actions/display_users_action.php");


    $gender = $_POST['gender'];
    $age = date("Y") - $_POST['age'];
    $hostel = $_POST['hostel'];
    $ethnicity = $_POST['ethnicity'];

    $sql = "SELECT * FROM users WHERE gender = $gender AND listing_id = $hostel AND Year(dob) = $age";

    if ($ethnicity){
        $ethnicityString = implode(",", $ethnicity);
        $sql .= " AND ethnicity IN ($ethnicityString)";
    }

    $stmt = mysqli_prepare($conn, $sql);

    $result = mysqli_stmt_execute($stmt);

    if (!$result){
        die("Unsuccessful query: ".mysqli_error($conn));
    }
    else {
        $result_set = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result_set) >= 0){
            $users = mysqli_fetch_all($result_set, MYSQLI_ASSOC);
        }

    }

    $html = "";

    foreach ($users as $user){

        $hostel = get_user_hostel($user['listing_id']);

        $html .= "<div class='card'>";
        $html .= "<div><img src='../assets/images/Rectangle 38.jpg' alt='card image'></div>";
        $html .= '<div class="lower">';
        $html .= '<div><p class="name">'.$user["first_name"].' '.$user["last_name"].'</p></div>';
        $html .= '<div class="icons">';
        $html .= '<div style="margin-right: 10px;" class="material-symbols-outlined send-btn">send</div>';
        $html .= '<div class="material-symbols-outlined">thumb_down</div>';
        $html .= '</div></div>';
        
        // display hostel details
        $html .= "<div>";
        foreach ($hostel as $h) {
            $html .= "<p class='location'>".$h['hostel_name'].", GHS".$h['hostel_cost']."</p>";
        }
        $html .= "</div>";
        $html .= '</div>';
    }

    echo $html;



?>