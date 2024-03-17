<?php
    include("../settings/connection.php"); // connect to database
    include("../functions/insert_preferences_fxn.php"); 

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

        // Preferences
        $first_preference = $_POST['criteria1'];
        $second_preference = $_POST['criteria2'];
        $third_preference = $_POST['criteria3'];
        $four_preference = $_POST['criteria4'];

        if ($passwrd == $c_psswrd){
            $hashed_passwrd = password_hash($passwrd, PASSWORD_DEFAULT);
        }
        else{
            echo "<script>alert('Your passwords are different');</script>";
            exit();
        }

        // insert into users table
        $sql = "INSERT INTO users (email, passwrd, first_name, last_name, gender, dob, ethnicity, listing_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssssisis", $email, $hashed_passwrd, $fname, $lname, $gender, $dob, $ethnicity, $hostel);
        $result = mysqli_stmt_execute($stmt);

        // find the id of the just inserted row
        $uid = mysqli_insert_id($conn);

        // insert details into profile table
        $sql2 = "INSERT INTO profile (user_id, bio, facebook) VALUES (?, ?, ?)";
        $stmt2 = mysqli_prepare($conn, $sql2);
        mysqli_stmt_bind_param($stmt2, "iss", $uid, $bio, $fbook);
        $result2 = mysqli_stmt_execute($stmt2);

        $result3 = insert_preferences($first_preference, $second_preference, $third_preference, $four_preference, $uid);
   
        // If all querries worked
        if ($result && $result2 && $result3){
            header("Location: ../view/dashboard-postLogin.php");
            exit();
        }
        else{
            echo "<script>alert(Error: ".mysqli_error($conn).")</script>";
        }
    }
?>