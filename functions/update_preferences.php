<?php

    include("../settings/connection.php");

    function update_preferences($preferences, $uid){
        global $conn;

        $json = json_encode($preferences);

        $sql = "UPDATE preferences SET comment = ? WHERE user_id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "si", $json, $uid);
        $result = mysqli_stmt_execute($stmt);

        if(!$result){
            echo "<script>alert(Error: ".mysqli_error($conn).")</script>";
            return false;
        }

        return true;
    }


?>