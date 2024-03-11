<?php

    include("../settings/connection.php");


    echo "<p>Works</p>";

    // $gender = $_POST['gender'];
    // $age = date("Y") - $_POST['age'];
    // $hostel = $_POST['hostel'];
    // $ethnicity = $_POST['ethnicity'];

    // $sql = "SELECT * FROM users WHERE gender = ? AND ethnicity = ? AND listing_id = ? AND Year(dob) = ?";
    // $stmt = mysqli_prepare($conn, $sql);
    // mysqli_stmt_bind_param($stmt, "iiii", $gender, $ethnicity, $hostel, $age);

    // $result = mysqli_stmt_execute($stmt);

    // if (!$result){
    //     die("Unsuccessful query: ".mysqli_error($conn));
    // }
    // else {
    //     $result_set = mysqli_stmt_get_result($stmt);

    //     if (mysqli_num_rows($result_set) > 0){
    //         $users = mysqli_fetch_all($result_set, MYSQLI_ASSOC);
    //     }

    // }


?>