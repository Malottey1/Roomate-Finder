<?php

    include("../settings/connection.php");

    function get_all_ethnic_groups(){
        global $conn;

        $sql = "SELECT * FROM ethnicity";
        $result = mysqli_query($conn, $sql);

        if (!$result){
            die("Unsuccessful query: ".mysqli_error($conn));
        }
        else{
            if(mysqli_num_rows($result) > 0){
                $eth_groups = mysqli_fetch_all($result, MYSQLI_ASSOC);
                return $eth_groups;
            }
        }
    }

    $eth_groups = get_all_ethnic_groups();

?>