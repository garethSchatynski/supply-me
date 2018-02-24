<?php
session_start();
include 'db.php';
$pagename="Buyer Registration";
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
echo          "<li><a href=contracts.php>Avaliable Contracts</a></li>";
echo          "<li class=active><a href=registerbuyer.php>Register as Buyer</a></li>";
echo          "<li><a href=registersupplier.php>Register as Supplier</a></li>";
echo          "<li><a href=login.php class=btn>Sign In</a></li>";
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
echo        "<a href=registerbuyer.php class=breadcrumb>Buyer Registration</a>";
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
echo "<font size=2> <p><i> Please complete the below form to continue</i></font>";
echo "</div>";
echo "</body>";

echo "<p>";
echo "</center>";

//create a HTML form to capture the user's details
echo "<div class=container>";
echo "<div class=row>";
echo "<form method=post class='col s12' action=getregisterbuyer.php>" ;
//first name
echo "<div class=row>";
echo "<div class='input-field col s6'>";
echo "<td><input id=first_name type=text name=r_firstname size=35></td></tr>";
echo "<label for=first_name>First Name</label>";
echo "</div>";
//last name
echo "<div class='input-field col s6'>";
echo "<td><input id=last_name type=text name=r_lastname size=35></td></tr>";
echo "<label for=last_name>Last Name</label>";
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
//telno
echo "<div class=row>";
echo "<div class='input-field col s10 push-s2 '>";
echo "<td><input id=telno type=number name=r_telno size=35></td></tr>";
echo "<label for=tel>Telephone Number (local)</label>";
echo "</div>";
//countrycode
echo "<div class='input-field col s2 pull-s10'>";
echo "<td><input id=countrycode type=text name=r_countrycode size=35></td></tr>";
echo "<label for=countrycode>Country Code</label>";
echo "</div>";
echo "</div>";
//email address
echo "<div class=row>";
echo "<div class='input-field col s12'>";
echo "<td><input id=email type=email name=r_email size=35></td></tr>";
echo "<label for=email>Email</label>";
echo "</div>";
echo "</div>";
//pasword1
echo "<div class=row>";
echo "<div class='input-field col s6'>";
echo "<td><input id=password1 type=password name=r_password1 maxlength=10 size=35></td></tr>";
echo "<label for=password1>Password</label>";
echo "</div>";
//password 2
echo "<div class='input-field col s6'>";
echo "<td><input id=password2 type=password name=r_password2 maxlength=10 size=35></td></tr>";
echo "<label for=password2>Confirm Password</label>";
echo "</div>";
//Buttons
echo "<center>";
echo "<div class=row>";
echo      "<div class='col s2'><tr><td><input class=btn type=submit value='Sign Me Up'></td></div>";
echo      "<div class='col s2'><td><input class='btn btn-clear' type=reset value='Clear Form'></td></tr></div>";
echo "</div>";
echo "</center>";
echo "</div>";
echo "</form>" ;
echo "</div>";
echo "</div>";

include("footfile.html");
echo "<script src=js.js></script>";

?>
