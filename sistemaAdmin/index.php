<?php
session_start();
if (empty($_SESSION['active'])) {
  header('location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ITO | Home</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="controller/salir.php" class="nav-link">Cerrar Sesion</a>
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
        <img src="resources/img/IToLogo.png" alt="AdminLTE Logo" class="brand-image">
        <span class="brand-text font-weight-light"><strong>OUTSOURCING</strong></span>
      </a>

      <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="resources/img/avatar.png" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="perfil.php?id=<?php echo $_SESSION['idUser']; ?>" class="d-block"><?php echo $_SESSION['user']; ?></a>
          </div>
        </div>

        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="index.php" class="nav-link active">
                <i class="nav-icon fas fa-house"></i>
                <p>
                  Home
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="view/usuarios.php" class="nav-link">
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
              <a href="view/ofertas.php" class="nav-link">
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
              <h1 class="m-0">Bienvenido al sistema <strong><?php echo $_SESSION['user']; ?></strong></h1>
            </div>
          </div>
        </div>
      </div>

      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-4">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title">Usuarios</h5>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <p class="card-text">Total: 24</p>
                    </div>
                    <div class="col-md-6 text-center">
                      <i class="fa-solid fa-users fa-2x"></i>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <a href="view/usuarios.php" class="btn btn-primary w-100">Administrar</a>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title">Clientes</h5>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <p class="card-text">Total: 24</p>
                    </div>
                    <div class="col-md-6 text-center">
                    <i class="fa-solid fa-building fa-2x"></i>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <a href="view/usuarios.php" class="btn btn-primary w-100">Administrar</a>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title">Ofertas Activas</h5>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <p class="card-text">Total: 24</p>
                    </div>
                    <div class="col-md-6 text-center">
                      <i class="fa-solid fa-file-pdf fa-2x"></i>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <a href="view/usuarios.php" class="btn btn-primary w-100">Administrar</a>
                </div>
              </div>
            </div>
          </div>
          <!--SECCION DE LISTADO DE OFERTAS-->
          <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Ofertas de Trabajo Registradas</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 500px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
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
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $conexion = mysqli_connect("localhost", "root","","itoutsourcing");

                    $query = mysqli_query($conexion, "SELECT of.*, emp.*, pus.* FROM ofertas of INNER JOIN empresas emp on of.empresa = emp.id_empresa
                                                                                                          INNER JOIN puestos pus on of.puesto = pus.id_puesto ORDER BY folio ASC");
                    while ($data = mysqli_fetch_array($query)){
                    ?>
                    <tr>
                      <td><?php echo $data['folio']; ?></td>
                      <td><?php echo $data['siglas']; ?></td>
                      <td><?php echo $data['puesto']; ?></td>
                      <td><?php echo $data['fecha_inicio']; ?></td>
                      <td><?php echo $data['fecha_fin']; ?></td>
                      <td><?php echo $data['estatus']; ?></td>
                    </tr>

                    <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
  </div>

  </div>
  <script src="plugins/jquery/jquery.min.js"></script>
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/69562f358e.js" crossorigin="anonymous"></script>
  <script src="dist/js/adminlte.min.js"></script>
  <script>
        $(".nav li a").on('click', function() {
            $(".nav li a.active").removeClass('active');
            $(this).addClass('active');
        });
    </script>
</body>

</html>