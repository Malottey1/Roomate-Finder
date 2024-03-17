<?php

    include("../settings/connection.php");
    include("../functions/show_profile_fxn.php");
    include("../functions/get_profile_info_fxn.php");

    $uid = $_GET['uid'];

    $profile = get_profile_info($uid);

    if($profile != null){
        $dislike_comments = json_decode($profile[0]['COMMENT']);
        $preference_comments = json_decode($profile[0]['comment']);
    
        $picture = get_profile_photo($uid);

        header("Location: ../view/roommate-profile.php");
        exit;
    }

    header("Location: ../view/roommate-listings.php");

?>