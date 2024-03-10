<?php
    include("../actions/display_users_action.php");
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
            <form action="#" method="#">
                <div class="section">
                    <div><label><p>Gender</p></label></div>
                    <div class="gender-radio">
                        <input type="radio" id="male" name="gender" value="male">
                        <label for="male" style="font-weight: 300;">Male</label>
                        
                        <input type="radio" id="female" name="gender" value="female">
                        <label for="female" style="font-weight: 300;">Female</label>
                    </div>
                </div>
                  
                <div class="section">
                    <div><label for="budget"><p>Budget</p></label></div>
                    <div><input type="range" name="budget" min="2000" max="10000"/></div>
                </div>
                <div class="section">
                    <div><label for="age"><p>Age</p></label></div>
                    <div><input type="range" name="age" min="21" max="50"/></div>
                </div>
                <div class="section">
                    <div><label for="move-in-date"><p>Move in Date</p></label></div>
                    <div class="move-in-check">
                        <div class="check-text">
                            <div><input type="radio" name="move-in-date" value="jan"></div>
                            <div><p>Jan</p></div>
                        </div>
                        <div class="check-text">
                            <div><input type="radio" name="move-in-date" value="feb"></div>
                            <div><p>Feb</p></div>
                        </div>
                        <div class="check-text">
                            <div><input type="radio" name="move-in-date" value="mar"></div>
                            <div><p>Mar</p></div>
                        </div>
                        <div class="check-text">
                            <div><input type="radio" name="move-in-date" value="apr"></div>
                            <div><p>Apr</p></div>
                        </div>
                        <div class="check-text">
                            <div><input type="radio" name="move-in-date" value="may"></div>
                            <div><p>May</p></div>
                        </div>
                        <div class="check-text">
                            <div><input type="radio" name="move-in-date" value="jun"></div>
                            <div><p>Jun</p></div>
                        </div>
                        <div class="check-text">
                            <div><input type="radio" name="move-in-date" value="jul"></div>
                            <div><p>Jul</p></div>
                        </div>
                        <div class="check-text">
                            <div><input type="radio" name="move-in-date" value="aug"></div>
                            <div><p>Aug</p></div>
                        </div>
                        <div class="check-text">
                            <div><input type="radio" name="move-in-date" value="sep"></div>
                            <div><p>Sep</p></div>
                        </div>
                        <div class="check-text">
                            <div><input type="radio" name="move-in-date" value="oct"></div>
                            <div><p>Oct</p></div>
                        </div>
                        <div class="check-text">
                            <div><input type="radio" name="move-in-date" value="nov"></div>
                            <div><p>Nov</p></div>
                        </div>
                        <div class="check-text">
                            <div><input type="radio" name="move-in-date" value="dec"></div>
                            <div><p>Dec</p></div>
                        </div>
                    </div>
                </div>
                <div class="section">
                    <div><label for="lease-duration"><p>Lease Duration</p></label></div>
                    <div class="lease-duration">
                        <div class="check-text">
                            <div><input type="radio" name="lease-duration" value="monthly"></div>
                            <div><p>Month-to-month</p></div>
                        </div>
                        <div class="check-text">
                            <div><input type="radio" name="lease-duration" value="4-months"></div>
                            <div><p>4-months</p></div>
                        </div>
                        <div class="check-text">
                            <div><input type="radio" name="lease-duration" value="6-months"></div>
                            <div><p>6-months</p></div>
                        </div>
                        <div class="check-text">
                            <div><input type="radio" name="lease-duration" value="12-months"></div>
                            <div><p>1 Year</p></div>
                        </div>
                    </div>
                </div>
                <div class="section">
                    <div><label for="pets"><p>Pets</p></label></div>
                    <div class="lease-duration">
                        <div class="check-text">
                            <div><input type="radio" name="pets" value="none"></div>
                            <div><p>No pets</p></div>
                        </div>
                        <div class="check-text">
                            <div><input type="radio" name="pets" value="dogs"></div>
                            <div><p>Dogs</p></div>
                        </div>
                        <div class="check-text">
                            <div><input type="radio" name="pets" value="cats"></div>
                            <div><p>Cats</p></div>
                        </div>
                        <div class="check-text">
                            <div><input type="radio" name="pets" value="12-months"></div>
                            <div><p>Pet-friendly</p></div>
                        </div>
                    </div>
                </div>
                <div><button class="submit-btn" name="submit-btn" type="submit"><p>Apply Filter</p></button></div>
                

            </form>
        </div>
        <?php
            foreach ($users as $user){
                echo $user['first_name'];
            }
        ?>
        <div class="grid-container">
            <div class="card">
                <div><img src="../assets/images/Rectangle 38.jpg" alt="card image"></div>
                <div class="lower">
                    <div><p class="name">Melanin Doe</p></div>
                    <div class="icons">
                        <div style="margin-right: 10px;" class="material-symbols-outlined send-btn">send</div>
                        <div class="material-symbols-outlined">thumb_down</div>
                    </div>
                </div>
                <div><p class="location">Dufiex Annex, GHS 7000</p></div>
            </div>
            <div class="card">
                <div><img src="../assets/images/Rectangle 39.jpg" alt="card image"></div>
                <div class="lower">
                    <div><p class="name">Melanin Doe</p></div>
                    <div class="icons">
                        <div style="margin-right: 10px;" class="material-symbols-outlined send-btn">send</div>
                        <div class="material-symbols-outlined">thumb_down</div>
                    </div>
                </div>
                <div><p class="location">Dufiex Annex, GHS 7000</p></div>
            </div>
            <div class="card">
                <div><img src="../assets/images/Rectangle 40.jpg" alt="card image"></div>
                <div class="lower">
                    <div><p class="name">Melanin Doe</p></div>
                    <div class="icons">
                        <div style="margin-right: 10px;" class="material-symbols-outlined send-btn">send</div>
                        <div class="material-symbols-outlined">thumb_down</div>
                    </div>
                </div>
                <div><p class="location">Dufiex Annex, GHS 7000</p></div>
            </div>
            <div class="card">
                <div><img src="../assets/images/Rectangle 41.jpg" alt="card image"></div>
                <div class="lower">
                    <div><p class="name">Melanin Doe</p></div>
                    <div class="icons">
                        <div style="margin-right: 10px;" class="material-symbols-outlined send-btn">send</div>
                        <div class="material-symbols-outlined">thumb_down</div>
                    </div>
                </div>
                <div><p class="location">Dufiex Annex, GHS 7000</p></div>
            </div>
            <div class="card">
                <div><img src="../assets/images/Rectangle 42.jpg" alt="card image"></div>
                <div class="lower">
                    <div><p class="name">Melanin Doe</p></div>
                    <div class="icons">
                        <div style="margin-right: 10px;" class="material-symbols-outlined send-btn">send</div>
                        <div class="material-symbols-outlined">thumb_down</div>
                    </div>
                </div>
                <div><p class="location">Dufiex Annex, GHS 7000</p></div>
            </div>
            <div class="card">
                <div><img src="../assets/images/Rectangle 43.jpg" alt="card image"></div>
                <div class="lower">
                    <div><p class="name">Melanin Doe</p></div>
                    <div class="icons">
                        <div style="margin-right: 10px;" class="material-symbols-outlined send-btn">send</div>
                        <div class="material-symbols-outlined">thumb_down</div>
                    </div>
                </div>
                <div><p class="location">Dufiex Annex, GHS 7000</p></div>
            </div>
            <div class="card">
                <div><img src="../assets/images/Rectangle 44.jpg" alt="card image"></div>
                <div class="lower">
                    <div><p class="name">Melanin Doe</p></div>
                    <div class="icons">
                        <div style="margin-right: 10px;" class="material-symbols-outlined send-btn">send</div>
                        <div class="material-symbols-outlined">thumb_down</div>
                    </div>
                </div>
                <div><p class="location">Dufiex Annex, GHS 7000</p></div>
            </div>
            <div class="card">
                <div><img src="../assets/images/Rectangle 45.jpg" alt="card image"></div>
                <div class="lower">
                    <div><p class="name">Melanin Doe</p></div>
                    <div class="icons">
                        <div style="margin-right: 10px;" class="material-symbols-outlined">send</div>
                        <div class="material-symbols-outlined">thumb_down</div>
                    </div>
                </div>
                <div><p class="location">Dufiex Annex, GHS 7000</p></div>
            </div>
            <div class="card">
                <div><img src="../assets/images/Rectangle 46.jpg" alt="card image"></div>
                <div class="lower">
                    <div><p class="name">Melanin Doe</p></div>
                    <div class="icons">
                        <div style="margin-right: 10px;" class="material-symbols-outlined">send</div>
                        <div class="material-symbols-outlined">thumb_down</div>
                    </div>
                </div>
                <div><p class="location">Dufiex Annex, GHS 7000</p></div>
            </div>
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



        document.addEventListener('DOMContentLoaded', function() {
            // Get all elements with the class "send-btn"
            const sendButtons = document.querySelectorAll('.send-btn');

            // Add click event listener to each send button
            sendButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    // Redirect to messages.html when a send button is clicked
                    window.location.href = '../view/message.html';
                });
            });
        });


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


    </script>
    
</body>
</html>