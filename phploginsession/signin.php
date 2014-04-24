<?php include_once("db.php");

session_start();

?>


<?php
		header('Access-Control-Allow-Origin: *');

		$uname = $_POST['username'];
		$pass = $_POST['password'];

		$sql = "SELECT * FROM phplogin WHERE(
			username='".mysql_real_escape_string($uname)."' and password='".mysql_real_escape_string($pass)."')"; 

#		SELECT count(*) FROM phplogin WHERE(
#			username='$uname' and password='$pass');"

		$qury = mysql_query($sql);

		$result = mysql_fetch_array($qury);

		$_SESSION['username'] = $_POST['username'];

		$result["username"] = $_SESSION['username']; 

		#array_push($result, $_SESSION['username']);
		echo json_encode($result);

		if($result[0]>0)
		{	
			
			// echo "Successful Login!";
			// $_SESSION['userName'] = $uname;
			// echo "<br />Welcome ". $_SESSION['userName']."!";
			// echo "<br /><a href='signupform.php'>SignUp</a>";
			// echo "<br /><a href='signinform.php'>SignIn</a>";
			// echo "<br /><a href='logout.php'>Logout</a>";
			// echo json_encode($result);
			// echo "Success";
		}
		 // else
		 // {
		 // 	echo json_encode($result);
		 // 	echo "fail";
		 // }
		// {
		// 	echo "Login Failed";
		// 	echo "<br /><a href='signupform.php'>SignUp</a>";
		// 	echo "<br /><a href='signinform.php'>SignIn</a>";
		// }
	
?>