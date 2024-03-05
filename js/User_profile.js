
function goToEditProfile() {
    window.location.href = '../view/edit-profile.html';
}

// Event listener for clicking on profile images
const profileImages = document.querySelectorAll('.roomed-with-block img');
profileImages.forEach(image => {
    image.addEventListener('click', () => {
        const profileName = prompt("Enter profile name:");
        if (profileName !== null) {
            console.log('Viewing profile:', profileName);
        }
    });
});

// Event listener for clicking on stars
const stars = document.querySelectorAll('.star');
stars.forEach((star, index) => {
    star.addEventListener('click', () => {
        const rating = index + 1;
        console.log('Rating:', rating);
    });
});

// Event listener for clicking on the "Delete Profile" button
const deleteProfileButton = document.querySelector('.delete-profile');
deleteProfileButton.addEventListener('click', () => {
    const confirmation = confirm("Are you sure you want to delete your profile?");
    if (confirmation) {
        console.log('Profile deleted.');
    }
});

// Event listener for clicking on the "View Profile" button
const viewProfileButton = document.querySelector('.view-profile');
viewProfileButton.addEventListener('click', () => {
    console.log('Viewing profile...');
    // Add logic to navigate to the view profile page or show profile details
});



function toggleEdit(elementIds) {
    elementIds.forEach(elementId => {
        var element = document.getElementById(elementId);
        if (element) {
            element.contentEditable = element.contentEditable === 'true' ? 'false' : 'true';
        }
    });
}

// Update the event listeners for edit pencils
var editPencilIcons = document.querySelectorAll('.edit-pencil-icon');
editPencilIcons.forEach(icon => {
    icon.addEventListener('click', function(event) {
        var parentElementId = event.target.parentElement.id;
        toggleEdit([parentElementId]);
    });
});

// Update the editProfilePhoto function to target the correct element
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

            // Update the profile photo with the new image
            var profilePicture = document.querySelector('.profile-picture');
            profilePicture.style.backgroundImage = 'url(' + imageDataUrl + ')';
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

// Add event listeners to rectangles 1, 2, and 3
var rectangle1 = document.getElementById('rectangle-1');
var rectangle2 = document.getElementById('rectangle-2');
var rectangle3 = document.getElementById('rectangle-3');

rectangle1.addEventListener('click', function() {
    toggleEdit(['rectangle-1']);
});
rectangle2.addEventListener('click', function() {
    toggleEdit(['rectangle-2']);
});
rectangle3.addEventListener('click', function() {
    toggleEdit(['rectangle-3']);
});
