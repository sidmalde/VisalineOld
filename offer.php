<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>
	<?php
		
		include 'dbConnect.php';
		
		$_GLOBALS['tblName'] = "";
		
		switch ($_GET['region'])
		{
			case "Africa":
				$_GLOBALS['tblName'] = "tblAfrica";
				break;
			case "Asia":
				$_GLOBALS['tblName'] = "tblAsia";
				break;
			case "FarEast":
				$_GLOBALS['tblName'] = "tblFarEast";
				break;
			case "MiddleEast":
				$_GLOBALS['tblName'] = "tblMiddleEast";
				break;
			case "Auz":
				$_GLOBALS['tblName'] = "tblAuz";
				break;
			case "Packages":
				$_GLOBALS['tblName'] = "tblPackages";
				break;
			case "Cruises":
				$_GLOBALS['tblName'] = "tblCruises";
				break;
			case "Specials":
				$_GLOBALS['tblName'] = "tblSpecials";
		}
		
		$query = "SELECT * FROM ".$_GLOBALS['tblName']." WHERE Offer_ID =".$_GET['offerID'];
		
		$result = mysql_query($query);
				
		$search = mysql_fetch_assoc($result);
		
		if (!isset($_GET["region"]))
		{
			header("location: index.php");
		}
		else if($search['Offer_Name'] == '')
		{
			header("location: index.php");
		}
		else
		{
			echo " Visaline Travel - ".$search['Offer_Name'];
		}
		
		mysql_close($connection);
	?>
</title>
<meta name="keywords" content="visaline, cheap, deals, flights, travel, packages, special offers, india, kenya, asia, africa, middle east, far east" />
<meta name="description" content="" />
	<link rel="stylesheet" type="text/css" href="default.css" />

	<script src="navPreload.js" type="text/javascript"></script>
	
	<script type="text/javascript">

		function roll_over(btn_name, btn_source, banner_source)
		{
			var banner = document.getElementById("banner");
			banner.src = eval(banner_source+".src");
			document[btn_name].src = eval(btn_source+".src");
		}
		
		function gallery_roll_over(imgName, imgSource)
		{
			document[imgName].src = imgSource;
		}
		
	</script>
	
	<?php
		include 'navigation.php';
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
					echo '<img id="banner" src="images/bannerAfrica.jpg" alt="Region Banner">';
					break;
				case "Asia":
					echo '<img id="banner" src="images/bannerAsia.jpg" alt="Region Banner">';
					break;
				case "FarEast":
					echo '<img id="banner" src="images/bannerFarEast.jpg" alt="Region Banner">';
					break;
				case "MiddleEast":
					echo '<img id="banner" src="images/bannerMiddleEast.jpg" alt="Region Banner">';
					break;
				case "Auz":
					echo '<img id="banner" src="images/bannerAuz.jpg" alt="Region Banner">';
					break;
				case "Packages":
					echo '<img id="banner" src="images/bannerPackages.jpg" alt="Region Banner">';
					break;
				case "Cruises":
					echo '<img id="banner" src="images/bannerCruises.jpg" alt="Region Banner">';
					break;
				case "Specials":
					echo '<img id="banner" src="images/bannerSpecials.jpg" alt="Region Banner">';
					break;
				default:
					echo '<img id="banner" src="images/bannerDefault.jpg" alt="Region Banner">';
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
						
			<div id="offerDetails">
			
				<?php
					include 'dbConnect.php';
					
					$result = mysql_query("SELECT * FROM ".$_GLOBALS['tblName']." WHERE Offer_ID =".$_GET['offerID']);
						
					$search = mysql_fetch_assoc($result);
					
					$dateStart = $search['Start_Date'];
					$dateEnd =  $search['End_Date'];
					
					echo "<h2>".$search['Offer_Name']."</h2><br /><br />";
					
					echo "<table>";
					
					echo "<tr>";
					echo "<td class='offerHeader'>OFFER DETAILS:"."</td>";
					echo "<td class='offerDetails'>".nl2br($search['Details'])."</td>";
					echo "</tr>";
					
					echo "<tr>";
					echo "<td class='offerHeader'>OFFER VALIDITY:"."</td>";
					echo "<td class='offerDetails'>".$dateStart." &nbsp;&nbsp; - &nbsp;&nbsp; ".$dateEnd."<br />"."</td>";
					echo "</tr>";
										
					echo "<tr>";
					echo "<td class='offerHeader'>&nbsp;</td>";
					echo "<td class='offerDetails'>&nbsp;</td>";
					echo "</tr>";
					
					echo "<tr>";
					echo "<td class='offerHeader'>FROM:"."</td>";
					echo "<td class='offerDetails'> &pound;".$search['Price']."</td>";
					echo "</tr>";
					
					echo "<tr>";
					echo "<td class='offerHeader'>&nbsp;</td>";
					echo "<td class='offerDetails'>&nbsp;</td>";
					echo "</tr>";
					
					echo "<tr>";
					echo "<td class='offerHeader'>OFFER REF #:"."</td>";
					echo "<td class='offerDetails'>".$search['Reference']."</td>";
					echo "</tr>";
					
					
					echo "</table>";
					
					echo '<br />';
					echo '<a id="enquireLink" href="enquire.php?offerRefference='.$search['Reference'].'">ENQUIRE ABOUT THIS OFFER</a>';
					echo '<br />';
				?>
			
			</div>
			
			<div id="imgGallery">
				<?php
					include 'dbConnect.php';
					
					$result = mysql_query("SELECT * FROM ".$_GLOBALS['tblName']." WHERE Offer_ID =".$_GET['offerID']);
					$search = mysql_fetch_assoc($result);
					
					$img1URLsearch = mysql_fetch_assoc(mysql_query("SELECT `url` FROM `tblImages` WHERE image_ID = ".$search['img1']));
					$img2URLsearch = mysql_fetch_assoc(mysql_query("SELECT `url` FROM `tblImages` WHERE image_ID = ".$search['img2']));
					$img3URLsearch = mysql_fetch_assoc(mysql_query("SELECT `url` FROM `tblImages` WHERE image_ID = ".$search['img3']));
					$img4URLsearch = mysql_fetch_assoc(mysql_query("SELECT `url` FROM `tblImages` WHERE image_ID = ".$search['img4']));
					
					echo '<div id="mainImage">';
					
					echo '<img id="mainImg" src="'.$img1URLsearch['url'].'" name="mainGalleryImage"/>';
					
					echo '</div>';
					
					echo '<div id="thumbContainer">';
					
					if ($img1URLsearch != "")
						echo '<img class="thumbContainerImg" src="'.$img1URLsearch['url'].'" name="thumbImage1" onmouseover="gallery_roll_over(\'mainGalleryImage\', \''.$img1URLsearch['url'].'\')" alt="thumb1"/>'."\n";
					if ($img2URLsearch != "")
						echo '<img class="thumbContainerImg" src="'.$img2URLsearch['url'].'" name="thumbImage2" onmouseover="gallery_roll_over(\'mainGalleryImage\', \''.$img2URLsearch['url'].'\')" alt="thumb2"/>'."\n";
					if ($img3URLsearch != "")
						echo '<img class="thumbContainerImg" src="'.$img3URLsearch['url'].'" name="thumbImage3" onmouseover="gallery_roll_over(\'mainGalleryImage\', \''.$img3URLsearch['url'].'\')" alt="thumb3"/>'."\n";
					if ($img4URLsearch != "")
						echo '<img class="thumbContainerImg" src="'.$img4URLsearch['url'].'" name="thumbImage4" onmouseover="gallery_roll_over(\'mainGalleryImage\', \''.$img4URLsearch['url'].'\')" alt="thumb4"/>'."\n";
					
					echo '</div>';
				?>
			</div>
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
