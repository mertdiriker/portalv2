<?php

$myFile = "data.txt";
$lines = file($myFile);//file in to an array
var_dump($lines);

unset($lines[0]);
unset($lines[1]); // we do not need these lines.

foreach($lines as $line) 
{
    $var = explode(':', $line, 2);
    $arr[$var[0]] = $var[1];
}

print_r($arr);

?>