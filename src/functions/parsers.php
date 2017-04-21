<?php

use Parser;

function result($a) {
    return new Parser(
        function($string) use($a) {
            return ImmList(Pair($a, $string));
        }
    );
}

function zero() {
    return new Parser( function ($string) {
        return ImmList();
    });
}

function item(){
    return new Parser(
        function ($string) {
            return ImmList(Pair($string[0], substr($string, 1)));
        }
    );
}

function seq($p, $q) {
    return new Parser(
        function ($string) use($p, $q) {
            $resultP = $p->run($string);
            $resultQ = $q->run($resultP->head->_2);
            return ImmList(Pair(Pair($resultP->head->_1, $resultQ->head->_1)), $resultQ->head->_2);
        }
    );
}
