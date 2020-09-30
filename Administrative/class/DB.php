<?php
require_once 'config.php';

class DB{
    private static $instance;
    
    //cria a conexão com banco de dados caso não haja.
    private static function connectDB(){
        if(!isset(self::$instance)){
            try{
                self::$instance = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,
                        DB_USER, DB_PASS);
                
                //define o modo que será apresentado erro, caso ocorra (exceção)
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                //define o modo que será apresentado os dados (objetos)
                self::$instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            }catch(PDOException $error){
                return $error->getMessage();
            }
        }
        return self::$instance;
    }
    
    public static function prepare($sql) {
        return self::connectDB()->prepare($sql);
    }
}