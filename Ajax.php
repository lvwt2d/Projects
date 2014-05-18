<?php
$n = $_GET["casper"];
$con = mysqli_connect('localhost','lvwt2d','Doobies1','sample?development');
if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }
mysqli_select_db($con,"sample?development");
$sql="SELECT * FROM dictionary WHERE word LIKE '$n%'";

$result = mysqli_query($con,$sql);

echo "<table border='1'>";

for($i = 0;$i < 10;$i++){
if($row = mysqli_fetch_array($result)){
  echo "<tr>";
  if($n == ""){
      print("<td>Keep Trying</td></tr></table>");
      die();
  }
 else {
  echo "<td>" . $row['word'] . "</td>";
  echo "</tr>";
 }
}
}
echo "</table>";
/*
if (strlen($q) > 0)
  {
  $hint="";
  for($i=0; $i<count($a); $i++)
    {
    if (strtolower($q)==strtolower(substr($a[$i],0,strlen($q))))
      {
      if ($hint=="")
        {
        $hint=$a[$i];
        }
      else
        {
        $hint=$hint." , ".$a[$i];
        }
      }
    }
  }

  if($q == "")
  {
      $out = "Try a word";
  }
 else {

     $out = $hint;
}

print($out);
 * 
 */
?>
