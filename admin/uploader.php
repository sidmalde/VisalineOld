<?php
	ini_set("display_errors","1");
	ERROR_REPORTING(E_ALL);
	//include 'admin_session_auth.php'; 
?>
<?php

	include '../dbConnect.php';

	$target_path = "../images/offerImages/";
	$target_path_1 = $target_path.basename($_FILES['image1']['name']);
	$target_path_2 = $target_path.basename($_FILES['image2']['name']);
	$target_path_3 = $target_path.basename($_FILES['image3']['name']);
	$target_path_4 = $target_path.basename($_FILES['image4']['name']);

	$img1ID = 0;
	$img2ID = 0;
	$img3ID = 0;
	$img4ID = 0;

	if(move_uploaded_file($_FILES['image1']['tmp_name'], $target_path_1))
		$img1ID = checkPresence("images/offerImages/".basename($_FILES['image1']['name']));

	if(move_uploaded_file($_FILES['image2']['tmp_name'], $target_path_2))
		$img2ID = checkPresence("images/offerImages/".basename($_FILES['image2']['name']));

	if(move_uploaded_file($_FILES['image3']['tmp_name'], $target_path_3))
		$img3ID = checkPresence("images/offerImages/".basename($_FILES['image3']['name']));

	if(move_uploaded_file($_FILES['image4']['tmp_name'], $target_path_4))
		$img4ID = checkPresence("images/offerImages/".basename($_FILES['image4']['name']));

	$startDate = $_POST['Start_Date'];
	$endDate = $_POST['End_Date'];


	$rankCheckQuery = mysqli_query($connection, "SELECT * FROM tbl".$_POST['Region']." ORDER BY `Rank` ASC");

	$rank = $_POST['Rank'];
	while ($search = mysqli_fetch_array($rankCheckQuery))
	{
		if ($rank == $search['Rank'])
		{
			$rank++;
			$query  = "UPDATE tbl".$_POST['Region']." SET Rank=".$rank." WHERE Offer_ID=".$search['Offer_ID']." LIMIT 1";
			//echo $query.'<br />';
			mysqli_query($connection, $query);
		}
	}

	//$newOfferName = convertPounds($_POST['Offer_Name']);
	//$newDetails = convertPounds($_POST['Details']);

	$newOfferName = addslashes($_POST['Offer_Name']);
	$newDetails = addslashes($_POST['Details']);

	$query = "INSERT INTO tbl".$_POST['Region']." (Offer_ID, Creation_Date, Reference, Rank, Offer_Name, Details, Keywords, Start_Date, End_Date, Price, img1, img2, img3, img4) VALUES (NULL, CURRENT_TIMESTAMP, '".$_POST['Reference']."', '".$_POST['Rank']."', '".$newOfferName."', '".$newDetails."', '".$_POST['Keywords']."', '".$startDate."', '".$endDate."', '".$_POST['Price']."', '".$img1ID."', '".$img2ID."', '".$img3ID."', '".$img4ID."')";

	if( mysqli_query($connection, $query))
	{
		header("location: home.php");
		exit;
	}		
	else
		echo "Error Uploading Offer";

	function checkPresence($url)
	{
		$result = mysqli_query($connection, "SELECT * FROM tblImages WHERE url='".$url."'");
		$search = null;
		
		if (mysql_num_rows($result)==0)
		{	
			mysqli_query($connection, "INSERT INTO tblImages (image_ID, url) VALUES (NULL, '".$url."')");
			$result = mysqli_query($connection, "SELECT * FROM tblImages WHERE url='".$url."'");
			$search = mysqli_fetch_array($result);
		}
		else
		{
			$search = mysqli_fetch_array($result);
		}
		
		return $search['image_ID'];
	}
?>