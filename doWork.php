<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'Split.class.php';

$Alpha = range('A', 'B');

$wId = 0;
$newId = 0;
$ob = new SplitFiles($wId);

for($l = 0;$l < count($Alpha);$l++){
    $wId = $ob -> doIt($Alpha[$l]);
    $newobj = new SplitFiles($wId);
    $newId = $newobj ->doIt($Alpha[$l]);
    
}
?>
