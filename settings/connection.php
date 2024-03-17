<?php

    // Connect application with database

    $SERVERNAME = 'localhost';
    $USERNAME = 'root';
    $PASSWORD = 'cs341webtech';
    $DB_NAME = 'roommate_radar';

    $conn = new mysqli($SERVERNAME, $USERNAME, $PASSWORD, $DB_NAME);

    if($conn->connect_error){
        die("Connection failed".$conn->connect_error);
    }

?>