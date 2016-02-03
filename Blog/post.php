<?php

function validateData($data) {
	$data = trim(stripcslashes(htmlspecialchars($data)));
	return $data;
}

function hashPassword($password) {
	return password_hash($password, PASSWORD_DEFAULT);
}

function time_elapsed_string($datetime, $full = false) {
	$now = new DateTime;
	$ago = new DateTime($datetime);
	$diff = $now->diff($ago);

	$diff->w = floor($diff->d / 7);
	$diff->d -= $diff->w * 7;

	$string = array(
		'y' => 'year',
		'm' => 'month',
		'w' => 'week',
		'd' => 'day',
		'h' => 'hour',
		'i' => 'minute',
		's' => 'second',
	);
	foreach ($string as $k => &$v) {
		if ($diff->$k) {
			$v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
		} else {
			unset($string[$k]);
		}
	}

	if (!$full) {
		$string = array_slice($string, 0, 1);
	}

	return $string ? implode(', ', $string) . ' ago' : 'just now';
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

?><?php
$conn = connect();
$conn->set_charset("utf8");
$id = $_GET[id];
$id2 = intval($id) + 1;
$check = check_post($id2, $conn);
$post_data = get_post($id, $conn);
$conn->close();

?><!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Post</title>
    <link rel="stylesheet" href="../js/jquery-ui-1.11.4/jquery-ui.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/sections.css">
    <link rel="icon" href="../img/chuki.png" type="image/x-icon">
  </head>
  <body>
    <div id="postContent" class="container-fluid">
      <div class="row text-center">
        <h1><?php echo $post_data[title];?></h1><small><?php echo time_elapsed_string($post_data[time]);?> </small><img src="<?php echo $post_data[img]?>" alt="Nope">
      </div>
      <div id="src" class="row">
        <p>Bài viết này được dịch lại từ blog <a href="<?php echo $post_data[src_link];?>"> Joel On Software.</a>		</p>
      </div>
      <div class="row text-justify">
        <p><?php echo $post_data[body];?></p>
      </div><?php if(!$check): ?>
      <div class="row text-right"><a href="<?php echo 'post.php?id='.$id2; ?>" id="next">NEXT POST <span class="glyphicon glyphicon-menu-right"></span></a></div><?php endif;?>	
    </div>
  </body>
</html>