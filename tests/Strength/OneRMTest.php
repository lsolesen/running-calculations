<?php
namespace Strength\Test;

use Strength\OneRepetitionMaximum;

class OneRMTest extends \PHPUnit_Framework_TestCase
{
    function testCalculate()
    {
        $weight = 300;
        $repetitions = 7;
        $vdot = new OneRepetitionMaximum;
        $rm = $vdot->calculate($repetitions, $weight);
        $this->assertEquals(360, $rm);
    }

    function testCalculate2()
    {
        $weight = 300;
        $repetitions = 3;
        $vdot = new OneRepetitionMaximum;
        $rm = $vdot->calculate($repetitions, $weight);
        $this->assertEquals(330, $rm);
    }
}
