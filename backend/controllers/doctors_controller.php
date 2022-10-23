<?php
function getDoctors(){  
     return DB::getConnection()->query("SELECT doctors.*,departments.*,avg(ratings.rating_value) as rating FROM doctors 
     join departments on departments.department_id=doctors.department_id
     left join ratings on ratings.doctor_id=doctors.doctor_id group by(doctors.doctor_id)
     ")->fetchAll();
}

function getSingleDoctor(array $request){  

    $id = $request["id"];
    return DB::getConnection()->query("SELECT * from doctors join departments on departments.department_id=doctors.department_id where doctors.doctor_id='$id'
    ")->fetchAll();
}


function searchDoctor(array $request){  
    $search = $request["query"];
    return DB::getConnection()->query("SELECT doctors.*,departments.*,avg(ratings.rating_value) as rating FROM doctors 
    join departments on departments.department_id=doctors.department_id
    left join ratings on ratings.doctor_id=doctors.doctor_id  where doctors.doctor_first_name like '%$search%' or doctors.doctor_last_name like '%$search%' or doctors.doctor_email like '%$search%' or departments.department_name like '%$search%' group by(doctors.doctor_id)
    ")->fetchAll();
    
}



function storeDoctor(array $request,array $image){

    $first_name = $request["first_name"];
    $last_name = $request["last_name"];
    $password = $request["password"];
    $contact = $request["contact"];
    $email = $request["email"];
    $gender = $request["gender"];


    if(email_exists($email)){
        $_SESSION["info"]="Email Already In Use";
        header("location:../?view=add-doctor");
        exit();
    }

    if(contact_exists($contact)){
        $_SESSION["info"]="Contact Already In Use";
        header("location:../?view=add-doctor");
        exit();
    }


    $image_name = "user.jpg";
    if (count($image)>0) {
       
        $image_name = rand(10,1200000000).rand(1200,1000000000000000000);

        $real_name = $image["name"];
        $tmp = $image["tmp_name"];
        $image = $image_name.$real_name;

        move_uploaded_file($tmp, "../assets/img/".$image);
    }




    $doctor_dept = $request["dept_id"];
    $biography = $request["biography"];
   
    if(!is_null(DB::getConnection())){
        $password = md5($password);
        $sql = "INSERT INTO 
         doctors(doctor_first_name,doctor_last_name,doctor_email,doctor_contact,doctor_gender,department_id,doctor_password,profile_image,doctor_biography)
         values('$first_name','$last_name','$email','$contact','$gender','$doctor_dept','$password','$image','$biography')";
        DB::getConnection()->exec($sql);
        $_SESSION["success"] = "Doctor Created Successfully";
    }

}



function editDoctor(array $request,$image){


        $first_name = $request["first_name"];
        $last_name = $request["last_name"];
        $contact = $request["contact"];
        $email = $request["email"];
        $gender = $request["gender"];
        $biography = $request["biography"];
        $doctor_dept = $request["deparment_id"];
        $doctor_id = $request["id"];

        $original_image = $image;



        $sql = "UPDATE
             doctors set 
             doctor_first_name = '$first_name',
             doctor_last_name='$last_name',
             doctor_email='$email',
             doctor_contact='$contact',
             doctor_gender='$gender',
             department_id='$doctor_dept',
             doctor_biography='$biography'
             where doctors.doctor_id=$doctor_id";

        if (count($image)>0) {
            $image_name = rand(10,1200000000).rand(1200,1000000000000000000);
            $real_name = $image["name"];
            $tmp = $image["tmp_name"];
            $image = $image_name.$real_name;
         move_uploaded_file($tmp, "../assets/img/".$image);

        if ($original_image["name"]!="") {

             $sql = "UPDATE
             doctors set 
             doctor_first_name = '$first_name',
             doctor_last_name='$last_name',
             doctor_email='$email',
             doctor_contact='$contact',
             doctor_gender='$gender',
             department_id='$doctor_dept',
             doctor_biography='$biography',
             profile_image='$image'
              where doctors.doctor_id=$doctor_id";

        }
        
        }


  
       
        if(!is_null(DB::getConnection())){
            DB::getConnection()->exec($sql);

            $_SESSION["success"] = "Doctor Record Updated Created Successfully";
        
    }
    

}


function deleteDoctor(array $request){
    DB::getConnection()->exec("DELETE from doctors where doctor_id=".$request["id"]);
    $_SESSION["success"] = "Doctor Deleted Successfully";
    
}




