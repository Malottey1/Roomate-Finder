<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <script src = "https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <title>Login Page</title>
    
</head>
<body>
    <header>
        <img src="../assets/images/roommate_logo.png" alt="Logo" class="logo">
        <button class="menu-button" onclick="redirectToRegister()">Register</button>
    </header>
    <div class="container">
        <div class="centered-logo">
            <img src="../assets/images/3.png" alt="Logo" class="logo">
        </div>
        
        <div class="login-box">
            <h2>Login</h2>
            <form id="loginForm" method="post" action="../actions/login_user_action.php">
                <div class="input-group">
                    <label for="username">Email:</label>
                    <input type="text" id="username" name="username" pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" required>
                </div>
                <div class="input-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" minlength="8" required>
                </div>
                <div class="input-group checkbox-group">
                    <input type="checkbox" id="remember-me" name="remember-me">
                    <label for="remember-me">Remember me</label>
                </div>
                <div class="forgot-password">
                    <a href="#">Forgot password?</a>
                </div>

                <center><button name="login-btn" type="submit" id="loginButton">Login</button><center>

            </form>
        </div>
    </div>
<script>
    function redirectToRegister() {
        window.location.href = "../login/register.php"; 
    }
</script>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function (){
        <?php if (isset($_GET['msg']) && $_GET['msg'] == 'failed'): ?>
            swal('Error','Your email/password is incorrect!', 'error');
        <?php endif; ?>
    })

</script>
</html>