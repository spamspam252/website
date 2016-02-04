<?php

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
	$query = "SELECT img,title,time,body,id,little_body FROM posts";
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
$conn = connect();

$conn->set_charset("utf8");

$post_data = get_posts($conn);

$conn->close();

$count = count($post_data);

$post_data = array_reverse($post_data);
// echo "<script type='text/javascript'>alert('$count');</script>";

if ($count > 2) {
	$post_data_2last = array_slice($post_data, 0, 2);
} else {
	$post_data_2last = $post_data;
}

// print_r($post_data);

?><!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>What I Wrote</title>
    <link rel="stylesheet" href="../js/jquery-ui-1.11.4/jquery-ui.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/sections.css">
    <link rel="icon" href="../img/chuki.png" type="image/x-icon">
  </head>
  <body>
    <div id="articleSection" class="container-fluid">
      <div class="row">
        <h1>WHAT I WROTE</h1>
      </div>
      <div class="ContentWrapper"><?php foreach ($post_data as $post): ?>
        <div class="section">
          <article class="Article">
            <div class="row">
              <section class="ArticleTitle-collapse col-sm-12 visible-sm-block"><a href="<?php echo 'post.php?id='.$post[4];?>">
                  <h2><?php echo $post[1];?></h2><small><?php echo time_elapsed_string($post[2]);?></small></a></section>
              <div class="BlogImage"><img src="<?php echo $post[0];?>" alt="Nope" class="col-md-4 col-sm-0"></div>
              <section class="ArticleTitle-expand col-md-8 col-sm-12 hidden-sm"><a href="<?php echo 'post.php?id='.$post[4];?>">
                  <h2><?php echo $post[1];?></h2><small><?php echo time_elapsed_string($post[2]);?> </small></a>
                <div class="ArticleText-expand">
                  <p class="ArticleText"><?php echo $post[5];?></p><a href="<?php echo 'post.php?id='.$post[4];?>">READ POST<span class="glyphicon glyphicon-menu-right"></span></a>
                </div>
              </section>
              <div class="ArticleText-collapse visible-sm-block col-sm-12">
                <p class="ArticleText"><?php echo $post[5];?></p><a href="<?php echo 'post.php?id='.$post[4];?>">READ POST <span class="glyphicon glyphicon-menu-right"></span></a>
              </div>
            </div>
          </article>
        </div><?php endforeach;?>
      </div>
    </div>
  </body>
</html>