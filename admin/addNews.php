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
			
			<h2> Add News </h2>
			
			<script type="text/javascript">
				function enquiryFieldValidate()	    
				{	       

					if (document.frmAddNews.Title.value == '')
					{	           
						alert('You have not entered a Title!');
						document.frmAddNews.Title.focus();
						return false;
					}
					else if (document.frmAddNews.Details.value == '')
					{	           
						alert('You have not entered any details!');
						document.frmAddNews.Details.focus();
						return false;
					}
				}
			</script>

			<form id="enquiry" name="frmAddNews" method="post" action="uploadNews.php" onSubmit="return enquiryFieldValidate()" >
				<table id="enquiryForm">
					<tr>
						<td>Title</td>
						<td><input type="text" name="Title" /></td>
					</tr>
					<tr>
						<td>Details</td>
						<td><textarea cols="50" rows="4" type="text" name="Details"></textarea></td>
					</tr>
					<tr>
						<td id="submit" colspan="2"><br /><br /><input type="submit" value="Add News" /></td>
					</tr>
				</table>
			</form>
			
		</div>
		
	</div>
	
</body>

</html>