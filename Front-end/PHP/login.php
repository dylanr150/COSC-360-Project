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
            $email = $_POST["email"];
            $password = md5($_POST["password"]);

            $sql = "SELECT * FROM user_info WHERE email = '$email' AND password = '$password';";

            $results = mysqli_query($connection, $sql);

            $row = mysqli_fetch_assoc($results);

            $dbEmail = $row['email'] ?? [];
            $dbPass = $row['password'] ?? [];

            if($email == $dbEmail && $password == $dbPass){
                echo "<p>Valid Account, signed in.</p>";
            }
            else if(empty($dbEmail) == true || empty($dbPass) == true){
                echo "<p>Invalid email and/or password.</p>";
            }

            mysqli_free_result($results);
            mysqli_close($connection);
        }
    }



?>