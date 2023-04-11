<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../resources/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../resources/fontawesome/all.css">
    <link rel="stylesheet" href="../resources/css/estilos.css">
    <title>ITO | Login Aspirante</title>
</head>

<body>

    <div class="container" style="margin: 50px auto; display:block;">
        <div class="row">
            <div class="card" style="width: 500px; display:block; margin:auto;">
                <div class="card-header">
                    <h2 class="text-center"><i class="fa-solid fa-user"></i> INICIA SESION COMO ASPIRANTE</h2>
                </div>
                <div class="card-body">
                    <div class="col">
                        <p class="card-text">LLena todos los campos para poder iniciar sesion. (nombre, correo)</p>
                        <form action="../controller/aspiranteLogin.php" method="post">
                        <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
                                <input type="text" name="folio_aspirante" id="folio_aspirante" class="form-control" placeholder="Folio (OUT04495)" aria-label="folio_aspirante" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-envelope"></i></span>
                                <input type="email" name="correo" id="correo" class="form-control" placeholder="Correo" aria-label="correo" aria-describedby="basic-addon1">
                            </div>
                            <input type="submit" class="btn btn-primary w-100" value="INGRESAR">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="../resources/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../resources/js/jquery-3.6.0.min.js"></script>
    <SCRIPT src="../resources/fontawesome/all.js"></script>
    <script src="../resources/js/functions.js"></script>
    <script>
        $(".navbar-collapse ul li a").on('click', function() {
            $(".navbar-collapse ul li a.active").removeClass('active');
            $(this).addClass('active');
        });
    </script>
</body>

</html>