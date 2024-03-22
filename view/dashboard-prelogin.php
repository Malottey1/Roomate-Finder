<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="../css/dashboard.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap">
<script src = "https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
<title>Dashboard</title>

</head>
<body>
<header>
  <img src="../assets/images/roommate_logo.png" alt="Logo" class="logo">
  <div class="buttons">
    <button id="registerButton" class="register-button">Register</button>
    <button id="loginButton" class="login-button">Login</button>
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


<center><button class="get-started-button" id="getStartedButton">Get Started</button></center>>


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
    <a href="https://clatteymolcolm4.wixsite.com/roommatefinder">About Us</a>
  </div>
</footer>

<script>
  document.addEventListener("DOMContentLoaded", function (){
    <?php if (isset($_GET['profile']) && $_GET['profile'] == 'deleted'): ?>
        swal('Success','Your profile has been deleted', 'success');
    <?php endif; ?>
  })

  const registerButton = document.getElementById('registerButton');
  registerButton.addEventListener('click', function() {
    window.location.href = '../login/register.php';
  });

  const loginButton = document.getElementById('loginButton');
  loginButton.addEventListener('click', function() {
    window.location.href = '../login/login.php';
  });

  const findRoommateBtn = document.getElementById('findRoommateBtn');
  findRoommateBtn.addEventListener('click', function() {
      window.location.href = '../login/login.php';
  });

  document.getElementById("getStartedButton").addEventListener("click", function() {
    window.location.href = "../login/login.php";
  });
</script>


</body>
</html>
