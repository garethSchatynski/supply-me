<?php
//create a variable called $pagename which contains the actual name of the page
$pagename="Register";

//call in the style sheet called ystylesheet.css to format the page as defined in the style sheet
echo "<link rel=stylesheet type=text/css href=foundation.css>";

//display window title
echo "<title>".$pagename."</title>";
//include head layout 
include ("headfile.html");

echo "<p></p>";
//display name of the page and some random text
echo "<h2>".$pagename."</h2>";
echo "<p> Register as a User or Supplier";

//Two buttons that link to supplier or user registration
echo "<form method=post action=registerUser.php>" ;
echo "<tr><td><input type=submit value='Register As User'></td>";
echo "</table>";
echo "</form>" ;
echo "<form method=post action=registerSupplier.php>" ;
echo "<tr><td><input type=submit value='Register As Supplier'></td>";
echo "</table>";
echo "</form>" ;

//include head layout
include("footfile.html");
?>

