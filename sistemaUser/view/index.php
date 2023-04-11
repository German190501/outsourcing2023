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

    <div class="container-fluid" style="margin-top:80px">

    </div>


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