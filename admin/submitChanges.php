<?php
	ini_set("display_errors","1");
	ERROR_REPORTING(E_ALL);
//  include 'admin_session_auth.php'; 
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
	$img1Query = "";
	$img2Query = "";
	$img3Query = "";
	$img4Query = "";
	if (move_uploaded_file($_FILES['image1']['tmp_name'], $target_path_1))
	{
		$img1ID = checkPresence("images/offerImages/".basename($_FILES['image1']['name']));
		$img1Query = '\', img1=\''.$img1ID;
	}
	if(move_uploaded_file($_FILES['image2']['tmp_name'], $target_path_2))
	{
		$img2ID = checkPresence("images/offerImages/".basename($_FILES['image2']['name']));
		$img2Query = '\', img2=\''.$img2ID;
	}
	if(move_uploaded_file($_FILES['image3']['tmp_name'], $target_path_3))
	{
		$img3ID = checkPresence("images/offerImages/".basename($_FILES['image3']['name']));
		$img3Query = '\', img3=\''.$img3ID;
	}
	if(move_uploaded_file($_FILES['image4']['tmp_name'], $target_path_4))
	{
		$img4ID = checkPresence("images/offerImages/".basename($_FILES['image4']['name']));
		$img4Query = '\', img4=\''.$img4ID;
	}
	$startDate = $_POST['Start_Date'];
	$endDate = $_POST['End_Date'];
	$rankCheckQuery = mysql_query("SELECT * FROM tbl".$_POST['Region']." ORDER BY `Rank` ASC");
	$rank = $_POST['Rank'];
	while ($search = mysql_fetch_array($rankCheckQuery))
	{
		if ($rank == $search['Rank'])
		{
			$rank++;
			$query  = "UPDATE tbl".$_POST['Region']." SET Rank=".$rank." WHERE Offer_ID=".$search['Offer_ID']." LIMIT 1";
			mysql_query($query);
		}
	}
	$newOfferName = addslashes($_POST['Offer_Name']);
	$newDetails = addslashes($_POST['Details']);
	$query  = 'UPDATE tbl'.$_POST['Region'].' SET Offer_Name=\''.$newOfferName.'\', Reference=\''.$_POST['Reference'].'\', Details=\''.$newDetails.'\', Rank=\''.$_POST['Rank'].'\', Start_Date=\''.$startDate.'\', End_Date=\''.$endDate.'\', Price=\''.$_POST['Price'].'\', Keywords=\''.$_POST['Keywords'].$img1Query.$img2Query.$img3Query.$img4Query.'\' WHERE Offer_ID='.$_POST['offerID'].' LIMIT 1';
//	echo $query;
	mysql_query($query);
	function checkPresence($url)
	{
		$result = mysql_query("SELECT * FROM tblImages WHERE url='".$url."'");
		$search = null;

		if (mysql_num_rows($result)==0)
		{	
			mysql_query("INSERT INTO tblImages (image_ID, url) VALUES (NULL, '".$url."')");
			$result = mysql_query("SELECT * FROM tblImages WHERE url='".$url."'");
			$search = mysql_fetch_array($result);
		}
		else
		{
			$search = mysql_fetch_array($result);
		}

		return $search['image_ID'];
	}
	mysql_close($connection);
	header("location: home.php");
?>