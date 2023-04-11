<?php
session_start();
if (empty($_SESSION['active'])) {
    header('location: ../../index.php');
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../resources/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../resources/fontawesome/all.css">
    <link rel="stylesheet" href="../resources/css/estilos.css">
    <link rel="stylesheet" href="../resources/css/perfil.css">
    <title>ITO | Perfil</title>
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
                            <a class="nav-link active" aria-current="page" href="home.php"><i class="fa-solid fa-house"></i> Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="perfil.php?id=<?php echo $_SESSION['folio']; ?>"><i class="fa-solid fa-user"></i> <?php echo $_SESSION['folioAspi'] ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa-solid fa-file"></i> Resultados</a>
                        </li>
                    </ul>
                    <a href="../controller/salir.php" class="btn btn-outline-light"><i class="fa-solid fa-lock"></i> Logout</a>
                </div>
            </div>
        </nav>
    </header>
    <?php
    $connection = mysqli_connect("localhost", "root", "", "itoutsourcing");
    $id = $_GET['id'];
    if (isset($id)) {
        $query = mysqli_query($connection, "SELECT aspi.*, us.*, rol.*, ofert.*, emp.siglas, puesto.puesto FROM aspirantes aspi 
        INNER JOIN ofertas ofert on aspi.oferta = ofert.folio
        INNER JOIN empresas emp on ofert.empresa = emp.id_empresa
        INNER JOIN usuarios us on aspi.usuario = us.id_usuario
        INNER JOIN roles rol on us.rol = rol.id_rol
        INNER JOIN puestos puesto on ofert.puesto = puesto.id_puesto WHERE id_aspirante = '$id'");

        while ($row = mysqli_fetch_array($query)) {
    ?>
    <div class="container" style="margin-top: 80px;">
    <div class="main-body">
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4><?php echo $_SESSION['paterno'].'&nbsp;'; echo $_SESSION['materno'].'&nbsp;'; echo $_SESSION['nombres'];?></h4>
                      <p class="text-secondary mb-1"><?php echo $row['rol'] ?></p>
                      <button class="btn btn-outline-danger w-100">Cerrar Sesion</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-header">
                    <h5 class="text-center">Datos del Aspirante</h5>
                </div>
                <div class="card-body">
                <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Folio</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $row['folio_aspirante'] ?>
                    </div>
                  </div>
                  <hr>  
                <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nombre de Usuario</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $row['username'] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Correo</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $row['correo'] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Telefono</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $row['telefono'] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Direccion</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $row['direccion'] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Empresa y Puesto</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $row['siglas'].'&nbsp;'; echo $row['puesto']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                      <a class="btn btn-primary w-100" target="__blank" href="#">Actualizar</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4"></div>

            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-header">
                    <h5 class="text-center">Datos de la Oferta de Trabajo</h5>
                </div>
                <div class="card-body">
                <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Folio</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $row['folio'] ?>
                    </div>
                  </div>
                  <hr>  
                <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Empresa</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $row['siglas'] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Puesto</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $row['puesto'] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Habilidades</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $row['habilidades'] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Salario</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $row['salario'] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Requisitos</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $row['requisitos'] ?>
                    </div>
                  </div>
                  <hr>
                </div>
              </div>
            </div>
          </div>

        </div>
    </div>

    <?php
        }
    }

    ?>


    <script src="../resources/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../resources/js/jquery-3.6.0.min.js"></script>
    <script src="../resources/fontawesome/all.js"></script>
    <script src="../resources/js/functions.js"></script>
    <script>
        $(".navbar-collapse ul li a").on('click', function() {
            $(".navbar-collapse ul li a.active").removeClass('active');
            $(this).addClass('active');
        });
    </script>
</body>

</html>