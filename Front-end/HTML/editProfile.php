<!doctype html>
<html>
<?php
	session_start();
?>
  <head>
    <link rel="stylesheet" href="../CSS/reset.css">
    <link rel="stylesheet" href="../CSS/general.css">
    <link rel="stylesheet" href="../CSS/editProfile.css">
	<script src="../JAVASCRIPT/loginCheck.js"></script>
    <title>Edit Profile</title>
  </head>
  <body>
    <div class="header">
      <nav>
	  <?php
			if(!isset($_SESSION["username"])){
			echo '<a href="login.php"><button>Login</button></a>';
			echo '<a href="register.php"><button>Register</button></a>';
			}
		?>
        <a href="profile.php"><button>Profile</button></a>
        <a href="home.php"><button>Home</button></a>
        <a href="post.php"><button>Post</button></a>
		<?php
			if(isset($_SESSION["username"])){
			echo '<a href="../PHP/logout.php"><button>Logout</button></a>>';
			}
		?>
		<a href="../PHP/logout.php"><button>Logout</button></a>>
		</form>
      </nav>
    </div class="header">
    <main>
      <div class="mainBody">
        <div class="editProfile-container">
          <div class="editProfile-parameters">
            <h2>Username:</h2>
            <h2>Email:</h2>
            <h2>Firstname:</h2>
            <h2>Lastname:</h2>
            <h2>Password:</h2>
          </div>
          <div class="editProfile-data">
            <h3>ExampleUsername</h3>
            <h3>ExampleEmail@ExampleEmail.com</h3>
            <h3>Firstname</h3>
            <h3>Lastname</h3>
            <h3>***************</h3>
          </div>
          <div class="editProfile-buttons">
            <button class="generalButton">Change Username</button>
            <button class="generalButton">Change Email</button>
            <button class="generalButton">Change Firstname</button>
            <button class="generalButton">Change Lastname</button>
            <button class="generalButton">Change Password</button>
          </div>
        </div>
      </div>
    </main>
  </body>
</html>
