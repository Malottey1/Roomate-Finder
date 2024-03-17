<?php
include '../settings/connection.php';

// Function to get user information by user ID
function getUserInfo($conn, $userId) {
    $sql = "SELECT * FROM users WHERE user_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $userId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if ($row = mysqli_fetch_assoc($result)) {
        return $row; // Return user information as an associative array
    } else {
        return false; // User not found
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
    // Retrieve suggested roommates' IDs based on the current user ID
    $suggestedRoommatesIds = getSuggestedRoommates($currentUserId);
    
    // Output user IDs
    echo "User IDs of potential roommates in descending order of similarity score:";
    foreach ($suggestedRoommatesIds as $userId) {
        echo $userId . "<br>";
    }
}

?>
