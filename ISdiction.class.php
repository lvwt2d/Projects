<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once ('Awords.txt');

/**
 * Description of ISdiction
 *
 * @author Lamar
 */
class ISdiction {
   //put your code here
    function __construct() {
        
        print("this is BEGINNING!!");
  
    if(!($filep =  fopen('Awords.txt', r))){ 
    die("error loading awords");
    }
    
    }
    
    public function countAws($filep) {
        
        //problem is that the file pointer is null
        $bStr="<br>";
        print(fgets($filep));
        $line =  fgetss($filep);
        //$out = str_replace("<br>", " ", $line);
        //$field = explode(" ", $out, 9);
        //echo $field[0];
        //echo $field[1];
        $works = str_word_count($line, 0);
        print("this should be a working array");
        print($works);
        //$wholef= explode($bStr, file_get_contents(Awords.txt));
        //$arr = count_chars($wholef);
        //print_r($field);
        //print("oh yea");
        //print($arr);
    }
}

?>
