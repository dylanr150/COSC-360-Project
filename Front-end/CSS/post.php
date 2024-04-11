<!doctype html>
<?php
	session_start();
?>
<html>
  <head>
    <link rel="stylesheet" href="../CSS/reset.css">
    <link rel="stylesheet" href="../CSS/general.css">
    <link rel="stylesheet" href="../CSS/post.css">
	<script src="../JAVASCRIPT/loginCheck.js"></script>
	<script src="../JAVASCRIPT/post.js"></script>
    <title>Post</title>
  </head>
  <body>
	<div class="profileInformation" id="profileInformation"></div> 
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
      <div class = "post-container">
        <form action = "../PHP/post.php" method = "post" id="posting">
          <label for ="post-title">Title</label>
          <br>
          <input type="text" id="post-title" name="post-title" class ="required" maxlength="60">
          <br>
          <label for ="post-desc">Description</label>
          <br>
          <textarea id="post-desc" name="post-desc" class ="required" maxlength="9000"></textarea>
          <br>
          <label for="tag">Tag (Optional):</label>
          <select name = "tag" id = "tag">
              <option value="none">None</option>
              <option value="music">Music</option>
              <option value="sports">Sports</option>
              <option value="news">News</option>
          </select>
          <input id="submit-button" type="submit" value="Post">
        </form>
      </div>
    </main>
  </body>
</html>
