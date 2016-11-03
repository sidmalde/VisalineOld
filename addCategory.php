<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Visaline Travel - Flights &amp; Pakages to Put a Smile on Your Face</title>
<meta name="keywords" content="" />
<meta name="description" content="" />

	<!--[if IE 6]><link href="ie.css" rel="stylesheet" type="text/css"><![endif]-->
	<!--[if IE 7]><link href="ie.css" rel="stylesheet" type="text/css"><![endif]-->
	<!--[if IE 8]><link href="default.css" rel="stylesheet" type="text/css"><![endif]-->

    <![if !IE]>
		<link rel="stylesheet" type="text/css" href="default.css" />
    <![endif]>
	
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
				
				<form class="search" name="frmSearch" method="post" action="searchresult.php" onSubmit="return searchFieldValidate();" >
					<input type="text" name="searchText" style="width: 200px"><br>
					<input name="submit" type="submit" value="Search"><br>
				</form>
			-->
			</div>
		</div>
		
		<img id="banner" src="images/bannerHome.jpg" />
		
		<div id="nav">
			
			<?php
				menu("Home");
			?>

		</div>
		
		<div id="main">
		
			<form method="post" action="submitAddCategory.php">
				<table id="enquiryForm">
					<tr>
						<td>Category</td> <td><input type="text" name="category"></td>
					</tr>
					
					<tr>
						<td id="submit" colspan="2"><input name="submit" type="submit" value="submit"></td>
					</tr>
				</table>
			</form>
		
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
