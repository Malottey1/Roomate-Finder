<?php
 include '../settings/connection.php';

// Fetch suggested roommates based on the current user's hostel
function getSuggestedRoommates($currentUserId) {
    global $conn;
    $query = "SELECT hostel_name FROM Room_Listings WHERE listing_id = (SELECT listing_id FROM Users WHERE user_id = $currentUserId)";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $currentHostel = $row['hostel_name'];

    // Fetch other users in the same hostel
    $query = "SELECT * FROM Users WHERE listing_id IN (SELECT listing_id FROM Room_Listings WHERE hostel_name = '$currentHostel') AND user_id != $currentUserId LIMIT 3";
    $result = mysqli_query($conn, $query);
    $suggestedRoommates = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $suggestedRoommates;
}

// Display each suggested roommate
function displayEachRoommate($suggestedRoommates) {
    foreach ($suggestedRoommates as $roommate) {
        echo '<div class="image-details">';
        echo '<img src="../assets/images/' . $roommate['photo_name'] . '" alt="' . $roommate['name'] . '">';
        echo '<p style="margin-left: 41px; font-weight: bolder;">' . $roommate['name'] . '</p>';
        echo '<p style="margin-left: 41px; margin-top: -20px;">' . $roommate['hostel'] . '</p>';
        echo '</div>';
    }
}

$currentUserId = 1; // You need to replace this with the actual current user's ID

$suggestedRoommates = getSuggestedRoommates($currentUserId);
?>