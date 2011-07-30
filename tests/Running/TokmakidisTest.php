<?php
require_once dirname(__FILE__) . '/../../src/Running/Tokmakidis.php';

class Running_TokmakidisTest extends PHPUnit_Framework_TestCase
{
    function testCalculate()
    {
        $mins = 12;
        $secs = 53;
        $dist = 5;
        $vdot = new Running_Tokmakidis;
        $vo2 = $vdot->calculate($mins, $secs, $dist);
        $this->assertEquals(83, $vo2);
    }
}
