<?php
session_start();
//include a db.php file to connect to database
include ("db.php");
//create a variable called $pagename which contains the actual name of the page and set up scaling
$pagename="Buyer Sign In";
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
echo        "<a href=index.php class=breadcrumb>Home ></a>";
echo        "<a href=login.php class=breadcrumb>Login ></a>";
echo        "<a href=loginbuyer.php class=breadcrumb>Buyer Login ></a>";
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

//---------------------------------------------
//body of the site - choose login type
//---------------------------------------------
//create a HTML form to capture the user's email and password
echo "<form method=post action=getloginbuyer.php>" ;
echo "<table border=0 cellpadding=5>";
echo "<tr><td>Email</td>";
echo "<td><input type=text name=l_email size=35></td></tr>";
echo "<tr><td>Password </td>";
echo "<td><input type=password name=l_password size=35></td></tr>";
echo "<tr><td><input type=submit value='Login'></td>";
echo "<td><input type=reset value='Clear Form'></td></tr>";
echo "</table>";
echo "</form>";

//---------------------------------------------
//Footer
//---------------------------------------------
//include footer layout
include("footfile.html");
?>