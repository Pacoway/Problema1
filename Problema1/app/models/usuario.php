<?php
require("conexion.php");
class usuario{

private $id;
private $usuario;
private $contraseña;
private $nombre;
private $apellido;
private $admin;

    public function __construct() {       
        if ($_POST) {
            $this->id = $_POST['id'];
            $this->usuario = $_POST['usuario'];
            $this->contraseña = $_POST['contraseña'];
            $this->nombre = $_POST['nombre'];
            $this->apellido = $_POST['apellido'];
            $this->admin = $_POST['admin'];
        }
        else{
            $this->id = 0;
            $this->usuario = "a";
            $this->contraseña = "a";
            $this->nombre = "a";
            $this->apellido = "a";
            $this->admin = 1;
        }
    }
    
    public function getAdmin(){
        return $this->admin;
    }
    
    public function getOfertas(){
        $conex = conexion::getInstance();
        $sql = "SELECT * FROM ofertas";
        $result = $conex->db->prepare($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        $ofertas=[];
        while ($row = $result->fetch()) {
            $ofertas[$row['id']]= ['id'=> $row['id'], 'descripcion' => $row['descripcion'], 'persona_de_contacto' => $row['persona_de_contacto'], 'telefono_contacto' => $row['telefono_contacto'], 'correo_electronico' => $row['correo_electronico'], 'direccion' => $row['direccion'], 'poblacion' => $row['poblacion'], 'codigo_postal' => $row['codigo_postal'], 'provincia' => $row['provincia'], 'estado' => $row['estado'], 'fecha_creacion' => $row['fecha_creacion'], 'fecha_comunicacion' => $row['fecha_comunicacion'], 'psicologo_encargado' => $row['psicologo_encargado'], 'candidato_seleccionado' => $row['candidato_seleccionado'], 'otros_datos_candidato' => $row['otros_datos_candidato']];
        }
        return $ofertas;
    }  


}

?>

