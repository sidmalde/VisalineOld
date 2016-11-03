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
			
			<h2> Terms & Conditions </h2>
			
			<p class="termsHeading">BOOKING CONDITIONS</p>
			<p>Please read these terms and conditions carefully. They apply to all holidays and flights 
			described in this brochure / website and they deal with your rights and obligations to us and 
			ours to you. We are committed to a policy of fair trading and make every effort to ensure that 
			you have an enjoyable holiday with us. </p>
			
			<p class="termsHeading">Consumer Protection & Financial Security</p>
			<p>The air holidays in this brochure are ATOL Protected, since we hold an Air Travel Organiser's
			Licence granted by the Civil Aviation Authority. In the unlikely event of our insolvency, the CAA
			will ensure that you are not stranded abroad and will arrange to refund any money you have paid us
			for an advance booking. Please remember that there is NO FINANCIAL PROTECTION should you book 
			directly with an airline. For further information, visit the ATOL website at www.atol.org.uk </p>
			
			<p class="termsHeading">Your Flight Contract</p>
			<p>As soon as we dispatch your flight confirmation invoice, but not before, your contract with 
			Visaline travel takes effect. Once the contract is made, we are responsible to you to provide the
			flight you have booked and you are responsible to us to pay for it subject to our advertised terms
			and conditions detailed elsewhere in the brochure/website. Please note it is important to check 
			carefully the written confirmation of your booking when you receive it, or, if booking late, that 
			all the details are exactly as requested at the time of booking. Our responsibility is to provide 
			you with the holiday you have booked as described in the brochure/website and as confirmed to you. 
			If you wish to cancel or change your booking you may have to pay cancellation or amendment charges. 
			With parties of two or more people, the person who makes the booking accepts responsibility for making
			all payments to Visaline travel for all members of the party. We will send all documents and other 
			information to that person who will, in turn, be responsible for ensuring that the other members of 
			the party are kept fully informed. </p>
			
			<p class="termsHeading">Prices</p>
			<p>All prices in the brochure / website are in pounds sterling per person. we reserve the right to 
			raise or lower prices at any time before you book. If, at the time of booking your flight, the price 
			has changed from that shown in the brochure/website you will be advised of the new price applicable 
			to your booking before you confirm the flight reservation. All Prices in the different sections or any
			where in the site are EXCLUDING TAXES and based on per person unless stated. </p>
			
			<p class="termsHeading">Payment</p>
			<p>Payment for your flight is as follows a) if you book more than 9 weeks before your flight departure
			date you are required to pay a deposit of at least &pound;100 per person. The balance is payable 9 weeks 
			before departure. b) if you book less than 9 weeks before departure you must pay the full price of your
			flight at the time of making the booking. Payment may be made by cheque (if there is time to clear it 
			to meet the payment schedule shown above you should allow 5 working days for clearance from the time we
			receive it) or with a credit or debit card (a surcharge may apply) acceptable by Visaline travel. If you
			have paid your deposit by debit/credit card, Visaline travel will automatically debit the balance due from
			the same card unless advised in writing not to do so. We reserve the right to cancel your flight if you 
			fail to make payment on time. In this case, you would then owe Visaline travel the cancellation charges 
			set out below. Please note Visaline travel does not send payment reminders. </p>

			<p class="termsHeading">Special Requests</p>
			<p>If you have a special request which does not form part of the flight as described in the 
			brochure / website, please let us know. We will always try to provide such requests but cannot guarantee 
			to do so. Under no circumstances will such requests be accepted by us to form part of our contractual 
			obligations and there will be no liability on our part if they are not met.</p>

			<p class="termsHeading">Flight Insurance</p>
			<p>It is a condition of booking that you take out Visaline travel insurance policies or arrange another 
			policy which provides you with at least the same amount of cover. The cost of medical and other treatment
			overseas can be high, and, if no insurance is taken, we will not be able to assist you in any way. Please 
			also ensure that you are fully protected against possible flight delays. If you do not take our insurance, 
			we require you to give us details of the alternative insurance you have arranged. As cancellation cover 
			applies immediately, no refund of insurance premiums can be made. We believe the cover offered by Visaline 
			Travel insurance is perfectly adequate for our flights but, should you need additional cover for whatever 
			reason, or should you wish to increase the insured amounts, it is your responsibility to arrange additional 
			cover. </p>

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
