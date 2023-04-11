<?php

include("../model/Usuario.php");

$us = new Usuario();
$us->conectarBD();
$us->inicializar($_REQUEST['username'],$_REQUEST['correo'], md5($_REQUEST['password']));
$us->agregarUsuario();
$us->cerrarBD();

?>