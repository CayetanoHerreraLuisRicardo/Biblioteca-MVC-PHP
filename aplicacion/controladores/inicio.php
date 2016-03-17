<?php

function iniciar($aplicacion)
{
    $datos = array();
    
    $datos['vista']['titulo'] = 'Bienvenido';
    $datos['vista']['cuerpo'] = 'html/inicio/iniciar.php';
    require "aplicacion/vistas/html/base/base.php";
}
