<?php
	ini_set("display_errors","1");
	ERROR_REPORTING(E_ALL);
//  include 'admin_session_auth.php'; 
?>
<?php
	include '../dbConnect.php';
	
	$currentDateSplit = splitDate(date("d-M-y"));			
	
	removeOldOffers("tblAfrica", $currentDateSplit);
	removeOldOffers("tblAsia", $currentDateSplit);
	removeOldOffers("tblFarEast", $currentDateSplit);
	removeOldOffers("tblMiddleEast", $currentDateSplit);
	removeOldOffers("tblAuz", $currentDateSplit);
	removeOldOffers("tblPackages", $currentDateSplit);
	removeOldOffers("tblCruises", $currentDateSplit);
	removeOldOffers("tblSpecials", $currentDateSplit);
	
	
	echo "<META HTTP-EQUIV=\"refresh\" content=\"3; URL=home.php\">";
	
	function removeOldOffers($tbl, $currentDate)
	{
		$count=0;
		$result = mysql_query("SELECT * FROM ".$tbl);
		while ($search = mysql_fetch_array($result))
		{
			$endDate = splitDate($search['End_Date']);
			
			if ($currentDate[2] > $endDate[2])
			{
				mysql_query("DELETE FROM ".$tbl." WHERE Offer_ID ='".$search['Offer_ID']."' LIMIT 1");
				$count++;
			}
			else
			{
				if ($currentDate[2] == $endDate[2])
				{
					if ($currentDate[1] > $endDate[1])
					{
						mysql_query("DELETE FROM ".$tbl." WHERE Offer_ID ='".$search['Offer_ID']."' LIMIT 1");
						$count++;
					}
					else
					{
						if ($currentDate[1] == $endDate[1])
						{
							if ($currentDate[0] > $endDate[0])
							{
								mysql_query("DELETE FROM ".$tbl." WHERE Offer_ID ='".$search['Offer_ID']."' LIMIT 1");
								$count++;
							}
						}
					}
				}
			}
		}
		
		echo $count." offers(s) have been deleted from ".$tbl.'<br />';

	}
	
	function splitDate($date)
	{
		$dateChars = preg_split('/-/', $date, -1, PREG_SPLIT_OFFSET_CAPTURE);
		$dateDD = $dateChars[0][0];
		$dateMM = monthSwap($dateChars[1][0]);
		$dateYYYY = $dateChars[2][0];
		
		$dateSplit = array($dateDD, $dateMM, $dateYYYY);
		return $dateSplit;
	}
	
	function monthSwap($month)
	{
		switch ($month)
		{
			case ($month == "JAN" || $month == "Jan"):
				return "01";
				break;
			case ($month == "FEB" || $month == "Feb"):
				return "02";
				break;
			case ($month == "MAR" || $month == "Mar"):
				return "03";
				break;
			case ($month == "APR" || $month == "Apr"):
				return "04";
				break;
			case ($month == "MAY" || $month == "May"):
				return "05";
				break;
			case ($month == "JUN" || $month == "Jun"):
				return "06";
				break;
			case ($month == "JUL" || $month == "Jul"):
				return "07";
				break;
			case ($month == "AUG" || $month == "Aug"):
				return "08";
				break;
			case ($month == "SEP" || $month == "Sep"):
				return "09";
				break;
			case ($month == "OCT" || $month == "Oct"):
				return "10";
				break;
			case ($month == "NOV" || $month == "Nov"):
				return "11";
				break;
			case ($month == "DEC" || $month == "Dec"):
				return "12";
				break;
		}
	}
?>