<?php
//create a variable called $pagename which contains the actual name of the page
$pagename="Register User";

//call in the style sheet called ystylesheet.css to format the page as defined in the style sheet
echo "<link rel=stylesheet type=text/css href=foundation.css>";

//display window title
echo "<title>".$pagename."</title>";
//include head layout 
include ("headfile.html");

echo "<p></p>";
//display name of the page and some random text
echo "<h2>".$pagename."</h2>";
echo "<p> Register Here";
//Input form to post user details
echo "<form method=post action=getRegisterUser.php>" ;
echo  "<div class='form-icons'>";
echo    "<h4>Register to Supply.me</h4>";


//create a HTML form to capture the user's details
echo "<form method=post action=getRegisterUser.php>" ;

echo "<table border=0 cellpadding=5>";
echo "<tr><td>First Name </td>";
echo "<td><input type=text name=r_firstname size=35></td></tr>";
echo "<tr><td>Last Name </td>";
echo "<td><input type=text name=r_lastname size=35></td></tr>";
echo "<tr><td>Address </td>";
echo "<td><input type=text name=r_address size=35></td></tr>";
echo "<tr><td>Postcode </td>";
echo "<td><input type=text name=r_postcode size=35></td></tr>";
echo "<tr><td>Tel No </td>";
echo "<td><input type=text name=r_telno size=35></td></tr>";
echo "<tr><td>Email Address </td>";
echo "<td><input type=text name=r_email size=35></td></tr>";
echo "<tr><td>Password </td>";
echo "<td><input type=password name=r_password1 maxlength=10 size=35></td></tr>";
echo "<tr><td>Confirm Password </td>";
echo "<td><input type=password name=r_password2 maxlength=10 size=35></td></tr>";
echo "<tr><td><input type=submit value='Register'></td>";
echo "<td><input type=reset value='Clear Form'></td></tr>";
echo "</table>";
echo "</form>" ;

//include head layout
include("footfile.html");
?>
