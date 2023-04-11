<?php
class Usuario{
    private $username;
    private $correo;
    private $pass;

    public function conectarBD(){
        $conexion = mysqli_connect("localhost", "root", "maquinaVirtual_2023@eder", "outsourcing") or die("Problemas en la conexión");
        return $conexion;
    }

    public function inicializar($username, $correo, $pass){
        $this->username = $username;
        $this->correo = $correo;
        $this->pass = $pass;
    }

    public function agregarUsuario(){
        mysqli_query($this->conectarBD(), "INSERT INTO usuarios(username, correo, password)
                                            VALUES('$this->username','$this->correo','$this->pass')")
                                            or die("Problemas en el insert".mysqli_error($this->conectarBD()));
                echo "<script>
                window.history.go(-1);
                </script>";
    }

    public function cerrarBD(){
        mysqli_close($this->conectarBD());
    }
}
?>