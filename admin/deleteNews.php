<?php
  include 'admin_session_auth.php'; 
?>

<?php
	
	include '../dbConnect.php';
	
	$query = 'DELETE FROM tblNews WHERE News_ID='.$_GET['News_ID'];
	mysqli_query($connection, $query);
	
	header("location: editNews.php");
	
?>