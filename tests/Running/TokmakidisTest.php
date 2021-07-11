<?php
namespace Running\Test;

use Running\Tokmakidis;

class TokmakidisTest extends \PHPUnit_Framework_TestCase
{
    function testCalculate()
    {
        $mins = 12;
        $secs = 53;
        $dist = 5;
        $vdot = new Tokmakidis;
        $vo2 = $vdot->calculate($mins, $secs, $dist);
        $this->assertEquals(83, $vo2);
    }
}
