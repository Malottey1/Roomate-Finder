<?php
    include("../settings/connection.php");
    session_start();

    if(isset($_POST['delete-profile'])) {
        // Get user ID from session
        $user_id = $_SESSION['user-id'];

        // Perform deletion
        $sql = "DELETE FROM users WHERE user_id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $user_id);
        mysqli_stmt_execute($stmt);

        // Check if deletion was successful
        if(mysqli_stmt_affected_rows($stmt) > 0) {
            // Deletion successful, provide feedback to the user
            echo "<script>alert('Profile deleted successfully.');</script>";
            header("Location: ../view/dashboard-prelogin.php");
            exit();
        } else {
            // Deletion failed, provide feedback to the user
            echo "<script>alert('Failed to delete profile.');</script>";
            header("Location: ../view/User_profile.php");
            exit();
        }
    }
?>
