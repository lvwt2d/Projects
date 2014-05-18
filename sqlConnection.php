<?php
$dbhost = "localhost";
$dbuser = "lvwt2d";
$dbpassword = "Doobies1";
$dbname = "sample?development";

$con = mysql_connect($dbhost,$dbuser,$dbpassword);

if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db($dbname, $con);
?>
