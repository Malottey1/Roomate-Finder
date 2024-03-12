<?php
include("../settings/connection.php"); // connect to database

if (isset($_POST['submit-btn'])) {
    // Store data for user relation
    $fname = $_POST['firstName'];
    $lname = $_POST['lastName'];
    $email = $_POST['email'];
    $passwrd = $_POST['passwrd'];
    $c_psswrd = $_POST['confirm-passwrd'];
    $gender = $_POST['gender'];
    $ethnicity = $_POST['ethnicity'];
    $dob = $_POST['dateOfBirth'];
    $hostel = $_POST['hostel'];
    $criteria1 = $_POST['criteria1'];
    $criteria2 = $_POST['criteria2'];
    $criteria3 = $_POST['criteria3'];
    $criteria4 = $_POST['criteria4'];
    $interests1 = $_POST['interests1'];
    $interests2 = $_POST['interests2'];
    $interests3 = $_POST['interests3'];
    $interests4 = $_POST['interests4'];
    // $bio = $_POST['bio'];
    // $fbook = $_POST['socialMedia'];

    // Check if passwords match
    if ($passwrd == $c_psswrd) {
        $hashed_passwrd = password_hash($passwrd, PASSWORD_DEFAULT);
    } else {
        echo "<script>alert('Your passwords are different');</script>";
        exit();
    }

    $sql = "INSERT INTO users (email, passwrd, first_name, last_name, gender, dob, ethnicity, listing_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssisss", $email, $hashed_passwrd, $fname, $lname, $gender, $dob, $ethnicity, $hostel);
    $result = mysqli_stmt_execute($stmt);

    // Retrieve user ID
    $user_id = mysqli_insert_id($conn);

    if ($result) {
        $preferences = [$criteria1, $criteria2, $criteria3, $criteria4, $interests1, $interests2, $interests3, $interests4,];
        $comment = implode(',', $preferences);
        $sql = "INSERT INTO preferences (user_id, comment) VALUES (?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "is", $user_id, $comment);
        mysqli_stmt_execute($stmt);

        header("Location: ../view/dashboard-postLogin.php");
        exit();
    } else {
        echo "<script>alert(Error: " . mysqli_error($conn) . ")</script>";
    }
}
?>
