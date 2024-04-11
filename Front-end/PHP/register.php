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
            $firstname = $_POST["firstname"];
            $lastname = $_POST["lastname"];
            $username = $_POST["username"];
            $email = $_POST["email"];
            $password = $_POST["password"];
			$creation_date = date("Y-m-d");
            $admin = 0;

            $sql = "SELECT username, email FROM user_info WHERE username = '$username' OR email = '$email';";
            $sqlInsert = "INSERT INTO user_info VALUES ('$username', '$email', md5('$password'), $admin,'$firstname','$lastname', '$creation_date');";

            $results = mysqli_query($connection, $sql);

            $row = mysqli_fetch_assoc($results);
            $dbUser = $row['username'] ?? [];
            $dbEmail = $row['email'] ?? [];
            
            if($username == $dbUser || $email == $dbEmail){
                echo "<p>User already exists with this name and/or email </p>";
                echo "<p><a href = ../html/register.php>Return to register</a></p>";
            }
            else if(empty($dbUser) == true || empty($dbEmail) == true){
                mysqli_query($connection, $sqlInsert);
                echo "<p>An account for user $username has been created. <a href = ../HTML/login.php>Click here to sign in.</a></p>";
            }



            mysqli_free_result($results);
            mysqli_close($connection);
    }
}

?>