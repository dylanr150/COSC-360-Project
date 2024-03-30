<!doctype html>
<html>
  <head>
    <link rel="stylesheet" href="../CSS/reset.css">
    <link rel="stylesheet" href="../CSS/general.css">
    <link rel="stylesheet" href="../CSS/home.css">
    <title>Home</title>
  </head>
  <body>
	<div class="profileInformation" id="profileInformation"></div>
    <div class="header">
      <nav>
        <a href="login.html"><button>Login</button></a>
        <a href="register.html"><button>Register</button></a>
        <a href="profile.html"><button>Profile</button></a>
        <a href="../HTML/home.php"><button>Home</button></a>
        <a href="post.html"><button>Post</button></a>
		<a href="../PHP/logout.php"><button>Logout</button></a>
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
            
           // $sql = "SELECT * FROM post WHERE postID = $count";
            
            $results = mysqli_query($connection, $sql);
            
            $row = mysqli_fetch_assoc($results);
            
            // echo "<p class = 'post'>Posted By: ".$row['user']."</p>";
            // echo "<h1 class = 'post' id = 'postTitle'>".$row['title']."</h1>";
            // echo "<p class = 'post' id = 'postDesc'>".$row['content']."</p>";
            // echo "<a href='../PHP/viewMore.php'><input id='submit-button' type='submit' value='View More'><a>";
            
            mysqli_free_result($results);
            mysqli_close($connection);
          }
        ?>
      </div>
      
    </main>
  </body>
</html>