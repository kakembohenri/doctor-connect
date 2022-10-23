<?php
function getSessions()
{
    if ($_SESSION["role"] == "admin") {

        $doctors = DB::getConnection()->query("SELECT * FROM doctors")->fetchAll();
    } else {

        $doctors = $_SESSION['user'];
    }

    return $doctors;
}

function addSession(array $request)
{
    $doctor_id = $request['doc_id'];
    $date = $request['date'];
    $morning = $request['morning'];
    $afternoon = $request['afternoon'];
    $evening = $request['evening'];

    // Check that the given date isnt less than the current date

    $current_date = strtotime(date('Y-m-d'));

    if (strtotime($date) < $current_date) {
        return $_SESSION['error'] = "A date past the current date cant be selected";
    }

    if ($morning == "") {
        $morning = 0;
    }

    if ($afternoon == "") {
        $afternoon = 0;
    }

    if ($evening == "") {
        $evening = 0;
    }

    $sql = "INSERT INTO session(doctor_id, date, morning, afternoon, evening) values('$doctor_id', '$date', '$morning','$afternoon','$evening')";

    try {
        DB::getConnection()->query($sql);

        return $_SESSION['success'] = "Successfully added a session";
    } catch (Exception $e) {
        return $_SESSION['error'] = $e;
    }
}

function deleteSession(array $request)
{
    $id = $request['del_session_id'];

    DB::getConnection()->query("DELETE FROM session where id='$id'");

    try {
        DB::getConnection()->query("DELETE FROM appointments where session_id='$id'");

        $_SESSION['success'] = "Successfully deleted session";
    } catch (Exception $e) {
        $e = "Successfully deleted session";
        $_SESSION['success'] = $e;
    }
}

function editSession(array $request)
{
    $id = $request["session_id"];

    $date = $request['date'];
    $morning = $request['morning'];
    $afternoon = $request['afternoon'];
    $evening = $request['evening'];

    // Check that the given date isnt less than the current date

    $current_date = strtotime(date('Y-m-d'));

    if (strtotime($date) < $current_date) {
        return $_SESSION['error'] = "A date past the current date cant be selected";
    }

    if ($morning == "") {
        $morning = 0;
    }

    if ($afternoon == "") {
        $afternoon = 0;
    }

    if ($evening == "") {
        $evening = 0;
    }


    $sql = "UPDATE session set date='$date', morning='$morning', afternoon='$afternoon', evening='$evening' WHERE id='$id'";

    DB::getConnection()->query($sql);

    $_SESSION['success'] = "Session has been successfully edited";
}


function getDoctorSession(array $request)
{
    $id = $request["doctor_id"];

    $sql = "SELECT * FROM session where doctor_id='$id'";

    $sessions = DB::getConnection()->query($sql)->fetchAll();

    $_SESSION['current'] = DB::getConnection()->query("SELECT * FROM doctors where doctor_id='$id' limit 1")->fetchAll();
    $_SESSION['doctor_id'] = $id;
    $_SESSION['sessions'] = $sessions;
}
