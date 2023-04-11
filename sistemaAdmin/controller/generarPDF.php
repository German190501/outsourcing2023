<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php
$html = ob_get_clean();
//echo $html;

    $conection = mysqli_connect("localhost", "root", "maquinaVirtual_2023@eder", "outsourcing");
    
    $pdf_folio = $_REQUEST['id'];
    $query = mysqli_query($conection, "SELECT of.*, emp.*, pus.* FROM ofertas of INNER JOIN empresas emp on of.empresa = emp.id_empresa
    INNER JOIN puestos pus on of.puesto = pus.id_puesto WHERE of.folio = '$pdf_folio'");

    if ($data = mysqli_fetch_array($query)) {
include("../model/PDF.php");

$pdf = new PDF();

$nombre = $data['siglas'].'000'.$data['folio'].'.pdf';
$folder = '../img_pdf/archivosPDF/';
$pdf->saveDisk($nombre, $html, $folder);
    }
?>