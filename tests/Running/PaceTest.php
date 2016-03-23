<?php
namespace Running\Test;

use Running\Vdot\Pace;

/**
 * Correct values calculated via
 * @link http://runsmartproject.com/calculator/
 */
class PaceTest extends \PHPUnit_Framework_TestCase
{
    protected $pace;

    /**
     * Vdot: Calculated based on 42 km on 02:03:06
     */
    function setUp()
    {
        $this->pace = new Pace(83);
    }

    /**
     * VDOT 83 = 3:23 - 3:37 min / km
     */
    function testEasy()
    {
        echo Pace::ss(3, 23);
        $this->assertEquals(280.55, $this->pace->easy(), "", $delta = 3);
    }

    /**
     * VDOT 83 = 02:56 min / km
     */
    function testMarathon()
    {
        echo Pace::ss(2, 56);
        $this->assertEquals(276.44, $this->pace->marathon(), "", $delta = 1);
    }

    /**
     * VDOT 83 = 02:49 min / km
     */
    function testTempo()
    {
        echo Pace::ss(2, 49);
        $this->assertEquals(274.22, $this->pace->tempo(), "", $delta = 1);
    }

    /**
     * VDOT 83 = 02:36 min / km
     */
    function testInterval()
    {
        echo Pace::ss(2, 36);
        $this->assertEquals(266.33, $this->pace->interval(), "", $delta = 1);
    }

    /**
     * VDOT 83 = 02:21 min / km
     */
    function testRepetition()
    {
        echo Pace::ss(2, 21);
        $this->assertEquals(150.58, $this->pace->repetition(), "", $delta = 1);
    }

    function testHHIISS()
    {
        $this->assertEquals('00:01:00', Pace::hhiiss(60));
        $this->assertEquals('00:04:41', Pace::hhiiss(281));
        $this->assertEquals('00:02:30', Pace::hhiiss(150));
    }
}
