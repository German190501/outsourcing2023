<?php
if(!empty($_POST)){
    if(empty($_POST['empresa']) || empty($_POST['puesto']) || empty($_POST['habilidades']) || empty($_POST['conocimientos']) || empty($_POST['gradoAcademico'])
        || empty($_POST['experiencia']) || empty($_POST['turnoTrabajo']) || empty($_POST['horarioLaboral']) || empty($_POST['descripcion']) || empty($_POST['ubicacionTrabajo'])
        || empty($_POST['requisitos']) || empty($_POST['salario']) || empty($_POST['fechaInicio']) || empty($_POST['fechaFin'])){
    echo '<script>
        alert("Dedes ingresar todos los datos");
        window.history.go(-1);
    </script>';
    }else{
    include("../model/Oferta.php");

    $off = new Oferta();
    $off->conectarBD();
    $off->inicializar($_REQUEST['empresa'],$_REQUEST['puesto'],$_REQUEST['habilidades'],$_REQUEST['conocimientos'],$_REQUEST['gradoAcademico'],$_REQUEST['experiencia'],
                        $_REQUEST['turnoTrabajo'],$_REQUEST['horarioLaboral'],$_REQUEST['descripcion'],$_REQUEST['ubicacionTrabajo'],$_REQUEST['requisitos'],$_REQUEST['salario'],
                        $_REQUEST['fechaInicio'],$_REQUEST['fechaFin']);
    $off->agregarOferta();
    $off->cerrarBD();
    }
}
?>