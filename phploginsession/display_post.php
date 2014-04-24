<?php include_once("db.php");

header('Access-Control-Allow-Origin: *');

$post_id = $_POST['post_id'];

$sql = "SELECT * FROM posts WHERE(
	post_id='".mysql_real_escape_string($post_id)."')";

$qury = mysql_query($sql);

$result = mysql_fetch_array($qury);

echo json_encode($result);

?>