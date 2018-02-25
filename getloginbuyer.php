<?php
//include a db.php file to connect to database
session_start();

include ("db.php");

//create a variable called $pagename which contains the actual name of the page and set up scaling
$pagename="Confirm Login";
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

echo "<body>";
echo "<center>";
echo "<div class=container>";
//display name of the page and some text (main section)
echo "<h5>".$pagename."</h5>";
echo "<font size=2> <p><i> Please sign in or register to continue </i></font>";
echo "</div>";
echo "</body>";

echo "<p>";

//---------------------------------------------
//body of the site (sign up)
//---------------------------------------------
//Capture the details entered in the form using the $_POST superglobal variable
//Store these details into a set of new variables
$email=$_POST['l_email'];
$password=$_POST['l_password'];

//if any of the variables is empty
if (!$email or !$password)
{
	echo "<p>Your form is incomplete ";
	echo "<br>Please fill in all the required details ";
	echo "<br>Go back to <a href=login.php>login</a>";
}
else
{
	//SQL query to retrieve the record from the users table for which the email stored in
	//database table matches the email entered in the form (if there is one). Store result in array.
	$thisuserSQL="select * from users where userEmail = '".$email."'";
	$exethisuserSQL=mysql_query($thisuserSQL) or die (mysql_error());
	$userArray=mysql_fetch_array($exethisuserSQL);

	//if email from array i.e. retrieved from DB doesn't match email entered in form
	if ($userArray['userEmail']!=$email)
	{
		echo "<p>Sorry, the email you entered was not recognized";
		echo "<br>Go back to <a href=loginbuyer.php>login</a>";
	}
	//if email from array i.e. retrieved from DB matches email entered in form
	else
	{
		//if password from array i.e. retrieved from DB doesn't match password entered in form
		if ($userArray['userPassword']!=$password)
		{
			echo "<p>Sorry, the password you entered is not valid";
			echo "<br>Go back to <a href=loginbuyer.php>login</a>";
		}
		//if password from array i.e. retrieved from DB matches password entered in form
		else
		{
			//create a session variable for this customer who has just logged in
			//store his/her id, first name and surname in this session variable		
			$_SESSION['c_userid']=$userArray['userId'];
			$_SESSION['c_fname']=$userArray['userFName'];
			$_SESSION['c_sname']=$userArray['userSName'];
			//Display a greeting using the full name stored in the session variable
			echo "<p>Hello, ".$_SESSION['c_fname']." ".$_SESSION['c_sname'];
			echo "<br>You have successfully logged into the system!";
			echo "<br>The email you entered is ".$email;
			echo "<p>Require some items? <a href=createcontract.php>Create Contract</a>";
			echo "<br>Manage your account <a href=account.php>My Account</a>";
		}
	}
}





//---------------------------------------------
//Footer
//---------------------------------------------
//include footer layout
include("footfile.html");
?>
