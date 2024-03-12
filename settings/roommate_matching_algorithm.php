<?php
// Establish connection with the database
include('../settings/connection.php');

// Start the session
session_start();

// Check if the user is logged in and the user ID is stored in the session
if (isset($_SESSION['user_id'])) {
    // Get the current user ID from the session
    $currentUserId = $_SESSION['user_id'];

    // Function to retrieve user information and preferences
    function getUserInfo($conn, $userId) {
        $sql = "SELECT u.gender, u.hostel, p.comment 
                FROM users u
                INNER JOIN preferences p ON u.user_id = p.user_id
                WHERE u.user_id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $userId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($result) == 1) {
            return mysqli_fetch_assoc($result);
        } else {
            return null;
        }
    }

    // Function to remove stopwords from a sentence
    function remove_stopwords($sentence) {
        $stopwords = ['and', 'or', 'but', 'for', 'nor', 'yet', 'so', 'a', 'an', 'the', 'in', 'on', 'at', 'to', 'with', 'by', 'of', 'from'];
        $words = preg_split('/\s+/', strtolower($sentence));
        $filtered_words = array_diff($words, $stopwords);
        return $filtered_words;
    }

    // Function to compare two sentences
    function compare_sentences($sentence1, $sentence2) {
        $words1 = remove_stopwords($sentence1);
        $words2 = remove_stopwords($sentence2);
        
        $common_words = array_intersect($words1, $words2);
        
        return $common_words;
    }

    // Function to calculate similarity score between users
    function calculateSimilarity($user1, $user2) {
        $score = 0;
        // Check if genders match (1 point for match)
        if ($user1['gender'] == $user2['gender']) {
            $score += 1;
        }
        // Check if hostels match (2 points for match)
        if ($user1['hostel'] == $user2['hostel']) {
            $score += 2;
        }
        // Compare criteria and interests (1 point per matching criteria/interest)
        $preferences1 = explode(',', $user1['comment']);
        $preferences2 = explode(',', $user2['comment']);
        
        foreach ($preferences1 as $preference1) {
            foreach ($preferences2 as $preference2) {
                $criteria_score = count(compare_sentences($preference1, $preference2));
                $score += $criteria_score;
            }
        }
        
        return $score;
    }

    // Get current user information and preferences
    $currentUser = getUserInfo($conn, $currentUserId);

    if ($currentUser) {
        // Prepare SQL statement to get all users (excluding current user)
        $sql = "SELECT u.user_id, u.first_name, u.last_name, u.hostel, p.comment 
                FROM users u
                INNER JOIN preferences p ON u.user_id = p.user_id
                WHERE u.user_id <> ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $currentUserId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        $potentialRoommates = [];

        // Loop through all users and calculate similarity score
        while ($row = mysqli_fetch_assoc($result)) {
            $similarity = calculateSimilarity($currentUser, $row);
            $potentialRoommates[$row['user_id']] = [
                'name' => $row['first_name'] . ' ' . $row['last_name'],
                'hostel' => $row['hostel'],
                'score' => $similarity
            ];
        }

        // Sort potential roommates by similarity score (highest first)
        arsort($potentialRoommates);

        // Insert top 3 potential roommates into SuggestedRoommates table using a database transaction
        mysqli_begin_transaction($conn);
        $count = 0;
        foreach ($potentialRoommates as $userId => $roommate) {
            if ($count >= 3) {
                break;
            }
            $sqlInsert = "INSERT INTO SuggestedRoommates (user_id, name, hostel, score) VALUES (?, ?, ?, ?)";
            $stmtInsert = mysqli_prepare($conn, $sqlInsert);
            mysqli_stmt_bind_param($stmtInsert, "issi", $userId, $roommate['name'], $roommate['hostel'], $roommate['score']);
            mysqli_stmt_execute($stmtInsert);
            $count++;
        }
        mysqli_commit($conn);
        echo "<p>Suggested roommates successfully stored in the database.</p>";
    } else {
        echo "<p>Error: Could not retrieve your user information.</p>";
    }
} else {
    // If the user is not logged in, redirect to the login page
    header("Location: login.php");
    exit(); // Stop further execution of the script
}

// Close the database connection
mysqli_close($conn);
?>
