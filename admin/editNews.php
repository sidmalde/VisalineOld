<?php
	ini_set("display_errors","1");
	ERROR_REPORTING(E_ALL);
//  include 'admin_session_auth.php'; 
?>
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
			
			<h2> Edit News </h2>
			
			<?php
			
				include '../dbConnect.php';
				
				$query = mysql_query("SELECT * FROM tblNews");
				
				echo '<h1>NEWS</h1><br />';
				
				echo '<table class="listOffers">';
				echo '<tr>';
				echo '<th>News ID</th>';
				echo '<th>Title</th>';
				echo '<th>Details</th>';
				echo '</tr>';

				$rowNum = 1;
				
				while ($search = mysql_fetch_array($query))
				{
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
					
					echo '<tr>'."\n";
					echo '<td>'.$search['News_ID'].'</td>'."\n";
					echo '<td>'.$search['Title'].'</td>'."\n";
					echo '<td>'.$search['Details'].'</td>'."\n";
					echo '<td><a href="editNewsDetails.php?News_ID='.$search['News_ID'].'">EDIT</a></td>'."\n";
					echo '<td><a href="deleteNews.php?News_ID='.$search['News_ID'].'">DELETE</a></td>'."\n";
					echo '</tr>'."\n";
				}
				echo '</table>'."\n";
			?>
		</div>
		
	</div>
	
</body>

</html>