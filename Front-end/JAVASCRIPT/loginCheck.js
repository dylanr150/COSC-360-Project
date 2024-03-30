function loginCheck(){
	fetch('../PHP/profile.php') // Adjust the path if necessary
    .then(response => response.text())
    .then(data => {
        // Assume truecheck should be true when there is data.
        var truecheck = data !== "";
        if(truecheck) {
            // Only update HTML if truecheck is true.
            loadProfile();
        } else {
            // This block now effectively checks if data is empty and handles redirection.
            window.alert("User is not logged in... redirecting to login page");
            window.location.href = "http://localhost/COSC-360-Project/Front-end/HTML/login.html";
        }
    })
    .catch(error => {
    });
}

window.onload = loginCheck();