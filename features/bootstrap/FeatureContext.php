<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    private $codeBreaker;
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        $this->codeBreaker = new CodeBreakerBehat();
    }

    /**
     * @Given I input a string :string
     */
    public function iInputAnEmptyString($string)
    {
        $this->codeBreaker->setMyInput($string);
    }

    /**
     * @When I run the breaker
     */
    public function iRunTheBreaker()
    {
        $this->codeBreaker->execute();
    }

    /**
     * @Then I should get:
     */
    public function iShouldGet(PyStringNode $string)
    {
        PHPUnit\Framework\Assert::assertSame($this->codeBreaker->getOutput(),$string->getRaw());
    }

    /**
     * @Then I should get an array:
     */
    public function iShouldGetAnArray(TableNode $table)
    {
        $parsedArray = array_map("intval",$table->getRows()[0]);
        PHPUnit\Framework\Assert::assertSame($this->codeBreaker->getOutput(),$parsedArray);
    }

}
