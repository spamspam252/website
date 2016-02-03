<?php
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

?>