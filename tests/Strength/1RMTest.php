<?php
require_once 'PHPUnit/Framework.php';
require_once dirname(__FILE__) . '/../../src/Strength/1RM.php';

class Strength_1RMTest extends PHPUnit_Framework_TestCase
{
    function testCalculate()
    {
        $weight = 300;
        $repetitions = 7;
        $vdot = new Strength_1RM;
        $rm = $vdot->calculate($repetitions, $weight);
        $this->assertEquals(360, $rm);
    }

    function testCalculate2()
    {
        $weight = 300;
        $repetitions = 3;
        $vdot = new Strength_1RM;
        $rm = $vdot->calculate($repetitions, $weight);
        $this->assertEquals(330, $rm);
    }
}
