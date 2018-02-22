<?php
//create a variable called $pagename which contains the actual name of the page
$pagename="Template";

//call in the style sheet called ystylesheet.css to format the page as defined in the style sheet
echo "<link rel=stylesheet type=text/css href=foundation.css>";
echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>"
//display window title
echo "<title>".$pagename."</title>";
//include head layout 
include ("headfile.html");

echo "<p></p>";
//display name of the page and some random text
echo "<h1>".$pagename."</h1>";
echo "<p> Text Here";

//include head layout
include("footfile.html");
?>
