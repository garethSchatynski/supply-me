<?php
session_start(); 
include ("db.php");
//create a variable called $pagename which contains the actual name of the page and set up scaling
$pagename="Open Contracts";
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


//Multiple choice Navbar depending on login state
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

echo "<body>";
echo "<center>";
include ("detectlogin.php");
echo "<div class=container>";
//display name of the page and some text (main section)
echo "<h5>".$pagename."</h5>";
echo "<font size=2> <p><i> Open contracts avaliable for new bids </i></font>";
echo "</div>";
echo "</body>";

echo "<p>";
echo "</center>";
//---------------------------------------------
//body of the site view open Contracts
//---------------------------------------------
$query = "SELECT * FROM contracts WHERE contractStatus='open'";
    // execute query
    $sql = $con->query($query);
    // num_rows will count the affected rows base on your sql query. so $n will return a number base on your query
    $n = $sql->num_rows;

    
    // if $n is > 0 it mean their is an existing record that match base on your query above 
    if($n > 0){
        $contract_data = mysqli_fetch_array($sql);
		echo "<div class=container>";
		echo "<div class='collection'>";
		echo "<a class=collection-item href=contractinfo.php?u_contractID=".$contract_data['contractID'].".	 Contract Name: ".$contract_data['itemName']. "</b> - Country: ".$contract_data['itemCountry']."<p align=right>Quantity Required: ".$contract_data['itemQuant'];
		echo "</div>";
		echo "</div>";
		echo "</a>";
	}
		else {
    
			echo "No Open Contracts Avaliable!";
			}
		

include("footfile.html");

?>








