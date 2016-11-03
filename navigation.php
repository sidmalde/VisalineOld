<?php
	$section = "";
	function menu($section)
	{
		if ($section == ("Home" || "Africa" || "Asia" || "FarEast" || "MiddleEast" || "Auz" || "Packages" || "Cruises" || "Specials"))
		{
			echo '<a href="index.php" onmouseover="roll_over(\'home\', \'homeHover\', \'bannerHome\')" onmouseout="roll_over(\'home\', \'home\', \'banner'.$section.'\')"><img src="buttons/home.jpg" name="home"></a>'."\n";
			echo '<a href="region.php?region=Africa" onmouseover="roll_over(\'africa\', \'africaHover\', \'bannerAfrica\')" onmouseout="roll_over(\'africa\', \'africa\', \'banner'.$section.'\')"><img src="buttons/africa.jpg" name="africa"></a>'."\n";
			echo '<a href="region.php?region=Asia" onmouseover="roll_over(\'asia\', \'asiaHover\', \'bannerAsia\')" onmouseout="roll_over(\'asia\', \'asia\', \'banner'.$section.'\')"><img src="buttons/asia.jpg" name="asia"></a>'."\n";
			echo '<a href="region.php?region=FarEast" onmouseover="roll_over(\'farEast\', \'farEastHover\', \'bannerFarEast\')" onmouseout="roll_over(\'farEast\', \'farEast\', \'banner'.$section.'\')"><img src="buttons/farEast.jpg" name="farEast"></a>'."\n";
			echo '<a href="region.php?region=MiddleEast" onmouseover="roll_over(\'middleEast\', \'middleEastHover\', \'bannerMiddleEast\')" onmouseout="roll_over(\'middleEast\', \'middleEast\', \'banner'.$section.'\')"><img src="buttons/middleEast.jpg" name="middleEast"></a>'."\n";
			echo '<a href="region.php?region=Auz" onmouseover="roll_over(\'oz\', \'ozHover\', \'bannerAuz\')" onmouseout="roll_over(\'oz\', \'oz\', \'banner'.$section.'\')"><img src="buttons/oz.jpg" name="oz"></a>'."\n";
			//echo '<a href="region.php?region=Packages" onmouseover="roll_over(\'packages\', \'packagesHover\', \'bannerPackages\')" onmouseout="roll_over(\'packages\', \'packages\', \'banner'.$section.'\')"><img src="buttons/packages.jpg" name="packages"></a>'."\n";
			//echo '<a href="region.php?region=Cruises" onmouseover="roll_over(\'cruises\', \'cruisesHover\', \'bannerCruises\')" onmouseout="roll_over(\'cruises\', \'cruises\', \'banner'.$section.'\')"><img src="buttons/cruises.jpg" name="cruises"></a>'."\n";
			echo '<a href="region.php?region=Specials" onmouseover="roll_over(\'specials\', \'specialsHover\', \'bannerSpecials\')" onmouseout="roll_over(\'specials\', \'specials\', \'banner'.$section.'\')"><img src="buttons/specials.jpg" name="specials"></a>'."\n";
			echo '<a href="enquire.php" onmouseover="roll_over(\'enquire\', \'enquireHover\', \'bannerHome\')" onmouseout="roll_over(\'enquire\', \'enquire\', \'banner'.$section.'\')"><img src="buttons/enquire.jpg" name="enquire" /></a>'."\n";
			echo '<a href="terms.php" onmouseover="roll_over(\'terms\', \'termsHover\', \'bannerHome\')" onmouseout="roll_over(\'terms\', \'terms\', \'banner'.$section.'\')"><img src="buttons/terms.jpg" name="terms" /></a>'."\n";
			echo '<a href="news.php" onmouseover="roll_over(\'news\', \'newsHover\', \'bannerHome\')" onmouseout="roll_over(\'news\', \'news\', \'banner'.$section.'\')"><img src="buttons/news.jpg" name="news" /></a>'."\n";
		}
		else
		{
			echo '<a href="index.php" onmouseover="roll_over(\'home\', \'homeHover\', \'bannerHome\')" onmouseout="roll_over(\'home\', \'home\', \'bannerHome\')"><img src="buttons/home.jpg" name="home"></a>'."\n";
			echo '<a href="region.php?region=Africa" onmouseover="roll_over(\'africa\', \'africaHover\', \'bannerAfrica\')" onmouseout="roll_over(\'africa\', \'africa\', \'bannerHome\')"><img src="buttons/africa.jpg" name="africa"></a>'."\n";
			echo '<a href="region.php?region=Asia" onmouseover="roll_over(\'asia\', \'asiaHover\', \'bannerAsia\')" onmouseout="roll_over(\'asia\', \'asia\', \'bannerHome\')"><img src="buttons/asia.jpg" name="asia"></a>'."\n";
			echo '<a href="region.php?region=FarEast" onmouseover="roll_over(\'farEast\', \'farEastHover\', \'bannerFarEast\')" onmouseout="roll_over(\'farEast\', \'farEast\', \'bannerHome\')"><img src="buttons/farEast.jpg" name="farEast"></a>'."\n";
			echo '<a href="region.php?region=MiddleEast" onmouseover="roll_over(\'middleEast\', \'middleEastHover\', \'bannerMiddleEast\')" onmouseout="roll_over(\'middleEast\', \'middleEast\', \'bannerHome\')"><img src="buttons/middleEast.jpg" name="middleEast"></a>'."\n";
			echo '<a href="region.php?region=Auz" onmouseover="roll_over(\'oz\', \'ozHover\', \'bannerAuz\')" onmouseout="roll_over(\'oz\', \'oz\', \'bannerHome\')"><img src="buttons/oz.jpg" name="oz"></a>'."\n";
			//echo '<a href="region.php?region=Packages" onmouseover="roll_over(\'packages\', \'packagesHover\', \'bannerPackages\')" onmouseout="roll_over(\'packages\', \'packages\', \'bannerHome\')"><img src="buttons/packages.jpg" name="packages"></a>'."\n";
			//echo '<a href="region.php?region=Cruises" onmouseover="roll_over(\'cruises\', \'cruisesHover\', \'bannerCruises\')" onmouseout="roll_over(\'cruises\', \'cruises\', \'bannerHome\')"><img src="buttons/cruises.jpg" name="cruises"></a>'."\n";
			echo '<a href="region.php?region=Specials" onmouseover="roll_over(\'specials\', \'specialsHover\', \'bannerSpecials\')" onmouseout="roll_over(\'specials\', \'specials\', \'bannerHome\')"><img src="buttons/specials.jpg" name="specials"></a>'."\n";
			echo '<a href="enquire.php" onmouseover="roll_over(\'enquire\', \'enquireHover\', \'bannerHome\')" onmouseout="roll_over(\'enquire\', \'enquire\', \'bannerHome\')"><img src="buttons/enquire.jpg" name="enquire" /></a>'."\n";
			echo '<a href="terms.php" onmouseover="roll_over(\'terms\', \'termsHover\', \'bannerHome\')" onmouseout="roll_over(\'terms\', \'terms\', \'bannerHome\')"><img src="buttons/terms.jpg" name="terms" /></a>'."\n";
			echo '<a href="news.php" onmouseover="roll_over(\'news\', \'newsHover\', \'bannerHome\')" onmouseout="roll_over(\'news\', \'news\', \'bannerHome\')"><img src="buttons/news.jpg" name="news" /></a>'."\n";
		}
		
		echo '<p>&nbsp;</p>';
	}
	
	function addFooter()
	{
		//echo '<img id="imgAtol" src="images/atol.jpg" />';
		echo '<p id="cardsIMG"><img id="imgCards" src="images/cards.jpg" /></p>';

		echo '<p id="termsFooter">All offers are subject to availability and T&nbsp;&amp;&nbsp;C and inclusive of approx. taxes unless otherwise stated</p><br />';

		echo '<p class="footerText">';
		echo '<a href="index.php">Home</a> &#124;&nbsp;';
		echo '<a href="region.php?region=Africa">Wild Africa</a> &#124;&nbsp;';
		echo '<a href="region.php?region=Asia">Spicy Asia</a> &#124;&nbsp;';
		echo '<a href="region.php?region=FarEast">Far East</a> &#124;&nbsp;';
		echo '<a href="region.php?region=MiddleEast">Middle East</a> &#124;&nbsp;';
		echo '<a href="region.php?region=Auz">Australia & New Zealand</a> &#124;&nbsp;';
		//echo '<a href="region.php?region=Packages">Packages</a> &#124;&nbsp;';
		//echo '<a href="region.php?region=Cruises">Cruises</a> &#124;&nbsp;';
		echo '<a href="region.php?region=Specials">More Specials</a> &#124;&nbsp;';
		echo '<a href="enquire.php">Enquire</a> &#124;&nbsp;';
		echo '<a href="terms.php">T&amp;C</a>';
		echo '</p>';
		echo '<br />';

		echo '<p class="footerText">Copyright &copy; '.date('Y').' www.visaline.com. Designed by <a href="http://www.sidmalde.com"><strong>Guru Solutions</strong></a></p>';
			
	}
?>