<?php

use Phunkie\Utils\Trampoline\Done;
use Phunkie\Utils\Trampoline\More;
use Phunkie\Utils\Trampoline\Trampoline;

require "/Users/claudicreanga/projects/codeclub/vendor/autoload.php";

function getFactorial($n)
{
    if ($n <= 1) {
        return 1;
    } else {
        return $n * getFactorial($n-1);
    }
}
//echo getFactorial(5);

function isEven($n): Trampoline
{
    if($n == 0){
        return new Done(true);
    } else {
        return new More(function() use ($n) {
            return isOdd($n-1);
        });
    }
}

function isOdd($n)
{
    if($n == 0) {
        return new Done(false);
    } else {
        return new More(function() use ($n) {
            return isEven($n - 1);
        });
    }
}

var_dump(isEven(1000000)->run());

