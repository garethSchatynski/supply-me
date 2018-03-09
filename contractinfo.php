<?php
//include a db.php file to connect to database
session_start();
include ("db.php");
include ("web3.html");

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
		echo  "<li><a href=manageoffers.php>Manage Offers</a></li>";
		echo  "<li><a href=accountbuyer.php>Account</a></li>";
		echo  "<li><a href=logout.php>Sign Out</a></li>";
	}
	else
	{

				echo   "<li><a href=contracts.php>Avaliable Contracts</a></li>";
				echo   "<li><a href=register.php>Register</a></li>";
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
include ("detectlogin.php");
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
$query="SELECT contractID, itemName, itemDesc, 
itemCategory, itemQuant, itemHeight, itemWidth, itemDepth, itemAddress, itemCountry, itemCity, itemPostCode, dateTime, contractStatus, userId FROM contracts
WHERE contractID=".$contractid;
//execute SQL query
$sql = $con->query($query);
// num_rows will count the affected rows base on your sql query. so $n will return a number base on your query
$n = $sql->num_rows;
if($n > 0){
	$array = mysqli_fetch_array($sql);
	$height=$array['itemHeight'];
	$width=$array['itemWidth'];
	$depth=$array['itemDepth'];
	$userid=$_SESSION['c_userid'];
	$contractid=$array['contractID'];

//display product name in capital letters
echo "<center>";
//create a HTML form to capture the user's details
echo "<p><h6>".($array['itemName'])."<p></h6>";
echo "<div class=container>";
echo	"<table class=striped>";
echo	  "<tr>";
echo		  "<td colspan=6> Description <p>".($array['itemDesc'])."</td>";
echo	  "</tr align='right'>";
echo      "<center>";
echo	  "<tr>";
echo		"<td colspan=3> Item Category: ".($array['itemCategory'])."</td>";
echo		"<td colspan=3>Quantity Required: ".($array['itemQuant'])."</td>";
echo	  "</tr>";
if($height > 0 or $width > 0 or $depth > 0){
	echo	  "<tr>";
	echo		"<td colspan=6><h6> Dimensions of Item </h6></td>";
	echo	  "</tr>";
	echo	  "<tr>";
	echo		"<td colspan=2>Height (mm): ".($array['itemHeight'])."</td>";
	echo		"<td colspan=2>Width (mm): ".($array['itemWidth'])."</td>";
	echo		"<td colspan=2>Depth (mm): ".($array['itemDepth'])."</td>";
	echo	  "</tr>";
}
echo	  "<tr>";
echo		"<td colspan=6><h6> Delivery Information for Contract</h6></td>";
echo	  "</tr>";
echo	  "<tr>";
echo		"<td colspan=3> Country: ".($array['itemCountry'])."</td>";
echo		"<td colspan=3> Address: ".($array['itemAddress'])."</td>";
echo	  "</tr>";
echo	  "<tr>";
echo		"<td colspan=3> City: ".($array['itemCity'])."</td>";
echo		"<td colspan=3> PostCode: ".($array['itemPostCode'])."</td>";
echo	  "</tr>";
echo  "</table>";
echo "</div>";
echo "</div>";

//Make session variable for contractId
$_SESSION['cid'] = $array['contractID'];

//button to make contract offer
	if (isset($_SESSION['c_userid'])) {


		echo "<center>";
		echo "<div class=row>";
		echo "<div class='col s12'>";
		
		echo "</div>";
		echo "</div>";
		//create a HTML form to capture the user's details
		echo "<div class=container>";
		echo "<div class=row>";
		echo "<form method=post class='col s12' action=makeoffer.php>" ;
		//amount
		echo "<div align=center><h6>Make an offer for the contract</h6></div>";
		echo "<div class=row>";
		echo "<div class='input-field col s12'>";
		echo "Contract offer Total Price (in Ethereum)";
		echo "</div>";
		echo "</div>";
		echo "<div class=row>";
		echo "<div class='input-field col s12'>";
		echo "<td><input id=total type=decimal name=total></td></tr>";
		echo "</div>";
		echo "<div class=''><tr><td><input class=btn type=submit value='Create Offer'></td></div>";
		echo "</div>";
		echo "</form>" ;
		echo "</div>";
		echo "</div>";

	}
	else {
		echo "<h6> Login or Register to make an offer for this contract <p></h6>";
	}

}
else {

	echo "No Open Contracts Avaliable!";
	}

//---------------------------------------------
//Footer
//---------------------------------------------
//include footer layout
include("footfile.html");
?>
