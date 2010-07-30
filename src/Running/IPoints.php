<?php
/**
 * Calculates estimated IPoints (intensity points)
 *
 * Daniels Running Formula, 2. edition.
 *
 * @author lsolesen
 *
 */
class Running_IPoints
{
    /**
     * Calculates IPoints
     *
     * @param integer $distance
     * @param integer $hours
     * @param integer $minutes
     * @param integer $seconds
     * @param integer $vdot Your maximal VDOT
     *
     * @return double
     */
    function calculate($distance, $hours, $minutes, $seconds, $vdot)
    {
        $km_pr_hour = $distance*((60*60)/($minutes*60+$seconds));
        $p6 = -4.6 + (0.182258 * ($km_pr_hour * 1000 / 60)) + (0.000104 * pow($km_pr_hour * 1000 / 60, 2));
        $percent_max_vdot = 100 * $p6 / $vdot;
        $ip_per_minute = 1.0613 * pow($percent_max_vdot / 100, 3.8238);
        return round(($minutes + $seconds / 60) * $ip_per_minute + ($minutes + $seconds / 60) * $ip_per_minute, 2);
    }
}