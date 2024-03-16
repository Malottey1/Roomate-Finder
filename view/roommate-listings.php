<?php
    include("../actions/display_users_action.php");
    include("../actions/display_hostels_action.php");
    include("../actions/display_ethnic_group.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/roommate-listings.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" /> -->
    <title>Roomate Listings</title>
</head>
<body>
    <header>
        <img src="../assets/images/roommate_logo.png" alt="Logo" class="logo">
        <div class="user-info">
          <div class="notification-bell" id="notification-bell">
            <i class="fa fa-bell"></i> 
            <span class="notification-badge">3</span> 
          </div>
          <img src="../assets/images/profile_ako.jpg" alt="Profile Photo" class="profile-photo" id="profilePhoto">
        </div>
        
    </header>
    <div class="top">
        <div><img class="main-image" src="../assets/images/listings-main.jpg" alt="main image"></div>
        <div class="text">
            <div class="upper"><p>Find your next roommate</p></div>
            <div class="lower"><p>Like, dislike, or message the roommate of your choice</p></div>
        </div>
    </div>
    <div class="main">
        <div class="filter-container">
            <form id="filter-form">
                <div class="section">
                    <div><label><p>Gender</p></label></div>
                    <div class="gender-radio">
                        <input type="radio" id="male" name="gender" value="0">
                        <label for="male" style="font-weight: 300;">Male</label>
                        
                        <input type="radio" id="female" name="gender" value="1">
                        <label for="female" style="font-weight: 300;">Female</label>
                    </div>
                </div>
                  
                <div class="section">
                    <div><label for="budget"><p>Budget</p></label></div>
                    <div class="slider-container">
                        <div><input type="range" id="budget" name="budget" min="2000" max="10000"/></div>
                        <div class="max-label"><p id="budget-out">10000</p></div>
                    </div>
                </div>
                <div class="section">
                    <div><label for="age"><p>Age</p></label></div>
                    <div class="slider-container">
                        <div><input type="range" id="age" name="age" min="21" max="60"/></div>
                        <div class="max-label"><p id="age-out">50</p></div>
                    </div>
                </div>
                <div class="section">
                    <div><label for="hostel-check"><p>Hostel Occupying</p></label></div>
                    <div class="hostel-check">
                        <?php foreach ($hostels as $hostel): ?>
                            <div class="check-text">
                                <div><input type="checkbox" name="hostel[]" value="<?php echo $hostel['listing_id']; ?>"/></div>
                                <div><p><?php echo $hostel['hostel_name'] ?></p></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="section">
                    <div><label for="ethnicity-check"><p>Ethnicity</p></label></div>
                    <div class="ethnicity-check">
                        <?php foreach ($eth_groups as $group): ?>
                            <div class="check-text">
                                <div><input type="checkbox" name="ethnicity[]" value="<?php echo $group['eth_id']; ?>"/></div>
                                <div><p><?php echo $group['eth_name'] ?></p></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div><button class="submit-btn" name="submit-btn" type="submit"><p>Apply Filter</p></button></div>
                
            </form>
        </div>
        <div class="grid-container" id="grid-container">
            <?php
                $users = get_all_users();
                display_each_user($users);
            ?>
        </div>
    </div>
    <footer>
        <div>
          <a href="#">Privacy</a>
          <a href="#">Contact Us</a>
          <a href="#">About Us</a>
        </div>
      </footer>

      <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get the notification bell element
            const notificationBell = document.querySelector('.notification-bell');
    
            // Add a click event listener to the notification bell
            notificationBell.addEventListener('click', function() {
                // Redirect to the message.html page
                window.location.href = '../view/pre-message.html';
            });
        });



        // document.addEventListener('DOMContentLoaded', function() {
        //     // Get all elements with the class "send-btn"
        //     const sendButtons = document.querySelectorAll('.send-btn');

        //     // Add click event listener to each send button
        //     sendButtons.forEach(function(button) {
        //         button.addEventListener('click', function() {
        //             // Redirect to messages.html when a send button is clicked
        //             window.location.href = '../view/message.html';
        //         });
        //     });
        // });


        document.addEventListener('DOMContentLoaded', function() {
            // Get the logo element
            const logo = document.querySelector('.logo');

            // Add a click event listener to the logo
            logo.addEventListener('click', function() {
                // Redirect to dashboard-postlogin.html when the logo is clicked
                window.location.href = '../view/dashboard-postlogin.html';
            });
        });


        const profilePhoto = document.getElementById('profilePhoto');

        // Add a click event listener to the profile photo
        profilePhoto.addEventListener('click', function() {
            // Redirect to User_profile.html when the profile photo is clicked
            window.location.href = '../view/User_profile.html';
        });

        // Update values displayed for budget and age
        var budgetSlider = document.getElementById('budget');
        var budgetOut = document.getElementById('budget-out');
        var ageSlider = document.getElementById('age');
        var ageOut = document.getElementById('age-out');

        budgetOut.innerHTML = budgetSlider.value;
        ageOut.innerHTML = ageSlider.value;

        budgetSlider.oninput = function(){
            budgetOut.innerHTML = this.value;
        };

        ageSlider.oninput = function(){
            ageOut.innerHTML = this.value;
        };

        const filterForm = document.getElementById('filter-form');

        filterForm.addEventListener('submit', function(event){
            event.preventDefault();

            var formData = new FormData(this);

            var xhr = new XMLHttpRequest();
            xhr.open('POST', '../actions/filter_listings_action.php', true);
            xhr.setRequestHeader('Requested-With', 'XMLHttpRequest');
            xhr.onload = function(){
                if (xhr.status >= 200 && xhr.status < 400){
                    document.getElementById("grid-container").innerHTML = xhr.responseText;
                }
            };
            xhr.send(formData);
        })


    </script>
    
</body>
</html>