<?php

session_start();

include("../settings/connection.php");

if(isset($_FILES['file'])){
    
    $image_directory = "../images/";
    $filename = $_SESSION['user-id']."_".$_FILES['file']['name'];
    $user = $_SESSION['user-id'];

    // Find user and upload profile photo
    $sql = "UPDATE profile SET photo_name = ? WHERE user_id = ?";

    $stmt = mysqli_prepare($conn, $sql);

    // mysqli_stmt_bind_param($stmt, "isss", $user, $filename, $bio, $fb);
    mysqli_stmt_bind_param($stmt, "si", $filename, $user);
    $result = mysqli_stmt_execute($stmt);

    if(!$result){
        echo "Error updating record: ".mysqli_error($conn);
        exit;
    }

    // Place file in correct folder
    move_uploaded_file($_FILES['file']['tmp_name'], $image_directory.$filename);

}

?>