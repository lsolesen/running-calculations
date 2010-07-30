Running calculations
==

Will contain PHP tools for calculation different stuff for running.

Vdot
--

    $hours = 0;
    $minutes = 19;
    $seconds = 6;
    $distance = 5;
    $vdot = new Running_Vdot();
    $vdot->calculate($hours, $minutes, $seconds, $distance);

IPoint
--

    $hours = 0;
    $minutes = 19;
    $seconds = 6;
    $distance = 5;
    $vdot = 50;
    $ipoints = new Running_Ipoints();
    $ipoints->calculate($hours, $minutes, $seconds, $distance, $vdot);
    
Riegel
--

    $known_distance = 5000;
    $known_time = 20;
    $distance_to_run = 42000;
    $riegel = new Running_Riegel();
    $time = $riegel->calculate($known_time, $known_distance, $distance_to_run);
    