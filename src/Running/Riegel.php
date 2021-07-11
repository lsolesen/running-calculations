<?php
/**
 * Riegels formula
 *
 * @author Lars Olesen <lars@intraface.dk>
 */

namespace Running;

/**
 * Riegels formula
 *
 * @author Lars Olesen <lars@intraface.dk>
 */
class Riegel
{
    /**
     * Calculate Time for distance to run
     *
     * @param integer $known_time      Time in integer
     * @param integer $known_distance  Distance in meters
     * @param integer $distance_to_run Distance in meters
     *
     * @return integer
     */
    public function calculate($known_time, $known_distance, $distance_to_run)
    {
        return round($known_time * pow($distance_to_run/$known_distance, 1.06), 2);
    }
}
