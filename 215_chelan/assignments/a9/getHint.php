<!--
Maryanne Derige
Date Created or Modified: 3-19-2017
http://chelan.highline.edu/~maryannederige/215/assignments/a9/getHint.php


File contains items read from the adds.txt file and also determines AJAX
responseText.
-->

<?php

/* error reporting */	
ini_set('display_errors', 1);
error_reporting(E_ALL);

$file = fopen('adds.txt', 'rb');
    $items = array();
    while (!feof($file)) {
        $item = fgets($file);
        if ($item === false) {
            continue;
        } else {
            $items[] = $item;
        }
    }
    
// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from "" 
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($items as $item) {
        if (stristr($q, substr($item, 0, $len))) {
            if ($hint === "") {
                $exploded = explode(";", $item);
                $hint = $exploded[0];
                $hint = "<a href=\"details.php?userInput=". $hint."\">" . $hint . "</a>";
            } else {
                $exploded = explode(";", $item);
                //print "<pre>";
                //print_r ($exploded);
                //print "</pre>";
                $hint .= "<br /><a href=\"details.php?userInput=" . $exploded[0] . "\">" . $exploded[0] . "</a>";
            }
        }
    }
}

// Output "no suggestion" if no hint was found or output correct values 
echo $hint === "" ? "no suggestion" : $hint;
?>
