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
    <meta http-equiv="Content-Type" content="text/html; charset=&quot;UTF8&quot;">
    <title>Vu Nguyen Hung</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="js/jquery-ui-1.11.4/jquery-ui.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    
    <link rel="stylesheet" href="css/main.css">
    <link rel="icon" href="img/chuki.png" type="image/x-icon">
  </head>
  <body class="container">
    <div id="container" class="container">
      <nav id="FixedMenu" class="navbar">
        <div id="menuContainer" class="container-fluid">
          <div class="navbar-header">
            <button type="button" data-toggle="collapse" data-target="#navigation" class="navbar-toggle collapsed"><span class="sr-only">Toggle navigation</span><span class="glyphicon glyphicon-align-justify"></span></button>
          </div>
          <div id="logoContent"><img src="img/test5.gif" alt="Nope" id="logo">
            <p id="name">Vũ Nguyên Hưng</p>
          </div>
          <nav id="navigation" class="collapse navbar-collapse">
            <div class="line">
              <div class="round"></div>
            </div>
            <ul>
              <li id="aboutNav"><a href="#About">About</a></li>
              <li id="portfolioNav"><a href="#Portfolio">Portfolio</a></li>
              <li id="blogNav"><a href="#Blog">Blog</a></li>
              <li id="contactNav"><a href="#Contact">Contact</a></li>
            </ul>
          </nav>
        </div>
      </nav>
      <div id="sections">
        <div id="gallery" class="row"><img src="img/BussinessCard.png" alt="Nope" class="col-sm-12"></div>
        
        <div id="aboutSection" class="section fp-auto-height">
          <div id="About">
            <div class="line">
              <div class="round"></div>
            </div>
          </div>
          <div class="sectionHeader"><a href="About" id="AboutTitle">
              <div class="button-fill">
                <div class="button-text">About</div>
                <div class="button-inside">
                  <div class="inside-text">Gimme&nbspMe&nbspMore&nbsp!!!</div>
                </div>
              </div></a></div>
          <div class="line">
            <div class="round"></div>
          </div>
          <div id="aboutContent">
            <p> Hi, I'm Vũ Nguyên Hưng, Vietnamese newbie Web Developer studying Computer Science at Ton Duc Thang University &amp; living in District 8, Ho Chi Minh City, Viet Nam.</p>
          </div>
        </div>
        
        <div id="portfolioSection" class="section fp-auto-height">
          <div id="Portfolio">
            <div class="line">
              <div class="round"></div>
            </div>
          </div>
          <div class="sectionHeader"><a href="Portfolio" id="PortfolioTitle">
              <div class="button-fill">
                <div class="button-text">Portfolio</div>
                <div class="button-inside">
                  <div class="inside-text">Gimme&nbspMe&nbspMore&nbsp!!!</div>
                </div>
              </div></a></div>
          <div class="line">
            <div class="round"></div>
          </div>
          <div id="portfolioContent"><a id="logo0" href="" class="PortfolioLogo"></a>
          </div>
        </div>
        <div id="blogSection">
          <div id="Blog">
            <div class="line">
              <div class="round"></div>
            </div>
          </div>
          <div class="sectionHeader"><a href="Blog" id="BlogTitle">
              <div class="button-fill">
                <div class="button-text">Blog</div>
                <div class="button-inside">
                  <div class="inside-text">Gimme&nbspMe&nbspMore&nbsp!!!</div>
                </div>
              </div></a></div>
          <div class="line">
            <div class="round"></div>
          </div>
          <div class="container">
            <div id="blogContent"><?php foreach ($post_data_2last as $post): ?>
              <article class="Article">
                <div class="row">
                  <section class="ArticleTitle-collapse col-sm-12 visible-sm-block"><a href="<?php echo 'Blog/post.php?id='.$post[4];?>">
                      <h2><?php echo $post[1];?></h2><small><?php echo time_elapsed_string($post[2]);?></small></a></section>
                  <div class="BlogImage"><img src="<?php echo $post[0];?>" alt="Nope" class="col-md-4 col-sm-0"></div>
                  <section class="ArticleTitle-expand col-md-8 col-sm-12 hidden-sm"><a href="<?php echo 'Blog/post.php?id='.$post[4];?>">
                      <h2><?php echo $post[1];?></h2><small><?php echo time_elapsed_string($post[2]);?> </small></a>
                    <div class="ArticleText-expand">
                      <p class="ArticleText"><?php echo $post[5];?></p><a href="<?php echo 'Blog/post.php?id='.$post[4];?>">READ POST<span class="glyphicon glyphicon-menu-right"></span></a>
                    </div>
                  </section>
                  <div class="ArticleText-collapse visible-sm-block col-sm-12">
                    <p class="ArticleText"><?php echo $post[5];?></p><a href="<?php echo 'Blog/post.php?id='.$post[4];?>">READ POST <span class="glyphicon glyphicon-menu-right"></span></a>
                  </div>
                </div>
              </article><?php endforeach;?>
            </div>
          </div>
        </div>
        
        <div id="contactSection" class="section fp-auto-height">
          <div id="Contact">
            <div class="line">
              <div class="round"></div>
            </div>
          </div>
          <div class="sectionHeader"><a href="Contact" id="ContactTitle">
              <div class="button-fill">
                <div class="button-text">Contact</div>
                <div class="button-inside">
                  <div class="inside-text">Gimme&nbspMe&nbspMore&nbsp!!!</div>
                </div>
              </div></a></div>
          <div class="line">
            <div class="round"></div>
          </div>
          <div id="contactContent">
            <p>Looking for a project? Send me a little information about what you're looking for and I'll be in touch!</p>
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
        </div><?php

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
        <div id="newsLetter">
          <div class="line">
            <div class="round"></div>
          </div>
          <p>Sign up with your email address to be notified whenever I made something new !</p><small class="text-success"><?php echo $newsletterSuccess; ?></small><small class="text-danger"><?php echo $newsletterFailed; ?></small>
          <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" id="newsLetterForm">
            <label for="newsletterEmail">Email: </label>
            <input type="email" name="newsletterEmail" id="newsletterEmail">
            <button ype="submit" name="newsletterSubmit" id="submitNewsLetter" class="submitButton"></button>
          </form>
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
    </div>
    
    <script src="http://code.jquery.com/jquery-2.2.0.min.js" language="javascript" type="text/javascript"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js" type="text/javascript"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-scrollTo/2.1.0/jquery.scrollTo.min.js" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="Bootstrap/bootstrap-toolkit.js"></script>
    <script src="js/script.js" type="text/javascript"></script>
  </body>
</html>