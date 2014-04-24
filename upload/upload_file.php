<?php include_once("../phploginsession/db.php");

//session_start();

?>

<?php

$con=mysqli_connect("localhost","root","","technotip");

header('Access-Control-Allow-Origin: *');

    $post_name = $_POST['post_name'];
    $post_description = $_POST['post_description'];
    $post_category = $_POST['post_category'];
    $current_user = $_POST['current_user'];
    $user_id = $_POST['user_id'];



$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);

if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 20000000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

    

    if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "upload/" . $_FILES["file"]["name"]);
      echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
      
      }
    }
  }
else
  {
  echo "Invalid file";
  }

//$user_id = mysqli_query($con,"SELECT user_id FROM phplogin WHERE username == $current_user");

    $sql="INSERT INTO posts (description, name, category, image_path, user, user_id)
VALUES
('".mysql_real_escape_string($post_description)."','".mysql_real_escape_string($post_name)."','".mysql_real_escape_string($post_category)."','".mysql_real_escape_string("upload/" . $_FILES["file"]["name"])."','".mysql_real_escape_string($current_user)."','".mysql_real_escape_string($user_id)."')";

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
echo "1 record added";  
?>
