<?php
if(isset($_SESSION["username"])){
	$firstname = $_SESSION["firstname"];
	$lastname = $_SESSION["lastname"];
	$username = $_SESSION["username"];
	$postcount = 0;
	$creation_date = $_SESSION["date"];
}else{
	header("Location: http://localhost/COSC-360-Project/Front-end/HTML/login.php", true, 301);
}
?>
