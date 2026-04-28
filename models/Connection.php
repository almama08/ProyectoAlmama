<?php

    class Connection{
        protected $conn;
        private $configFile="conf.json";
        private static $instance=null;

        private function __construct(){
            $this->makeConnection();
        }

        public static function getInstance(){
            if(self::$instance===null){
                self::$instance=new self();
            }
            return self::$instance;
        }

        private function makeConnection(){
            $configData=file_get_contents($this->configFile); //$configData={"host":"db","userName":"root","password":"test","db":"ap72"}
            $c=json_decode($configData,true);//$c=['host'=>"db",'userName'=>"root",'password'=>"test",'db'=>"ap72"]
            $dsn="mysql:host=" . $c['host'] . ";dbname=" . $c['db'];
            $this->conn=new PDO($dsn,$c['userName'],$c['password']);
        }

        public function getConn(){
            return $this->conn;
        }

        public function __destruct(){
            $this->conn=null;
        }

        private function __clone(){}

        public function __wakeup(){
            throw new \Exception("No puedes deserializar una instancia de Connection.");
        }
    }
?>