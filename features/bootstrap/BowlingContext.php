<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class BowlingContext implements Context
{

    public $bowling;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        $this->bowling = new Bowling;
    }

    /**
     * @Given Player starts a game
     */
    public function playerStartsAGame()
    {
        $this->bowling->setPlayerScore(0);
    }

    /**
     * @When Player completes a game with :type
     */
    public function playerCompletesAGame($type)
    {
        $this->bowling->runGame($type);
    }

    /**
     * @Then The score should be :score
     */
    public function theScoreShouldBe($score)
    {
        PHPUnit\Framework\Assert::assertSame($this->bowling->getPlayerScore() ,(int)$score);
    }

    /**
     * @Then The score should be sum of tries
     */
    public function theScoreShouldBeSumOf()
    {
        $score = 0;
        foreach ($this->bowling->getTries() as $try){
            $score += array_sum($try);
        };
        PHPUnit\Framework\Assert::assertSame($score, $this->bowling->getPlayerScore());
    }

    /**
     * @Then The score should be sum of tries and spares
     */
    public function theScoreShouldBeSumOfTriesAndSpares()
    {

    }

}



