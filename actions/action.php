<?php session_start();
error_reporting(0);
require("../backend/db/db.php");
require("../backend/controllers/doctors_controller.php");
require("../backend/controllers/patients_controller.php");
require("../backend/controllers/dept_controller.php");
require("../backend/controllers/apt_controller.php");
require("../backend/controllers/chat_controller.php");
require("../backend/controllers/rate_controller.php");
require("../backend/controllers/auth_controller.php");
require("../backend/controllers/exists_checker.php");
require("../backend/controllers/session_controller.php");
require("../backend/controllers/calculate_time.php");

if (isset($_POST["add_doctor"])) {
    storeDoctor($_POST, $_FILES["image"]);
    header("location:../?view=add-doctor");
}


if (isset($_POST["add_patient"])) {
    storePatient($_POST);
    echo ("<script>window.location.href='../register.php'</script>");
    exit();
}

if (isset($_POST["add_patient_details"])) {
    storePatientDetails($_POST);
    echo ("<script>window.location.href='../?view=profile'</script>");

    exit();
}


if (isset($_POST["edit_patient_details"])) {
    editPatientDetails($_POST);
    echo ("<script>window.location.href='../?view=profile'</script>");
    exit();
}


// if(isset($_POST["edit_dept"])){
//     storeDept($_POST);
//     echo("<script>window.location.href='../?view=depts'</script>");
//     exit();
// }



if (isset($_POST["edit_patient"])) {
    editPatient($_POST);

    if ($_SESSION["role"] == "patient") {
        echo ("<script>window.location.href='../?view=profile'</script>");
        exit();
    }

    if ($_SESSION["role"] == "doctor") {
        echo ("<script>window.location.href='../?view=profile'</script>");
        exit();
    }

    if ($_SESSION["role"] == "admin") {
        echo ("<script>window.location.href='../?view=patients'</script>");
    }
}


if (isset($_POST["edit_doctor"])) {
    editDoctor($_POST, $_FILES["image"]);
    echo ("<script>window.location.href='../?view=doctors'</script>");
    exit();
}


if (isset($_POST["edit_dept"])) {
    editDept($_POST);
    echo ("<script>window.location.href='../?view=depts'</script>");
    exit();
}




if (isset($_POST["edit_appointment"])) {
    editApt($_POST);
    echo ("<script>window.location.href='../?view=appointments'</script>");
    exit();
}


if (isset($_POST["add_dept"])) {
    storeDept($_POST);
    echo ("<script>window.location.href='../?view=add-dept'</script>");
    exit();
}

if (isset($_POST["add_appointment"])) {
    storeApts($_POST);

    echo ("<script>window.location.href='../?view=add-appointment'</script>");
    exit();
}


if (isset($_GET["delete_apt"])) {
    deleteApt($_GET);
    echo ("<script>window.location.href='../?view=appointments'</script>");
    exit();
}


if (isset($_GET["delete_patient"])) {
    deletePatient($_GET);
    echo ("<script>window.location.href='../?view=patients'</script>");
    exit();
}



if (isset($_GET["delete_doctor"])) {
    deleteDoctor($_GET);
    echo ("<script>window.location.href='../?view=doctors'</script>");
    exit();
}


if (isset($_GET["delete_dept"])) {
    deleteDept($_GET);
    echo ("<script>window.location.href='../?view=depts'</script>");
    exit();
}



if (isset($_GET["add_chat"])) {
    storeChat($_GET);
    header("content-type:application/json");
    echo (json_encode([
        "status" => "success"
    ]));
}

if (isset($_GET["apt_action"])) {
    aptAction($_GET);
    echo ("<script>window.location.href='../?view=appointments'</script>");
    exit();
}


if (isset($_GET["add_rating"])) {
    storeRating($_GET);
    header("content-type:application/json");
    echo (json_encode([
        "status" => "success"
    ]));
}

if (isset($_POST["login"])) {
    handleLogin($_POST);
}


// if(isset($_GET["count_chats"])){
//     header("content-type:application/json");
//     echo(json_encode([
//         "count"=>getChatCount()
//     ]));
// }


if (isset($_GET["count_chats"])) {
    header("content-type:application/json");
    echo (json_encode([
        "count" => 0,
        "data" => getChatsAndCount()
    ]));
}

if (isset($_POST["add-session"])) {
    addSession($_POST);
    header('location:../?view=sessions');
    exit();
}

if (isset($_POST["get-doctor-session"])) {
    getDoctorSession($_POST);
    header('location:../?view=add-appointment');
    exit();
}

if (isset($_GET["del_session_id"])) {
    deleteSession($_GET);
    header('location:../?view=sessions');
    exit();
}

if (isset($_POST["edit-session"])) {
    editSession($_POST);
    header('location:../?view=sessions');
    exit();
}
