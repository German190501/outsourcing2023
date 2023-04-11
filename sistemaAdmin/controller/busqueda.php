<?php
session_start();
if (empty($_SESSION['active'])) {
    header('location: ../../index.php');
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ITO | Home</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="../controller/salir.php" class="nav-link">Cerrar Sesion</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="index3.html" class="brand-link">
                <img src="../resources/img/IToLogo.png" alt="AdminLTE Logo" class="brand-image">
                <span class="brand-text font-weight-light"><strong>OUTSOURCING</strong></span>
            </a>

            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../resources/img/avatar.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="perfil.php?id=<?php echo $_SESSION['idUser']; ?>" class="d-block"><?php echo $_SESSION['user']; ?></a>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="../index.php" class="nav-link">
                                <i class="nav-icon fas fa-house"></i>
                                <p>
                                    Home
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Usuarios
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Aspirantes
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-file"></i>
                                <p>
                                    Expedientes
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../view/ofertas.php" class="nav-link active">
                                <i class="nav-icon fas fa-file-pdf"></i>
                                <p>
                                    Ofertas de Trabajo
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Listado de Ofertas de Trabajo</strong></h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content">
                <div class="container-fluid">
                    <!--SECCION DE LISTADO DE OFERTAS-->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#nuevaOferta" style="width: 150px;">Nueva <i class="fa-solid fa-plus"></i></a>&nbsp;
                                        <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#generarImagen" style="width: 150px;">Compartir <i class="fa-solid fa-plus"></i></a>
                                    </h3>
                                    <?php include("../model/img_modal.php") ?>
                                    <div class="card-tools">
                                        <form action="../controller/busqueda.php" method="GET">
                                        <div class="input-group input-group-sm" style="width: 500px;">
                                            <input type="text" class="form-control float-right" placeholder="Buscar..." id="busqueda" name="busqueda">
                                            <div class="input-group-append">
                                                <button type="submit" name="enviar" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>Folio</th>
                                                <th>Empresa</th>
                                                <th>Puesto</th>
                                                <th>Fecha Inicio</th>
                                                <th>Fecha Termino</th>
                                                <th>Estatus</th>
                                                <th>Generar PDF</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $conexion = mysqli_connect("localhost", "root", "maquinaVirtual_2023@eder", "outsourcing");
                                            if(isset($_GET['enviar'])){
                                            $busqueda = $_REQUEST['busqueda'];
                                            $consulta = mysqli_query($conexion, "SELECT of.*, emp.*, pus.* FROM ofertas of INNER JOIN empresas emp on of.empresa = emp.id_empresa
                                                                                                      INNER JOIN puestos pus on of.puesto = pus.id_puesto WHERE folio LIKE '%$busqueda%' OR emp.siglas LIKE '%$busqueda%' OR pus.puesto LIKE '%$busqueda%'");
                                            while ($data = $consulta->fetch_array()) {
                                            echo '<tr>
                                            <td>'.$data['folio'].'</td>
                                            <td>'.$data['siglas'].'</td>
                                            <td>'.$data['puesto'].'</td>
                                            <td>'.$data['fecha_inicio'].'</td>
                                            <td>'.$data['fecha_fin'].'</td>
                                            <td>'.$data['estatus'].'</td>
                                            <td>
                                                <a href="../controller/generarPDF.php?id='.$data['folio'].'" class="btn btn-success pdf"><i class="fa-solid fa-file"></i></a>&nbsp;
                                            </td>
                                        </tr>';
                                            }
                                        }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!--MODAL REGISTRO DE OFERTA-->
    <div class="modal fade" id="nuevaOferta">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fa-solid fa-file-pdf"></i> REGISTRAR OFERTA</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../controller/ofertaCtrl.php" method="post">
                        <div class="form-group">
                            <label>Empresa</label>
                            <select class="form-control" id="empresa" name="empresa">
                                <?php
                                include("../model/Empresa.php");

                                $emp = new Empresa();
                                $emp->conectarBD();
                                $emp->llenarListaEmpresa();
                                $emp->cerrarBD();
                                ?>
                            </select><br />
                            <label>Puesto</label>
                            <select class="form-control" id="puesto" name="puesto">
                                <?php
                                include("../model/Puesto.php");

                                $emp = new Puesto();
                                $emp->conectarBD();
                                $emp->llenarListaPuestos();
                                $emp->cerrarBD();
                                ?>
                            </select><br />
                            <label>Habilidades</label>
                            <input type="text" name="habilidades" id="habilidades" placeholder="habilidades" class="form-control"><br>
                            <label>Conocimientos</label>
                            <input type="text" name="conocimientos" id="conocimientos" placeholder="conocimientos" class="form-control"><br>
                            <label>Grado Academico</label>
                            <input type="text" name="gradoAcademico" id="gradoAcademico" placeholder="grado academico" class="form-control"><br>
                            <label>Experiencia</label>
                            <input type="text" name="experiencia" id="experiencia" placeholder="experiencia" class="form-control"><br>
                            <label>Turno de Trabajo</label>
                            <select name="turnoTrabajo" id="turnoTrabajo" class="form-control">
                                <option>Matutino</option>
                                <option>Vespertino</option>
                                <option>Mixto</option>
                            </select><br>
                            <label>Horario Laboral</label>
                            <input type="text" name="horarioLaboral" id="horarioLaboral" placeholder="horarioLaboral" class="form-control"><br>
                            <label>Descripcion</label>
                            <input type="text" name="descripcion" id="descripcion" placeholder="descripcion" class="form-control"><br>
                            <label>Ubicacion</label>
                            <input type="text" name="ubicacionTrabajo" id="ubicacionTrabajo" placeholder="ubicacionTrabajo" class="form-control"><br>
                            <label>Requisitos</label>
                            <input type="text" name="requisitos" id="requisitos" placeholder="requisitos" class="form-control"><br>
                            <label>Salario</label>
                            <input type="text" name="salario" id="salario" placeholder="salario" class="form-control"><br>
                            <label>Fecha Inicio</label>
                            <input type="date" name="fechaInicio" id="fechaInicio" class="form-control"><br>
                            <label>Fecha Termino</label>
                            <input type="date" name="fechaFin" id="fechaFin" class="form-control"><br>

                            <input type="submit" class="btn btn-success w-100" onclick="javascript: ofertaAdd();" value="CREAR">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
    <script src="../plugins/jquery/jquery.min.js"></script>
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/69562f358e.js" crossorigin="anonymous"></script>
    <script src="../dist/js/adminlte.min.js"></script>
    <script>
        $(".nav li a").on('click', function() {
            $(".nav li a.active").removeClass('active');
            $(this).addClass('active');
        });

        function ofertaAdd() {
            alert("Oferta creada correctamente!!");
        }

        function confirmar(e) {
            if (confirm("¿Estas seguro de querer generar el pdf?")) {
                return true;
            } else {
                e.preventDefault();
            }
        }

        let pdflink = document.querySelectorAll(".pdf");
        for (var i = 0; i < pdflink.length; i++) {
            pdflink[i].addEventListener('click', confirmar);
        }
    </script>
</body>

</html>