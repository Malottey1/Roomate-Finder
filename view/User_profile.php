<?php
    include("../settings/core.php");
    check_login();
    
    include("../actions/display_profile_action.php");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="../css/User_profile.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

</head>
<body>
    <div class="user-profile">
        <div class=" profile-picture" ></div>
        
        
        <div class="rectangle-1">
            <div class="edit-pencil-icon" ></div>
        </div>

        <div class = "rectangle-2" id="rectangle-2" onclick="toggleEdit(['rectangle-2'])">
            <div class="edit-pencil-icon" ></div>
            <div class="janes-roommates">Jane has roomed with...<span class="edit-pencil-icon"></span></div>
            
            <div class="roomed-with-container">
                <div class="roomed-with-block" style="left: 0px; top: 0px;">
                    <img class="profile-picture" src="../assets\images/profile1.jpg" >
                </div>
                <div class="roomed-with-block" style="left: 0px; top: 0px;">
                    <img class="profile-picture" src="../assets\images/profile2.jpg" >
                </div>
                <div class="roomed-with-block" style="left: 0px; top: 0px;">
                    <img class="profile-picture" src="../assets\images/profile3.jpg" >
                </div>
                <div class="roomed-with-block" style="left: 0px; top: 0px;">
                    <img class="profile-picture" src="../assets\images/profile4.jpg" >
                </div>
                <div class="roomed-with-block" style="left: 0px; top: 0px;">
                    <img class="profile-picture" src="../assets\images/profile5.jpg" >
                </div>
                
            </div>
        </div>
            
        <div class="rectangle-3" id="rectangle-3" onclick="toggleEdit(['rectangle-3', 'rectangle-4', 'rectangle-5', 'rectangle-6', 'rectangle-7'])">
            <div class="edit-pencil-icon" ></div>
            
        </div>
        <div class="rectangle-8" >
            <div class="edit-pencil-icon"  onclick="editProfilePhoto()"></div>
        </div>
        <div class="ellipse-1" style="background: url('../images/<?php echo $picture ?>') center/cover;"></div>
       
        

        <div class="Name editable"><?php echo $profile[0]['first_name']." ".$profile[0]['last_name']; ?></div>


        <div class="janes-interests"><?php echo $profile[0]['first_name']."'s" ?> interests include...</div>
        
        <div class="rectangle-4 " id="rectangle-4">
            
        </div>
        
        <div class="drawing-painting editable"><?php echo $preference_comments[0]?></div>
        <div class="rectangle-5" id="rectangle-5"></div>
        
        <div class="watching-sitcoms editable"><?php echo $preference_comments[1]?></div>
        <div class="rectangle-6" id="rectangle-6"></div>
        
        <div class="video-gaming editable"><?php echo $preference_comments[2]?></div>
        <div class="rectangle-7" id="rectangle-7"></div>
        
        <div class="coding-late editable"><?php echo $preference_comments[3]?></div>
        <div class="ellipse-3"></div>
        <div class="ellipse-4"></div>
        <div class="ellipse-5"></div>
        <div class="janes-bio"><?php echo $profile[0]['first_name']."'s" ?> Bio</div>
        <div class="location">Location</div>

          <!-- Add a modal for the edit profile form -->
          <div id="edit-profile-modal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Edit Profile</h2>
                <form id="edit-profile-form" action="../actions/edit_profile.php" method="post">
                    <!-- Input field for bio -->
                    <label for="bio">Bio:</label><br>
                    <textarea id="bio" name="bio" rows="4" cols="50"></textarea><br>

                    <!-- Input fields for rectangle contents -->
                    <label for="rectangle-3-content">Interests:</label><br>


                    <!-- Input fields for other editable content -->
                    <label for="rectangle-4-content">Interest 1:</label><br>
                    <input type="text" id="rectangle-4-content" name="interest1"><br>

                    <label for="rectangle-5-content">Interest 2:</label><br>
                    <input type="text" id="rectangle-5-content" name="interest2"><br>

                    <label for="rectangle-6-content">Interest 3:</label><br>
                    <input type="text" id="rectangle-6-content" name="interest3"><br>

                    <label for="rectangle-7-content">Interest 4:</label><br>
                    <input type="text" id="rectangle-7-content" name="interest4"><br>

                    <label for="rectangle-3-content">Criteria:</label><br>

                    <label for="rectangle-10-content">Option 1:</label><br>
                    <input type="text" id="rectangle-10-content" name="criteria1"><br>

                    <label for="rectangle-11-content">Option 2:</label><br>
                    <input type="text" id="rectangle-11-content" name="criteria2"><br>

                    <label for="rectangle-12-content">Option 3:</label><br>
                    <input type="text" id="rectangle-12-content" name="criteria3"><br>

                    <label for="rectangle-13-content">Option 4:</label><br>
                    <input type="text" id="rectangle-13-content" name="criteria4"><br>


                    <input type="submit" name="submit-btn" value="Save Changes">
                </form>
            </div>
        </div>
        <div class="edit-profile">Edit Profile</div>

        <div class="view-profile">View Profile</div>
        <div class="delete-profile" onclick="deleteProfile()">Delete Profile</div>
        <div class="rating">Rating</div>
        <div class="janes-criteria"><?php echo $profile[0]['first_name']."'s" ?> Criteria</div>
        
        <div class="location-details editable">Eastern Region, Berekuso</div>
        <div class="line-1"></div>
        <div class="line-2"></div>

        <div class="star star-1">
            <svg width="21" height="19" viewBox="0 0 21 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.5 0L12.8574 7.25532H20.4861L14.3143 11.7394L16.6717 18.9947L10.5 14.5106L4.32825 18.9947L6.68565 11.7394L0.513906 7.25532H8.1426L10.5 0Z" fill="#7ED957"/>
                </svg>
        </div>
        <div class="star star-2">
            <svg width="21" height="19" viewBox="0 0 21 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.5 0L12.8574 7.25532H20.4861L14.3143 11.7394L16.6717 18.9947L10.5 14.5106L4.32825 18.9947L6.68565 11.7394L0.513906 7.25532H8.1426L10.5 0Z" fill="#7ED957"/>
                </svg>
                
        </div>
        <div class=" star star-3">
            <svg width="21" height="19" viewBox="0 0 21 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.5 0L12.8574 7.25532H20.4861L14.3143 11.7394L16.6717 18.9947L10.5 14.5106L4.32825 18.9947L6.68565 11.7394L0.513906 7.25532H8.1426L10.5 0Z" fill="#7ED957"/>
                </svg>
                
        </div>
        <div class="star star-4">
            <svg width="21" height="19" viewBox="0 0 21 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.5 0L12.8574 7.25532H20.4861L14.3143 11.7394L16.6717 18.9947L10.5 14.5106L4.32825 18.9947L6.68565 11.7394L0.513906 7.25532H8.1426L10.5 0Z" fill="#7ED957"/>
                </svg>
                
        </div>
        <div class="star star-5">
            <svg width="21" height="19" viewBox="0 0 21 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.5 1.61804L12.3819 7.40983L12.4941 7.75532H12.8574H18.9473L14.0205 11.3348L13.7266 11.5484L13.8388 11.8939L15.7207 17.6857L10.7939 14.1061L10.5 13.8926L10.2061 14.1061L5.27931 17.6857L7.16118 11.8939L7.27344 11.5484L6.97954 11.3348L2.05275 7.75532H8.1426H8.50587L8.61813 7.40983L10.5 1.61804Z" stroke="#7ED957"/>
            </svg>
        </div>
        <div class="rectangle-10">

            <p class="criteria editable"><?php echo $dislike_comments[0]?></p>
        </div>
        <div class="rectangle-11">
            <p class = "criteria editable"><?php echo $dislike_comments[1]?></p>

        </div>
        <div class="rectangle-13">
            
            <p class="criteria editable"><?php echo $dislike_comments[2]?></p>
        </div>
        <div class="rectangle-12">
            
            <p class="criteria editable"><?php echo $dislike_comments[3]?></p>
        </div>
        <div class="bio-content eidtable"><?php echo $profile[0]['bio']; ?></div>
    </div>

    <a href="../actions/logout.php" class="logout-button">Logout</a>

    <footer>
        <div>
          <a href="#">Privacy</a>
          <a href="#">Contact Us</a>
          <a href="#">About Us</a>
        </div>
      </footer>
      

    <script src="../js/User_profile.js"></script>

    <script>
    function deleteProfile() {
        if (confirm("Are you sure you want to delete your profile?")) {
            // Send AJAX request to delete_profile.php or any other endpoint
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "../actions/delete_profile.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    window.location.href = "../view/dashboard-prelogin.php?profile=deleted";
                }
            };
            xhr.send(); 
        }
    }
</script>


    

</body>
</html>
