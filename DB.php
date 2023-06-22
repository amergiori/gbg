<?php
    class DB {
        protected static $instance;
        public static function getInstance() {
            require_once PROJECT_ROOT_PATH . "/inc/config.php";
            if(empty(self::$instance)) {    
                try {
                    self::$instance = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USERNAME, DB_PASSWORD);
                    self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
                    self::$instance->query('SET NAMES utf8');
                    self::$instance->query('SET CHARACTER SET utf8');
    
                } catch(PDOException $error) {
                    echo $error->getMessage();
                }
            }
    
            return self::$instance;
        }
    }
    
    ?>