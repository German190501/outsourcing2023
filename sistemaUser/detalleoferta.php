<?php
session_start();
if (empty($_SESSION['active'])) {
    header('location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resources/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="resources/fontawesome/all.css">
    <link rel="stylesheet" href="resources/css/estilos.css">
    <title>ITO | Home</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="home.php">OUTSOURCING</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="home.php"><i class="fa-solid fa-house"></i> Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="ofertas.php"><i class="fa-solid fa-file-pdf"></i> Convocatorias</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="perfil.php?id=<?php echo $_SESSION['idUser']; ?>"><i class="fa-solid fa-user"></i> <?php echo $_SESSION['user']; ?></a>
                        </li>
                    </ul>
                    <a href="controller/salir.php" class="btn btn-outline-light"><i class="fa-solid fa-lock"></i> Logout</a>
                </div>
            </div>
        </nav>
    </header>

    <div class="container-fluid" style="margin-top:80px">
        <?php
        $connection = mysqli_connect("localhost", "root", "maquinaVirtual_2023@eder", "outsourcing");
        if (isset($id)) {
            $query = mysqli_query($connection, "SELECT of.*, emp.*, p.* 
                                                    FROM ofertas of 
                                                    INNER JOIN empresas emp ON of.empresa = emp.id_empresa
                                                    INNER JOIN puestos p ON of.puesto = p.id_puesto 
                                                    WHERE folio = '$id' AND estatus = 'activa' 
                                                    ORDER BY folio ASC");

            while ($row = mysqli_fetch_array($query)) {
        ?>
        <div class="card card_detalle">
            <div class="card-header">
                <h5 class="card-title text-center"><strong><?php echo $row['siglas']; ?></strong></h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <?php
                            if($row['puesto'] == 'Analista de base de datos'){
                                echo '<img src="resources/img/ofertas/analista_bd.png" class="card-img w-100">';
                            }else if($row['puesto'] == 'Desarrollador Front-end'){
                                echo '<img src="resources/img/ofertas/desarrollador_frontend.png" class="card-img w-100">';
                            }else if($row['puesto'] == 'Desarrollador Back-end'){
                                echo '<img src="resources/img/ofertas/desarrollador_backend.png" class="card-img w-100">';
                            }else if($row['puesto'] == 'Programador Java Jr'){
                                echo '<img src="resources/img/ofertas/programacion_java_jr.png" class="card-img w-100">';
                            }else if($row['puesto'] == 'Programador Java Sr'){
                                echo '<img src="resources/img/ofertas/programacion_java_sr.png" class="card-img w-100">';
                            }else{
                                echo '<img src="resources/img/ofertas/programacion_php_jr.png" class="card-img w-100">';
                            }
                        ?>
                        <hr />
                        <h5 class="text-center"><strong><?php echo $row['puesto']; ?></strong></h5>
                    </div>
                    <div class="col-md-8">
                        <p class="card-text"><?php echo $row['descripcion']; ?></p>
                        <hr />
                        <div class="row">
                            <div class="col-md-6">
                            <h5>Perfil del Aspirante</strong></h5>
                        <ul>
                            <li><p class="card-text"><strong>Habilidades: </strong> <?php echo $row['habilidades']; ?></p></li>
                            <li><p class="card-text"><strong>Conocimientos: </strong> <?php echo $row['conocimientos']; ?></p></li>
                            <li><p class="card-text"><strong>Grado Academico: </strong> <?php echo $row['grado_academico']; ?></p></li>
                            <li><p class="card-text"><strong>Experiencia: </strong> <?php echo $row['experiencia']; ?> año(s)</p></li>
                        </ul>
                            </div>
                            <div class="col-md-6">
                            <h5>Ofrecemos</strong></h5>
                        <ul>
                            <li><p class="card-text"><strong>Turno: </strong> <?php echo $row['turno_trabajo']; ?></p></li>
                            <li><p class="card-text"><strong>Horario Laboral: </strong> <?php echo $row['horario_laboral']; ?></p></li>
                            <li><p class="card-text"><strong>Salario: </strong> <?php echo $row['salario']; ?></p></li>
                            <li><p class="card-text"><strong>Ubicacion: </strong> <?php echo $row['ubicacion_trabajo']; ?></p></li>
                        </ul>
                            </div>
                        </div>
                        <hr />
                        <p class="card-text">Esta oferta de trabajo esta abierta desde el <strong><?php echo $row['fecha_inicio']; ?></strong> hasta el <strong><?php echo $row['fecha_fin']; ?></strong></p>
                        <a data-bs-toggle="modal" data-bs-target="#aspirante" class="btn btn-success" role="button" style="width: 250px;">POSTULATE</a>
                    </div>
                </div>
            </div>
        </div>
        <?php include("controller/modal.php");?>
        <?php
            }
        }
        ?>
    </div>

    <script src="resources/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="resources/js/jquery-3.6.0.min.js"></script>
    <script src="resources/fontawesome/all.js"></script>
    <!--<script src="https://kit.fontawesome.com/69562f358e.js" crossorigin="anonymous"></script>-->
    <script src="resources/js/functions.js"></script>
    <script>
        $(".navbar-collapse ul li a").on('click', function() {
            $(".navbar-collapse ul li a.active").removeClass('active');
            $(this).addClass('active');
        });

        function agregar() {
            alert("Oferta creada exitosamente");
        }

        function agregarAspirante() {
            alert("Te has postulado exitosamente! Inicia sesion como aspirante ¡YA!");
        }
    </script>
</body>

</html>