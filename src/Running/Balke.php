<?php
namespace Running;

/**
 * Balke test is to cover as many meters in 15 minutes as possible
 */
class Balke
{
    /**
     * estimates VO2 max from distance covered in 15 minutes
     *
     * @param integer $metres covered in 15 minutes
     *
     * @return double
     */
    public function vo2($metres)
    {
        return (6.5 + (($metres/400)*5));
    }
}
