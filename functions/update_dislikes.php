<?php

    include("../settings/connection.php");

    function update_preferences($dislikes, $uid){
        global $conn;

        $json = json_encode($dislikes);

        $sql = "UPDATE dislikes SET comment = ? WHERE user_id = ?";
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