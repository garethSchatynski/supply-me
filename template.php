<?php
//include a db.php file to connect to database
include ("db.php");
//create a variable called $pagename which contains the actual name of the page and set up scaling
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
echo        "<a href=#! class=brand-logo center> Supply.me</a>";
echo        "<ul class=right hide-on-med-and-down>";
echo          "<li><a href=contracts.php>Avaliable Contracts</a></li>";
echo          "<li class=active><a href=register-buyer.php>Register as Buyer</a></li>";
echo          "<li><a href=register-supplier.php>Register as Supplier</a></li>";
echo          "<li><a class=btn>Sign In</a></li>";
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
echo        "<a href=register-buyer.php class=breadcrumb>Buyer Registration</a>";
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

//---------------------------------------------
//Body
//---------------------------------------------


//---------------------------------------------
//Footer
//---------------------------------------------
//include footer layout
include("footfile.html");


?>
