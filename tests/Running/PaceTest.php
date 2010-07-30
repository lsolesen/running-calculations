<?php
require_once 'PHPUnit/Framework.php';
require_once dirname(__FILE__) . '/../../src/Running/Vdot/Pace.php';

class Running_PaceTest extends PHPUnit_Framework_TestCase
{
    protected $pace;

    function setUp()
    {
        $this->pace = new Running_Vdot_Pace(83);
    }

    function testEasy()
    {
        $this->assertEquals(280.55, $this->pace->easy());
    }

    function testMarathon()
    {
        $this->assertEquals(0, $this->pace->marathon());
    }

    function testTempo()
    {
        $this->assertEquals(274.22, $this->pace->tempo());
    }

    function testInterval()
    {
        $this->assertEquals(266.33, $this->pace->interval());
    }

    function testRepetition()
    {
        $this->assertEquals(150.58, $this->pace->repetition());
    }

}