<?php
include("../model/Oferta.php");

$off = new Oferta();
$off->conectarBD();
$off->inicializar($_REQUEST['empresa'],$_REQUEST['puesto'],$_REQUEST['habilidades'],$_REQUEST['conocimientos'],$_REQUEST['gradoAcademico'],$_REQUEST['experiencia'],
                $_REQUEST['turnoTrabajo'],$_REQUEST['horarioLaboral'],$_REQUEST['descripcion'],$_REQUEST['ubicacionTrabajo'],$_REQUEST['requisitos'],$_REQUEST['salario'],
                $_REQUEST['fechaInicio'],$_REQUEST['fechaFin']);
$off->agregarOferta();
$off->cerrarBD();

?>