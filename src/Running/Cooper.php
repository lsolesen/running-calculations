<?php
namespace Running;

/**
 * Cooper estimate
 *
 * Formula is used for people who has covered the longest distance possible in 12 minutes.
 */
class Cooper
{
    /**
     * Estimates VO2 max
     *
     * @param integer $metres covered in 12 minuts
     */
    public function vo2($metres)
    {
        return (($metres - 504.9) / 44.73);
    }
}
