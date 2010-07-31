<?php
require_once 'PHPUnit/Framework.php';
require_once dirname(__FILE__) . '/../../src/Running/K.php';

class Running_KTest extends PHPUnit_Framework_TestCase
{
    function testCalculate()
    {
        $heartrate = 152;
        $velocity = 14.9;
        $rest_heartrate = 34;
        $max_heartrate = 185;
        $vdot = new Running_K($rest_heartrate, $max_heartrate);
        $vo2 = $vdot->calculate($velocity, $heartrate);
        $this->assertEquals(67.75, round($vo2, 2));
    }
}