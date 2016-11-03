<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Visaline Travel</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="admin.css" rel="stylesheet" type="text/css" />
	
	<?php
		include 'navigation.php';
	?>

</head>

<body>

	<div id="container">
		
		<div id="login">
			
			<form id="frmLogin" name="frmLogin" method="post" action="loginCheck.php">
				<table id="loginTable">
					<tr>
						<td><b>Username</b></td>
						<td><input type="text" class="frmTxtField" name="username"></td>
					</tr>
					<tr>
						<td><b>Password</b></td>
						<td><input type="password" class="frmTxtField" name="password"></td>
					</tr>
					<tr>
						<td colspan="2"><br /><br /><input type="submit" value="Login"></td>
					</tr>
				</table>
			</form>
			
		</div>
		
	</div>
	
</body>

</html>