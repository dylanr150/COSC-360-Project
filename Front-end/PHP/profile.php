<?php
session_start();
if(isset($_SESSION["username"])){
	$firstname = $_SESSION["firstname"];
	$lastname = $_SESSION["lastname"];
	$username = $_SESSION["username"];
	$postcount = 0;
	$creation_date = $_SESSION["date"];
	echo '<h1 class="profileInformationItem" id="username">Username: ' . $username . '</h1>';
	echo '<h1 class="profileInformationItem" id="username">Firstname: ' . $firstname . '</h1>';
	echo '<h1 class="profileInformationItem" id="username">Lastname: ' . $lastname . '</h1>';
	echo '<h2 class="profileInformationItem" id="postCount">Total Posts: ' . $postcount . '</h2>';
	echo '<h2 class="profileInformationItem" id="creationDate">Member Since: ' . $creation_date . '</h2>';
}
?>