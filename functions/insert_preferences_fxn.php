<?php

    include("../settings/connection.php");

    function insert_preferences($preferences, $uid){
        global $conn;

        foreach ($preferences as $preference){

            $sql = "INSERT INTO preferences (user_id, comment) VALUES (?, ?)";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "is", $uid, $preference);
            $result = mysqli_stmt_execute($stmt);

            if(!$result){
                echo "<script>alert(Error: ".mysqli_error($conn).")</script>";
                return false;
            }
        }

        return true;
    }

?>