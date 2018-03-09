<?php
session_start();
include 'db.php';
$pagename="Information on Registration";
echo "<head>";
echo "<meta charset=utf-8 />";
echo "<meta name=viewport content=width=device-width, initial-scale=1.0 />";
//call in the style sheet called ystylesheet.css to format the page as defined in the style sheet
echo "<link rel=stylesheet type=text/css href=materialize.css>";
echo "<script src=js/materialize.js></script>";

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
echo    "<div class=breadcrumb-container>";
echo      "<div class='col s12'>";
echo        "<a href=index.php class=breadcrumb>Home</a>";
echo        "  >";
echo        "<a href=register.php class=breadcrumb>Registration</a>";
echo        "  >";
echo        "<a href=getregister.php class=breadcrumb>Registration Information</a>";
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
echo "</div>";
echo "</body>";

echo "<p>";


//Capture the details entered in the form using the $_POST superglobal variable
//Store these details into a set of new variables
$fname=$_POST['r_firstname'];
$lname=$_POST['r_lastname'];
$company=$_POST['r_company'];
$address=$_POST['r_address'];
$country=$_POST['r_country'];
$city=$_POST['r_city'];
$postcode=$_POST['r_postcode'];
$telno=$_POST['r_telno'];
$countrycode=$_POST['r_countrycode'];
$email=$_POST['r_email'];
$password1=$_POST['r_password1'];
$password2=$_POST['r_password2'];

//If any of the variables is empty
if (!$fname or !$lname or !$address or!$country or!$city or !$postcode or !$telno or!$countrycode or !$password1 or !$password2)
{
	echo "<p>Your form is incomplete ";
	echo "<br>Please fill in all the required details ";
	echo "<br>Go back to <a href=register.php>Register</a>";
}
else
{	
	//if the 2 entered passwords do not match
	if ($password1<>$password2)
	{
		echo "<p>The 2 passwords you entered do not match";
		echo "<br>Please make sure you enther them correctly";
		echo "<br>Go back to <a href=register.php>Register</a>";	
	}
	else	
	{
		//Write SQL query to insert new user into users table and execute SQL query

		mysqli_query($con,"INSERT INTO users (userFName, userSName, userCompany, userAddress, userCountry, userCity, userPostCode, userTelNo, userCountryCode, userEmail, userPassword)
		values ('".$fname."','".$lname."','".$company."','".$address."','".$country."','".$city."','".$postcode."',
		 '".$telno."','".$countrycode."','".$email."','".$password1."')");
		//Retrieve the error number. if the error detector returns the number 0, everything is fine
		if (mysqli_errno($con)==0)
		{
			
			echo "<p><b>Account Created Successfully</b></p>";
			echo "<div class='row'>";
			echo "<div class='col s12 m4 l2'><p></p></div>";
			echo "<div class='col s12 m4 l8'><a href=login.php class='btn-large home'>Sign in to your New account</a></div>";
			echo "</div>";
			echo "</div>";
			echo "<p>";;
		}
		//if the error detector does not return the number 0, there is a problem
else 
		{
			echo "<p>There is an error with your registration";
			//if the error detector returned the number 1062, 
			//the unique constraint is violated as the user entered an email which already existed
			if (mysqli_errno($con)==1062)
			{
				echo "<br>The email you entered already exists";
				echo "<br>Go back to <a href=register.php>Register</a>";
			}
		}
	}	
}




echo "</center>";
include("footfile.html");
?>