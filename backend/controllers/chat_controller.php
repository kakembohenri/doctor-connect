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

            DB::getConnection()->query("UPDATE chats set chats.seen_by='patient' where chats.sender_role='doctor' and chats.seen_by='none'  and  chats.doctor_id='$doctor' and chats.patient_id='$patient'");
        }


        if($_SESSION["role"]=="doctor"){
            $doctor = $_SESSION["user"][0]["doctor_id"];
            DB::getConnection()->query("UPDATE chats set chats.seen_by='doctor' where chats.sender_role='patient' and chats.seen_by='none'  and  chats.doctor_id='$doctor' and chats.patient_id='$patient'");
        }


     return DB::getConnection()->query("SELECT * FROM chats 
     join doctors on doctors.doctor_id=chats.doctor_id 
     join patients on patients.patient_id=chats.patient_id where chats.doctor_id='$doctor' and chats.patient_id='$patient' order by chat_create_date asc ")->fetchAll();
}



function getChatCount(){

    if($_SESSION["role"]=="patient"){
        $patient = $_SESSION["user"][0]["patient_id"];
        return count(DB::getConnection()->query("SELECT * FROM chats 
     join doctors on doctors.doctor_id=chats.doctor_id 
     join patients on patients.patient_id=chats.patient_id where chats.sender_role='doctor' and chats.patient_id='$patient'and chats.seen_by='none' order by chat_create_date asc ")->fetchAll());

    }

    if($_SESSION["role"]=="doctor"){
        $doctor = $_SESSION["user"][0]["doctor_id"];
        return count(DB::getConnection()->query("SELECT * FROM chats 
        join doctors on doctors.doctor_id=chats.doctor_id 
        join patients on patients.patient_id=chats.patient_id where chats.sender_role='patient' and  chats.doctor_id='$doctor'and chats.seen_by='none' order by chat_create_date asc ")->fetchAll());
    }

    return 0;

}




function getChatsAndCount(){

    if($_SESSION["role"]=="patient"){
        $patient = $_SESSION["user"][0]["patient_id"];
        return DB::getConnection()->query("SELECT chats.doctor_id as id, count(chats.chat_message) as num FROM chats 
     join doctors on doctors.doctor_id=chats.doctor_id 
     join patients on patients.patient_id=chats.patient_id where chats.sender_role='doctor' and chats.patient_id='$patient'and chats.seen_by='none' group by chats.doctor_id order by chat_create_date asc ")->fetchAll();

    }

    if($_SESSION["role"]=="doctor"){
        $doctor = $_SESSION["user"][0]["doctor_id"];
        return DB::getConnection()->query("SELECT chats.patient_id as id , count(chats.chat_message) as num FROM chats 
        join doctors on doctors.doctor_id=chats.doctor_id 
        join patients on patients.patient_id=chats.patient_id where chats.sender_role='patient' and  chats.doctor_id='$doctor'and chats.seen_by='none' group by chats.patient_id order by chat_create_date asc ")->fetchAll();
    }

    return [];

}




function storeChat(array $request){

    $doctor = $request["doctor_id"];
    $patient = $request["patient_id"];
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




