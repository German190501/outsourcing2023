<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="sistemaUser/resources/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="sistemaUser/resources/fontawesome/all.css">
	<link rel="stylesheet" href="sistemaUser/resources/css/estilos.css">
	<title>ITO | Inicio</title>
</head>

<body>
	<header>
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
			<div class="container-fluid">
				<a class="navbar-brand" href="index.php">OUTSOURCING</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
					data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
					aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="index.php"><i class="fa-solid fa-house"></i> Inicio</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#"><i class="fa-solid fa-file-pdf"></i> Convocatorias</a>
						</li>
					</ul>
					<a href="#" class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#login"><i class="fa-solid fa-right-from-bracket"></i> Ingresar</a>
				</div>
			</div>
		</nav>
	</header>

  <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="sistemaUser/resources/img/banner1.jfif" class="d-block w-100"
                    style="min-height: 450px; max-height: 450px;" alt="...">
            </div>
            <div class="carousel-item">
                <img src="sistemaUser/resources/img/banner2.jfif" class="d-block w-100"
                    style="min-height: 450px; max-height: 450px;" alt="...">
            </div>
            <div class="carousel-item">
                <img src="sistemaUser/resources/img/banner3.jfif" class="d-block w-100"
                    style="min-height: 450px; max-height: 450px;" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
    </div>

	<!--MODAL DE INICIO DE SESION-->
    <div class="modal fade" id="login" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel" style="color: #0C1B4B;"><i
                            class="fa-solid fa-user-circle fa-1x"></i> <strong>INICIA SESION</strong></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="sistemaUser/resources/img/avatar.png" style="margin: auto; display:block; margin-bottom: 10px; width: 200px;" alt="">
                    <form action="" method="post">
						<?php include("sistemaUser/controller/login.php"); ?>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
                            <input type="text" class="form-control" placeholder="Username" aria-label="user"
                                aria-describedby="basic-addon1" name="username" id="username">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-key"></i></span>
                            <input type="password" class="form-control" placeholder="Contraseña" aria-label="password"
                                aria-describedby="basic-addon1" name="password" id="password">
                        </div>
                        <input type="submit" class="btn btn-success w-100" value="ENTRAR">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#registro">Registrarse <i class="fa-solid fa-pen-to-square"></i></button>
                </div>
            </div>
        </div>
    </div>

	    <!--MODAL DE REGISTRO DE USUARIOS-->
		<div class="modal fade" id="registro" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
		tabindex="-1">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalToggleLabel" style="color: #0C1B4B;"><i class="fa-solid fa-pen-to-square"></i> <strong>REGISTRATE ¡YA!</strong></h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<img src="sistemaUser/resources/img/user.png" style="margin: auto; display:block; margin-bottom: 10px; width: 200px;" alt="">
					<form action="sistemaUser/controller/registro.php" method="post">
						<div class="input-group mb-3">
							<span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
							<input type="text" class="form-control" placeholder="Username" aria-label="user"
								aria-describedby="basic-addon1" name="username" id="username" required>
						</div>
						<div class="input-group mb-3">
							<span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-envelope"></i></span>
							<input type="text" class="form-control" placeholder="Correo electronico" aria-label="correo"
								aria-describedby="basic-addon1" name="correo" id="correo" required>
						</div>
						<div class="input-group mb-3">
							<span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-key"></i></span>
							<input type="password" class="form-control" placeholder="Contraseña" aria-label="password"
								aria-describedby="basic-addon1" name="password" id="password" required>
						</div>
						<input type="submit" class="btn btn-primary w-100" onclick="javascript: myFunction();" value="REGISTRARSE">
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn_add btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#login">Inicia Sesión <i class="fa-solid fa-pen-to-square"></i></button>
				</div>
			</div>
		</div>
	</div>

  <!--INICIO DE SESION ADMINISTRADOR-->
  <div class="modal fade" id="loginAdmin" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel" style="color: #0C1B4B;"><i
                            class="fa-solid fa-user-circle fa-1x"></i> <strong>INICIA SESION</strong></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="sistemaUser/resources/img/avatar.png" style="margin: auto; display:block; margin-bottom: 10px; width: 200px;" alt="">
                    <form action="sistemaAdmin/controller/login.php" method="post">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
                            <input type="text" class="form-control" placeholder="Username" aria-label="user"
                                aria-describedby="basic-addon1" name="username" id="username">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-key"></i></span>
                            <input type="password" class="form-control" placeholder="Contraseña" aria-label="password"
                                aria-describedby="basic-addon1" name="password" id="password">
                        </div>
                        <input type="submit" class="btn btn-success w-100" value="ENTRAR">
                    </form>
                </div>
            </div>
        </div>
    </div>

<footer class="text-center text-lg-start bg-light text-muted">
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <div class="row mt-3">
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3"></i>Outsourcing
          </h6>
          <p>
            Outsourcing es un servicio web en donde varias empresas publican ofertas de trabajo, con el proposito de encontrar aspirantes para trabajar.
          </p>
        </div>
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <h6 class="text-uppercase fw-bold mb-4">
            Empresas
          </h6>
          <p>
            <a href="#!" class="text-reset">TecnoTeam2.0</a>
          </p>
          <p>
            <a href="#!" class="text-reset">TecnoCode</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Aurum</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Metodology</a>
          </p>
        </div>
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <h6 class="text-uppercase fw-bold mb-4">
            Servicios
          </h6>
          <p>
            <a href="#!" class="text-reset">Ofertas de Trabajo</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Conocenos</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Contactanos</a>
          </p>
          <p>
            <a href="#!" data-bs-toggle="modal" data-bs-target="#loginAdmin" class="text-reset">Administrador</a>
          </p>
        </div>
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <h6 class="text-uppercase fw-bold mb-4">Contacto</h6>
          <p><i class="fas fa-home me-3"></i> Estado de Mexico, Cd. Nezahualcoyotl</p>
          <p>
            <i class="fas fa-envelope me-3"></i>
            outsourcing@gmail.com
          </p>
          <p><i class="fas fa-phone me-3"></i> + 52 55 48 83 19 87</p>
          <p><i class="fas fa-print me-3"></i> + 52 55 67 89 09 12</p>
        </div>
      </div>
    </div>
  </section>
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2021 Copyright:
    <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>
  </div>
</footer>

	<script src="sistemaUser/resources/bootstrap/js/bootstrap.bundle.js"></script>
	<script src="sistemaUser/resources/js/jquery-3.6.0.min.js"></script>
	<script src="sistemaUser/resources/fontawesome/all.js"></script>
	<!--<script src="https://kit.fontawesome.com/69562f358e.js" crossorigin="anonymous"></script>-->
	<script>
        $(".navbar-collapse ul li a").on('click', function () {
            $(".navbar-collapse ul li a.active").removeClass('active');
            $(this).addClass('active');
        }); 
		
		function myFunction() {
                  alert('Usuario agregado correctamente!');
                }
    </script>
</body>

</html>