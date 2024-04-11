
<!doctype html>
<html>
<?php
	session_start();
?>
  <head>
    <link rel="stylesheet" href="../CSS/reset.css">
    <link rel="stylesheet" href="../CSS/general.css">
    <link rel="stylesheet" href="../CSS/home.css">
    <title>Home</title>
  </head>
  <body class = "all_posts">
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
    </div>
    <main>
      <div class = "postContainer">
        <div class = "tagsContainer"> 
          <p>View By Tags: <a id="allposts" href="home.php">All Posts</a> <a href="../PHP/music.php">Music</a> <a href="../PHP/sports.php">Sports</a> <a href="../PHP/news.php">News</a></p>
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
            $sql = "SELECT * FROM post ORDER BY postID DESC";
            $sqlUsers = "SELECT * FROM user_info WHERE admin = 1";
            $delete = "";
            
            $results = mysqli_query($connection, $sql);
            $results2 = mysqli_query($connection, $sqlUsers);
            $row2 = mysqli_fetch_assoc($results2);
            
            $user;
            $username = $_SESSION["username"] ?? [];
            while($row = mysqli_fetch_assoc($results)){
              $user = $row['user'] ?? [];
              echo "<p class = 'post'>Posted By: ".$row['user']."</p>";
              echo "<h1 class = 'post' id = 'postTitle'>".$row['title']."</h1>";
              echo "<p class = 'post' id = 'postDesc'>".$row['content']."</p>";
              echo "<input id='submit-button' type='submit' value='View More'>";
              $id = $row['postID'];
              
              if($user == $username){
                $_SESSION['postID'] = $row['postID']; 
                echo "<form action='../PHP/delete.php' method='post'><input id='submit-button' type='submit' value='Delete'></form>";
              }
              
            }
            mysqli_free_result($results);
            mysqli_close($connection);
          }
        ?>
      </div>
      
    </main>
  </body>
</html>
