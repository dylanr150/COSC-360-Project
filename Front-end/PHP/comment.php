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
        else
        {
            session_start();
            $username = $_SESSION["username"];
            $commentContent = $_POST["comment"];
            $creation_date = date("Y-m-d");
            $postID = $_SESSION["postID"];

            $sqlInsert = "INSERT INTO comments VALUES ('$postID', '$username', '$commentContent', '$creation_date');";
            mysqli_query($connection, $sqlInsert);

            echo "<p>Successfully posted. <a href = ../HTML/home.php>Return.</a></p>";
        
        }
    }
?>