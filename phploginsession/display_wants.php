<?php include_once("db.php");

header('Access-Control-Allow-Origin: *');

$user_id = $_POST['user_id'];

$sql = "SELECT wants.post_id, wants.user_id, posts.image_path 
FROM wants
INNER JOIN posts
ON wants.post_id=posts.post_id
HAVING user_id = \"$user_id\" ";

$qury = mysql_query($sql);

$rows = array();
while($r = mysql_fetch_assoc($qury)){
	$rows[] = $r;
}

echo json_encode($rows);

?>