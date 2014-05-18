<?php

$cupUrl = 'http://www.careercup.com/page';
$page = file_get_contents($cupUrl);
$top = 0;
$startPos = 0;
//print($page);

/*$pageByUl = explode("ul", $page);
for ($i = 0;$i != count($pageByUl);$i++) {
    if(strlen($pageByUl[$i]) > $top){
        $top = strlen($pageByUl[$i]);
        $biggest = $i;
    }
        
*///}
//print($pageByUl[$biggest]);
//print("yeah");

$pos = strpos($page,"<ul id=\"question_preview\">");
$postwo = strpos($page, "</ul>", $pos);
$pPage = substr($page, $pos + 28, $postwo - $pos);
$srtCount = substr_count($pPage, "<li class=\"question\">");
$count = 0;
for($i = 0;$i < $srtCount;$i++){
    $startPos = strpos($pPage, "<span class=\"entry\">", $startPos) + 20;
    $startStrPos = strpos($pPage, "<p>", $startPos);
    $endStrPos = strpos($pPage, "</p>", $startPos);
    $question = substr($pPage, $startStrPos, $endStrPos - $startStrPos);
    $qIdStart = strpos($pPage, "<a href=", $startPos) + 8;
    $qIdEnd = strpos($pPage, ">", $qIdStart);
    $qID = substr($pPage, $qIdStart, $qIdEnd - $qIdStart);
    print("question id: " . $qID . " ");
    print($question . "\n");
    $count++;
    print($count . "\n");
}

?>
