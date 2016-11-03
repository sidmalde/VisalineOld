<?php 
  session_start();
  if(!(isset($_SESSION["login"])))
    $_SESSION["login"] = 0;
	
	
	if (isset($_POST["username"]) && isset($_POST["password"]))
	{
		$userName=($_POST["username"]);
		$password=($_POST["password"]);

		if($userName == "Dipak" && $password == "visaline")
		{
			$_SESSION["login"] = 1;
			header("location: home.php");
		}
		else
			header("location: index.php");
	}
	else
	{
		if ($_SESSION["login"] != 1)
		{
			include 'admin_session_auth.php';
		}
		else
		{
			header("location: home.php");
		}
	}
	
?>
