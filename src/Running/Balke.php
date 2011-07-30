<?php
/**
 * Balke test is to cover as many meters in 15 minutes as possible
 */
class Running_Balke
{
    /**
     * estimates VO2 max from distance covered in 15 minutes
     * 
     * @param integer $metres covered in 15 minutes
     *
     * @return double
     */
    function vo2($metres)
    {
        return (6.5 + (($metres/400)*5));
    }
}

/**
 * Horwills revised forumla based on the Balke test
 */
class Running_Horwill
{
    /**
     * Estimates vo2 from distance covered in 15 minutes
     * 
     * @param integer $metres covered in 15 minutes
     *
     * @return double
     */
    function vo2($metres)
    {
        return (($metres/15 - 133) * 0.172 + 33.3);
    }
}

