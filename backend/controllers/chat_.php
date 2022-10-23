<?php
function getChats(array $request){  


    $doctor = 0;
    $patient = 0;

    if(isset($request["doctor_id"])){
        $doctor = $request["doctor_id"];
    }

    if(isset($request["patient_id"])){
        $patient = $request["patient_id"];
    }


        if($_SESSION["role"]=="patient"){
            $patient = $_SESSION["user"][0]["patient_id"];
        }


        if($_SESSION["role"]=="doctor"){
            $doctor = $_SESSION["user"][0]["doctor_id"];
        }


     return DB::getConnection()->query("SELECT * FROM chats 
     join doctors on doctors.doctor_id=chats.doctor_id 
     join patients on patients.patient_id=chats.patient_id where chats.doctor_id='$doctor' and chats.patient_id='$patient' order by chat_create_date asc ")->fetchAll();
}




function getAllChats(){  
    
        if($_SESSION["role"]=="patient"){
            $patient = $_SESSION["user"][0]["patient_id"];
             return DB::getConnection()->query("SELECT * FROM chats 
             join doctors on doctors.doctor_id=chats.doctor_id 
             join patients on patients.patient_id=chats.patient_id where chats.patient_id='$patient' order by chat_create_date asc ")->fetchAll();
        }

        if($_SESSION["role"]=="doctor"){
            $doctor = $_SESSION["user"][0]["doctor_id"];
             return DB::getConnection()->query("SELECT * FROM chats 
             join doctors on doctors.doctor_id=chats.doctor_id 
             join patients on patients.patient_id=chats.patient_id where chats.doctor_id='$doctor' order by chat_create_date asc ")->fetchAll();
        }

}







function storeChat(array $request){

    $doctor = $request["doctor_id"];
    $patient = 1;
    $message = $request["message"];
    $sender_role = $request["sender_role"];
  
   
    if(!is_null(DB::getConnection())){
        $sql = "INSERT INTO 
        chats(doctor_id,patient_id,chat_message,sender_role)
         values('$doctor','$patient','$message','$sender_role')";
        DB::getConnection()->exec($sql);   
    }
}


function deleteChat(array $request){
    DB::getConnection()->exec("DELETE from chats where chat_id=".$request["id"]);
}