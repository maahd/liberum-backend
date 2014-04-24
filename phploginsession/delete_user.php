<?php
$con=mysqli_connect("localhost","root","","technotip");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

header('Access-Control-Allow-Origin: *');

$user_id = $_POST['user_id'];

// Also deletes all posts by that user
mysqli_query($con,"DELETE FROM posts WHERE user_id=$user_id");

// Deletes the user. phplogin is the name of the user table. 
mysqli_query($con,"DELETE FROM phplogin WHERE user_id=$user_id");

mysqli_close($con);
?>