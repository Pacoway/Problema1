<?php 
include(MODEL_PATH.'administrador.php');

echo CargaVista('plantilla/layout', array(
    'titulo'=>'Confirmar borrado',
    'menu'=>CargaVista('plantilla/menu'),
    'cuerpo'=>CargaVista('borrar', array('id'=>$_GET['id'])),
));

if (isset($_POST['sub'])) {
    if ($_POST['sub']=="SI") {
        administrador::borrarOferta($_POST['id']);
        header('Location: ?ctrl=ofertas', true, 301);
    }
    elseif ($_POST['sub']=="NO") {
        header('Location: ?ctrl=ofertas', true, 301);
    }
}
?>