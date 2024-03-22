<?php
    include("../settings/connection.php");
    session_start();

    $user_id = $_SESSION['user-id'];
    // $user_id = 6;

    // Perform deletion
    $sql = "DELETE FROM users WHERE user_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);

    // Check if deletion was successful
    if(mysqli_stmt_affected_rows($stmt) > 0) {
        // Deletion successful, provide feedback to the user
        echo "<script>alert('Profile deleted successfully.');</script>";
        header("Location: ../view/dashboard-prelogin.php?profile=deleted");
        exit();
    } else {
        // Deletion failed, provide feedback to the user
        echo "<script>alert('Failed to delete profile.');</script>";
        header("Location: ../view/User_profile.php");
        exit();
    }
?>
