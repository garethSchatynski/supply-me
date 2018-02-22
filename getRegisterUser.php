<?php
session_start();
include("db.php");
//create a variable called $pagename which contains the actual name of the page
$pagename="Confirm Registration";

//call in the style sheet called ystylesheet.css to format the page as defined in the style sheet
echo "<link rel=stylesheet type=text/css href=foundation.css>";

//display window title
echo "<title>".$pagename."</title>";
//include head layout 
include ("headfile.html");

echo "<p></p>";
//display name of the page and some random text
echo "<h2>".$pagename."</h2>";

//Capture the details entered in the form using the $_POST superglobal variable
//Store these details into a set of new variables
$fname=$_POST['r_firstname'];
$lname=$_POST['r_lastname'];
$address=$_POST['r_address'];
$postcode=$_POST['r_postcode'];
$telno=$_POST['r_telno'];
$email=$_POST['r_email'];
$password1=$_POST['r_password1'];
$password2=$_POST['r_password2'];

//If any of the variables is empty
if (!$fname or !$lname or !$address or !$postcode or !$telno or !$password1 or !$password2)
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
		$addnewuserSQL="insert into users 
		(userFName, userSName, userAddress, userPostCode, userTelNo, userEmail, userPassword)
		values ('".$fname."','".$lname."','".$address."','".$postcode."',
		 '".$telno."','".$email."','".$password1."')";
		$exeaddnewuserSQL=mysql_query($addnewuserSQL);

		//Retrieve the error number. if the error detector returns the number 0, everything is fine
		if (mysql_errno($conn)==0)
		{
			echo "<p>You have successfully registered in the sytem!";
			echo "<br>To continue, please <a href=login.php>login</a>";
		}
		//if the error detector does not return the number 0, there is a problem
else 
		{
			echo "<p>There is an error with your registration";
			//if the error detector returned the number 1062, 
			//the unique constraint is violated as the user entered an email which already existed
			if (mysql_errno($conn)==1062)
			{
				echo "<br>The email you entered already exists";
				echo "<br>Go back to <a href=register.php>Register</a>";
			}
		}
	}	
}


//Write SQL query to insert new user into users table and execute SQL query
$addnewuserSQL="insert into users 
(userFName, userSName, userAddress, userPostCode, userTelNo, userEmail, userPassword)
values ('".$fname."','".$lname."','".$address."','".$postcode."',
 '".$telno."','".$email."','".$password1."')";
$exeaddnewuserSQL=mysql_query($addnewuserSQL);

//include head layout
include("footfile.html");
?>
