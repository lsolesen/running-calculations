<?php
require_once dirname(__FILE__) . '/../../src/Body/Stofskifte.php';

class Body_StofskifteTest extends PHPUnit_Framework_TestCase
{
    function testCalculateMan()
    {
        $stofskifte = new Body_Stofskifte();
        $this->assertEquals(190.88, $stofskifte->calculate($height, $weight));
    }
}
