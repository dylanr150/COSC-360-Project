<!doctype html>
<html>
<?php
	session_start();
?>
  <head>
    <link rel="stylesheet" href="../CSS/reset.css">
    <link rel="stylesheet" href="../CSS/general.css">
    <link rel="stylesheet" href="../CSS/register.css">
    <script src="../JAVASCRIPT/regCheck.js"></script>
    <script>
	function changeContent() {
		const regex1 = /[A-Z]/;
		const regex2 = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;


		var errorMessage = "";
		
		var username = document.getElementById("username");
		var email = document.getElementById("email")
		var firstName = document.getElementById("firstname");
		var lastName = document.getElementById("lastname")
		var password = document.getElementById("password");
        var verifyPassword = document.getElementById("verify_password");

		var usernameToCheck = username.value;
		var emailToCheck = email.value;
		var firstnameToCheck = firstName.value;
		var lastnameToCheck = lastName.value;
		var passwordToCheck = password.value;
		var verifiedPasswordToCheck = verifyPassword.value;
		
		if(usernameToCheck == ""){
			if(errorMessage == ""){
				errorMessage = errorMessage + "Username can not be empty!";
			} else {
				errorMessage = errorMessage + "<br>Username can not be empty!";
			}
		}

		if(emailToCheck == ""){
			if(errorMessage == ""){
				errorMessage = errorMessage + "Email can not be empty!";
			} else {
				errorMessage = errorMessage + "<br>Email can not be empty!";
			}
		}

		if(regex2.test(emailToCheck) == false){
			if(errorMessage == ""){
				errorMessage = errorMessage + "Email is invalid!";
			} else {
				errorMessage = errorMessage + "<br>Email is invalid";
			}
		}

		if(firstnameToCheck == ""){
			if(errorMessage == ""){
				errorMessage = errorMessage + "First name can not be empty!";
			} else {
				errorMessage = errorMessage + "<br>First name can not be empty!";
			}
		}

		if(lastnameToCheck == ""){
			if(errorMessage == ""){
				errorMessage = errorMessage + "Last name can not be empty!";
			} else {
				errorMessage = errorMessage + "<br>Last name can not be empty!";
			}
		}

		if(passwordToCheck !== verifiedPasswordToCheck){
			if(errorMessage == ""){
				errorMessage = errorMessage + "Passwords do not match!";
			} else {
				errorMessage = errorMessage + "<br>Passwords do not match!";
			}
		}

		if(passwordToCheck.length < 8){
			if(errorMessage == ""){
				errorMessage = errorMessage + "Password is not 8 characters long!";
			} else {
				errorMessage = errorMessage + "<br>Password is not 8 characters long!";
			}
		}

		if(regex1.test(passwordToCheck) == false){
			if(errorMessage == ""){
				errorMessage = errorMessage + "Password does not contain a capital letter!";
			} else {
				errorMessage = errorMessage + "<br>Password does not contain a capital letter!";
			}
		}

		if(errorMessage !== ""){
			document.getElementById("errorMessage").innerHTML = errorMessage;
		} else {
			document.getElementById("errorMessage").innerHTML = "";
		}

	}	
    </script>
    <title>Register</title>
  </head>
  <body>
    <div class="header">
      <nav>
	  <a href="login.php"><button>Login</button></a>
        <a href="register.php"><button>Register</button></a>
        <a href="home.php"><button>Home</button></a>
        
		<?php
			if(isset($_SESSION["username"])){
			echo '<a href="../PHP/logout.php"><button>Logout</button></a>';
			echo '<a href="profile.php"><button>Profile</button></a>';
			echo '<a href="post.php"><button>Post</button></a>';
			}
		?>
      </nav>
    </div class="header">
    <main>
      <div class="register-container">
        <h2 class="register-title">Register</h2>
        <br>
        <form id="register" action="../PHP/register.php" method="post">
          <label for="username">Username:</label>
          <input type="text" id="username" name="username" class="required" maxlength="20">
          <br>
          <label for="email">Email:</label>
          <input type="text" id="email" name="email" class="required" maxlength="40">
          <br>  
          <label for="firstname">First Name:</label>
          <input type="text" id="firstname" name="firstname" class="required" maxlength="20">
          <br>
          <label for="lastname">Last Name:</label>
          <input type="text" id="lastname" name="lastname" class="required" maxlength="20">
          <br>
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" class="required" maxlength="32">
          <br>
          <label for="verify_password">Verify Password:</label>
          <input type="password" id="verify_password" name="verify_password" class="required" maxlength="32">
          <br>
          <input type="submit" onclick="changeContent()" value="Register">
          <button onclick="location.href='login.html'" type="button">Cancel</button>
        </form>
		<p id="errorMessage"></p>
      </div>
    </main>
  </body>
</html>
