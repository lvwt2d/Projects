<?php

//creates an array from A to Z
$Alpha = range('Y', 'Z');
$wId = 211598;

//this allows the script to run without php timeout
$max_execution_time = "4000";



/*loops through each letter splitting text files
 * and adding them to the DataBase. The problem
 * comes when your php script times out.
 * I have failed at adding time to the script
 * and the only way it looks to work is to jump
 * php pages until the entire alphabet is added;
 * 
 */
foreach($Alpha as $letter){

if(!($Dfile =  fopen($letter . 'words.txt', r)))
{
    die("error loading awords");
}

//loading words into an array

$output = array();
$c = 0;
$ac = 0;
$line=  fgetss($Dfile);
$works = str_word_count($line, 1);
for($l = 0;$l < count($works);$l++)
{
    if($c != 1000){
        $output[$ac] .= $works[$l] . " ";
        $c++;
    }  else {
        $ac++;
        $c = 0;
    }
}
echo $ac . " is the number of _ files. ";

//time to load the files

$fnum = 0;
/*
 * this creates all the separate txt files
for($i = 0;$i < $ac + 1; $i++){
$Wfile=  fopen("AWords" . "$fnum", "a") or exit("couldn't create file");
fputs($Wfile, $output[$i]);
$fnum++;
print("File '$fnum' has been created!!!");
}
*/




/*this adds the words to the database
 * I wanted to use a fuction in the attempt
 * to clean up my code
 */

//if($Alpha[$lc] % 4 == 0){
$wId = addToBase($works,$wId);

//}

}

function addToBase($works,$wId)
{
    $dbhost = "localhost";
$dbuser = "lvwt2d";
$dbpassword = "Doobies1";
$dbname = "sample?development";

$con = mysql_connect($dbhost,$dbuser,$dbpassword);

if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db($dbname, $con);

    for($i = 0;$i< count($works);$i++){
        $query = "INSERT INTO dictionary
VALUES ('$wId','$works[$i]','0');";
        mysql_query($query, $con);
        $wId++;
    }
    print("Database should be updated");
    return $wId;
}

?>

<!DOCTYPE>
<html>
<head></head>
<body>Greatness</body>
</html>