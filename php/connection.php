<?php

function connect() {
	$sever = "localhost";
	$username = "root";
	$password = "root";
	$db = "website";
	$conn = new mysqli($sever, $username, $password, $db);
	return $conn;
}

?>