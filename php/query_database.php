<?php

function send_message($data, $conn) {
	$query = "INSERT INTO message (name,email,message)
				VALUES ('$data[name]','$data[email]','$data[message]')";
	return $conn->query($query);
}

function send_newsletter($email, $conn) {
	$query = "INSERT INTO subscriber(email)
	VALUES ('$email')";
	return $conn->query($query);
}

?>