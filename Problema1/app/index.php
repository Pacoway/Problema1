<?php 
define('CTRL_PATH', __DIR__.'/ctrl/');
define('MODEL_PATH', __DIR__.'/models/');
define('VIEW_PATH', __DIR__.'/views/');
define('TEMPLATE_PATH', __DIR__.'/plantilla/');
define('LIB_PATH', __DIR__.'/lib/');
define('HELPERS_PATH', __DIR__.'/helpers/');

include (HELPERS_PATH.'vistas.php');

// Cuerpo del controlador frontal
$ctrl=isset($_GET['ctrl']) ? $_GET['ctrl'] : 'inicio';

// Nombre del fichero a incluir
$ctrl_file=CTRL_PATH.$ctrl.'.php';
if (file_exists($ctrl_file))
{
    include($ctrl_file);
}
else
{   // Error 404
    echo CargaVista('plantilla/layout', array(
        'titulo'=>'Página no encontrada',
        'menu'=>CargaVista('plantilla/menu'),
        'cuerpo'=>CargaVista('error404', array('file'=>$ctrl_file)),
    ));
}
?>