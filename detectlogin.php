<?php
//if the session variable user id contains a value i.e. if user has gone successfully through getlogin.php
if (isset($_SESSION['c_userid']))
{
	//display full name and id
	echo "<div class='col s12'>";
	echo "<p align=right><i>Name: ".$_SESSION['c_userfname']." ".$_SESSION['c_usersname']." / ID: ".$_SESSION['c_userid']."  .</i>";
	echo "</div>";
}
?>
