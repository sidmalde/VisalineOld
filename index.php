<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Visaline Travel - Flights &amp; Pakages to Put a Smile on Your Face</title>
<meta name="keywords" content="" />
<meta name="description" content="" />

        <!--[if IE 6]><link href="ie.css" rel="stylesheet" type="text/css"><![endif]-->
        <!--[if IE 7]><link href="ie.css" rel="stylesheet" type="text/css"><![endif]-->
        <!--[if IE 8]><link href="default.css" rel="stylesheet" type="text/css"><![endif]-->

    <![if !IE]>
                <link rel="stylesheet" type="text/css" href="default.css" />
    <![endif]>

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
<div style="background-color:#000;font-size: 23px;min-height: 100px;max-width: 250px;"><p> 07789 868 553</p>
        <p>sales@visaline.co.uk</p>
    </div>
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

                                <form class="search" name="frmSearch" method="post" action="searchresult.php" onSubmit="return searchFieldValidate();" >
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

                        <div id="mainOffers">
                                <?php

                                        include 'dbConnect.php';

                                        function checkAndPrint($region, $text, $result)
                                        {
                                                echo '<div id="offers'.$region.'">'."\n";
                                                echo '<h3><a href="region.php?region='.$region.'" class="regionOfferHeader" onmouseover="roll_over(\'\', \'\', \'banner'.$region.'\')" onmouseout="roll_over(\'\', \'\', \'bannerHome\')">'.$text.'</a></h3>'."\n";
                                                echo '<ul>'."\n";



                                                if (mysqli_num_rows($result) != 0)
                                                {
                                                        while ($search = mysqli_fetch_array($result))
                                                        {
                                                                $offerName = $search['Offer_Name'];
                                                                if (strlen($offerName) >= 59)
                                                                        $offerName = substr($search['Offer_Name'], 0, 57)."...";

                                                                echo '<li><a href="offer.php?region='.$region.'&offerID='.$search['Offer_ID'].'">'.$offerName.'&nbsp;&nbsp;&nbsp;&nbsp;<strong>&pound;'.$search['Price'].'</strong></a></li>'."\n";
                                                        }
                                                }
                                                else
                                                {
                                                        echo 'No Offers At the Moment!'."\n";
                                                }

                                                echo '</ul>'."\n";
                                                echo '</div>'."\n";
                                        }

                                        $result = mysqli_query($connection, "SELECT Offer_ID, Offer_Name, Price FROM `tblAfrica` ORDER BY `Rank` ASC LIMIT 12");
                                        checkAndPrint("Africa", "Wild Africa", $result);

                                        $result = mysqli_query($connection, "SELECT Offer_ID, Offer_Name, Price FROM `tblAsia` ORDER BY `Rank` ASC LIMIT 12");
                                        checkAndPrint("Asia", "Spicy Asia", $result);

                                        $result = mysqli_query($connection, "SELECT Offer_ID, Offer_Name, Price FROM `tblFarEast` ORDER BY `Rank` ASC LIMIT 12");
                                        checkAndPrint("FarEast", "Far East", $result);

                                        $result = mysqli_query($connection, "SELECT Offer_ID, Offer_Name, Price FROM `tblMiddleEast` ORDER BY `Rank` ASC LIMIT 12");
                                        checkAndPrint("MiddleEast", "Middle East", $result);

                                        $result = mysqli_query($connection, "SELECT Offer_ID, Offer_Name, Price FROM `tblAuz` ORDER BY `Rank` ASC LIMIT 12");
                                        checkAndPrint("Auz", "Australia &amp; New Zealand", $result);

                                        /*$result = mysqli_query($connection, "SELECT Offer_ID, Offer_Name, Price FROM `tblPackages` ORDER BY `Rank` ASC LIMIT 12");
                                        checkAndPrint("Packages", "Packages", $result);

                                        $result = mysqli_query($connection, "SELECT Offer_ID, Offer_Name, Price FROM `tblCruises` ORDER BY `Rank` ASC LIMIT 12");
                                        checkAndPrint("Cruises", "Cruises", $result);*/

                                        $result = mysqli_query($connection, "SELECT Offer_ID, Offer_Name, Price FROM `tblSpecials` ORDER BY `Rank` ASC LIMIT 12");
                                        checkAndPrint("Specials", "More Specials", $result);

                                ?>

                        </div>



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