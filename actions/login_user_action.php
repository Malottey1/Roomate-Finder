<?php
    include '../settings/connection.php';

    session_start();

    if (isset($_POST['login-btn'])){
        
        $email = $_POST['username'];
        $passwrd = $_POST['password'];

        $sql = "SELECT * FROM users WHERE email = ?";
        
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);

        // get the rows from the query execution
        $result = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($result) == 0){
            echo "<script>alert('Unsuccessful query.');</script>";
            exit();
        }
        
        $row = mysqli_fetch_assoc($result);

        if (password_verify($passwrd, $row['passwrd'])){

            // store session and start session
            $_SESSION['user-id'] = $row['user_id'];
            $_SESSION['username'] = $row['email'];

            // route user to postlogin dashboard
            header("Location: ../view/dashboard-postlogin.php");
            exit();
        }
        else {
            echo "<script>alert('Wrong input.');</script>";
            exit();
        }

    }

?>