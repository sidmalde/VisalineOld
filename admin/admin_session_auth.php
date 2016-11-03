<?php
	session_start();
	if(isset($_SESSION["login"]) && $_SESSION["login"] == 1)
	{
	}
	else
	{
		echo "<p>Sorry, you are not logged in...</p><br>";
		header("location: index.php");
	}
?>