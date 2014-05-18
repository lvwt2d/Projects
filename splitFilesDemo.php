<?php
//this short script I chose to show you inorder to demostrate
//my ability to access mySQL bases and manipulate files via php.
// It is not functional but its purpose is to create an array from A to Z
//and split a large dictionary text file into smaller files grouped 
//by starting letter
$Alpha = range('A', 'Z');
$wId = 0;

/*loops through each letter splitting text files
 * and adding them to the DataBase. The problem
 * comes when your php script times out.
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
 */
for($i = 0;$i < $ac + 1; $i++){
$Wfile=  fopen("AWords" . "$fnum", "a") or exit("couldn't create file");
fputs($Wfile, $output[$i]);
$fnum++;
print("File '$fnum' has been created!!!");
}


//if($Alpha[$lc] % 4 == 0){
$wId = addToBase($works,$wId);

//}

}

/*As the name hints, this adds the words to the database
 */
function addToBase($works,$wId)
{
    $dbhost = "localhost";
$dbuser = "lvwt2d";
$dbpassword = "****";
$dbname = "****";
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
<body></body>
</html>