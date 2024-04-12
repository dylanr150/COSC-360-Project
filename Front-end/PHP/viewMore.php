<!doctype html>
<html>
<?php
	session_start();
?>
  <head>
    <link rel="stylesheet" href="../CSS/reset.css">
    <link rel="stylesheet" href="../CSS/general.css">
    <link rel="stylesheet" href="../CSS/home.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <title>Home</title>
  </head>
  <body>
	<div class="profileInformation" id="profileInformation"></div>
    <div class="header">
      <nav>
      <?php
			if(!isset($_SESSION["username"])){
			echo '<a href="../HTML/login.php"><button>Login</button></a>';
			echo '<a href="../HTML/register.php"><button>Register</button></a>';
			}
		?>

        <a href="../HTML/home.php"><button>Home</button></a>

    <?php
			if(isset($_SESSION["username"])){
			echo '<a href="../PHP/logout.php"><button>Logout</button></a>';
			echo '<a href="../HTML/profile.php"><button>Profile</button></a>';
			echo '<a href="../HTML/post.php"><button>Post</button></a>';
			}
		?>
      </nav>
    </div>
    <main>
      <div class = "postContainer">
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
            $user = $_POST["user"];
            $title = $_POST["title"];
            $content = $_POST["content"];
            $postID= $_POST["postID"];
            
            $_SESSION["postID"] = $postID;
            
            echo "<p class = 'post'>Posted By: $user</p>";
            echo "<h1 class = 'post' id = 'postTitle'>$title</h1>";
            echo "<p class = 'post' id = 'postDesc'>$content</p>";
            echo "<br><br><br>";

            // $results = mysqli_query($connection, $sql);
            
            // $row = mysqli_fetch_assoc($results);
            
            
            // echo "<a href='../PHP/viewMore.php'><input id='submit-button' type='submit' value='View More'><a>";
            
            // mysqli_free_result($results);
            // mysqli_close($connection);
            echo "<p class = 'post' style ='font-weight:bold'>Comments</p>";

            if(isset($_SESSION["username"])){
              echo "<form action='comment.php' method='post' class = 'post'>";
              echo "<label>Leave a Comment: </label>";
              echo "<br>";
              echo "<input type = 'text' name = 'comment' id='comment' placeholder='Enter a comment' maxlength='5000'>";
              echo "<input type='submit' id='postComment' value='Post'>";
              echo "</form>";
            }
			$isAdmin = $_SESSION["isAdmin"];
			// Check if isAdmin is set and true
			if (!isset($isAdmin) || $isAdmin == true) {
				echo '<form action="adminDelete.php" method="post", class="post">';
				echo '<button type="submit" id="delete-post">Delete Post</button>';
				echo '</form>';
			} 
          }
        ?>
        
      <?php
        $sql = "SELECT * FROM comments WHERE commentID = '$postID'";

        $results = mysqli_query($connection, $sql);
        
        while($row = mysqli_fetch_assoc($results)){
          $username = $row['user'] ?? [];
          $commentContent = $row['commentContent'] ?? [];

          echo "<br>";
          echo "<p class='post' style = 'font-size:1.5vh; font-weight:bold'>$username</p>";
          echo "<p class ='post'>$commentContent</p>";
          
          
        }

        mysqli_free_result($results);
        mysqli_close($connection);
      ?>
      </div>
      
    </main>
  </body>
</html>