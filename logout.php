<?php
session_start();
	
	session_destroy();
	//session_unregister($_SESSION["firstname"]);
	session_unset();
	header("Location: login.php"); 

?>