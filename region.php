<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Visaline Travel - Miles of Smiles</title>
<meta name="keywords" content="visaline, cheap, deals, flights, travel, packages, special offers, india, kenya, asia, africa, middle east, far east" />
<meta name="description" content="" />
	<link rel="stylesheet" type="text/css" href="default.css" />

	<script language="javascript" src="navPreload.js"></script>
	
	<script type="text/javascript">

		function roll_over(btn_name, btn_source, banner_source)
		{
			var banner = document.getElementById("banner");
			banner.src = eval(banner_source+".src");
			document[btn_name].src = eval(btn_source+".src");
		}
		
	</script>
	
	<?php
		include 'navigation.php';
		if ($_GET['region'] != ("Africa" || "Asia" || "FarEast" || "MiddleEast" || "Auz" || "Packages" || "Cruises" || "Specials"))
				header("location: index.php");
	?>
	
</head>

<body>
	
	<div id="container">
	
		<div id="header">
			<div id="search">
			<!--
				<script type="text/javascript" >
					function searchFieldValidate()	    
					{	       
						if ( document.frmSearch.searchText.value == '' )
						{	           
							alert('You have not entered a search term!');
							document.frmSearch.searchText.focus();
							return false;
						}
					}
				</script>
				
				<form class="search" name="frmSearch" method="post" action="search.php" onSubmit="return searchFieldValidate();" >
					<input type="text" name="searchText" style="width: 200px"><br>
					<input name="submit" type="submit" value="Search"><br>
				</form>
			-->
			</div>
		</div>
		
		<?php
			$region = $_GET["region"];
			switch ($region)
			{
				case "Africa":
					$_GLOBALS['tblName'] = "tblAfrica";
					echo '<img id="banner" src="images/bannerAfrica.jpg">';
					break;
				case "Asia":
					$_GLOBALS['tblName'] = "tblAsia";
					echo '<img id="banner" src="images/bannerAsia.jpg">';
					break;
				case "FarEast":
					$_GLOBALS['tblName'] = "tblFarEast";
					echo '<img id="banner" src="images/bannerFarEast.jpg">';
					break;
				case "MiddleEast":
					$_GLOBALS['tblName'] = "tblMiddleEast";
					echo '<img id="banner" src="images/bannerMiddleEast.jpg">';
					break;
				case "Auz":
					$_GLOBALS['tblName'] = "tblAuz";
					echo '<img id="banner" src="images/bannerAuz.jpg">';
					break;
				case "Packages":
					$_GLOBALS['tblName'] = "tblPackages";
					echo '<img id="banner" src="images/bannerPackages.jpg">';
					break;
				case "Cruises":
					$_GLOBALS['tblName'] = "tblCruises";
					echo '<img id="banner" src="images/bannerCruises.jpg">';
					break;
				case "Specials":
					$_GLOBALS['tblName'] = "tblSpecials";
					echo '<img id="banner" src="images/bannerSpecials.jpg">';
					break;
				default:
					echo '<img id="banner" src="images/bannerHome.jpg">';
			}
		?>
		
		<div id="nav">
			
			<?php
				if (isset($_GET["region"]))
				{
					menu($_GET["region"]);
				}
				else
				{
					menu("");
				}
			?>

		</div>
		
		<div id="main">
			
			<?php
				
				if (isset($_GET["region"]))
				{
					$region = $_GET["region"];
					if($region == "Africa")
						echo '<h2>Wild Africa & Indian Ocean</h2>'."\n";
					else if($region == "Asia")
						echo '<h2>Spicy Asia</h2>'."\n";
					else if($region == "MiddleEast")
						echo '<h2>Middle East</h2>'."\n";
					else if($region == "FarEast")
						echo '<h2>Far East</h2>'."\n";
					else if($region == "Auz")
						echo '<h2>Australia & New Zealand</h2>'."\n";
					else if($region == "Packages")
						echo '<h2>Packages to Put a Smile on Your face</h2>'."\n";
					else if($region == "Cruises")
						echo '<h2>Ocean Cruises</h2>'."\n";
					else if($region == "Specials")
						echo '<h2>Special Offers</h2>'."\n";
					else
						echo '<h2>Africa & Indian Ocean</h2>'."\n";
				}
				else
				{
					echo  '<h2>BAD LINK</h2>'."\n";
				}
			
				echo '<br>'."\n";
				
				include 'dbConnect.php';
				
				$result = mysqli_query($connection, "SELECT * FROM ".$_GLOBALS['tblName']." ORDER BY `Rank` ASC");
				
				if (mysql_num_rows($result) != 0)
				{
					echo '<table id="regionOffers">'."\n";
					
					$rowNum = 1;

					echo '<tr>'."\n";
					echo '<th id="offerName">Offer</th>'."\n";
					echo '<th>From</th>'."\n";
					echo '<th>Start Date</th>'."\n";
					echo '<th>End Date</th>'."\n";
					echo '</tr>'."\n";
					
					while ($search = mysqli_fetch_array($result))
					{
						$offerName = $search['Offer_Name'];
						if (strlen($offerName) >= 59)
							$offerName = substr($search['Offer_Name'], 0, 57)."...";

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
						
						$dateStart = $search['Start_Date'];
						$dateEnd =  $search['End_Date'];
						
						echo '<td class="tableFieldText"><a href="offer.php?region='.$region.'&offerID='.$search['Offer_ID'].'">'.$offerName.'</a></td>'."\n";
						echo '<td>&pound;'.$search['Price'].'</td>'."\n";
						echo '<td>'.$dateStart.'</td>'."\n";
						echo '<td>'.$dateEnd.'</td>'."\n";
						echo '</tr>'."\n";
					}
					
					echo '</table>';
				}
				else
				{
					echo 'No Offers At the Moment!'."\n";
				}
			?>
		</div>
		
		
		<div style="clear: both;">&nbsp;</div>
		
		<div id="footer">
			<?php 
				addFooter();
			?>
		</div>

	</div>

</body>

</html>
