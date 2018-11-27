<?php 
include(MODEL_PATH.'administrador.php');

echo CargaVista('plantilla/layout', array(
    'titulo'=>'Confirmar borrado',
    'menu'=>CargaVista('plantilla/menu'),
    'cuerpo'=>CargaVista('modificar',array('id'=>$_GET['id'])),
));

if (isset($_POST['sub'])) {
        administrador::modificarOferta($_POST['id'],$_POST['descripcion'], $_POST['persona_de_contacto'], $_POST['telefono_contacto'], $_POST['correo_electronico'], $_POST['direccion'], $_POST['poblacion'], $_POST['codigo_postal'], $_POST['provincia'], $_POST['estado'], $_POST['fecha_creacion'], $_POST['fecha_comunicacion'], $_POST['psicologo_encargado'], $_POST['candidato_seleccionado'], $_POST['otros_datos_candidato']);
        header('Location: ?ctrl=ofertas', true, 301);
}

?>