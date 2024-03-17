<?php

    // Connect application with database

    $SERVERNAME = '18.133.105.236';
    $USERNAME = 'root';
    $PASSWORD = 'cs341webtech';
    $DB_NAME = 'roommate_radar';

    $conn = new mysqli($SERVERNAME, $USERNAME, $PASSWORD, $DB_NAME);

    if($conn->connect_error){
        die("Connection failed".$conn->connect_error);
    }

?>