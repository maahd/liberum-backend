<?php include_once("../phploginsession/db.php") ?>

<?php

header('Access-Control-Allow-Origin: *');

$password = $_POST['password'];
$email = $_POST['email'];
$user_id = $_POST['user_id'];

$sql = "UPDATE phplogin
SET password='".mysql_real_escape_string($password)."', email='".mysql_real_escape_string($email)."'
WHERE (user_id='".mysql_real_escape_string($user_id)."')";

$qury = mysql_query($sql);

$sql = "SELECT * FROM phplogin WHERE(
	user_id='".mysql_real_escape_string($user_id)."')";

$qury = mysql_query($sql);

$result = mysql_fetch_array($qury);

echo json_encode($result);

?>