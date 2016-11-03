<?php
	include 'dbConnect.php';
	
	$category = str_replace(" ", "", $_POST['category']);
	$href = 'category.php?category='.str_replace(" ", "", $_POST['category']);
	$title = $_POST['category'];
	$keywords = $_POST['category'];
	
	// Save to DB - never lost	
	$query = "INSERT into tblcategories VALUES( NULL, '".$category."', '".$href."', '".$title."', '".$keywords."')";
	echo $query;
	mysqli_query($connection, $query) or die(mysql_error());
	
	header("location: addCategory.php");
	
?>