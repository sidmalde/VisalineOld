<?php
	
	include '../dbConnect.php';

	$query  = 'UPDATE tblNews SET Title=\''.$_POST['Title'].'\', Details=\''.$_POST['Details'].'\' WHERE News_ID='.$_POST['News_ID'].' LIMIT 1';
		
	mysql_query($query);
	
	mysql_close($connection);
	
	header("location: editNews.php");
	
?>