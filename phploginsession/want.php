<?php
$con=mysqli_connect("localhost","root","","technotip");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

header('Access-Control-Allow-Origin: *');

$post_id = $_POST['post_id'];
$user_id = $_POST['user_id'];

mysqli_query($con,"DELETE FROM wants
WHERE post_id=$post_id AND user_id=$user_id");

// Makes sure that we don't have duplicates in the wants table
$result = mysqli_query($con," SELECT * FROM wants WHERE (post_id,user_id) IN ('".mysql_real_escape_string($post_id)."','".mysql_real_escape_string($user_id)."') ");

if(mysql_num_rows($result) == 0) {
    mysqli_query($con,"INSERT INTO wants VALUES ('".mysql_real_escape_string($post_id)."','".mysql_real_escape_string($user_id)."')");
} else {
    // do other stuff...
}



mysqli_close($con);
?>