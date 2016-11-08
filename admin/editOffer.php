<?php
  include 'admin_session_auth.php'; 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Visaline Travel</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="admin.css" rel="stylesheet" type="text/css" />
	
	<script language="JavaScript" src="date.js"></script>
	<?php
		include 'navigation.php';
	?>

</head>

<body>

	<div id="container">
		
		<div id="header">
			
			<?php
				menu();
			?>
			
		</div>
		
		<div id="main">
			
			<?php
			
			include '../dbConnect.php';
			
			printOffers("Africa", $connection);
			printOffers("Asia", $connection);
			printOffers("FarEast", $connection);
			printOffers("MiddleEast", $connection);
			printOffers("Auz", $connection);
			printOffers("Packages", $connection);
			printOffers("Cruises", $connection);
			printOffers("Specials", $connection);
			
			function printOffers($region, $connection)
			{
				$query = mysqli_query($connection, "SELECT * FROM tbl".$region." ORDER BY `Rank` ASC");
				
				echo '<h1>'.$region.'</h1><br />';
				
				echo '<table class="listOffers">';
				echo '<tr>';
				echo '<th>Offer ID</th>';
				echo '<th>Reference</th>';
				echo '<th>Rank</th>';
				echo '<th>Offer Name</th>';
				echo '<th>Keywords</th>';
				echo '<th>Start Date</th>';
				echo '<th>End Date</th>';
				echo '<th>Price</th>';
				echo '</tr>';
				
				$rowNum = 1;
				
				while ($search = mysqli_fetch_array($query))
				{
					
					if ($rowNum == 1)
					{
						echo '<tr id="rowOne">'."\n";
						$rowNum++;
					}
					else if ($rowNum == 2)
					{
						echo '<tr id="rowTwo">'."\n";
						$rowNum--;
					}
					
					echo '<td>'.$search['Offer_ID'].'</td>';
					echo '<td>'.$search['Reference'].'</td>';
					echo '<td>'.$search['Rank'].'</td>';
					echo '<td>'.$search['Offer_Name'].'</td>';
					echo '<td>'.$search['Keywords'].'</td>';
					echo '<td>'.$search['Start_Date'].'</td>';
					echo '<td>'.$search['End_Date'].'</td>';
					echo '<td>'.$search['Price'].'</td>';
					echo '<td><a href="editOfferDetails.php?region='.$region.'&amp;offerID='.$search['Offer_ID'].'">EDIT</a></td>';
					echo '<td><a href="deleteOffer.php?region='.$region.'&amp;offerID='.$search['Offer_ID'].'">DELETE</a></td>';
					echo '</tr>';
				}
				
				echo '</table>';
			}
			
			?>
			
		</div>
		
	</div>
	
</body>

</html>
