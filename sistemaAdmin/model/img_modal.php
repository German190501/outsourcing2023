<?php
include("../resources/imageToPdf/vendor/autoload.php");

use \ConvertApi\ConvertApi;

ConvertApi::setApiSecret('ok05MN6BOU9RpUY5');

$msg = "";
$contents = "";
$output = "";
if (isset($_POST["submit"])) {
    $filename = $_FILES["formFile"]["name"];
    $filetype = $_FILES["formFile"]["type"];
    $filetemp = $_FILES["formFile"]["tmp_name"];
    $dir = '../img_pdf/uploads/' . $filename;

    if ($filetype == "application/pdf") {
        move_uploaded_file($filetemp, $dir);
        $result = ConvertApi::convert(
            'png',
            [
                'File' => $dir,
            ],
            'pdf'
        );
        $contents = $result->getFile()->getContents();
        $output = "../img_pdf/converted_files/" . rand() . ".png";
        $fopen = fopen($output, "w");
        fwrite($fopen, $contents);
        fclose($fopen);

        if ($result) {
            $msg = "<div class='alert alert-success'>Archivo convertido!.</div>";
        } else {
            $msg = "<div class='alert alert-danger'>Error.</div>";
        }
    } else {
        $msg = "<div class='alert alert-warning'>Formato de archivo invalido.</div>";
    }
}
?>
<div class="modal fade" id="generarImagen">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fa-solid fa-file-pdf"></i> REGISTRAR OFERTA</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3 class="card-title mb-3">Convertir PDF a PNG</h3>
                <?php echo $msg; ?>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="form-control" id="formFile" name="formFile" required>
                            <label class="custom-file-label" for="formFile">Selecciona un pdf</label>
                        </div>
                    </div>
                    <button class="btn btn-primary w-100" name="submit" onclick="javascript: convertir();">Convertir</button>
                </form>
                <img src="<?php echo $output; ?>" alt="" class="img-fluid">
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-3">
                        <a class="bt-facebook btn btn-primary w-100" role="button" href="https://www.facebook.com/sharer/sharer.php?u=https://utnequipo0301.utn.red/outsourcing/sistemaAdmin/img_pdf/converted_files/<?php echo $output; ?>">Facebook</a>
                    </div>
                    <div class="col-md-3">
                        <a class="twitter-share-button btn btn-info w-100" role="button" href="https://twitter.com/intent/tweet?text=Para conocer mas ingrese a este sitio: https://utnequipo0301.utn.red/outsourcing/sistemaAdmin/img_pdf/converted_files/<?php echo $output; ?>">Tweet</a>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function convertir(){
        alert("Se a convertido la imagen!!");
        wnidow.history.go(-1);
    }
</script>