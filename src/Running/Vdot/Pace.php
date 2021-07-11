<?php
/**
 * Compute Pace from VDOT
 *
 * @link http://www.hillrunner.com/calculators/trainpaces.php
 *
 * @author Lars Olesen <lars@intraface.dk>
 */

namespace Running\Vdot;

/**
 * Compute Pace from VDOT
 *
 * @author Lars Olesen <lars@intraface.dk>
 */
class Pace
{
    protected $vdot;

    /**
     * Constructor
     *
     * @param integer $vdot
     */
    public function __construct($vdot)
    {
        $this->vdot = $vdot;
    }

    /**
     * Calculate easy pace paces based on VDOT
     *
     * @return integer
     */
    public function easy()
    {
        // result is seconds pr. mile
        return $this->km(pow($this->vdot, 1.72) - $this->vdot * 36.5 + 1482);
    }

    /**
     * Calculate marathon pace paces based on VDOT
     *
     * @todo this calculation is not correct
     *
     * @return integer
     */
    public function marathon()
    {
        return round($this->easy() - (($this->easy() - $this->tempo()) * 2/3), 2); // 2/3 from Easy to Tempo.
    }

    /**
     * Calculate tempo pace paces based on VDOT - lactate threshold
     *
     * @return integer
     */
    public function tempo()
    {
        return $this->km(pow($this->vdot, 1.73) - $this->vdot * 36 + 1340);
    }

    /**
     * Calculate tempo pace paces based on VDOT
     *
     * @return integer
     */
    public function interval()
    {
        return $this->km(pow($this->vdot, 1.726) - $this->vdot * 34.7 + 1256);
    }

    /**
     * Calculate repetion pace paces based on VDOT
     *
     * @return integer
     */
    public function repetition()
    {
        return $this->km($this->interval() - 24); // 24 seconds / mile (or 6 seconds/400) faster than Interval.
    }

    public function km($mile)
    {
        return round($mile / 1.60935, 2);
    }

    public static function hhiiss($seconds)
    {
        return gmdate("H:i:s", $seconds);
    }

    public static function ss($min, $sec)
    {
        return $min * 60 + $sec;
    }
}
