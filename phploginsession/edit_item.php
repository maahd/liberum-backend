<?php include_once("../phploginsession/db.php");

header('Access-Control-Allow-Origin: *');

$post_id = $_POST['post_id'];
$description = $_POST['description'];
$name = $_POST['name'];
$category = $_POST['category'];

$sql = "UPDATE posts
SET description='".mysql_real_escape_string($description)."', name='".mysql_real_escape_string($name)."', category = '".mysql_real_escape_string($category)."'
WHERE (post_id='".mysql_real_escape_string($post_id)."')";

$qury = mysql_query($sql);

if(!$qury)
	{
			echo "Failed ".mysql_error();
	}
	else 
	{
			echo "Successful";
	}

$sql = "SELECT * FROM posts WHERE(
	post_id='".mysql_real_escape_string($post_id)."')";

$qury = mysql_query($sql);

$rows = array();
while($r = mysql_fetch_assoc($qury)){
	$rows[] = $r;
}

echo json_encode($rows);

?>