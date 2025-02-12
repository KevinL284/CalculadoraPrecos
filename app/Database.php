<?php

require_once __DIR__ . '/../config/config.php';


class Database{

    private static $instance=null;
    private function __construct(){}

        public static function getInstance(){
            if (self::$instance === null){
                try{
                    self::$instance = new PDO(

                         "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME,
                         DB_USER,
                         DB_PASS
                    );
                    self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch (PDOException $e){
                    die("Erro na conexão: " . $e->getMessage());
                } 
                }
                return self::$instance;
            }
            
        }

?>