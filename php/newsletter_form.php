<?php

if (isset($_POST[newsletterSubmit])) {
	$newsletter_email = validateData($_POST[newsletterEmail]);
	if (!$newsletter_email) {
		$newsletterFailed = "Please enter this field!";
	} else {
		$conn = connect();
		if (send_newsletter($newsletter_email, $conn)) {
			$newsletterSuccess = "Thank you very much!";
		} else {
			$newsletterFailed = "Cannot sign up your email right now! Please try again later!";
		}
		$conn->close();
	}
}

?>