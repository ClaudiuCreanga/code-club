<?php

//0 means the proposed digit is correct
//1 means the proposed digit is lower than the correct one
//-1 means the proposed digit is higher than the correct one

class CodeBreaker
{
    public $code = [1,3,5];

    public function execute($try = "")
    {
        if ($try == ""){
            return "";
        } else {
            $value = $this->getArray($try);
            return $this->parseCode($value);
        }
    }

    public function getArray($try)
    {
        return array_map('intval', str_split($try));
    }

    public function parseCode($value)
    {
        $matches = [];
        if ($value === $this->code)
        {
            return [0,0,0];
        } else {
            foreach ($value as $key => $item){
                if($item === $this->code[$key]){
                    $matches[] = 0;
                } else if($item < $this->code[$key]){
                    $matches[] = 1;
                } else {
                    $matches[] = -1;
                }
            }
        }

        return $matches;
    }

}
