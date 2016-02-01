<?php

function validateData($data) {
	$data = trim(stripcslashes(htmlspecialchars($data)));
	return $data;
}

function hashPassword($password) {
	return password_hash($password, PASSWORD_DEFAULT);
}

?><?php
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
?><?php

function connect() {
	$sever = "localhost";
	$username = "root";
	$password = "root";
	$db = "website";
	$conn = new mysqli($sever, $username, $password, $db);
	return $conn;
}

?><?php

function send_message($data, $conn) {
	$query = "INSERT INTO message (name,email,message)
				VALUES ('$data[name]','$data[email]','$data[message]')";
	return $conn->query($query);
}

?><!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Say Hello</title>
    <link rel="stylesheet" href="../js/jquery-ui-1.11.4/jquery-ui.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/sections.css">
    <link rel="icon" href="../img/chuki.png" type="image/x-icon">
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <h1>SEND A FRIENDLY HELLO</h1>
      </div>
      <div id="contactSection" class="ContentWrapper">
        <h2>CONTACT INFOMATION</h2>
        <div class="section">
          <div class="row">
            <p class="col-md-8 col-sm-8"><strong>Vũ Nguyên Hưng</strong><br>District 8, Ho Chi Minh City<br><strong>090.807.6542</strong><br>vunguyenhung.twd@gmail.com<br><a href="">
                <button class="submitButton"></button></a></p><img src="../img/BussinessCard.png" alt="" class="col-md-4 col-sm-4">
          </div>
        </div>
        <div id="contactSection" class="section">
          <div id="contactContent" class="row">
            <h2>SEND A FRIENDLY HELLO</h2>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" id="formContact">
              <label for="formName">Name: *</label><small class="text-danger"><?php echo "<br>".$nameError; ?></small>
              <input type="text" name="contactName" id="formName">
              <label for="formEmail">Email: *</label><small class="text-danger"><?php echo "<br>".$emailError; ?></small>
              <input type="email" name="contactEmail" id="formEmail">
              <label for="formMessage">Message: *</label><small class="text-danger"><?php echo "<br>".$messageError; ?></small>
              <textarea id="formMessage" name="contactMessage" cols="30" rows="10"></textarea>
              <button id="submitMessage" type="submit" name="contactSubmit" class="submitButton"></button><small class="text-success"><?php echo "<br>".$messageSuccess; ?></small><small class="text-danger"><?php echo "<br>".$messageFailed; ?></small>
            </form>
          </div>
        </div>
      </div>
      <footer>
        <div id="footerContent"><small><span id="copyright">&copy;</span> Vu Nguyen Hung 2016</small>
          <ul>
            <li id="facebook"><a href="https://www.facebook.com/Legend.Of.Fker"></a></li>
            <li id="github"><a href="https://github.com/spamspam252"></a></li>
            <li id="linkedin"><a href="https://www.linkedin.com/in/nguy%C3%AAn-h%C6%B0ng-v%C5%A9-042071113"></a></li>
          </ul>
        </div>
      </footer>
    </div>
  </body>
</html>