<!doctype html>
<html>
<?php
	session_start();
?>
<?php
	include '../PHP/loginCheck.php'
?>
  <head>
    <link rel="stylesheet" href="../CSS/reset.css">
    <link rel="stylesheet" href="../CSS/general.css">
    <link rel="stylesheet" href="../CSS/profile.css">
	<script src="../JAVASCRIPT/loginCheck.js"></script>
	<script src="../JAVASCRIPT/profile.js"></script>
    <title>Profile</title>
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
    </div class="header">
    <main>
      <div class="mainHeader">
        <div class="mainHeaderLeft">
          <div class="profilePicture">
          
          </div>
          <div class="profileInformation" id="profileInformation"></div>
        </div>
        <div class="mainHeaderRight">
          <a href="editProfile.html"><button class="generalButton" id="editProfileButton">Edit Profile</button></a>
        </div>
      </div>
      <div class="mainBody">
        
      </div>
      <div class="mainFooter">
        

        </div>
      </div>
     
    </main>

    </body>
</html>
