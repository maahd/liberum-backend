<?php include_once("db.php") ?>

<?php
		header('Access-Control-Allow-Origin: *');

		$user = $_POST['username'];
		$pass = $_POST['password'];
		$email = $_POST['email'];

		$result = mysql_query("SELECT * FROM phplogin WHERE username = '".mysql_real_escape_string($user)."'");
		if(mysql_num_rows($result) == 0) {
	     	$sql = "INSERT into phplogin (username, password, email) values('".mysql_real_escape_string($user)."','".mysql_real_escape_string($pass)."','".mysql_real_escape_string($email)."')";
			$qury = mysql_query($sql);
		} else {
			//$var1={"username":"$user"};
			//echo "Username already exists!";
		}

	
	

	if(!$qury)
	{
			echo "User already exists.";
	}
	else 
	{
			echo "Registered!";
	}		
?>	