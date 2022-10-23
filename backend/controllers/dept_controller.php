<?php


function getDepts(){  
     return DB::getConnection()->query("SELECT * FROM departments")->fetchAll();
}


function getSingleDept(array $request){  
    $id = $request["id"];
     return DB::getConnection()->query("SELECT * FROM departments where departments.department_id='$id' ")->fetchAll();
}


function storeDept(array $request){

    $name = $request["dept_name"];
    $desc = $request["desc"];
    $status = $request["status"];
    
   
    if(!is_null(DB::getConnection())){
        $sql = "INSERT INTO 
         departments(department_name,department_desc,department_status)
         values('$name','$desc','$status')";
        DB::getConnection()->exec($sql);

        $_SESSION["success"] = "Department Record Added Successfully";
        
    }

}


function editDept(array $request){
    $name = $request["dept_name"];
    $desc = $request["desc"];
    $id = $request["id"];


    if(!is_null(DB::getConnection())){
        $sql = "UPDATE  
         departments set 
         department_name='$name',
         department_desc ='$desc' where departments.department_id='$id' ";
        
        DB::getConnection()->exec($sql);
        $_SESSION["success"] = "Department Record Updated Successfully";
    }

}


function deleteDept(array $request){

    $id = $request["id"];
    $sql = "DELETE from departments where department_id='$id' ";
    DB::getConnection()->exec($sql);
    $_SESSION["success"] = "Department Record Deleted Successfully";

}




