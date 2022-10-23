<?php
class Calculate
{

    public static function makeCalculation($session_id)
    {


        // get session 

        $sql = "SELECT * FROM session where id='$session_id' limit 1";

        $session = DB::getConnection()->query($sql)->fetchObject();

        // get shifts

        $morning = $session->morning;
        $afternoon = $session->afternoon;
        $evening = $session->evening;


        if (!function_exists('getTimeFrames')) {

            function getTimeFrames($name, $start_time, $end_time)
            {

                $shift = array();

                $shift['name'] = $name;

                if (!isset($_SESSION['shifts'])) {

                    $shift_array = array();
                } else {
                    $shift_array = $_SESSION['shifts'];
                }

                $diff = strtotime($end_time) - strtotime($start_time);

                $count = ($diff / (60 * 60));

                $interval = 60 * 60;

                for ($time = 0; $time < $count; $time++) {

                    if ($time == 0) {
                        $newStartTime = strtotime($start_time);
                        $newEndTime = ($newStartTime + $interval);
                    } else {
                        $newStartTime = (strtotime($start_time) + ($interval * $time));
                        $newEndTime = ($newStartTime + $interval);
                    }
                    $shift['start_time'] = date('H:i', $newStartTime);
                    $shift['end_time'] = date("H:i", $newEndTime);

                    array_push($shift_array, $shift);
                }

                $_SESSION['shifts'] = $shift_array;
                return $shift_array;
            }
        }

        if ($morning == 1) {

            $start_time = "7:00";
            $end_time = "12:00";

            $shift_array = getTimeFrames('morning', $start_time, $end_time);
        }

        if ($afternoon == 1) {

            $start_time = "12:00";
            $end_time = "18:00";

            $shift_array = getTimeFrames('afternoon', $start_time, $end_time);
        }

        if ($evening == 1) {

            $start_time = "18:00";
            $end_time = "24:00";

            $shift_array = getTimeFrames('evening', $start_time, $end_time);
        }

        unset($_SESSION['shifts']);
        return $shift_array;
    }

    public static function getValidTimeFrames(array $timeframes, $session_id)
    {
        // loop through time frames

        $newTimeFrames = array();

        foreach ($timeframes as $timeframe) {
            $start_time = $timeframe["start_time"];
            $end_time = $timeframe["end_time"];

            // check to see if these times are already in the appointments table alongside the session id
            $sql = "SELECT * FROM appointments where start_time='$start_time' and end_time='$end_time' and session_id='$session_id'";

            $sessions = DB::getConnection()->query($sql)->fetchAll();

            if (!count($sessions) > 0) {
                array_push($newTimeFrames, $timeframe);
            }
        }

        return $newTimeFrames;
    }
}
