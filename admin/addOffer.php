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
			
			<h2> Add Offer </h2>
			
			<script type="text/javascript">
				function enquiryFieldValidate()	    
				{	       

					if (document.frmAddOffer.Offer_Name.value == '')
					{	           
						alert('You have not entered and Offer Name!');
						document.frmAddOffer.Offer_Name.focus();
						return false;
					}
					else if (document.frmAddOffer.Reference.value == '')
					{	           
						alert('You have not entered a Reference for this offer!');
						document.frmAddOffer.Reference.focus();
						return false;
					}
					else if (document.frmAddOffer.Details.value == '')
					{	           
						alert('You have not entered any Details for this offer!');
						document.frmAddOffer.Details.focus();
						return false;
					}
					else if (document.frmAddOffer.Start_Date.value == '')
					{	           
						alert('You have not entered a Start Date for this offer!');
						document.frmAddOffer.Start_Date.focus();
						return false;
					}
					else if (document.frmAddOffer.End_Date.value == '')
					{	           
						alert('You have not entered an End Date for this offer!');
						document.frmAddOffer.End_Date.focus();
						return false;
					}
					else if (document.frmAddOffer.Price.value == '')
					{	           
						alert('You have not entered a Price for this offer!');
						document.frmAddOffer.Price.focus();
						return false;
					}
				}
			</script>

			<form id="enquiry" name="frmAddOffer" method="post" enctype="multipart/form-data" action="uploader.php" onSubmit="return enquiryFieldValidate()" >
				<input type="hidden" name="MAX_FILE_SIZE" value="100000000" />
				<table id="enquiryForm">
					<tr>
						<td>Region</td>
						<td>
							<select name="Region">
								<option value="Africa">Africa</option>
								<option value="Asia">Asia</option>
								<option value="FarEast">FarEast</option>
								<option value="MiddleEast">MiddleEast</option>
								<option value="Auz">Auz</option>
								<option value="Packages">Packages</option>
								<option value="Cruises">Cruises</option>
								<option value="Specials">Specials</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Offer Name</td>
						<td><input type="text" name="Offer_Name" /></td>
					</tr>

					<tr>
						<td>Reference</td>
						<td><input type="text" name="Reference" /></td>
					</tr>
					<tr>
						<td>Details</td>
						<td><textarea cols="50" rows="8" type="text" name="Details"></textarea></td>
					</tr>
					<tr>
						<td>Rank</td>
						<td>
							<select name="Rank">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
								<option value="11">11</option>
								<option value="12">12</option>
								<option value="13">13</option>
								<option value="14">14</option>
								<option value="15">15</option>
								<option value="16">16</option>
								<option value="17">17</option>
								<option value="18">18</option>
								<option value="19">19</option>
								<option value="20">20</option>
								<option value="21">21</option>
								<option value="22">22</option>
								<option value="23">23</option>
								<option value="24">24</option>
								<option value="25">25</option>
								<option value="26">26</option>
								<option value="27">27</option>
								<option value="28">28</option>
								<option value="29">29</option>
								<option value="30">30</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Start Date</td>
						<td>
							<input type="text" name="Start_Date" />
							<a href="javascript:show_calendar('frmAddOffer.Start_Date');"><img src="calendar.gif" alt="Calender"></a>
						</td>
					</tr>
					<tr>
						<td>End Date</td>
						<td>
							<input type="text" name="End_Date" />
							<a href="javascript:show_calendar('frmAddOffer.End_Date');"><img src="calendar.gif" alt="Calender"></a>
						</td>
					</tr>
					<tr>
						<td>Price</td>
						<td><input type="text" name="Price"></td>
					</tr>
					<tr>
						<td>Keywords</td>
						<td><textarea cols="40" rows="3" type="text" name="Keywords"></textarea></td>
					</tr>
					<tr>
						<td>IMAGE 1</td>
						<td><input name="image1" type="file" /></td>
					</tr>
					<tr>
						<td>IMAGE 2</td>
						<td><input name="image2" type="file" /></td>
					</tr>
					<tr>
						<td>IMAGE 3</td>
						<td><input name="image3" type="file" /></td>
					</tr>
					<tr>
						<td>IMAGE 4</td>
						<td><input name="image4" type="file" /></td>
					</tr>
					<tr>
						<td id="submit" colspan="2"><br /><br /><input type="submit" value="Add Offer" /></td>
					</tr>
				</table>
			</form>
			
		</div>
		
	</div>
	
</body>

</html>