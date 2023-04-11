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
                            <a class="nav-link" href="ofertas.php"><i class="fa-solid fa-file-pdf"></i> Convocatorias</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="perfil.php?id=<?php echo $_SESSION['idUser']; ?>"><i class="fa-solid fa-user"></i> <?php echo $_SESSION['user']; ?></a>
                        </li>
                    </ul>
                    <a href="controller/salir.php" class="btn btn-outline-light"><i class="fa-solid fa-lock"></i> Logout</a>
                </div>
            </div>
        </nav>
    </header>
    <?php
    $connection = mysqli_connect("localhost", "root", "maquinaVirtual_2023@eder", "outsourcing");
    $id = $_GET['id'];
    if (isset($id)) {
        $query = mysqli_query($connection, "SELECT us.*, rol.* FROM usuarios us INNER JOIN roles rol WHERE us.rol = rol.id_rol AND id_usuario = '$id'");

        while ($row = mysqli_fetch_array($query)) {
    ?>
            <section style="background-color: #eee; margin-top: 60px;">
                <div class="container py-5">

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-body text-center">
                                    <img src="resources/img/avatar.png" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                                    <h5 class="my-3"><?php echo $_SESSION['user'] ?></h5>
                                    <p class="text-muted mb-1"><?php echo $row['rol']; ?></p>
                                    <div class="d-flex justify-content-center mb-2">
                                        <a href="controller/salirUsuario.php" class="btn btn-primary w-100">Iniciar como Aspirante</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Nombre de Usuario</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?php echo $_SESSION['user'] ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Correo</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?php echo $row['correo']; ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Contraseña</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><?php echo $row['password']; ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    <?php
        }
    }

    ?>
    <script src="resources/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="resources/js/jquery-3.6.0.min.js"></script>
    <script src="resources/alertify/alertify.js"></script>
    <script src="resources/fontawesome/all.js"></script>
    <script src="resources/js/functions.js"></script>
    <script>
        $(".navbar-collapse ul li a").on('click', function() {
            $(".navbar-collapse ul li a.active").removeClass('active');
            $(this).addClass('active');
        });
    </script>
</body>

</html>