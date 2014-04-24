<?php include_once("db.php");

$category = $_POST['category'];

$sql = "SELECT * FROM posts WHERE(
	category='".mysql_real_escape_string($category)."')
	ORDER BY post_id DESC";

$qury = mysql_query($sql);

$rows = array();
while($r = mysql_fetch_assoc($qury)){
	$rows[] = $r;
}


echo json_encode($rows);

?>