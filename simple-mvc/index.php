<?php
//start count time
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$start = $time;


require 'app/init.php';
$app = new App;


$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$finish = $time;
$total_time = round(($finish - $start), 4);
echo 'Page generated in '.$total_time.' seconds.';

?>
