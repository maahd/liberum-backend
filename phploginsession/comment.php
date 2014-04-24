<?php include_once("db.php") ?>

<?php
		header('Access-Control-Allow-Origin: *');

		$user_id = $_POST['user_id'];
		$post_id = $_POST['post_id'];
		$comment = $_POST['comment'];
		$sql = "INSERT into comments (user_id, post_id, comment)
		values('".mysql_real_escape_string($user_id)."','".mysql_real_escape_string($post_id)."','".mysql_real_escape_string($comment)."')";
		$qury = mysql_query($sql);

	if(!$qury)
	{
			echo "Failed ".mysql_error();
	}
	else 
	{
			echo "Successful";
	}		
?>	