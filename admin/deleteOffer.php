<?php
  include 'admin_session_auth.php'; 
?>
<?php
	
	include '../dbConnect.php';
	
	$query = 'DELETE FROM tbl'.$_GET['region'].' WHERE Offer_ID='.$_GET['offerID'];
	mysql_query($query);
	
	header("location: editOffer.php");
	
?>