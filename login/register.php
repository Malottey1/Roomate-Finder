<?php
    //establish connection with database
    include('../settings/connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/registration-styles.css">
    <title>Login Page</title>
    
</head>
<body>
    <header>
        <img src="../assets/images/5.png" alt="Logo" class="logo">
        <button id="signInButton" class="menu-button">Sign-In</button>
    </header>
        <div class="container">
            <div class="box">
                <div class="centered-logo">
                    <img src="../assets/images/3.png" alt="Logo" class="logo">
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
                        <label for="phone">Phone Number (optional):</label>
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
                        <label for="ethnicity">Ethnicity (optional):</label>
                        <input type="text" id="ethnicity" name="ethnicity" pattern="^[A-Za-z\s\-,']+$" required>
                    </div>
                    <div class="form-group">
                        <label for="profession">Profession or Student Status (optional):</label>
                        <input type="text" id="profession" name="profession">
                    </div>
                    <h2>Location:</h2>
                    <div class="form-group">
                        <label for="city">City:</label>
                        <input type="text" id="city" name="city" pattern="^[A-Za-z\s\-,']+$" required>
                    </div>
                    <div class="form-group">
                        <label for="state">State/Province:</label>
                        <input type="text" id="state" name="state" pattern="^[A-Za-z\s\-,']+$" required>
                    </div>
                    <div class="form-group">
                        <label for="country">Country (optional):</label>
                        <input type="text" id="country" name="country" pattern="^[A-Za-z\s\-,']+$" required>
                    </div>

                    <h2>Matching Preferences:</h2>
                        <div class="form-group">
                            <label for="moveInDate">Desired Move-in Date:</label>
                            <input type="date" id="moveInDate" name="moveInDate">
                        </div>
                        <div class="form-group">
                            <label for="housingType">Type of Housing Sought:</label>
                            <select id="housingType" name="housingType">
                                <option value="">Select Housing Type</option>
                                <option value="sharedApartment">Shared Apartment</option>
                                <option value="singleRoom">Single Room</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="amenities">Specific Amenities Desired:</label>
                            <textarea id="amenities" name="amenities" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="dealbreakers">Dealbreakers:</label>
                            <textarea id="dealbreakers" name="dealbreakers" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="compatibilityQuestions">Roommate Compatibility Questions:</label>
                            <textarea id="compatibilityQuestions" name="compatibilityQuestions" rows="4"></textarea>
                        </div>

                        <h2>Additional Information:</h2>
                        <div class="form-group">
                            <label for="bio">Short Bio:</label>
                            <textarea id="bio" name="bio" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="references">References (optional):</label>
                            <textarea id="references" name="references" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="socialMedia">Social Media Links (optional):</label>
                            <input type="text" id="socialMedia" name="socialMedia">
                        </div>
                            <button id="registerButton" type="submit">Submit</button>
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
                const city = document.getElementById('city').value.trim();
                const state = document.getElementById('state').value.trim();

            }
        
        </script>
        
        


</body>
</html>
