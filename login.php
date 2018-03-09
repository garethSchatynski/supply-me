<?php
//include a db.php file to connect to database
session_start();
include ("db.php");
//create a variable called $pagename which contains the actual name of the page and set up scaling
$pagename="Welcome to Supply.me";
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
echo        "</ul>";
echo      "</div>";
echo    "</nav>";
echo  "</div>";
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
include ("detectlogin.php");
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
//create a HTML form to capture the user's email and password
echo "<div class=container>";
echo "<div class=row>";
echo "<form method=POST class='col s12'>";
echo "<div class=row>";
echo "<div class='input-field col s12'>";
echo "<td><input id=email type=text name=email size=35></td></tr>";
echo "<label for=email>User Email</label>";
echo "</div>";
echo "</div>";
echo "<div class=row>";
echo "<div class='input-field col s12'>";
echo "<td><input id=password type=password name=password size=35></td></tr>";
echo "<label for=password>User Password</label>";
echo "</div>";
echo "</div>";
echo "<div class=row>";
echo "<div class='col s2'><tr><td><input class=btn type=submit value='Sign in' name=sub></td></div>";
echo "<div class='col s2'><td><input class='btn btn-clear' type=reset value='Clear Form'></td></tr></div>";
echo "</div>";
echo "</form>";
echo "</div>";
echo "</div>";

if(isset($_POST['sub'])){
    
    // create query
    $query = "SELECT * FROM users WHERE userEmail='".$_POST['email']."' AND userPassword='".$_POST['password']."'";
    // execute query
    $sql = $con->query($query);
    // num_rows will count the affected rows base on your sql query. so $n will return a number base on your query
    $n = $sql->num_rows;

    
    // if $n is > 0 it mean their is an existing record that match base on your query above 
    if($n > 0){
        $user_data = mysqli_fetch_array($sql);
        $_SESSION['c_userid'] = $user_data['userId'];
        $_SESSION['c_userfname'] = $user_data['userFName'];
        $_SESSION['c_usersname'] = $user_data['userSName'];
       
        echo "<script type=text/javascript>location.href='index.php'</script>";
        }

    } else {
    
    echo "Incorrect username or password";
    }


//---------------------------------------------
//Footer
//---------------------------------------------
//include footer layout
include("footfile.html");
?>
