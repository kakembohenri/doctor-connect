<?php
error_reporting(0);
$view = "";
$doctors = [];
$patients = [];
$depts = [];
$appointments = [];
$chats = [];
$details = [];
$sessions = [];

require("backend/db/db.php");
require("backend/controllers/doctors_controller.php");
require("backend/controllers/patients_controller.php");
require("backend/controllers/dept_controller.php");
require("backend/controllers/apt_controller.php");
require("backend/controllers/chat_controller.php");
require("backend/controllers/session_controller.php");

if (isset($_GET["view"])) {
  $view = $_GET["view"];
}

if ($view == "doctors") {
  $doctors = getDoctors();
}

if ($view == "sessions") {
  $doctors = getSessions();
}


if ($view == "patients") {
  $patients = getPatients();
}


if ($view == "depts") {
  $depts = getDepts();
}


if ($view == "add-appointment") {
  $doctors = getDoctors();
}


if ($view == "appointments") {
  $appointments = getApts($_GET);

  // if (isset($_GET['id'])) {
  //   $id = $_GET['id'];
  //   $view = "views/" . $view . ".php&id=$id";
  //   return $view;
  // }
}

if ($view == "chat") {
  $chats = getChats($_GET);
  $doctors = getDoctors();
  $patients = getPatients();
}


if ($view == "doctors_search") {
  $doctors = searchDoctor($_GET);
}


if ($view == "add-doctor") {
  $depts = getDepts($_GET);
}




if ($view == "edit-patient") {
  $patients = getSinglePatient($_GET);
  $id = 0;
}

if ($view == "profile") {
  $details = getPatientDetails($_GET);
}

if ($view == "patient-profile") {
  $details = getPatientDetails($_GET);
  $patients = getSinglePatient($_GET);
}


if ($view == "edit-patient-details") {
  $details = getPatientDetails($_GET);
}

if ($view == "dashboard") {
  $doctors = getDoctors();
  $patients = getPatients();
  $appointments = getApts($_GET);
  $depts = getDepts($_GET);
}



if ($view == "edit-appointment") {
  $appointments = getSingleApt($_GET);
  $doctors = getDoctors();
}
$id = 0;

if ($view == "edit-dept") {
  $depts = getSingleDept($_GET);
}



if ($view == "edit-doctor") {
  $depts = getDepts();
  $doctors = getSingleDoctor($_GET);
}


if ($view == "edit-apt") {
  $appointments = getSingleApt($_GET);
}


if ($view == "doctor-profile") {
  $doctors = getSingleDoctor($_GET);
}


$view = "views/" . $view . ".php";
