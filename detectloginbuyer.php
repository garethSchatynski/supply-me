<?php
//if the session variable user id contains a value i.e. if user has gone successfully through getlogin.php
if (isset($_SESSION['c_userid']))
{
	//display full name and id
	echo "<p align=right><i>Name: ".$_SESSION['c_fname']." ".$_SESSION['c_sname']." 
	/ Customer No: ".$_SESSION['c_userID']."</i>";
	echo "<hr><br>";
}
?>
