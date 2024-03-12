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
        
        $bio = $_POST['bio'];
        $fbook = $_POST['socialMedia'];

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

        // Get the user id of the user
        $sql2 = "SELECT * FROM users WHERE email = ?";
        $stmt3 = mysqli_prepare($conn, $sql2);
        mysqli_stmt_bind_param($stmt3, "s", $email);
        mysqli_stmt_execute($stmt3);
        $res = mysqli_stmt_get_result($stmt3);

        if($res){
            if(mysqli_num_rows($res) > 0){
                $user = mysqli_fetch_all($res, MYSQLI_ASSOC);
            }
        }

        // gets the id of a single user
        foreach($user as $u){
            $sql3 = "INSERT INTO profile (user_id, bio, facebook) VALUES (?, ?, ?)";
            $stmt2 = mysqli_prepare($conn, $sql3);
            mysqli_stmt_bind_param($stmt2, "iss", $u['user_id'], $bio, $fbook);
            $result2 = mysqli_stmt_execute($stmt2);
        }
        
        // If all querries worked
        if ($result && $result2){
            header("Location: ../view/dashboard-postLogin.php");
            exit();
        }
        else{
            echo "<script>alert(Error: ".mysqli_error($conn).")</script>";
        }
    }
?>