<?php include_once("db.php");

header('Access-Control-Allow-Origin: *');

$post_id = $_POST['post_id'];

$sql = "SELECT * 
FROM comments 
INNER JOIN phplogin
ON comments.user_id=phplogin.user_id
WHERE(post_id='".mysql_real_escape_string($post_id)."')";

$qury = mysql_query($sql);

$rows = array();
while($r = mysql_fetch_assoc($qury)){
	$rows[] = $r;
}

echo json_encode($rows);

?>