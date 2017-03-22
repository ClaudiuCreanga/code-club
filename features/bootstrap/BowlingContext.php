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
     * @When Player completes a game
     */
    public function playerCompletesAGame()
    {
        $this->bowling->runGame();
    }

    /**
     * @Then The score should be :arg1
     */
    public function theScoreShouldBe($arg1)
    {
        PHPUnit\Framework\Assert::assertSame($this->bowling->getPlayerScore() ,(int)$arg1);
    }

}

