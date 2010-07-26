<?php
/**
 * Compute VDOT from a PR-race time
 *
 * Based on the The Daniels/Gilbert Formula. Explanation can be found here
 * http://www.simpsonassociatesinc.com/runningmath1.htm
 *
 * Takes your <u>current</u> best measured performance at a given distance and
 * assigns an <b>"effective VO<sub>2</sub>max"</b> score (VDOT). The word "effective"
 * just means that the score is <b>VO<sub>2</sub>max</b> multiplied by a mitigating factor
 * that is determined by one's running economy, running efficiency,
 * biomechanics, and mental toughness.  Your actual race or PR time reflects that composite.
 *
 * The actual <i>"Oxygen Power"</i> tables of Daniels and Gilbert provided cross-references
 * in both miles and kilometers. You might want to compare the results you obtain from inserting
 * different values in the above boxes to that on Pages 63-64 of the <i><u>Daniels'Running Formula</u></i>
 * text. If you don't own a copy of <i><u>Daniels'Running Formula</u></i>, you might want to pick
 * up a copy of the April 2005 <i><u>Runner's World</u></i> and look on Page 96.
 * They have printed a portion of Daniels' VDOT table there.
 *
 * The table in either of the above mentioned resources lists VDOT for race performance optimal
 * times, and these should match up with what you derive here, except I have extended them to the
 * second decimal position. To see the full range of data contained in the Daniels/Gilbert tables,
 * You can plug in PR times for distances as low as 0.8 kilometers (800 meters) to as high as 50 kilometers.
 * By the way, if you are using your current best 1/2 marathon or marathon time as the PR you
 * enter, use <b>21.082 kilometers</b> and <b>42.165 kilometers</b> respectively to convert the
 * two distances to kilometers.
 *
 * Once your effective VO<sub>2</sub>max is known for a PR, it is a simple matter to plug that
 * same number back into the mathematical algorithm used for
 * <a href="http://www.simpsonassociatesinc.com/runningmath8.htm">Page 8</a> along with other
 * distances, and predict your performance on those additional distances.  We will do that on
 * the next page.  I have not written the next page yet, but I should be doing that soon.
 * Come back again to read the update.
 *
 * Yes. If you have Daniel's running book, Daniel's Running Formula, on Pages
58-60 he explains the VDOT. It stands for V-dot-O2-max. He explains that
VDOT is not necessarily the VO2max that would be measured in the laboratory.
In fact, VDOT is mathematically generated based on performance. It not only
includes the VO2max as would be measured in the laboratory, but also the
lactate-response (threshold trigger point) that also affects a runner's
performance. My reference to "effective VO2max" refers to the same thing.

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
 * Convert distance from kilometers to miles
 *
 * @param integer $dist in kilometers
 *
 * @return integer
 */
function convertkilometerstomiles($dist)
{
    return $dist * 1.60935;
}

/**
 * Calculate VO2 max
 *
 * @param integer $hrs
 * @param integer $mins
 * @param integer $secs
 * @param integer $dist
 *
 * @return integer
 */
function vo2maxcalculate($hrs, $mins, $secs, $dist)
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