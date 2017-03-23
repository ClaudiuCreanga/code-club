<?php

class Bowling
{


    private $tries = [];
    private $playerScore = 0;

    /**
     * @return array
     */
    public function getTries(): array
    {
        return $this->tries;
    }

    /**
     * @param $tries
     */
    public function setTries($tries)
    {
        $this->tries[] = $tries;
    }


    /**
     * @return int
     */
    public function getPlayerScore(): int
    {
        return $this->playerScore;
    }

    /**
     * @param int $playerScore
     */
    public function setPlayerScore(int $playerScore)
    {
        $this->playerScore = $playerScore;
    }

    public function runGame($type)
    {
        $this->generateTriesScore($type);
        foreach ($this->getTries() as $try)
        {
            $this->setPlayerScore($this->getPlayerScore() + array_sum($try));
        }
    }

    public function generateTriesScore($type)
    {
        if ($type == 0){
            for($i = 1; $i <= 10; $i++){
                $this->setTries([rand(0,0), rand(0,0)]);
            }
        } elseif ($type == "spares"){

        } elseif ($type == "strike"){

        } else {
            for($i = 1; $i <= 10; $i++){
                $this->setTries([rand(0,9), rand(0,9)]);
            }
        }

    }


}
