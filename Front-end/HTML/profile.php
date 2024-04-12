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
  
  <body class = "all_posts">
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
        <div class="profileInformation" id="profileInformation">
          
        </div>
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
    <div class = "postContainer">
      <div class = "tagsContainer"> 
            <p><a id="allposts" href="profile.php">Posts</a> <a href="../PHP/commentsProfile.php">Comments</a></p>
      </div>
    <?php
          $host = "localhost";
          $database = "db_92331107";
          $user = "92331107";
          $password = "92331107";

          $connection = mysqli_connect($host, $user, $password, $database);
          $error = mysqli_connect_error();
          if($error != null)
          {
              $output = "<p>Unable to connect to database!</p>";
              exit($output);
          }
          else
          {
            $username = $_SESSION["username"] ?? [];
            $sql = "SELECT * FROM post WHERE user='$username' ORDER BY postID DESC";
            $delete = "";
            
            $results = mysqli_query($connection, $sql);   
             
            while($row = mysqli_fetch_assoc($results)){
              $user = $row['user'] ?? [];
              $title = $row['title'] ?? [];
              $content = $row['content'] ?? [];
              $postID = $row['postID'] ?? [];

              echo "<form method='post' action='../PHP/delete.php'>";
              echo "<p class = 'post'>Posted By: $user</p>";
              echo "<input type='hidden' value='$user' name = 'user'>";

              echo "<h1 class = 'post' id = 'postTitle'>$title</h1>";
              echo "<input type='hidden' value='$title' name = 'title'>";

              echo "<p class = 'post' id = 'postDesc'>$content</p>";
              echo "<input type='hidden' value='$content' name = 'content'>";

              echo "<input type='hidden' value='$postID' name = 'postID'>";

              echo "<input id='submit-button' type='submit' value='Delete'>";

              echo "</form>";
              
              
              
            }
            if(empty($postID)){
              echo "<p>You have no posts!</p>";
            }
            
            mysqli_free_result($results);
            mysqli_close($connection);
          }
        ?>
      </div>
    </body>
</html>