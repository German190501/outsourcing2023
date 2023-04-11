<div class="modal fade" id="aspirante" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="fa-solid fa-user"></i> Postulate</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="controller/aspiranteAdd.php" method="post">
                    <h5 class="text-center" style="font-family: 'Lobster'; color: #1E5377; font-weight: bold; font-size: 20px;">Datos Personales</h5>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
                        <input type="text" name="paterno" id="paterno" class="form-control" placeholder="Apellido Paterno" aria-label="paterno" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
                        <input type="text" name="materno" id="materno" class="form-control" placeholder="Apellido Materno" aria-label="materno" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
                        <input type="text" name="nombres" id="nombres" class="form-control" placeholder="Nombre(s)" aria-label="nombres" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-envelope"></i></span>
                        <input type="email" name="correo" id="correo" class="form-control" value="<?php echo $_SESSION['email']; ?>" aria-label="correo" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <input type="hidden" name="usuario" id="usuario" class="form-control" value="<?php echo $_SESSION['idUser']; ?>" aria-label="materno" aria-describedby="basic-addon1">
                    </div>
                    <h5 class="text-center" style="font-family: 'Lobster'; color: #1E5377; font-weight: bold; font-size: 20px;">Datos Generales</h5>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-phone"></i></span>
                        <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Telefono" aria-label="telefono" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-map"></i></span>
                        <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Direccion" aria-label="direccion" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fa-brands fa-facebook"></i></span>
                        <input type="text" name="facebook" id="facebook" class="form-control" placeholder="Facebook" aria-label="facebook" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fa-brands fa-instagram"></i></span>
                        <input type="text" name="instagram" id="instagram" class="form-control" placeholder="Instagram" aria-label="instagram" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1"><i class="fa-brands fa-twitter"></i></span>
                        <input type="text" name="twitter" id="twitter" class="form-control" placeholder="Twitter" aria-label="twitter" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <input type="hidden" name="oferta" id="oferta" class="form-control" value="<?php echo $row['folio']; ?>" aria-label="oferta" aria-describedby="basic-addon1">
                    </div>
                    <input type="submit" class="btn btn-success w-100" value="REGISTRATE">
                </form>
            </div>
        </div>
    </div>
</div>