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
            $title = $_POST["post-title"];
            $content = $_POST["post-desc"];
            $creation_date = date("Y-m-d");
            $tag = $_POST["tag"];

            $sql = "SELECT * FROM post";
            $result =  mysqli_query($connection, $sql);
            $rowcount = mysqli_num_rows($result);
            $postid = $rowcount + 1;

            $sqlInsert = "INSERT INTO post VALUES ('$username', '$postid', '$title', '$content', '$creation_date', '$tag');";

            mysqli_query($connection, $sqlInsert);

            echo "<p>Successfully posted. <a href = ../HTML/post.php>Return.</a></p>";

            mysqli_close($connection);
        }
    }





?>