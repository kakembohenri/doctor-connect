<?php
function handleLogin(array $request)
{


    $email = $request["email"];
    $password = md5($request["password"]);


    $admin =  DB::getConnection()->query("SELECT * FROM admin where admin_email='$email'and admin_password='$password' limit 1 ")->fetchAll();


    if (count($admin) > 0) {
        $_SESSION = [
            "role" => "admin",
            "user" => $admin,
            "success" => "Successfully Logged in as an Administrator"
        ];
        header("location:../?view=dashboard");
        exit();
    }

    $doctor =  DB::getConnection()->query("SELECT * FROM doctors where doctor_email='$email'and doctor_password='$password' limit 1 ")->fetchAll();


    if (count($doctor) > 0) {
        $_SESSION = [
            "role" => "doctor",
            "user" => $doctor,
            "success" => "Successfully Logged in as  a Doctor"
        ];
        header("location:../?view=dashboard");
        exit();
    }
    $patient =  DB::getConnection()->query("SELECT * FROM patients where patient_email='$email'and patient_password='$password' limit 1 ")->fetchAll();

    if (count($patient) > 0) {
        $_SESSION = [
            "role" => "patient",
            "user" => $patient,
            "success" => "Successfully Logged in as  a Patient"
        ];

        header("location:../?view=doctors");
        exit();
    }

    $_SESSION["error"] = "Login Attempt failed";

    header("location:../login.php");
    exit();
}
