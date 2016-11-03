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
		
		<img id="banner" src="images/bannerHome.jpg" />
		
		<div id="nav">
			<?php
				menu("Home");
			?>
		</div>
		
		<div id="main">
			
			<h2> Enquiry Form </h2>
			
			<script type="text/javascript">
				function enquiryFieldValidate()	    
				{	       
					var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
					var address = document.frmEnquiry.email.value;

					if (document.frmEnquiry.name.value == '')
					{	           
						alert('You have not entered your Name!');
						document.frmEnquiry.name.focus();
						return false;
					}
					else if (document.frmEnquiry.email.value == '')
					{	           
						alert('You have not entered your Email address!');
						document.frmEnquiry.email.focus();
						return false;
					}
					else if (reg.test(address) == false)
					{
						alert('You have not entered a valid Email address!');
						document.frmEnquiry.email.focus();
						return false;
					}
					else if (0 < document.frmEnquiry.numAdults.value == '' > 10)
					{
						alert('Please enter a valid number of Adults!');
						document.frmEnquiry.numChildren.focus();
						return false;
					}
					else if (document.frmEnquiry.depDate.value == '')
					{
						alert('You have not entered a valid approximate Departure Date!');
						document.frmEnquiry.depDate.focus();
						return false;
					}
					else if (document.frmEnquiry.arrDate.value == '')
					{
						alert('You have not entered a valid approximate Arrival Date!!');
						document.frmEnquiry.arrDate.focus();
						return false;
					}
					else if (document.frmEnquiry.depLoc.value == '')
					{
						alert('You have not entered a valid Departure Location!');
						document.frmEnquiry.depLoc.focus();
						return false;
					}
					else if (document.frmEnquiry.arrLoc.value == '')
					{
						alert('You have not entered a valid Arrival Location!');
						document.frmEnquiry.arrLoc.focus();
						return false;
					}
				}
			</script>

			<form id="enquiry" name="frmEnquiry" method="post" action="submitEnquiry.php" onSubmit="return enquiryFieldValidate()" >
				<table id="enquiryForm">
					<tr>
						<td>Offer Ref #</td>
						<?php
							if (isset($_GET['offerRefference']) && $_GET['offerRefference'] != "")
								echo '<td><input type="text" name="offerReference" value="'.$_GET['offerRefference'].'" disabled="true"></td>';
							else
								echo '<td><input type="text" name="offerReference"></td>';
						?>
					</tr>
					<tr>
						<td>Full Name *</td>
						<td><input type="text" name="name"></td>
					</tr>
					<tr>
						<td>Contact *</td>
						<td><input type="text" name="contact"></td>
					</tr>
					<tr>
						<td>Email *</td>
						<td><input type="text" name="email"></td>
					</tr>
					<tr>
						<td>Number of Adults *</td>
						<td>
							<select name="numAdults">
								<option value="0">0</option>
								<option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option>
								<option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Number of Children *</td>
						<td>
							<select name="numChildren">
								<option value="0">0</option>
								<option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option>
								<option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Approx. Departure Date *</td>
						<td><input type="text" name="depDate"></td>
					</tr>
					<tr>
						<td>Approx. Arrival Date *</td>
						<td><input type="text" name="arrDate"></td>
					</tr>
					<tr>
						<td>Departing From *</td>
						<td><input type="text" name="depLoc"></td>
					</tr>
					<tr>
						<td>Arriving At *</td>
						<td><input type="text" name="arrLoc"></td>
					</tr>
					<tr>
						<td>Preferred Travel Class</td>
						<td><input type="text" name="prefClass"></td>
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
