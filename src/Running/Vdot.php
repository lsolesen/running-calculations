<?php
/**
 * Compute VDOT from a PR-race time (Daniels/Gilbert)
 *
 * Takes your <u>current</u> best measured performance at a given distance and
 * assigns an "effecive VO2 max"-score (VDOT) to it.
 *
 * VDOT stands for V-dot-O2-max. VDOT is not the VO2max that would be measured in the
 * laboratory. VDOT is mathematically generated based on performance. It not only
 * includes the VO2max as would be measured in the laboratory, but also the lactate-response
 * (threshold trigger point), running economy, running efficiency, biomechanics, and mental
 * toughness that also affects a runner's performance. Your actual race or PR time reflects
 * that composite (Daniels' Running Formula, pp. 58-60).
 *
 * You can plug in PR times for distances as low as 0.8 kilometers (800 meters) to as high as 50 kilometers.
 *
 * Explanation can be found here http://www.simpsonassociatesinc.com/runningmath1.htm
 *
 * Original formula taken from http://www.simpsonassociatesinc.com/runningmath9.php3
 *
 * @author Larry Simpson
 * @author Mike McKee
 * @author Lars Olesen <lars@intraface.dk>
 *
 * @link http://www.simpsonassociatesinc.com/runningmath9.php3
 */

/**
 * Convert distance from miles to kilometers
 *
 * @param integer $dist in miles
 *
 * @return integer
 */
function convertmilestokilometers($dist)
{
    return $dist * 1.60935;
}

/**
 * Compute VDOT from a PR-race time (Daniels/Gilbert)
 *
 * Original formula taken from http://www.simpsonassociatesinc.com/runningmath9.php3
 *
 * @author Larry Simpson
 * @author Mike McKee
 * @author Lars Olesen <lars@intraface.dk>
 *
 * @link http://www.simpsonassociatesinc.com/runningmath9.php3
 */
class Running_Vdot
{
    /**
     * Calculate VO2 max
     *
     * @param integer $hrs  Hours
     * @param integer $mins Minutes
     * @param integer $secs Seconds
     * @param integer $dist Distance (km)
     *
     * @return integer
     */
    function calculate($dist, $hrs, $mins, $secs)
    {
        $th = $hrs * 60; //all time has to be in minutes
        $tm = $mins * 1; //this is already in minutes
        $ts = $secs / 60; //this has to be converted to minutes
        $ttime = $th + $tm + $ts; //getting the total minutes then
        $dist = $dist * 1000; //change input from kilometers to meters
        $d = $dist / $ttime; //velocity of the runner

        //calculate % of VO2max at this runner's velocity
        $p1 = exp(-0.012778 * $ttime);
        $p1 = 0.1894393 * $p1;
        $p2 = exp(-0.1932605 * $ttime);
        $p2 = 0.2989558 * $p2;
        $p = 0.8 + $p1 + $p2;

        //calculate oxygen cost for this velocity
        $v = -4.60;
        $v = $v + (0.182258 * $d);
        $v = $v + (0.000104 * $d * $d);

        //calculate the VO2max of the runner to the second decimal position
        $vo2 = number_format(($v / $p),2);

        //return the VO2max
        return $vo2;
    }
}