<?php
/**
 * Calculates estimated 1RM
 *
 * http://en.wikipedia.org/wiki/One-repetition_maximum
 *
 * @author lsolesen
 *
 */
class Strength_1RM
{
    function calculate($repetitions, $weight)
    {
        return $weight * (($repetitions / 30) + 1);
    }
}