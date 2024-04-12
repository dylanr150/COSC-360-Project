<?php
    if($_SERVER['REQUEST_METHOD'] == "GET"){
        exit("Cannot get data.");
    }
    else if($_SERVER['REQUEST_METHOD'] == "POST"){
        session_start(); // Start the session at the beginning
		$isAdmin = $_SESSION["isAdmin"];
        // Check if isAdmin is set and true
		if (!isset($isAdmin) || $isAdmin == false) {
			echo "<p>You do not have the necessary permissions to perform this action.</p>";
			exit;
		} 
        
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
        else{
            $postToDelete = $_SESSION['postID'];

            // Disable foreign key checks to allow deletion
            $fkDisable = "SET FOREIGN_KEY_CHECKS=0";
            $fkEnable = "SET FOREIGN_KEY_CHECKS=1";
            
            mysqli_query($connection, $fkDisable);
            if(mysqli_query($connection, "DELETE FROM post WHERE postID = '$postToDelete'")) {
                // If the post is deleted successfully, then delete related comments
                mysqli_query($connection, "DELETE FROM comments WHERE commentID = '$postToDelete'");
            }
            mysqli_query($connection, $fkEnable);

            echo "<p>Succesfully deleted. Return to <a href='../HTML/profile.php'>home</a></p>";

            mysqli_close($connection);
        }
    }
?>
