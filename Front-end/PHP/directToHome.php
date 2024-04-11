<?php
session_start();
if(isset($_SESSION["username"])){
	header("Location: http://localhost/COSC-360-Project/Front-end/HTML/home.php", true, 301);
}
?>
