<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="../css/dashboard.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="path/to/fonts/fontawesome-all.min.css">

<title>Dashboard</title>

</head>
<body>
<header>
  <img src="../assets/images/roommate_logo.png" alt="Logo" class="logo">
  <div class="user-info">

    <div class="notification-bell" id="notificationBell">
      <i class="fa fa-bell"></i> 
      <span class="notification-badge">3</span> 
    </div>
    <img src="../assets/images/profile-photo.jpeg" alt="Profile Photo" class="profile-photo" id="profilePhoto">

  </div>
  
</header>

<div class="main">
  <div class="main-image"><img src="../assets/images/dashboard-image-1.png" alt="Centered Image" class="centered-image"></div>
  <div class="btn-container"><button id="findRoommateBtn">Find a roommate</button></div>
</div>

<div class="horizontal-strip">
  <p>Finding a roommate should be stress-free</p>
</div>

<h2 class="heading">SUGGESTED ROOMMATES</h2>

<div class="image-container">
  <div class="image-details">
    <img src="../assets/images/portrait1.jpg" alt="Portrait 1">
    <p style="margin-left: 41px; font-weight: bolder;">Jane Doe</p>
    <p style="margin-left: 41px; margin-top: -20px;">Hosanna</p>
  </div>
  <div class="image-details">
    <img src="../assets/images/portrait2.jpg" alt="Portrait 2">
    <p style="margin-left: 41px; font-weight: bolder;">Samantha Payton</p>
    <p style="margin-left: 41px; margin-top: -20px;">Charlotte</p>
  </div>
  <div class="image-details">
    <img src="../assets/images/portrait3.jpg" alt="Portrait 3">
    <p style="margin-left: 41px; font-weight: bolder;">Mychaela Johnson</p>
    <p style="margin-left: 41px; margin-top: -20px;" >Dufie Annex</p>
  </div>
</div>



<center><button class="get-started-button" id="getStartedButton">Get Started</button></center>



<div class="horizontal-strip">
  <p>Roommate search simplied</p>
</div>

<div class="content-container">
  <div class="content-item" style="margin-top: 30px;">
    <div><img src="../assets/images/img1.png" alt="Image 1"></div>
    <div><p>Matching Lifestyles</p></div>
  </div>
  <div class="content-item">
    <div><img src="../assets/images/img2.png" alt="Image 2"></div>
    <div><p>Saves Time</p></div>
  </div>
  <div class="content-item">
    <div><img src="../assets/images/img3.png" alt="Image 3" style="width: 90px;";></div>
    <div><p >New Friendships</p></div>
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
  // Get the notification bell element
  const notificationBell = document.getElementById('notificationBell');

  // Add a click event listener to the notification bell
  notificationBell.addEventListener('click', function() {
      // Redirect to the message.html page
      window.location.href = '../view/message.html';
  });

  // Get the Get Started button element
  const getStartedButton = document.getElementById('getStartedButton');

  // Add a click event listener to the Get Started button
  getStartedButton.addEventListener('click', function() {
      // Redirect to the roommate-listings.html page
      window.location.href = '../view/roommate-listings.php';
    });
  
    const profilePhoto = document.getElementById('profilePhoto');

  // Add a click event listener to the profile photo
  profilePhoto.addEventListener('click', function() {
      // Redirect to User_profile.html when the profile photo is clicked
      window.location.href = '../view/User_profile.php';
  });

  const findRoommateBtn = document.getElementById('findRoommateBtn');

  findRoommateBtn.addEventListener('click', function() {
      window.location.href = '../view/roommate-listings.php';
  });
</script>

</body>
</html>
