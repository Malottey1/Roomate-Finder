<?php
    include("../settings/connection.php"); // connect to database

    if (isset($_POST['submit-btn'])){
        
        // store data for user relation
        $fname = $_POST['firstName'];
        $lname = $_POST['lastName'];
        $email = $_POST['email'];
        $passwrd = $_POST['passwrd'];
        $c_psswrd = $_POST['confirm-passwrd'];
        $gender = $_POST['gender'];
        $ethnicity = $_POST['ethnicity'];
        $dob = $_POST['dateOfBirth'];
        $hostel = $_POST['hostel'];
        // $bio = $_POST['bio'];
        // $fbook = $_POST['socialMedia'];

        if ($passwrd == $c_psswrd){
            $hashed_passwrd = password_hash($passwrd, PASSWORD_DEFAULT);
        }
        else{
            echo "<script>alert('Your passwords are different');</script>";
            exit();
        }

        $sql = "INSERT INTO users (email, passwrd, first_name, last_name, gender, dob, ethnicity, listing_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssssisis", $email, $hashed_passwrd, $fname, $lname, $gender, $dob, $ethnicity, $hostel);
        $result = mysqli_stmt_execute($stmt);

        if ($result){
            header("Location: ../view/dashboard-postLogin.php");
            exit();
        }
        else{
            echo "<script>alert(Error: ".mysqli_error($conn).")</script>";
        }
    }
?>