<?php
/**
 * Cooper estimate
 * 
 * Formula is used for people who has covered the longest distance possible in 12 minutes.
 */
class Running_Cooper
{
    /**
     * Estimates VO2 max
     * 
     * @param integer $metres covered in 12 minuts
     */
    function vo2($metres)
    {
    	return (($metres - 504.9) / 44.73);
    }        
}

