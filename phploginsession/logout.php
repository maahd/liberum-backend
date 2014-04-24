<?php

header('Access-Control-Allow-Origin: *');
	
session_start(); # Starts the session

session_unset(); #removes all the variables in the session

session_destroy(); # destroys the session

if(!$_SESSION['userName'])
	echo "Succesfully logged out!";
else 
	echo "Error occured!<br />";

?>