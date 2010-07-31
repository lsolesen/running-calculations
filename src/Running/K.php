<?php
class Running_K
{
    protected $rest_heartrate;
    protected $max_heartrate;

    function __construct($rest_heartrate, $max_heartrate)
    {
        $this->rest_heartrate = $rest_heartrate;
        $this->max_heartrate = $max_heartrate;
    }

    function calculate($velocity, $heartrate)
    {
        $km_pr_hour = $velocity;
        $hrr = ($heartrate - $this->rest_heartrate) / ($this->max_heartrate - $this->rest_heartrate);
        return ($km_pr_hour * 3.966 - 7.736) / (0.97 * $hrr);
    }
}