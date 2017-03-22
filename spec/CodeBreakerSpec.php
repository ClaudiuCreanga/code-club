<?php

namespace spec;

use CodeBreaker;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CodeBreakerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(CodeBreaker::class);
    }

    function it_returns_empty_no_matches()
    {
        $this->execute()->shouldReturn("");
    }

    function it_returns_one_match()
    {
        $this->execute("123")->shouldReturn([0,1,1]);
        $this->execute("111")->shouldReturn([0,1,1]);
        $this->execute("177")->shouldReturn([0,-1,-1]);
    }

    function it_returns_exact_match()
    {
        $this->execute("135")->shouldReturn([0,0,0]);
    }

    function it_returns_array()
    {
        $this->getArray("123")->shouldReturn([1,2,3]);
    }

    function it_returns_two_matches()
    {
        $this->execute("137")->shouldReturn([0,0,-1]);
        $this->execute("125")->shouldReturn([0,1,0]);
        $this->execute("035")->shouldReturn([1,0,0]);
    }
}
