<?php
require_once 'PHPUnit/Framework.php';
require_once dirname(__FILE__) . '/../../src/Running/IPoints.php';

class Running_IpointTest extends PHPUnit_Framework_TestCase
{
    function testCalculate()
    {
        $hours = 0;
        $mins = 19;
        $secs = 52;
        $dist = 3.15;
        $vdot = 38.7;
        $ipoint = new Running_IPoints($vdot);
        $ipoints = $ipoint->calculate($dist, $hours, $mins, $secs, $vdot);
        $this->assertEquals(10.51, $ipoints);
    }
}