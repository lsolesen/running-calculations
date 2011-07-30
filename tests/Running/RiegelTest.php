<?php
require_once dirname(__FILE__) . '/../../src/Running/Riegel.php';

class Running_RiegelTest extends PHPUnit_Framework_TestCase
{
    function testCalculate()
    {
        $known_distance = 5000;
        $known_time = 20;
        $distance_to_run = 42000;
        $riegel = new Running_Riegel();
        $time = $riegel->calculate($known_time, $known_distance, $distance_to_run);
        $this->assertEquals(190.88, $time);
    }
}
