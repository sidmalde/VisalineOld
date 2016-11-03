<?php
	// connect to MySQL Server
	$connection = mysqli_connect("127.0.0.1", "sidmalde", "El3phant", "visaline_visaline")
	or die('Could not connect: ' . mysql_error());
	
	// select db
	// mysql_select_db("visaline_visaline", $connection)
	// 	or die('Could not select database' . mysql_error());
?>
