<?php
//include a db.php file to connect to database
session_start();
include ("db.php");

//create a variable called $pagename which contains the actual name of the page and set up scaling
$pagename="Contract Deliverables";
echo "<head>";
echo "<meta charset=utf-8 />";
echo "<meta name=viewport content=width=device-width, initial-scale=1.0 />";
//call in the style sheet called ystylesheet.css to format the page as defined in the style sheet
echo "<link rel=stylesheet type=text/css href=materialize.css>";
echo "<script src=js/materialize.js></script>";
//---------------------------------------------
//Header
//---------------------------------------------

//display window title
echo "<title>".$pagename."</title>";

//---------------------------------------------
//Header
//---------------------------------------------

echo "<div class=navbar-fixed>";
echo   "<nav>";
echo     "<div class=nav-wrapper>";
echo        "<a href=index.php class=brand-logo center> Supply.me</a>";
echo        "<ul class=right hide-on-med-and-down>";
//Multiple choice Navbar depending on login state
	if (isset($_SESSION['c_userid']))
	{
		echo  "<li><a href=createcontract.php>Create Contract</a></li>";
		echo  "<li><a href=contracts.php>Open Contracts</a></li>";
		echo  "<li><a href=managecontracts.php>Manage Contracts</a></li>";
		echo  "<li><a href=accountbuyer.php>Account</a></li>";
		echo  "<li><a href=logout.php>Sign Out</a></li>";
	}
	else
	{
			if (isset($_SESSION['c_supplierid']))
			{
				echo  "<li><a href=contracts.php>Avaliable Contracts</a></li>";
				echo  "<li><a href=accountbuyer.php>Account</a></li>";
				echo  "<li><a href=manageoffers.php>Manage Offers</a></li>";
				echo  "<li><a href=logout.php>Sign Out</a></li>";

			}

				echo   "<li><a href=contracts.php>Avaliable Contracts</a></li>";
				echo   "<li><a href=registerbuyer.php>Register as Buyer</a></li>";
				echo   "<li><a href=registersupplier.php>Register as Supplier</a></li>";
				echo   "<li><a href=login.php class=btn>Sign In</a></li>";
		}
echo        "</ul>";
echo      "</div>";
echo    "</nav>";
echo  "</div>";

//---------------------------------------------
//Breadcrumbs Below Nav (Hompage not used)
//---------------------------------------------
// echo    "<div>";
// echo      "<div class=col s12>";
// echo        "<a href=#! class=breadcrumb>First</a>";
// echo        "<a href=#! class=breadcrumb>Second</a>";
// echo        "<a href=#! class=breadcrumb>Third</a>";
// echo      "</div>";
// echo    "</div>";


//---------------------------------------------
//welcome of the site
//---------------------------------------------
include ("detectloginbuyer.php");
echo "<body>";
echo "<center>";
echo "<div class=container>";
//display name of the page and some text (main section)
echo "<h5>".$pagename."</h5>";
echo "<font size=2> <p><i> Details of the below contract </i></font>";
echo "</div>";
echo "</body>";

echo "<p>";

//---------------------------------------------
//body of the site 
//---------------------------------------------

//retrieve the product id passed from the previous page using the $_GET superglobal variable
//store the value in a variable called $prodid
$contractid=$_GET['u_contractID'];
//echo "<p>Selected product Id: ".$prodid;


//query the product table to retrieve the record for which the value of the product id 
//matches the product id of the product that was selected by the user
$contractSQL="select contractID, itemName, itemDesc, 
itemCategory, itemQuant, itemHeight, itemWidth, itemDepth, itemAddress, itemCountry, itemCity, itemPostCode, dateTime, contractStatus, userId from contracts
where contractID=".$contractid;
//execute SQL query
$execontractSQL=mysql_query($contractSQL) or die(mysql_error());
//create array of records & populate it with result of the execution of the SQL query
$thearrayprod=mysql_fetch_array($execontractSQL);

//display product name in capital letters
echo "<center>";
//create a HTML form to capture the user's details
echo "<div class=container>";
echo "<div class=row>";
//itemName
echo "<div class=row>";
echo "<div class='col s12'>";
echo "<p><center><h6>".($thearrayprod['itemName'])."</h6></center>";
echo "</div>";
echo "</div>";
//Description
echo "<div class=row>";
echo "<div class='col s12'>";
echo "<b>Contract Description</b><h6><p>".($thearrayprod['itemDesc']);
echo "</div>";
echo "</div>";
//category
echo "<div class=row>";
echo "<div class='col s6'>";
echo "<p><b>Item Category</b><h6>".($thearrayprod['itemCategory']);
echo "</div>";
//quantity
echo "<div class=row>";
echo "<div class='col s6'>";
echo "<p><b>Quantity Required</b><h6>".($thearrayprod['itemQuant']);
echo "</div>";
echo "</div>";
//decription
echo "<div class=row>";
echo "<div class='col s12'>";
echo "<h6><b>Dimensions of Contract</b></h6>";
echo "</div>";
echo "</div>";
//height 
echo "<div class=row>";
echo "<div class='col s4'>";
echo "<p><b>Desired Height (mm) </b><h6>".($thearrayprod['itemHeight']);
echo "</div>";
//width 
echo "<div class='col s4'>";
echo "<p><b>Desired width (mm): </b><h6>".($thearrayprod['itemWidth']);
echo "</div>";
//depth 
echo "<div class='col s4'>";
echo "<p><b>Desired depth (mm): </b><h6>".($thearrayprod['itemDepth']);
echo "</div>";
echo "</div>";
//decription
echo "<div class=row>";
echo "<div class='col s12'>";
echo "<h6><b>Contract Delivery Address</b></h6>";
echo "</div>";
echo "</div>";
//address
echo "<div class=row>";
echo "<div class='col s12'>";
echo "<b>Address</b><h6><p>".($thearrayprod['itemAddress']);
echo "</div>";
echo "</div>";
//country
echo "<div class=row>";
echo "<div class='col s12'>";
echo "<b>Country</b><h6><p>".($thearrayprod['itemCountry']);
echo "</div>";
echo "</div>";
//city
echo "<div class=row>";
echo "<div class='col s6'>";
echo "<p><b>City</b><h6>".($thearrayprod['itemCity']);
echo "</div>";
//postcode
echo "<div class=row>";
echo "<div class='col s6'>";
echo "<p><b>Postcode</b><h6>".($thearrayprod['itemPostCode']);
echo "</div>";
echo "</div>";
//Contract ID
echo "<div class=row>";
echo "<div class='col s12'>";
echo "<p align=right>".($thearrayprod['contractID']);
echo "</div>";
echo "</div>";
echo "</center>";

//---------------------------------------------
//Footer
//---------------------------------------------
//include footer layout
include("footfile.html");
?>
