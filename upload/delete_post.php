<?php
$con=mysqli_connect("localhost","root","","technotip");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

header('Access-Control-Allow-Origin: *');

$post_id = $_POST['post_id'];

mysqli_query($con,"DELETE FROM posts WHERE post_id='".mysql_real_escape_string($post_id)."'");

mysqli_close($con);
?>