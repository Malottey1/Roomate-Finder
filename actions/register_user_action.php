<?php
    include("../settings/connection.php"); // connect to database
    include("../functions/insert_preferences_fxn.php");
    include("../functions/insert_dislikes_fxn.php"); 

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

        // preferences
        $preferences = array(
            $_POST['interests1'],
            $_POST['interests2'],
            $_POST['interests3'],
            $_POST['interests4']
        );

        // dislikes
        $dislikes = array(
            $_POST['criteria1'],
            $_POST['criteria2'],
            $_POST['criteria3'],
            $_POST['criteria4']
        );

        // check password

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

        $result3 = insert_preferences($preferences, $uid);
        $result4 = insert_dislikes($dislikes, $uid);
   
        // If all querries worked
        if ($result && $result2 && $result3){
            header("Location: ../login/login.php");
            exit();
        }
        else{
            echo "<script>alert(Error: ".mysqli_error($conn).")</script>";
        }
    }
?>