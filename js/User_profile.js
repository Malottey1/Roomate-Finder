// Get the modal
var modal = document.getElementById("edit-profile-modal");

// Get the button that opens the modal
var editProfileButton = document.querySelector(".edit-profile");

// Get the <span> element that closes the modal
var closeBtn = document.querySelector(".close");

// When the user clicks the button, open the modal 
editProfileButton.addEventListener('click', function() {
  modal.style.display = "block";
});

// When the user clicks on <span> (x), close the modal
closeBtn.addEventListener('click', function() {
  modal.style.display = "none";
});

// When the user clicks anywhere outside of the modal, close it
window.addEventListener('click', function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
});
j
// Function to handle uploading profile photo
function editProfilePhoto() {
    // Open a file dialog to let the user select a new photo
    var input = document.createElement('input');
    input.type = 'file';
    input.accept = 'image/*';

    // Handle file selection
    input.onchange = function(event) {
        var file = event.target.files[0];
        var reader = new FileReader();

        // Read the selected file as a data URL
        reader.onload = function() {
            var imageDataUrl = reader.result;

            // Update the profile picture in ellipse 1 with the new image
            var ellipse1ProfilePicture = document.querySelector('.ellipse-1');
            ellipse1ProfilePicture.style.backgroundImage = 'url(' + imageDataUrl + ')';
        };

        // Read the selected file
        reader.readAsDataURL(file);
    };

    // Trigger the file dialog
    input.click();
}

// Add event listener to the edit profile photo icon
var editProfilePhotoIcon = document.querySelector('.rectangle-8 .edit-pencil-icon');
editProfilePhotoIcon.addEventListener('click', function() {
    editProfilePhoto();
});
// Get all star elements
var stars = document.querySelectorAll('.star-1, .star-2, .star-3, .star-4, .star-5');

// Function to handle star click event
function handleStarClick(event) {
    var star = event.currentTarget;
    var starIndex = Array.from(stars).indexOf(star) + 1; // Get the index of the clicked star
    var fillColor = "#FFFFFF"; // Default fill color is white

    // Check if the star is currently filled
    var isFilled = star.querySelector("path").getAttribute("fill") === "#7ED957";

    // Toggle fill color based on current state
    if (isFilled) {
        fillColor = "#FFFFFF"; // Change to white if currently filled
    } else {
        fillColor = "#7ED957"; // Change to green if currently not filled
    }

    // Update fill color of the star
    star.querySelector("path").setAttribute("fill", fillColor);
}

// Add click event listener to each star
stars.forEach(function(star) {
    star.addEventListener('click', handleStarClick);
});

