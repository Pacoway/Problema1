<?php 

echo CargaVista('plantilla/layout', array(
    'titulo'=>'Inicio',
    'menu'=>CargaVista('plantilla/menu'),
    'cuerpo'=>CargaVista('inicio'),
));

?>