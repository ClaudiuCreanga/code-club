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
        $this->tries = $tries;
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

    public function runGame()
    {
        for($i = 1; $i <= 10; $i++){
            $this->setTries($i);

        }
    }

    public function generateTriesScore()
    {
        for($i = 1; $i <= 10; $i++){
            $this->setTries([ $i => [rand(0,9), rand(0,9)]]);
        }
    }


}
