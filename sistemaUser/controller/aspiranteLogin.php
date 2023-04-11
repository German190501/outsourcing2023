<?php

$connection = mysqli_connect("localhost","root","","itoutsourcing");
session_start();
if(!empty($_SESSION['active'])){
    header('location: ../view/index.php');
}else{
    if(!empty($_POST)){
        if(empty($_POST['folio_aspirante']) || empty($_POST['correo'])){
            echo '<script> alert("Ingrese su nombre y correo");
            window.history.go(-1);</script>';
        }else{
            
            $folio = $_POST['folio_aspirante'];
            $correo = $_POST['correo'];
    
            $query = mysqli_query($connection, "SELECT * FROM aspirantes 
                                                         WHERE folio_aspirante = '$folio' 
                                                         AND correo = '$correo'");
            $result = mysqli_num_rows($query);
    
            if($result > 0){
                $data = mysqli_fetch_array($query);
                $_SESSION['active'] = true;
                $_SESSION['folio'] = $data['id_aspirante'];
                $_SESSION['folioAspi'] = $data['folio_aspirante'];
                $_SESSION['paterno'] = $data['paterno'];
                $_SESSION['materno'] = $data['materno'];
                $_SESSION['nombres'] = $data['nombres'];
                $_SESSION['usuario'] = $data['usuario'];
                $_SESSION['correo'] = $data['correo'];
                $_SESSION['telefono'] = $data['telefono'];
                $_SESSION['direccion'] = $data['direccion'];
                $_SESSION['face'] = $data['facebook'];
                $_SESSION['insta'] = $data['instagram'];
                $_SESSION['tweet'] = $data['twitter'];
                $_SESSION['oferta'] = $data['oferta'];
                    header('location: ../view/index.php');
                
            }else{
                echo '<script> alert("El Folio y correo son icorrectos :(");
            window.history.go(-1);</script>';
                session_destroy();
            }
        }
    }
}


?>