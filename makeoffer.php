<?php
session_start();
include 'db.php';
$pagename="Information on Offer";
echo "<head>";
echo "<meta charset=utf-8 />";
echo "<meta name=viewport content=width=device-width, initial-scale=1.0 />";
//call in the style sheet called ystylesheet.css to format the page as defined in the style sheet
echo "<link rel=stylesheet type=text/css href=materialize.css>";
echo "<script src=js/materialize.js></script>";

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
echo    "<div class=breadcrumb-container>";
echo      "<div class='col s12'>";
echo        "<a href=index.php class=breadcrumb>Home</a>";
echo        "  >";
echo        "<a href=register.php class=breadcrumb>Registration</a>";
echo        "  >";
echo        "<a href=getregister.php class=breadcrumb>Registration Information</a>";
// echo        "<a href=#! class=breadcrumb>Third</a>";
//echo        "  >";
echo      "</div>";
echo    "</div>";
echo    "</div>";

//---------------------------------------------
//welcome of the site
//---------------------------------------------

echo "<body>";
echo "<center>";
echo "<div class=container>";
//display name of the page and some text (main section)
echo "<h5>".$pagename."</h5>";
echo "</div>";
echo "</body>";

echo "<p>";


//Capture the details entered in the form using the $_POST superglobal variable
//Store these details into a set of new variables
$total=$_POST['total'];
$uid=$_SESSION['c_userid'];
$status='open';
$cid=$_SESSION['cid'];


//If any of the variables is empty
if (!$total)
{
	echo "<p>Your form is incomplete ";
	echo "<br>Please offer a price ";
	echo "<br>Go back to <a href=contractinfo.php?u_contractID=".$contract_data['contractID'].">Back to contract</a>";
}
else
{	
		//Write SQL query to insert new user into users table and execute SQL query

		mysqli_query($con,"INSERT INTO offers (totalCost, offerStatus, contractID, userId)
		values ('".$total."','".$status."','".$cid."','".$uid."')");
		//Retrieve the error number. if the error detector returns the number 0, everything is fine
		if (mysqli_errno($con)==0)
		{
			
			echo "<p><b>Offer Created Successfully</b></p>";
			echo "<div class='row'>";
			echo "<div class='col s12 m4 l2'><p></p></div>";
			echo "<div class='col s12 m4 l8'><a href=contracts.php class='btn-large home'>View other contracts</a></div>";
			echo "</div>";
			echo "</div>";
			echo "<p>";
		}
	}	




echo "</center>";
include("footfile.html");
?>