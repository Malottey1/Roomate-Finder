<?php
    echo "Working";

    include("../settings/connection.php"); // connect to database

    if (isset($_POST['submit-btn'])){
        
        // store data for user relation
        $fname = $_POST['firstName'];
        $lname = $_POST['lastName'];
        $email = $_POST['email'];
        $psswrd = $_POST['passwrd'];
        $c_psswrd = $_POST['confirm-passwrd'];
        $gender = $_POST['gender'];
        $ethnicity = $_POST['ethnicity'];
        $dob = $_POST['dateOfBirth'];

        // $bio = $_POST['bio'];
        // $fbook = $_POST['socialMedia'];




    }
?>