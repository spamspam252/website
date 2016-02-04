<?php
$conn = connect();
$conn->set_charset("utf8");
$id = $_GET[id];
$id2 = intval($id) + 1;

// echo $id2;
$check = check_post($id2, $conn);

$post_data = get_post($id, $conn);

$host = parse_url($post_data[src_link], PHP_URL_HOST);
$conn->close();

?>