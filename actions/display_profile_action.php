<?php 

    include("../settings/connection.php");
    include("../functions/show_profile_fxn.php");
    include("../functions/get_profile_info_fxn.php");

    session_start();

    $uid =  $_SESSION['user-id'];
    $profile = null;

    $profile = get_profile_info($uid);

    if($profile != null){
        $dislike_comments = json_decode($profile[0]['COMMENT']);
        $preference_comments = json_decode($profile[0]['comment']);
    
        $picture = get_profile_photo($uid);
    }
    



?>