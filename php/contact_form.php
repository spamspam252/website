<?php
if (isset($_POST[contactSubmit])) {
	$contact[name] = validateData($_POST[contactName]);
	$contact[email] = validateData($_POST[contactEmail]);
	$contact[message] = validateData($_POST[contactMessage]);
	if (!$contact[name]) {
		$nameError = "Please I need to know your name!";
	}
	if (!$contact[email]) {
		$emailError = "I need this to reply you!";
	}
	if (!$contact[message]) {
		$messageError = "Soo what do you need to say?";
	}
	if ($contact[name] && $contact[email] && $contact[message]) {
		$conn = connect();

		if (send_message($contact, $conn)) {
			$messageSuccess = "Thank you! I'll reply as soon as I can!";
			$conn->close();
		} else {
			$messageFailed = "Failed to send a message! Please try again later" . $conn->error;
			$conn->close();
		}

	}
}
?>