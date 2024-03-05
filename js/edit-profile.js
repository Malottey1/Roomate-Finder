
        // Function to dynamically populate the edit profile page with existing content
        function populateEditProfile() {
            document.getElementById('back-button').addEventListener('click', function() {
                window.location.href = '../view/User_profile.html';
            });

            document.getElementById('edit-profile-form').addEventListener('submit', function(event) {
                window.location.href = '../view/User_profile.html'
            
            console.log("Form submitted"); });
            // Extract content from user profile page and populate edit profile fields
            document.getElementById('bio').value = document.querySelector('.bio-content').textContent.trim();
            document.getElementById('rectangle-3-content').value = document.querySelector('.rectangle-3').textContent.trim();
            document.getElementById('rectangle-4-content').value = document.querySelector('.rectangle-4').textContent.trim();
            document.getElementById('rectangle-5-content').value = document.querySelector('.rectangle-5').textContent.trim();
            document.getElementById('rectangle-6-content').value = document.querySelector('.rectangle-6').textContent.trim();
            document.getElementById('rectangle-7-content').value = document.querySelector('.rectangle-7').textContent.trim();
            document.getElementById('rectangle-10-content').value = document.querySelector('.rectangle-10').textContent.trim();
            document.getElementById('rectangle-11-content').value = document.querySelector('.rectangle-11').textContent.trim();
            document.getElementById('rectangle-12-content').value = document.querySelector('.rectangle-12').textContent.trim();
            document.getElementById('rectangle-13-content').value = document.querySelector('.rectangle-13').textContent.trim();
            document.getElementById('location-details-content').value = document.querySelector('.location-details').textContent.trim();
            // Populate other input fields or text areas as needed
        }

        // Call the populateEditProfile function when the edit profile page loads
        window.addEventListener('load', function() {
            populateEditProfile();
        });

        // JavaScript to handle form submission and updating profile
        document.getElementById('edit-profile-form').addEventListener('submit', function(event) {
            event.preventDefault();
            // Get values from form fields
            var bio = document.getElementById('bio').value;
            var rectangle3Content = document.getElementById('rectangle-3-content').value;
            var rectangle4Content = document.getElementById('rectangle-4-content').value;
            var rectangle5Content = document.getElementById('rectangle-5-content').value;
            var rectangle6Content = document.getElementById('rectangle-6-content').value;
            var rectangle7Content = document.getElementById('rectangle-7-content').value;
            var rectangle10Content = document.getElementById('rectangle-10-content').value;
            var rectangle11Content = document.getElementById('rectangle-11-content').value;
            var rectangle12Content = document.getElementById('rectangle-12-content').value;
            var rectangle13Content = document.getElementById('rectangle-13-content').value;
            var locationDetailsContent = document.getElementById('location-details-content').value;
            // Get other values as needed

            // Update the profile on the server or local storage
            // For demonstration purposes, let's just log the values
            console.log("Bio:", bio);
            console.log("Rectangle 3 Content:", rectangle3Content);
            console.log("Rectangle 4 Content:", rectangle4Content);
            console.log("Rectangle 5 Content:", rectangle5Content);
            console.log("Rectangle 6 Content:", rectangle6Content);
            console.log("Rectangle 7 Content:", rectangle7Content);
            console.log("Rectangle 10 Content:", rectangle10Content);
            console.log("Rectangle 11 Content:", rectangle11Content);
            console.log("Rectangle 12 Content:", rectangle12Content);
            console.log("Rectangle 13 Content:", rectangle13Content);
            console.log("Location Details:", locationDetailsContent);
            // Update other profile information

            // Redirect back to user profile page
            window.location.href = '../view/User_profile.html';
        });
   