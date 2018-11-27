<?php 
include(MODEL_PATH.'administrador.php');

$ofertas=administrador::muestraOfertas();

echo CargaVista('plantilla/layout', array(
    'titulo'=>'Listado de ofertas',
    'menu'=>CargaVista('plantilla/menu'),
    'cuerpo'=>CargaVista('ofertas', array('ofertas'=>$ofertas)),
));

?>