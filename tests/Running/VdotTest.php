<?php
namespace Running\Test;

use Running\Vdot;

class VdotTest extends \PHPUnit_Framework_TestCase
{
    function testCalculate()
    {
        $hours = 0;
        $mins = 12;
        $secs = 53;
        $dist = 5;
        $vdot = new Vdot;
        $vo2 = $vdot->calculate($dist, $hours, $mins, $secs);
        $this->assertEquals(83, $vo2);
    }
}
