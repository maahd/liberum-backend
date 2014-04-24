<?php
		header('Access-Control-Allow-Origin: *');
		$conn = mysql_connect("localhost","root");
		$db   = mysql_select_db("technotip",$conn);
?>
