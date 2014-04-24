<?php include_once("db.php");

$category1 = $_POST['category'];

$sql1 = "SELECT *
FROM phplogin
INNER JOIN posts
ON phplogin.user_id=posts.user_id
ORDER BY post_id DESC";

$var1=mysql_real_escape_string($category1);

$sql2 = "SELECT *
FROM phplogin
INNER JOIN posts
ON phplogin.user_id=posts.user_id
WHERE category = \"$var1\"
ORDER BY post_id DESC";


if ($category1 == "all")
	{
	$qury = mysql_query($sql1);
	}
else
	{
	$qury = mysql_query($sql2);
	}

// echo $category1;

// echo $var1;
// echo $sql2;
//echo mysql_error();

$rows = array();
while($r = mysql_fetch_assoc($qury)){
	$rows[] = $r;
}


echo json_encode($rows);

?>