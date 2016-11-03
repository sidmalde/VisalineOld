<?php
	
	include '../dbConnect.php';
	
	$query = "INSERT INTO tblNews (News_ID, Title, Details) VALUES (NULL, '".$_POST['Title']."', '".$_POST['Details']."')";
	
	echo $query;
	mysql_query($query);
	
	
	mysql_close($connection);
	
	header("location: editNews.php");
	
?>