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
			
			<?php
				
				include '../dbConnect.php';
				
				$query = 'SELECT * FROM tbl'.$_GET['region'].' WHERE Offer_ID='.$_GET['offerID'];
				
				$search = mysql_fetch_assoc(mysqli_query($connection, $query));				
								
				echo '<form id="enquiry" name="frmAddOffer" method="post" enctype="multipart/form-data" action="submitChanges.php" onSubmit="return enquiryFieldValidate()" >';
				echo '	<input type="hidden" name="MAX_FILE_SIZE" value="100000000" />';
				echo '	<table id="enquiryForm">';
				echo '		<tr>';
				echo '			<td>Offer ID</td>';
				echo '			<td><input name="offerID" value="'.$_GET['offerID'].'" /></td>';
				echo '		</tr>';
				echo '		<tr>';
				echo '			<td>Region</td>';
				echo '			<td>';
				echo '				<input name="Region" value="'.$_GET['region'].'" />';

				echo '				</select>';
				echo '			</td>';
				echo '		</tr>';
				echo '		<tr>';
				echo '			<td>Offer Name</td>';
				echo '			<td><input type="text" name="Offer_Name" value="'.$search['Offer_Name'].'" /></td>';
				echo '		</tr>';

				echo '		<tr>';
				echo '			<td>Reference</td>';
				echo '			<td><input type="text" name="Reference" value="'.$search['Reference'].'" /></td>';
				echo '		</tr>';
				echo '		<tr>';
				echo '			<td>Details</td>';
				echo '			<td><textarea cols="50" rows="8" type="text" name="Details" >'.$search['Details'].'</textarea></td>';
				echo '		</tr>';
				echo '		<tr>';
				echo '			<td>Rank</td>';
				echo '			<td><input type="text" name="Rank" value="'.$search['Rank'].'" /></td>';
				echo '		</tr>';
				echo '		<tr>';
				echo '			<td>Start Date</td>';
				echo '			<td>';
				echo '				<input type="text" name="Start_Date" value="'.$search['Start_Date'].'" />';
				echo '				<a href="javascript:show_calendar(\'frmAddOffer.Start_Date\');"><img src="calendar.gif" alt="Calender"></a>';
				echo '			</td>';
				echo '		</tr>';
				echo '		<tr>';
				echo '			<td>End Date</td>';
				echo '			<td>';
				echo '				<input type="text" name="End_Date" value="'.$search['End_Date'].'" />';
				echo '				<a href="javascript:show_calendar(\'frmAddOffer.End_Date\');"><img src="calendar.gif" alt="Calender"></a>';
				echo '			</td>';
				echo '		</tr>';
				echo '		<tr>';
				echo '			<td>Price</td>';
				echo '			<td><input type="text" name="Price" value="'.$search['Price'].'" ></td>';
				echo '		</tr>';
				echo '		<tr>';
				echo '			<td>Keywords</td>';
				echo '			<td><textarea cols="40" rows="3" type="text" name="Keywords">'.$search['Keywords'].'</textarea></td>';
				echo '		</tr>';
				echo '		<tr>';
				echo '			<td>IMAGE 1</td>';
				echo '			<td><input name="image1" type="file" /></td>';
				echo '		</tr>';
				echo '		<tr>';
				echo '			<td>IMAGE 2</td>';
				echo '			<td><input name="image2" type="file" /></td>';
				echo '		</tr>';
				echo '		<tr>';
				echo '			<td>IMAGE 3</td>';
				echo '			<td><input name="image3" type="file" /></td>';
				echo '		</tr>';
				echo '		<tr>';
				echo '			<td>IMAGE 4</td>';
				echo '			<td><input name="image4" type="file" /></td>';
				echo '		</tr>';
				echo '		<tr>';
				echo '			<td id="submit" colspan="2"><br /><br /><input type="submit" value="Submit Changes" /></td>';
				echo '		</tr>';
				echo '	</table>';
				echo '</form>';
				

			?>
		</div>
		
	</div>
	
</body>

</html>