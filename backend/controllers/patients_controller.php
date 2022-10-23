<?php
function getPatients(){  
     return DB::getConnection()->query("SELECT * FROM patients")->fetchAll();
}

function getSinglePatient(array $request){  
    $id = $request["id"];
    return DB::getConnection()->query("SELECT * FROM patients where patient_id='$id'")->fetchAll();
}




function getPatientDetails(array $request){  
    $id = 0;

    if(isset($request["id"])){
        $id = $request["id"];
    }

    if ($_SESSION["role"]=="patient") {
        $id = $_SESSION["user"][0]["patient_id"];
    }
    return DB::getConnection()->query("SELECT * FROM patient_details where patient_id='$id'")->fetchAll();
}


function storePatient(array $request){

    $first_name = $request["first_name"];
    $last_name = $request["last_name"];
    $password = $request["password"];
    $contact = $request["contact"];
    $email = $request["email"];
    $gender = $request["gender"];
    $dob = $request["dob"];


    if(email_exists($email)){
        $_SESSION["info"]="Email Already In Use";
        header("location:../register.php");
        exit();
    }

    if(contact_exists($contact)){
        $_SESSION["info"]="Contact Already In Use";
        header("location:../register.php");
        exit();
    }

   
    if(!is_null(DB::getConnection())){
        $password = md5($password);
        $sql = "INSERT INTO 
         patients(patient_first_name,patient_last_name,patient_email,patient_contact,patient_gender,patient_password,patient_dob)
         values('$first_name','$last_name','$email','$contact','$gender','$password','$dob')";
        DB::getConnection()->exec($sql);
        $_SESSION["success"] = "Patient Account Created Successfully, You can now login.";
        header("location:../login.php");
        exit();
    }

}





function storePatientDetails(array $request){


    $curr_dis = $request["curr_dis"];
    $prev_dis = $request["prev_dis"];

    $id = 1;
    if($_SESSION["role"]=="patient"){
     $id = $_SESSION["user"][0]["patient_id"];
    }

    $doc = "nodoc";


    if($_FILES["doc"]["name"]!=""){
        move_uploaded_file($_FILES["doc"]["tmp_name"],"../assets/docs/".$id.$_FILES["doc"]["name"]);
        $doc = $id.$_FILES["doc"]["name"];
    }
   
   
    if(!is_null(DB::getConnection())){
        $sql = "INSERT INTO 
         patient_details(current_diseases,previous_diseases,patient_id,document)
         values('$curr_dis','$prev_dis','$id','$doc')";
        DB::getConnection()->exec($sql);
        $_SESSION["success"] = "Patient Details Added Successfully";
    }

}



function editPatientDetails(array $request){

    $curr_dis = $request["curr_dis"];
    $prev_dis = $request["prev_dis"];
    $id = $_SESSION["user"][0]["patient_id"];

    $doc = $request["doc_name"];


    if($_FILES["doc"]["name"]!=""){
        move_uploaded_file($_FILES["doc"]["tmp_name"],"../assets/docs/".$id.$_FILES["doc"]["name"]);
        $doc = $id.$_FILES["doc"]["name"];
    }
   
    if(!is_null(DB::getConnection())){

        $sql = "UPDATE
         patient_details set
         current_diseases = '$curr_dis',
         previous_diseases = '$prev_dis',
         document='$doc'
         where patient_id='$id'
         ";
        DB::getConnection()->exec($sql);
        $_SESSION["success"] = "Patient Details Updated Successfully";
    }

}





function editPatient(array $request){

    $id = $request["id"];
    $first_name = $request["first_name"];
    $last_name = $request["last_name"];
    $contact = $request["contact"];
    $email = $request["email"];
    $gender = $request["gender"];
    $dob = $request["dob"];

    $img = $request["img_name"];


    if($_FILES["profile_image"]["name"]!=""){
        move_uploaded_file($_FILES["profile_image"]["tmp_name"],"../assets/img/".$id.$_FILES["profile_image"]["name"]);
        $img = $id.$_FILES["profile_image"]["name"];
    }
   
    if(!is_null(DB::getConnection())){
      
        $sql = "UPDATE 
         patients set 
         patient_first_name='$first_name',
         patient_last_name='$last_name',
         patient_email='$email',
         patient_contact='$contact',
         patient_gender='$gender',
         patient_profile_image='$img' where patient_id='$id'
         ";
        DB::getConnection()->exec($sql);
        $_SESSION["success"] = "Patient Record Updated Successfully";
    }

}


function deletePatient(array $request){
    DB::getConnection()->exec("DELETE from patients where patient_id=".$request["id"]);
    $_SESSION["success"] = "Patient Record Deleted Successfully";
}


function deletePatientDetails(array $request){
    DB::getConnection()->exec("DELETE from patient_details where patient_id=".$request["id"]);
    $_SESSION["success"] = "Patient Details Deleted Successfully";
}





