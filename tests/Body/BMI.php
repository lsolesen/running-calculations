<?php
require_once dirname(__FILE__) . '/../../src/Body/BMI.php';

class Body_BMI extends PHPUnit_Framework_TestCase
{
    function testCalculate()
    {
        $bmi = new Body_BMI();
        $this->assertEquals(190.88, $bmi->calculate($height, $weight));
    }
}
