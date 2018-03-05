<?php
session_start();
include 'db.php';
$pagename="Supplier Registration";
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
echo          "<li><a href=registerbuyer.php>Register as Buyer</a></li>";
echo          "<li class=active><a href=registersupplier.php>Register as Supplier</a></li>";
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
echo        "<a href=registersupplier.php class=breadcrumb>Supplier Registration</a>";
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
echo "<font size=2> <p><i> Please complete the below form to register</i></font>";
echo "</div>";
echo "</body>";

echo "<p>";
echo "</center>";

//create a HTML form to capture the suppliers's details
echo "<div class=container>";
echo "<div class=row>";
echo "<form method=post class='col s12' action=getregistersupplier.php>" ;
//Company name
echo "<div class=row>";
echo "<div class='input-field col s12'>";
echo "<td><input id=name type=text name=r_name size=50></td></tr>";
echo "<label for=name>Company Name</label>";
echo "</div>";
echo "</div>";
//Company address
echo "<div class=row>";
echo "<div class='input-field col s12'>";
echo "<td><input id=address type=text name=r_address size=100></td></tr>";
echo "<label for=address>Company Address</label>";
echo "</div>";
echo "</div>";
//Country
echo "<div class=row>";
echo "<div class='input-field col s12'>";
echo "<td><input id=country type=text name=r_country size=30></td></tr>";
echo "<label for=country>Country</label>";
echo "</div>";
echo "</div>";
//City
echo "<div class=row>";
echo "<div class='input-field col s6'>";
echo "<td><input id=city type=text name=r_city size=30></td></tr>";
echo "<label for=city>City</label>";
echo "</div>";
//postcode
echo "<div class='input-field col s6'>";
echo "<td><input id=postcode type=text name=r_postcode size=12></td></tr>";
echo "<label for=postcode>Postal Code</label>";
echo "</div>";
echo "</div>";
//telno
echo "<div class=row>";
echo "<div class='input-field col s10 push-s2 '>";
echo "<td><input id=telno type=number name=r_telno size=10></td></tr>";
echo "<label for=tel>Company Telephone Number (local)</label>";
echo "</div>";
//countrycode
echo "<div class='input-field col s2 pull-s10'>";
echo "<td><input id=countrycode type=text name=r_countrycode size=3></td></tr>";
echo "<label for=countrycode>Country Code</label>";
echo "</div>";
echo "</div>";
//email address
echo "<div class=row>";
echo "<div class='input-field col s12'>";
echo "<td><input id=email type=email name=r_email size=50></td></tr>";
echo "<label for=email>Company Email</label>";
echo "</div>";
echo "</div>";
//pasword1
echo "<div class=row>";
echo "<div class='input-field col s6'>";
echo "<td><input id=password1 type=password name=r_password1 maxlength=20 size=35></td></tr>";
echo "<label for=password1>Password</label>";
echo "</div>";
//password 2
echo "<div class='input-field col s6'>";
echo "<td><input id=password2 type=password name=r_password2 maxlength=20 size=35></td></tr>";
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
