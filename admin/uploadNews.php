<?php
	
	include '../dbConnect.php';
	
	$query = "INSERT INTO tblNews (News_ID, Title, Details) VALUES (NULL, '".$_POST['Title']."', '".$_POST['Details']."')";
	
	echo $query;
	mysqli_query($connection, $query);
	
	
	mysqli_close($connection);
	
	header("location: editNews.php");
	
?>