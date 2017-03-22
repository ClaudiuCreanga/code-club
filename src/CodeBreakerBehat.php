<?php

/**
 * Created by PhpStorm.
 * User: claudicreanga
 * Date: 22/03/2017
 * Time: 10:23
 */
class CodeBreakerBehat
{
    public $myInput = "";

    public $output;

    public $code = [1,3,5];


    /**
     * @return string
     */
    public function getMyInput(): string
    {
        return $this->myInput;
    }

    /**
     * @param string $myInput
     */
    public function setMyInput(string $myInput)
    {
        $this->myInput = $myInput;
    }

    public function execute()
    {
        if($this->getMyInput() == ""){
            $this->setOutput("");
        } else {
            $value = $this->getArray();
            $this->setOutput($this->parseCode($value));
            print_r($this->getOutput());
        }
    }

    public function getArray()
    {
        return array_map('intval', str_split($this->getMyInput()));
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

    /**
     * @return array|string
     */
    public function getOutput()
    {
        return $this->output;
    }

    /**
     * @param array|string $output
     */
    public function setOutput($output)
    {
        $this->output = $output;
    }

}