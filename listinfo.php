<?php
include("db.php");
//create a variable called $pagename which contains the actual name of the page
$pagename="Contract";

//call in the style sheet called ystylesheet.css to format the page as defined in the style sheet
echo "<link rel=stylesheet type=text/css href=foundation.css>";

//display window title
echo "<title>".$pagename."</title>";
//include head layout 
include ("headfile.html");

//retrieve the product id passed from the previous page using the $_GET superglobal variable
//store the value in a variable called $listid
$listid=$_GET['u_listid'];
echo "<p>Selected Contract Id: ".$listid;

//query the product table to retrieve the record for which the value of the product id 
//matches the product id of the product that was selected by the user
$listSQL="select listId, listProd, supplyQuant, description, unitCost, deliveryLocation, requiredDelivery, heightDim, widthDim, lengthDim from Listings
where listId=".$listid;
//execute SQL query
$exelistSQL=mysql_query($listSQL) or die(mysql_error());
//create array of records & populate it with result of the execution of the SQL query
$thearrayprod=mysql_fetch_array($exelistSQL);

//display product name in capital letters
echo "<p><center><b>".strtoupper($thearrayprod['listProd'])."</b></center>";

//Contract Page Heading
echo "<p></p>";
echo "<h2>".$pagename."</h2>";
echo "<p><i> Details of the selected contract.</i>";

//Contract Detailed Information
echo "<p>Quantity Required - ".strtoupper($thearrayprod['supplyQuant']);
echo "<p>Product Description: ".strtoupper($thearrayprod['description']);
echo "<p>Desired Cost per unit: £".strtoupper($thearrayprod['unitCost']);
echo "<p>Delivery to: ".strtoupper($thearrayprod['deliveryLocation']), ". Date: ".strtoupper($thearrayprod['requiredDelivery']);
echo "<p><b>Dimensions</b>";
echo "<p>Height: ".strtoupper($thearrayprod['heightDim']); 
echo "<p>Width: ".strtoupper($thearrayprod['widthDim']); 
echo "<p>length: ".strtoupper($thearrayprod['lengthDim']);

//display one button for supplier to make offer
//pass the product id to the next page basket.php as a hidden value
echo "<form action=offer.php method=post>";
echo "<input type=submit value='Make an Offer'>";
echo "<input type=hidden name=h_listid value=".$listid.">";
echo "</center>";
echo "</form>";

//include head layout
include("footfile.html");


?>
