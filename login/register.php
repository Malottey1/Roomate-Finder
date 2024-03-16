<?php
    //establish connection with database
    include('../actions/display_hostels_action.php');
    include('../actions/display_ethnic_group.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/registration-styles.css">
    <title>Register Page</title>
    
</head>
<body>
    <header>
        <img src="../assets/images/roommate_logo.png" alt="Logo" class="logo">
        <button id="signInButton" class="menu-button">Sign-In</button>
    </header>
        <div class="container">
            <div class="box">
                <div class="centered-logo">
                    <img src="../assets/images/binoculars.png" alt="Logo" class="logo">
                </div>
                <h1>Let's start here!</h1>
                <h2>Personal Information:</h2>
                <form action="../actions/register_user_action.php" method="post">
                    <div class="form-group">
                        <label for="firstName">First Name:</label>
                        <input type="text" id="firstName" name="firstName" pattern="^[A-Za-z]+$" required>
                    </div>
                    <div class="form-group">
                        <label for="lastName">Last Name:</label>
                        <input type="text" id="lastName" name="lastName" pattern="^[A-Za-z]+$" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address:</label>
                        <input type="email" id="email" name="email" pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" required>
                    </div>
                    <div class="form-group">
                        <label for="passwrd">Password:</label>
                        <input type="password" id="passwrd" name="passwrd" minlength="8" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm-passwrd">Confirm Password:</label>
                        <input type="password" id="c-passwrd" name="confirm-passwrd" minlength="8" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number:</label>
                        <input type="tel" id="phone" name="phone" pattern="^\+?(\d[\d-. ]+)?(\([\d-. ]+\))?[\d-. ]+\d$" required>
                    </div>
                    <h2>Demographics:</h2>
                    <div class="form-group">
                        <label for="dateOfBirth">Date of Birth:</label>
                        <input type="date" id="dateOfBirth" name="dateOfBirth">
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <select id="gender" name="gender">
                            <option value="">Select Gender</option>
                            <option value="0">Male</option>
                            <option value="1">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ethnicity">Ethnicity:</label>
                        <select id="ethnicity" name=ethnicity required>
                            <?php foreach ($eth_groups as $group): ?>
                                <option value="<?php echo $group['eth_id']; ?>"><?php echo $group['eth_name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <h2>Location:</h2>
                    <div class="form-group">
                        <label for="hostel">Hostel Name:</label>
                        <select id="hostel" name="hostel" required>
                            <?php foreach ($hostels as $hostel): ?>
                                <option value="<?php echo $hostel['listing_id']; ?>"><?php echo $hostel['hostel_name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    

                    <h2>Matching Preferences:</h2>
                        <div class="form-group">
                            <label for="criteria1">Criteria 1:</label>
                            <textarea id="criteria1" name="criteria1" rows="4"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="criteria2">Criteria 2:</label>
                            <textarea id="criteria2" name="criteria2" rows="4"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="criteria3">Criteria 3:</label>
                            <textarea id="criteria3" name="criteria3" rows="4"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="criteria4">Criteria 4:</label>
                            <textarea id="criteria4" name="criteria4" rows="4"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="interests1">Interests 1:</label>
                            <textarea id="interests1" name="interests1" rows="4"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="interests2">Interests 2:</label>
                            <textarea id="interests2" name="interests2" rows="4"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="interests3">Interests 3:</label>
                            <textarea id="interests3" name="interests3" rows="4"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="interests4">Interests 4:</label>
                            <textarea id="interests4" name="interests4" rows="4"></textarea>
                        </div>
                        
                    


                        <h2>Additional Information:</h2>
                        <div class="form-group">
                            <label for="bio">Short Bio:</label>
                            <textarea id="bio" name="bio" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="socialMedia">Facebook Profile Link:</label>
                            <input type="text" id="socialMedia" name="socialMedia">
                        </div>
                            <button id="registerButton" name="submit-btn" type="submit">Submit</button>
                        </div>
                </form>
        </div>


        <script>
            // Function to validate the registration form
            function validateRegistrationForm() {
                // Get form input values
                const firstName = document.getElementById('firstName').value.trim();
                const lastName = document.getElementById('lastName').value.trim();
                const email = document.getElementById('email').value.trim();
                const dateOfBirth = document.getElementById('dateOfBirth').value.trim();
                const gender = document.getElementById('gender').value.trim();
                const hostel = document.getElementById('hostel').value.trim();

            }
        
        </script>
        
        


</body>
</html>
