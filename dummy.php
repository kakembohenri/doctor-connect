<?php

// require("backend/controllers/calculate_time.php");
// require("backend/db/db.php");

// $times = Calculate::makeCalculation(6);
// $newTimes = Calculate::getValidTimeFrames($times, 6);
// // $times = "hey";
// foreach ($newTimes as $time) {
//     echo "Name: " . $time["name"];
//     echo "<br>" . "Id: " . array_search($time, $newTimes);
//     echo "<br>" . "Start-time: " . $time['start_time'];
//     echo "<br>" . "End-time: " . $time['end_time'] . "<br><br>";
// }

$current = date('Y-m-d');
$old = strtotime("2022-10-1");
// echo ($old < strtotime($current));
