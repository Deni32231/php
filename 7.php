<?php

function my_fn(string $str)
{
    $arrayWords = explode(" ", $str);
    $newStr = implode("_", $arrayWords);


    print($newStr . "\n");
}


my_fn("pervoe vtoroe  tretie");

?>