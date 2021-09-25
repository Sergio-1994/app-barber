<?php

    class Conexion{
        private $server_name;
        private $user;
        private $password;
        private $dbname;

        public function __construct(){
            $this->server_name ='localhost';
            $this->user ='root';
            $this->password ='';
            $this->dbname ='dbbarber';
        }

        public function connect(){
            $con = new mysqli($this->server_name, $this->user, $this->password, $this->dbname);
            return $con;
        }


    }
    
?>