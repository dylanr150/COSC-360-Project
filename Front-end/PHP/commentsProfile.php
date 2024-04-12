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
			echo '<a href="../HTML/login.php"><button>Login</button></a>';
			echo '<a href="../HTML/register.php"><button>Register</button></a>';
			}
		?>

        <a href="../HTML/home.php"><button>Home</button></a>

    <?php
    
			if(isset($_SESSION["username"])){
      echo '<a href="../HTML/profile.php"><button>Profile</button></a>';
			echo '<a href="../HTML/post.php"><button>Post</button></a>';
			echo '<a href="../PHP/logout.php"><button>Logout</button></a>';
			
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
            <p><a href="../HTML/profile.php">Posts</a> <a id="commentstag" href="commentsProfile.php">Comments</a></p>
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
            $sql = "SELECT * FROM post ORDER BY postID DESC";
          //  $sqlComments = "SELECT * FROM comments WHERE user='$username' ORDER BY creation_date DESC";
            $delete = "";
            
            $results = mysqli_query($connection, $sql);   
             
            while($row = mysqli_fetch_assoc($results)){
              $title = $row['title'] ?? [];
              $postID = $row['postID'] ?? [];

              $sqlComments = "SELECT * FROM comments WHERE commentID = '$postID' AND user = '$username' ORDER BY creation_date DESC";
              
              $results2 = mysqli_query($connection, $sqlComments);  

              while($row2 = mysqli_fetch_assoc($results2)){
                $username2 = $row2['user'] ?? [];
                $commentContent = $row2['commentContent'] ?? [];
                $commentSig = $row2['commentSig'] ?? [];
                
                echo "<form method='post' action='../PHP/deleteComment.php'>";

                echo "<br>";
                echo "<p class='post' style = 'font-size:1.5vh; font-weight:bold'>$username2 &nbsp&nbsp&nbsp&nbsp&nbsp From Post: $title</p>";
                echo "<p class ='post'>$commentContent</p>";

                echo "<input type='hidden' value='$commentSig' name = 'commentSig'>";

                echo "<input id='deleteBtn' type='submit' value='Delete'>";

                echo "</form>";
                
              }
              
              
              
            }
            if(empty($commentSig)){
              echo "<p>You have no comments!</p>";
            }
            
            mysqli_free_result($results);
            mysqli_close($connection);
          }
        ?>
      </div>
    </body>
</html>
