<?php

    include("../settings/connection.php");

    function get_all_hostels(){
        global $conn;

        $sql = "SELECT * FROM Room_Listings";
        $result = mysqli_query($conn, $sql);

        if (!$result){
            die("Unsuccessful query: ".mysqli_error($conn));
        }
        else{
            if (mysqli_num_rows($result) > 0){
                $hostels = mysqli_fetch_all($result, MYSQLI_ASSOC);
                return $hostels;
            }
        }
    }

    function display_each_hostel($hostels){

        foreach ($hostels as $hostel){
            echo '<option value="'.$hostel["listing_id"].'>'.$hostel["hostel_name"].'</option>';
        }
    }

    $hostels = get_all_hostels();

?>