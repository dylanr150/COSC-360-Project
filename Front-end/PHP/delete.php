<?php
    if($_SERVER['REQUEST_METHOD'] == "GET"){
        exit("Cannot get data.");
    }
    else if($_SERVER['REQUEST_METHOD'] == "POST"){
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
            session_start();
            $postToDelete = $_POST['postID'];

            $sql = "DELETE FROM post WHERE postID = '$postToDelete'";
            $fkDisable = "SET FOREIGN_KEY_CHECKS=0";
            $fkEnable = "SET FOREIGN_KEY_CHECKS=1";
            
            mysqli_query($connection, $fkDisable);
            mysqli_query($connection, $sql);
            mysqli_query($connection, $fkEnable);

            $sql2 = "DELETE FROM comments WHERE commentID = '$postToDelete'";
            mysqli_query($connection, $sql2);

            echo "<p>Succesfully deleted. Return to <a href='../HTML/profile.php'>home</a></p>";

            mysqli_close($connection);
        }
    }

?>