<?php

    if(isset($_POST['submit'])){

        $user = $_POST['user'];
        $password = $_POST['password'];

        if(empty($user) || empty($password)){
            echo"<script> alert('Los campos no puedenestar vacios'); </script>";
        }else{
            $usuario = new Usuario;
            if($usuario->getUser($user, $password)){
                session_start();
                $_SESSION['login'] = $user;
                header("Location: index.php");
            }else{
                echo"<script> alert('Datos erroneos'); </script>";
    
            }
        }
    }

?>