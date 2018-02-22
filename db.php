<?php
$dbhost = 'elephant.ecs.westminster.ac.uk';
$dbuser = 'w1492613';
$dbpass = '9ULXEYSWpHCb';

$conn = mysql_connect($dbhost, $dbuser, $dbpass) ;
if (!$conn)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("w1492613_0", $conn);
?>	
