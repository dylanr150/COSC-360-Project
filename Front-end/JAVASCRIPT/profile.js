// Function to fetch profile information from getProfile.php
function loadProfile() {
    fetch('../PHP/profile.php') // Adjust the path if necessary
    .then(response => response.text())
    .then(data => {
        // Assume truecheck should be true when there is data.
        var truecheck = data !== "";
        if(truecheck) {
            // Only update HTML if truecheck is true.
            document.getElementById('profileInformation').innerHTML = data;
        } 
    })
    .catch(error => {
        console.error('Error fetching profile data:', error);
        document.getElementById('profileInformation').innerHTML = 'Failed to load profile information.';
    });
}

// Call the function when the page loads

window.onload = loadProfile();


