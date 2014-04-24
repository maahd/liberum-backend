<?php include_once("db.php");

$user_id = $_POST['user_id'];

$sql = "SELECT * FROM posts 
WHERE (user_id = '".mysql_real_escape_string($user_id)."')";

$qury = mysql_query($sql);

$rows = array();
while($r = mysql_fetch_assoc($qury)){
	$rows[] = $r;
}

echo json_encode($rows);

?>
