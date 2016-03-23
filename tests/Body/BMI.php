<?php
namespace Body\Test;

use Body\BMI;

class Body_BMI extends \PHPUnit_Framework_TestCase
{
    function testCalculate()
    {
        $bmi = new BMI();
        $this->assertEquals(190.88, $bmi->calculate($height, $weight));
    }
}
