<?php
class DB{

   public static   $db = null;

   public static function getConnection(){
      try{
      $host = "localhost";
      $dbname  = "hospital";
      DB::$db = new PDO("mysql:host=$host;dbname=$dbname","root","");
      DB::$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      }catch(Exception $e){
         print_r($e->getMessage());
      }

      return DB::$db;

   }

}
