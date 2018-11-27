<?php 
include("usuario.php");
class administrador extends usuario{

    public function __construct() {
        parent::__construct();
    }       

    public function muestraOfertas(){
        $ofertas = self::getOfertas();
        $resultado = "<table><tr><th>ID</th>  <th>descripcion</th>  <th>persona_de_contacto</th>  <th>telefono_contacto</th>  <th>correo_electronico</th>  <th>direccion</th>  <th>poblacion</th>  <th>codigo_postal</th>  <th>provincia</th>  <th>estado</th>  <th>fecha_creacion</th>  <th>fecha_comunicacion</th>  <th>psicologo_encargado</th>  <th>Candidato_Seleccionado</th>  <th>otros_datos_candidato</th>     <th>Operaciones</th></tr>";
 
        foreach ($ofertas as $id => $valor) {
            $resultado.="<tr>";
            foreach ($valor as $campo => $datos) {
                $resultado.= "<th>".$datos."</th>";
            }
            $resultado.= "<th><a href='?ctrl=borrar&id=".$id."'>Borrar </a>";
            $resultado.= "<a href='?ctrl=modificar&id=".$id."'> Modificar</a></th>";

            $resultado.="</tr>";
        }

        $resultado.= "</table>";
        return $resultado;
    }

    public function añadirOferta($descripcion,$persona_de_contacto,$telefono_contacto,$correo_electronico,$direccion,$poblacion,$codigo_postal,$provincia,$estado,$fecha_creacion,$fecha_comunicacion,$psicologo_encargado,$candidato_seleccionado,$otros_datos_candidato){
        $conex = conexion::getInstance();
        $sql = "INSERT INTO ofertas(id, descripcion, persona_de_contacto, telefono_contacto, correo_electronico, direccion, poblacion, codigo_postal, provincia, estado, fecha_creacion, fecha_comunicacion, psicologo_encargado, candidato_seleccionado, otros_datos_candidato) ";
        $sql.= "VALUES (NULL, '".$descripcion."', '".$persona_de_contacto."', '".$telefono_contacto."', '".$correo_electronico."', '".$direccion."', '".$poblacion."', ".$codigo_postal.", '".$provincia."', '".$estado."', '".$fecha_creacion."', '".$fecha_comunicacion."', '".$psicologo_encargado."', '".$candidato_seleccionado."', '".$otros_datos_candidato."')";
        $result = $conex->db->prepare($sql);
        $result->execute();
    }

    public function borrarOferta($id){
        $conex = conexion::getInstance();
        $sql = "DELETE FROM ofertas WHERE ofertas.id = ".$id;
        $result = $conex->db->prepare($sql);
        $result->execute();
    }

    public function modificarOferta($id,$descripcion,$persona_de_contacto,$telefono_contacto,$correo_electronico,$direccion,$poblacion,$codigo_postal,$provincia,$estado,$fecha_creacion,$fecha_comunicacion,$psicologo_encargado,$candidato_seleccionado,$otros_datos_candidato){
        $conex = conexion::getInstance();
        $sql = "UPDATE ofertas SET descripcion = '".$descripcion."', persona_de_contacto = '".$persona_de_contacto."', telefono_contacto = '".$telefono_contacto."', correo_electronico = '".$correo_electronico."', direccion = '".$direccion."', poblacion = '".$poblacion."', codigo_postal = ".$codigo_postal.", provincia = '".$provincia."', estado = '".$estado."', fecha_creacion = '".$fecha_creacion."', fecha_comunicacion = '".$fecha_comunicacion."', psicologo_encargado = '".$psicologo_encargado."', candidato_seleccionado = '".$candidato_seleccionado."', otros_datos_candidato = '".$otros_datos_candidato."' WHERE ofertas.id = ".$id;
        $result = $conex->db->prepare($sql);
        if ($result) {
            $result->execute();
        }
        else{
            echo("Statement failed: ". $result->error . "<br>");
        }
    }

    }

    ?>