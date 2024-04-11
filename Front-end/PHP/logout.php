<?php
session_start();
	unset($_SESSION["email"]);
	unset($_SESSION["username"]);
	unset($_SESSION["firstname"]);
	unset($_SESSION["lastname"]);
	unset($_SESSION["date"]);
	header("Location: http://localhost/COSC-360-Project/Front-end/HTML/login.php");
session_destroy();
?>