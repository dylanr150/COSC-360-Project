<!doctype html>
<?php
	session_start();
?>
<html>
	<script src="../JAVASCRIPT/loginCheck.js"></script>
	<head>
		<link rel="stylesheet" href="../CSS/reset.css">
    	<link rel="stylesheet" href="../CSS/general.css">
    	<link rel="stylesheet" href="../CSS/login.css">
		<script src="../JAVASCRIPT/loginCheck.js"></script>
    	<title>Login</title>
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
      	</nav>
    	</div>
    	<main>
      	<div class="login-container">
       		<h2 class="login-title">Login</h2>
       		<br>
        	<form action="../PHP/login.php" method="post">
           		<label for="email">Email:</label>
           		<input type="text" id="email" name="email" required>
           		<br>
           		<label for="password">Password:</label>
           		<input type="password" id="password" name="password" required>
           		<br>
          		<input id="submit-button" type="submit" value="Login">
       		</form>
    		<br>
        	<div class="register-link">
          		<p>Don't have an account? <a href="register.html">Register</a></p>
        	</div>
      	</div>
    	</main>
  	</body>
</html>
