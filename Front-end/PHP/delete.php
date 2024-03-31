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
            $postToDelete = $_SESSION['postID'];

            echo "<p>Sorry something went wrong. Return to <a href='../HTML/home.php'>home</a></p>";

        }
    }

?>