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

					if (document.frmEditNews.Title.value == '')
					{	           
						alert('You have not entered a Title!');
						document.frmEditNews.Title.focus();
						return false;
					}
					else if (document.frmEditNews.Details.value == '')
					{	           
						alert('You have not entered any details!');
						document.frmEditNews.Details.focus();
						return false;
					}
				}
			</script>
			
			<?php
			
				include '../dbConnect.php';
				
				$query = "SELECT * FROM tblNews WHERE News_ID = '".$_GET['News_ID']."'";
				$result = mysql_query($query);
				$search = mysql_fetch_array($result);
				
				echo '<form id="enquiry" name="frmEditNews" method="post" action="submitNewsChanges.php" onSubmit="return enquiryFieldValidate()" >';
				echo '	<table id="enquiryForm">';
				echo '		<tr>';
				echo '			<td>News ID</td>';
				echo '			<td><input type="text" name="News_ID" value="'.$search['News_ID'].'"/></td>';
				echo '		</tr>';
				echo '		<tr>';
				echo '			<td>Title</td>';
				echo '			<td><input type="text" name="Title" value="'.$search['Title'].'"/></td>';
				echo '		</tr>';
				echo '		<tr>';
				echo '			<td>Details</td>';
				echo '			<td><textarea cols="50" rows="4" type="text" name="Details">'.$search['Details'].'</textarea></td>';
				echo '		</tr>';
				echo '		<tr>';
				echo '			<td id="submit" colspan="2"><br /><br /><input type="submit" value="Add News" /></td>';
				echo '		</tr>';
				echo '	</table>';
				echo '</form>';
				
			?>
		</div>
		
	</div>
	
</body>

</html>