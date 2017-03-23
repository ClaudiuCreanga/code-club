<?php

namespace spec;

use Bowling;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BowlingSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Bowling::class);
    }

    function it_runs_a_game()
    {
        $this->runGame();
        $this->getTries()->shouldHaveCount(10);
    }

    function it_returns0_gutter_game()
    {
        $this->getPlayerScore()->shouldReturn(0);
    }

    function it_generates_tries_score()
    {
        $this->generateTriesScore();
        $this->getTries()->shouldHaveCount(10);
    }


}
