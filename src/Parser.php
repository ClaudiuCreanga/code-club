<?php


use Phunkie\Types\Pair;

class Parser
{
    private $run;

    public function __construct(callable $run)
    {
        $this->run = $run;
    }

    public function run(string $string)
    {
        return ($this->run)($string);
    }

    public function flatMap(callable $f)
    {
        return new Parser(function($string) use ($f) {
            return $this->run($string)->flatMap(function(Pair $pair) use ($f) {
                return $f($pair->_1)->run($pair->_2);
            });
        });
    }
}
