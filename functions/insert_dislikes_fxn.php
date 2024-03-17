<?php

    include("../settings/connection.php");

    function insert_dislikes($dislikes, $uid){
        global $conn;

        foreach ($dislikes as $dislike){

            $sql = "INSERT INTO dislikes (user_id, COMMENT) VALUES (?, ?)";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "is", $uid, $dislike);
            $result = mysqli_stmt_execute($stmt);

            if(!$result){
                echo "<script>alert(Error: ".mysqli_error($conn).")</script>";
                return false;
            }
        }

        return true;
    }

?>