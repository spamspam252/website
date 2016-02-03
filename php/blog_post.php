<?php
$conn = connect();
$conn->set_charset("utf8");
$id = $_GET[id];
$id2 = intval($id) + 1;
$check = check_post($id2, $conn);
$post_data = get_post($id, $conn);
$conn->close();

?>