<?php

Class Database {

private  static $server = "mysql:host=localhost;dbname=marinaDB";
private  static $user = "marinaAdmin";
private  static $pass = "Moff@Bay1#";

private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);

private function __construct(){}
private static $conn;

public static function getConn(){
    if(!isset(self::$conn)){
         try{
       self::$conn=new PDO(self::$server,self::$user,self::$pass);

          }
          catch(PDOException $e)
          {
             $error=$e->getMessage(); 
             echo($error);
             exit();
          }
    }
      return self::$conn; 
   }


 


public static function closeConnection() {
   	$conn = null;
	}


        
}

?>