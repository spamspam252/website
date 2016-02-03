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

function get_posts($conn) {
	$query = "SELECT img,title,time,body,id FROM posts";
	$result = $conn->query($query);
	return $result->fetch_all();
}

function get_post($id, $conn) {
	$query = "SELECT img, title, time, body, src_link FROM posts WHERE id='$id' ";
	$result = $conn->query($query);
	return $result->fetch_assoc();
}

function check_post($id, $conn) {
	$query = "SELECT * FROM posts WHERE id='$id' ";
	return $result = $conn->query($query);
}

?>