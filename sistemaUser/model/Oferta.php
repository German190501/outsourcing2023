<?php

class Oferta{
    private $empresa;
    private $puesto;
    private $habilidades;
    private $conocimientos;
    private $gradoAcademico;
    private $experiencia;
    private $turnoTrabajo;
    private $horarioLaboral;
    private $descripcion;
    private $ubicacionTrabajo;
    private $requisitos;
    private $salario;
    private $fechaInicio;
    private $fechaFin;

    public function conectarBD(){
        $conexion = mysqli_connect("localhost", "root", "maquinaVirtual_2023@eder", "outsourcing") or die("Problemas en la conexión");
        return $conexion;
    }

    public function inicializar($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n){
        $this->empresa = $a;
        $this->puesto = $b;
        $this->habilidades = $c;
        $this->conocimientos = $d;
        $this->gradoAcademico = $e;
        $this->experiencia = $f;
        $this->turnoTrabajo = $g;
        $this->horarioLaboral = $h;
        $this->descripcion = $i;
        $this->ubicacionTrabajo = $j;
        $this->requisitos = $k;
        $this->salario = $l;
        $this->fechaInicio = $m;
        $this->fechaFin = $n;
    }

    public function agregarOferta(){
        mysqli_query($this->conectarBD(), "INSERT INTO ofertas(empresa,
                                                                puesto,
                                                                habilidades,
                                                                conocimientos,
                                                                grado_academico,
                                                                experiencia,
                                                                turno_trabajo,
                                                                horario_laboral,
                                                                descripcion,
                                                                ubicacion_trabajo,
                                                                requisitos,
                                                                salario,
                                                                fecha_inicio,
                                                                fecha_fin) 
                                                                VALUES($this->empresa,
                                                                       $this->puesto,
                                                                       '$this->habilidades',
                                                                       '$this->conocimientos',
                                                                       '$this->gradoAcademico',
                                                                       '$this->experiencia',
                                                                       '$this->turnoTrabajo',
                                                                       '$this->horarioLaboral',
                                                                       '$this->descripcion',
                                                                       '$this->ubicacionTrabajo',
                                                                       '$this->requisitos',
                                                                       '$this->salario',
                                                                       '$this->fechaInicio',
                                                                       '$this->fechaFin')") or die ("Problemas en el insert".mysqli_error($this->conectarBD()));
        echo "<script>
            window.history.go(-1);
        </script>";
    }

    public function mostraOferta(){
        $registro = mysqli_query($this->conectarBD(), "SELECT of.*, emp.*, p.* FROM ofertas of INNER JOIN empresas emp ON of.empresa = emp.id_empresa
        INNER JOIN puestos p ON of.puesto = p.id_puesto WHERE estatus = 'activa' ORDER BY folio ASC") or die("Problemas en el select".mysqli_error($this->conectarBD()));
        while($reg = mysqli_fetch_array($registro)){
            echo '<div class="col-md-4">';
            echo '<div class="card text-start">';
            echo '<div class="card-header text-center"><strong>'.$reg['siglas'].'</strong></div>';
            if ($reg['siglas'] == 'TECNOCODE'){
                echo '<img src="resources/img/tecnocode.png" class="card-img-top" alt="...">';
            }else if ($reg['siglas'] == 'TECNOTEAM'){
                echo '<img src="resources/img/tecnoteam.png" class="card-img-top" alt="...">';
            }
            echo '
            <div class="card-body">
                    <h4 class="card-title">'.$reg['puesto'].'</h4>
                    <p class="card-text text-center">'.$reg['descripcion'].'</p>
                    <p class="card-text text-center">Abierta: '.$reg['fecha_inicio'].' hasta el '.$reg['fecha_fin'].'</p>
                  </div>
                  <div class="card-footer">
                    <a href="detalleoferta.php?id='.$reg['folio'].'" class="btn btn-outline-primary w-100" role="button" type="button">VER DETALLE</a>
                  </div>
                </div>
            </div>';
        }
    }

    public function cerrarBD(){
        mysqli_close($this->conectarBD());
    }
}

?>