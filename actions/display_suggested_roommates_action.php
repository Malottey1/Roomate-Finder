<?php
// Establish connection with database
include('../settings/connection.php');

// Function to retrieve suggested roommates for a user from the database
function getSuggestedRoommates($conn, $userId) {
    $sql = "SELECT name, hostel, score 
            FROM SuggestedRoommates 
            WHERE user_id = ? 
            ORDER BY score DESC 
            LIMIT 3";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $userId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

?>