<?php
namespace Running\Test;

use Running\K;

class KTest extends \PHPUnit_Framework_TestCase
{
    function testCalculate()
    {
        $heartrate = 152;
        $velocity = 14.9;
        $rest_heartrate = 34;
        $max_heartrate = 185;
        $vdot = new K($rest_heartrate, $max_heartrate);
        $vo2 = $vdot->calculate($velocity, $heartrate);
        $this->assertEquals(67.75, round($vo2, 2));
    }
}
