<?php

    // Connect application with database

    $SERVERNAME = 'localhost';
    $USERNAME = 'root';
    $PASSWORD = '';
    $DB_NAME = 'roommate_radar';

    $conn = new mysqli($SERVERNAME, $USERNAME, $PASSWORD, $DB_NAME);

    if($conn->connect_error){
        die("Connection failed".$conn->connect_error);
    }

    echo "it works";

?>