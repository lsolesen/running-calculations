<?php
namespace Running\Test;

use Running\IPoints;

class IPointTest extends \PHPUnit_Framework_TestCase
{
    function testCalculate()
    {
        $hours = 0;
        $mins = 19;
        $secs = 52;
        $dist = 3.15;
        $vdot = 38.7;
        $ipoint = new IPoints();
        $ipoints = $ipoint->calculate($dist, $hours, $mins, $secs, $vdot);
        $this->assertEquals(10.51, $ipoints);
    }
}
