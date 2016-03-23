<?php
namespace Running;

/**
 * Horwills revised forumla based on the Balke test
 */
class Horwill
{
    /**
     * Estimates vo2 from distance covered in 15 minutes
     *
     * @param integer $metres covered in 15 minutes
     *
     * @return double
     */
    public function vo2($metres)
    {
        return (($metres/15 - 133) * 0.172 + 33.3);
    }
}
