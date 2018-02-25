<?php
//include a db.php file to connect to database
session_start();
include ("db.php");

//create a variable called $pagename which contains the actual name of the page and set up scaling
$pagename="Important Information";
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
echo "<font size=2> <p><i> Information </i></font>";
echo "</div>";
echo "</body>";

echo "<p>";

//---------------------------------------------
//body of the site 
//---------------------------------------------
//Capture the details entered in the form using the $_POST superglobal variable
//Store these details into a set of new variables
$name=$_POST['r_name'];
$description=$_POST['r_description'];
$category=$_POST['r_category'];
$quant=$_POST['r_quant'];
$height=$_POST['r_height'];
$width=$_POST['r_width'];
$depth=$_POST['r_depth'];
$address=$_POST['r_address'];
$country=$_POST['r_country'];
$city=$_POST['r_city'];
$postcode=$_POST['r_postcode'];
$status='open';
$id=$_SESSION['c_userid'];

if (!$name or !$description or !$category or !$quant or !$address or!$country or!$city or !$postcode)
{
	echo "<p>Your contract is incomplete ";
	echo "<br>Please fill in all the required details ";
	echo "<br>Go back to <a href=createcontract.php>Create Contract</a>";
}
	else	
	{
		$addnewcontractSQL="insert into contracts 
		(itemName, itemDesc, itemCategory, itemQuant, itemHeight, itemWidth, itemDepth, itemAddress, itemCountry, itemCity, itemPostCode, contractStatus, userId)
		values ('".$name."','".$description."','".$category."','".$quant."','".$height."','".$width."',
		 '".$depth."','".$address."','".$country."','".$city."','".$postcode."','".$status."','".$id."')";
		$exeaddnewcontractSQL=mysql_query($addnewcontractSQL);
		//Retrieve the error number. if the error detector returns the number 0, everything is fine
		
		if (mysql_errno($conn)==0)
		{
			echo "<center>";
			echo "<p>Contract successfully added to the database, you can now recieve bids";
			echo "<div align=center class='row'>";
			echo "<div class='col s12 m6 l3'></div>";
    		echo "<div class='col s12 m6 l3'><a href=createcontract.php class='btn'>Create another?</a></div>";
    		echo "<div class='col s12 m6 l3'><a href=contracts.php class='btn'>View Contracts</a></div>";
			echo "</div>";
			echo "<p>";;
			echo "</center>";
		}
		//if the error detector does not return the number 0, there is a problem
else 
		{
			echo "<p>There is an error with your request";
		}
	}	


echo "</center>";


//---------------------------------------------
//Footer
//---------------------------------------------
//include footer layout
include("footfile.html");
?>
