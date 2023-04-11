<?php
$conection = mysqli_connect("localhost","root","","itoutsourcing");
	if(!empty($_POST))
	{

		if(empty($_POST['paterno']) || empty($_POST['materno']) || empty($_POST['nombres']) || empty($_POST['correo']) || empty($_POST['usuario']) || empty($_POST['telefono']) || empty($_POST['direccion']) || empty($_POST['oferta']))
		{
			echo '<script>
                alert("Dedes ingresar todos los datos");
                window.history.go(-1);
            </script>';
		}else{

            $folio_aspirante = 'OUT'.rand(0,5000);
			$paterno = $_POST['paterno'];
            $materno = $_POST['materno'];
            $nombres = $_POST['nombres'];
            $correo = $_POST['correo'];
            $usuario = $_POST['usuario'];
            $telefono = $_POST['telefono'];
            $direccion = $_POST['direccion'];
            $face = $_POST['facebook'];
            $insta = $_POST['instagram'];
            $tweet = $_POST['twitter'];
            $oferta = $_POST['oferta'];


			$query = mysqli_query($conection,"SELECT * FROM aspirantes WHERE nombres = '$nombres' AND oferta = '$oferta'");
			$result = mysqli_fetch_array($query);

			if($result > 0){
				echo '<script>
                    alert("Ya esta postulado en esta convocatoria");
                    window.history.go(-1);
                </script>';
			}else{

				$query_insert = mysqli_query($conection,"INSERT INTO aspirantes(folio_aspirante,paterno,materno,nombres,usuario,correo,telefono,direccion,facebook,instagram,twitter,oferta)
																	VALUES('$folio_aspirante','$paterno','$materno','$nombres','$usuario','$correo','$telefono','$direccion','$face','$insta','$tweet','$oferta')");
				if($query_insert){
					echo '<script>
                    alert("Felicidades se ha pustulado exitosamente a esta convocatoria. Inicie sesion como aspirante: Folio: '.$folio_aspirante.' | Nombre: '.$nombre.'");
                    window.history.go(-1)
                </script>';
				}else{
					echo '<script>
                    alert("Hubo un error, intentelo de nuevo!");
                    window.history.go(-1);
                </script>';
				}

			}


		}

	}