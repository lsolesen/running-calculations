<?php
/**
 * Calculates VO2 
 *
 * Based on: 
 * New approaches to predict VO2max and endurance from running performance.
 * Tokmakidis SP, Léger L, Mercier D, Péronnet F, Thibault G.
 * Journal of Sports Medicine, 27:402, 1987.
 * @link http://www.ncbi.nlm.nih.gov/pubmed/3444324
 */
class Running_Tokmakidis
{
    /**
     * Returns predicted VO2 max
     *
     * @param integer $minutes
     * @param integer $minutes
     * @param float   $km
     */
    function calculate($minutes, $seconds, $km)
    {
	    $km_pr_hour = (float) $km / ((intval($seconds) + intval($minutes)*60) / (60*60) ); 
	    return round(3.5*(4.326+(0.862*$km_pr_hour)-(-1.3264*log($km) + 2.6934)));
    }

}

