<?php


    class Usuario extends Conexion{

        public function getUser($user_name, $password){
            $sql = "SELECT * FROM tblusuarios WHERE Usuario = '$user_name' AND  Pass = '$password'";
            $result = $this->connect()->query($sql);
            $numRows = $result->num_rows; 
            if($numRows == 1){
                return true;                
            }else{
                return false;
            }

        }
    }

?>