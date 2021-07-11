<?php
namespace Body\Test;

use Body\Stofskifte;

class StofskifteTest extends \PHPUnit_Framework_TestCase
{
    function testCalculateMan()
    {
        $stofskifte = new Stofskifte();
        $this->assertEquals(190.88, $stofskifte->calculate($height, $weight));
    }
}
