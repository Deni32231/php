<?php

function myfn($x, $y, $k)
{
    for ($i = $x; $i <= $y; $i++) {
        if ($i % $k === 0) {
            print($i);
            print("\n");
        }
    }
}

myfn(10, 20, 2);

?>