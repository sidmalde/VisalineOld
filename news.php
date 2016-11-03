<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Visaline Travel - Offer Enquiry</title>
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
	?>
	
	
</head>

<body>

	<div id="container">
	
		<div id="header">
			<div id="search">

			</div>
		</div>
		
		<img id="banner" src="images/bannerHome.jpg" />
		
		<div id="nav">
			<?php
				menu("Home");
			?>
		</div>
		
		<div id="main">
			
			<?php
				echo "<h2>Latest News</h2><br /><br />\n";
				include 'dbConnect.php';
				
				$result = mysqli_query($connection, "SELECT * FROM tblNews ORDER BY News_ID ASC");
				
				if (mysql_num_rows($result) != 0)
				{
					$i = 1;
					while ($search = mysqli_fetch_array($result))
					{
						echo '<ul>'."\n";
						echo $i.".&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
						echo $search['Details']."\n";
						echo '</ul>'."\n";
						$i++;
					}
				}
				else
				{
					echo '<h2>No News At the Moment!</h2>'."\n";
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
