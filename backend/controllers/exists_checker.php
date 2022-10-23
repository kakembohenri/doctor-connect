<?php
function email_exists(string $email):bool{
   

   $count =  count(DB::getConnection()->query("SELECT * from admin where admin_email='$email' ")->fetchAll());
   if($count>0){
    return true;
   }
   $count =  count(DB::getConnection()->query("SELECT * from doctors where doctor_email='$email' ")->fetchAll());
   if($count>0){
    return true;
   }
   $count =  count(DB::getConnection()->query("SELECT * from patients where patient_email='$email' ")->fetchAll());

   if($count>0){
    return true;
   }
    return false;
   
}



function contact_exists(string $contact):bool{
   

   $count =  count(DB::getConnection()->query("SELECT * from admin where admin_contact='$contact' ")->fetchAll());
   if($count>0){
    return true;
   }
   $count =  count(DB::getConnection()->query("SELECT * from doctors where doctor_contact='$contact' ")->fetchAll());
   if($count>0){
    return true;
   }
   $count =  count(DB::getConnection()->query("SELECT * from patients where patient_contact='$contact' ")->fetchAll());

   if($count>0){
    return true;
   }
    return false;
   
}

