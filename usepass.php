<!DOCTYPE>
<html>
<title>Handwritten Page</title>
<head>

</head>
<body>
Works good right?!
<form method="post" name="sender" action="usepass.php">
	<label>Username:</label>
	<input type="text" name="USERNAME" size="10"/>
</br>
	<label>Password:</label>
	<input type="text" name="PASSWORD" size="10"/>
</br>
<input type="submit" name="add" value="Add To DB"/>
<input type="submit" name="pri" value="Print Database"/>
</form>

<?php
extract($_POST);
print_r($_POST);

if(!$con=mysql_connect("localhost","lvwt2d","Doobies1")){
echo "OH NO..no connection";
}


mysql_select_db("test",$con);

$result=mysql_query("SELECT * FROM usepass",$con);

foreach($_POST as $key=>$value){
	if($value == "Print Database"){
		prBass($result);
		die("Database Printed");
	}
}
mysql_query("INSERT into usepass values ('$USERNAME','$PASSWORD')",$con);

function prBass($result){
	echo "<table border='1'>";
for($c=0;$row=mysql_fetch_row($result);$c++){
	
	print("<tr>");
	foreach($row as $key => $value)
	print("<td>$value</td>");
	print("</tr>");
}
print("</table>");
}
?>
</body>
</html>
