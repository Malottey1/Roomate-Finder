<?php
include("../settings/connection.php");

// Retrieve the current user ID
if(isset($_SESSION['user-id'])) {
    $currentUserId = $_SESSION['user-id']; // Retrieve the current user ID
} else {
    header("Location: ../login/login.php");
    exit;
}

// Function to retrieve user details from the database
function getUserDetails($userId, $conn) {
    $query = "SELECT * FROM Users WHERE user_id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $userId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        return $row;
    } else {
        return null;
    }
}

// Function to calculate age based on date of birth
function calculateAge($dob) {
    $dob = new DateTime($dob);
    $now = new DateTime();
    $age = $now->diff($dob);
    return $age->y;
}

// Function to display users with similar age, gender, and hostel
function displaySimilarRoommates($currentUserId, $conn) {
    // Fetch details of the current user
    $currentUserDetails = getUserDetails($currentUserId, $conn);
    $currentUserAge = calculateAge($currentUserDetails['dob']);
    $currentUserGender = $currentUserDetails['gender'];
    $currentUserHostelId = $currentUserDetails['listing_id'];

    // Query to fetch users with similar age, gender, and hostel
    $query = "SELECT * FROM Users 
              WHERE user_id != ? 
              AND gender = ? 
              AND listing_id = ?";

    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "isi", $currentUserId, $currentUserGender, $currentUserHostelId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Display each user
    echo '<div class="image-container">';
    $counter = 0; // Counter to limit to three users
    while ($row = mysqli_fetch_assoc($result)) {
        if ($counter >= 3) {
            break; // Exit the loop if counter reaches three
        }
        echo '<div class="image-details">';
        echo '<img src="../assets/images/' . $row['photo_name'] . '" alt="' . $row['first_name'] . ' ' . $row['last_name'] . '">';
        echo '<p style="margin-left: 41px; font-weight: bolder;">' . $row['first_name'] . ' ' . $row['last_name'] . '</p>';
        echo '<p style="margin-left: 41px; margin-top: -20px;">' . $row['hostel_name'] . '</p>';
        echo '</div>';
        $counter++; // Increment the counter
    }
    echo '</div>';
    }

?>
