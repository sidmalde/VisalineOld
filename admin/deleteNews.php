<?php
  include 'admin_session_auth.php'; 
?>

<?php
	
	include '../dbConnect.php';
	
	$query = 'DELETE FROM tblNews WHERE News_ID='.$_GET['News_ID'];
	mysql_query($query);
	
	header("location: editNews.php");
	
?>