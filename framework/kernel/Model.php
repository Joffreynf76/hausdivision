<?php


class Model
{
 private static $connect=null;

 private $db;

 public function __construct()
 {
     $dbServer = "127.0.0.1:8889";
     $dbName = "hausdivision";
     $dbLogin = "root";
     $dbPassword = "root";

     try{
         $this->db = new PDO('mysql:host='.$dbServer.';dbname='.$dbName,$dbLogin,$dbPassword,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
         $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     }
     catch(Exception $e){
         die('Erreur : '.$e->getMessage());
     }

 }

    public function getInstance() {

        if(is_null(self::$connect)) {
            self::$connect = new Model();
        }
        return self::$connect;
    }

}