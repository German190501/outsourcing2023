<?php

$connection = mysqli_connect("localhost","root","","itoutsourcing");
session_start();
if(!empty($_SESSION['active'])){
    header('location: sistemaUser/home.php');
}else{
    if(!empty($_POST)){
        if(empty($_POST['username']) || empty($_POST['password'])){
            echo '<script> alert("Ingrese su usuario y contraseña");
            window.history.go(-1);</script>';
        }else{
            
            $user = $_POST['username'];
            $pass = md5($_POST['password']);
    
            $query = mysqli_query($connection, "SELECT * FROM usuarios WHERE username = '$user' AND password = '$pass'");
            $result = mysqli_num_rows($query);
    
            if($result > 0){
                $data = mysqli_fetch_array($query);
                $_SESSION['active'] = true;
                $_SESSION['idUser'] = $data['id_usuario'];
                $_SESSION['user'] = $data['username'];
                $_SESSION['pass'] = $data['password'];
                $_SESSION['email'] = $data['correo'];
                $_SESSION['rol'] = $data['rol'];
    
                if($_SESSION['rol'] == 4){
                    header('location: sistemaUser/home.php');
                }
                
            }else{
                echo '<script> alert("El usuario y contraseña son incorrectos");
            window.history.go(-1);</script>';
                session_destroy();
            }
        }
    }
}


?>