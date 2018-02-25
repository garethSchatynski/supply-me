<?php
//include a db.php file to connect to database
session_start();
include ("db.php");

//create a variable called $pagename which contains the actual name of the page and set up scaling
$pagename="Create Contract";
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
echo "<font size=2> <p><i> Complete the below form to create a new open contract </i></font>";
echo "</div>";
echo "</body>";

//---------------------------------------------
//body of the site 
//---------------------------------------------
echo "<center>";
echo "<div class=row>";
echo "<div class='col s12'>";
echo "<h6>Contract Deliverables</h6>";
echo "</div>";
echo "</div>";
//create a HTML form to capture the user's details
echo "<div class=container>";
echo "<div class=row>";
echo "<form method=post class='col s12' action=getcreatecontract.php>" ;
//itemName
echo "<div class=row>";
echo "<div class='input-field col s12'>";
echo "<td><input id=name type=text name=r_name size=30></td></tr>";
echo "<label for=name>Desired Item Name</label>";
echo "</div>";
echo "</div>";
//Description
echo "<div class=row>";
echo "<div class='input-field col s12'>";
echo "<textarea id=description type=text class=materialize-textarea name=r_description size=500></textarea>";
echo "<label for=description>Input Item Description</label>";
echo "</div>";
echo "</div>";
//category
echo "<div class=row>";
echo "<div class='input-field col s6'>";
echo "<td><input id=category type=text name=r_category size=30></td></tr>";
echo "<label for=category>Item Category</label>";
echo "</div>";
//quantity
echo "<div class='input-field col s6'>";
echo "<td><input id=quant type=number name=r_quant size=10></td></tr>";
echo "<label for=quant>Quantity Required</label>";
echo "</div>";
echo "</div>";
//decription
echo "<div class=row>";
echo "<div class='col s12'>";
echo "<h6>Dimensions of Product (Can Leave Blank)</h6>";
echo "</div>";
echo "</div>";
//height 
echo "<div class=row>";
echo "<div class='input-field col s4'>";
echo "<td><input id=height type=number name=r_height size=20></td></tr>";
echo "<label for=height>Item Height Dimensions Specification (mm)</label>";
echo "</div>";
//width 
echo "<div class='input-field col s4'>";
echo "<td><input id=width type=number name=r_width size=20></td></tr>";
echo "<label for=width>Item width Dimensions Specification (mm)</label>";
echo "</div>";
//depth 
echo "<div class='input-field col s4'>";
echo "<td><input id=depth type=number name=r_depth size=20></td></tr>";
echo "<label for=Depth>Item Depth Dimensions Specification (mm)</label>";
echo "</div>";
echo "</div>";
//decription
echo "<div class=row>";
echo "<div class='col s12'>";
echo "<h6>Delivery Information (where is the contract shipping to?)</h6>";
echo "</div>";
echo "</div>";
//address
echo "<div class=row>";
echo "<div class='input-field col s12'>";
echo "<td><input id=address type=text name=r_address size=35></td></tr>";
echo "<label for=address>Address</label>";
echo "</div>";
echo "</div>";
//country
echo "<div class=row>";
echo "<div class='input-field col s12'>";
echo "<td><input id=country type=text name=r_country size=35></td></tr>";
echo "<label for=country>Country</label>";
echo "</div>";
echo "</div>";
//city
echo "<div class=row>";
echo "<div class='input-field col s6'>";
echo "<td><input id=city type=text name=r_city size=35></td></tr>";
echo "<label for=city>City</label>";
echo "</div>";
//postcode
echo "<div class='input-field col s6'>";
echo "<td><input id=postcode type=text name=r_postcode size=35></td></tr>";
echo "<label for=postcode>Postal Code</label>";
echo "</div>";
echo "</div>";
//Buttons
echo "<center>";
echo "<div class=row>";
echo      "<div class='col s2'><tr><td><input class=btn type=submit value='Open Contract'></td></div>";
echo      "<div class='col s2'><td><input class='btn btn-clear' type=reset value='Clear Form'></td></tr></div>";
echo "</div>";
echo "</center>";
echo "</div>";
echo "</form>" ;
echo "</div>";
echo "</div>";
//---------------------------------------------
//Footer
//---------------------------------------------
//include footer layout
include("footfile.html");
?>
